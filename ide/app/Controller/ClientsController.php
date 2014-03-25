<?php 
class ClientsController extends AppController
{
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 		= 'Client';
	public $uses  = array('Phum','Client','Khum','Khet','Srok','ClientVendor','NonClient');

	public function add()
	{
		$data = $this->Khet->find('all');
		$this->set('Khets',$data);
		
	}
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findByclient_id($id);
		$this->set('data',$data);

		$khet  	= $this->Khet->find('all');
		$this->set('khets',$khet);

		$selectKhetCode = '';

		$phum_code = @$data['Client']['phum_code'];
		$sql = "SELECT Khet.khet_code FROM khets as Khet LEFT JOIN sroks as Srok ON 
				Khet.khet_code = Srok.khet_code LEFT JOIN khums as Khum ON 
				 Srok.srok_code = Khum.srok_code LEFT JOIN phums as Phum ON 
				 Phum.khum_code = Khum.khum_code  WHERE Phum.phum_code='$phum_code'";
		$selectKhets = $model->query($sql);
		if(count($selectKhets))
		{
			$selectKhetCode = $selectKhets[0]['Khet']['khet_code'];
		}
		$this->set('selectKhetCode',$selectKhetCode);
		
	}
	/*Function Random Client id by Village code and 3digit serial*/
	public function generateClientId()
	{
		$client_id='';
		$phum_code=$this->request->data['phum_code'];
		$data=$this->Client->find('all',array(
							'conditions'=>array('Client.phum_code LIKE'=>'%'.$phum_code.'%'),
							'order'=>array('Client.client_id'=>'DESC'),
							'limit'=>1)
						);
		if(count($data))
		{
			$client_id_plode=explode('.',$data[0]['Client']['client_id']);
			$client_int=(int)$client_id_plode[1]+1;	
			$client_id=$phum_code.'.'.str_pad($client_int,3,"0",STR_PAD_LEFT);
		}
		else
		{
			$client_id=$phum_code.'.001';
		}
		return $client_id;
	}
	public function save($id=0)
	{
		
		
		$userId = $this->Session->read('Auth.User.user_id');	
		if($id===0)
		{	
			$this->request->data['created_by'] = $userId;
			$this->request->data['client_id']=$this->generateClientId(); 
			$this->Client->create();		
			
			if($this->Client->save($this->request->data))
			{
				$this->Session->setFlash(__( $this->context.' has been saved'),
									'default',
									array('class'=>'alert alert-dismissable alert-success '));
				
				$id  = $this->Client->getLastInsertId();
				$this->request->data['id'] = $id;
				$logMessage = json_encode($this->request->data);
				$this->generateLog($logMessage,' CREATE NEW :'.$id);
				$this->redirect(array('controller' =>'Clients','action' => 'listing'));
			}

			$this->Session->setFlash(__('Unable to add '.$this->context),
									'default',
									array('class'=>'alert alert-dismissable alert-danger '));

		}
		else
		{
			$this->request->data['modified_by'] = $userId;
			if($this->request->is(array('post','put')))
			{
				$this->Client->id = $id;
				$keyName = $this->Client->primaryKey;
				$obj 	= $this->Client->find('all',array(
					'conditions'=>array($keyName=>$id)
				));
				if(!count($obj))
				{
					throw new NotFoundException();
					
				}
				$logMessage = json_encode($obj);
				$this->generateLog($logMessage,' EDIT :'.$id);
				if($this->Client->save($this->request->data))
				{
					$this->Session->setFlash(__( $this->context.' has been saved'),
									'default',
									array('class'=>'alert alert-dismissable alert-success '));
					$this->redirect(array('controller' =>'Clients','action' => 'listing'));
				}
			}
			$this->Session->setFlash(__('Unable to save '.$this->context),
										'default',
										array('class'=>'alert alert-dismissable alert-danger '));
			
		}
	}

	public function selectclient()
	{

			$model = $this->getModel();
			$model->recursive = 0;
			$data = $model->find('all',array('conditions'=>array('Client.state'=>1))
				);
			$st='';
			
			if(count($data))
			{
				foreach ($data as $key => $value) {
					$st.='<option value="'.$value['Client']['client_id'].'">'.$value['Client']['client_name_en'] .' : '.$value['Client']['client_id'].'</option>';
				}
			}
			echo $st;
			exit;
	}
	/*====Add new interface client when sale transaction===*/
	public function addnewclient($vendor_code = 0)
	{
		$this->layout = 'modal';
		$this->set('vendor_code',$vendor_code);
	}
	/*==========Add new client when sale transaction=====*/
	public function saveclient()
	{
			$userId = $this->Session->read('Auth.User.user_id');
			$this->request->data['created_by'] = $userId;
			$client_id = 	$this->generateClientId(); 
			$datestarted=$this->request->data['clientvendor_datestarted'];
			$this->request->data['client_id']= $client_id;
			$this->Client->create();		
			$ret = array('error'=>true,'msg'=>'');

			$id  = $client_id;

				$this->request->data['id'] = $id;
				$logMessage = json_encode($this->request->data);
				$this->generateLog($logMessage,' CREATE NEW :'.$id);
			if($this->Client->save($this->request->data))
			{
				$this->ClientVendor->create();
				$this->ClientVendor->save(array(
						'client_id'=>$client_id,
						'vendor_code'=>$this->request->data['vendor_code'],
						'clientvendor_datestarted'=>$datestarted
					));
				$ret['msg'] = __('Saving client completed!');
				$ret['client_id'] = $this->Client->getLastInsertId();
				$ret['client_name_en'] = $this->request->data['client_name_en'];
				$ret['client_name_kh'] = $this->request->data['client_name_kh'];
				echo json_encode($ret);
				exit();
			}
			else
			{
				$ret['msg'] = __('Saving client error');
				echo json_encode($ret);
				exit();
			}
	}
	/*======Load data in to sale transaction Client info====*/
	public function getClient()
	{
		$client_id = $this->request->data['client_id'];
		$st='';
		if($client_id=='')
		{
			$st.='<div class="alert alert-dismissable alert-danger ">'.__('Client not found').'</div>';
		}
		else
		{
			$this->Client->recursive = 4;
			$data=$this->Client->findByclientId($client_id);
			
			if($data)
			{
				$st.='<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
				  	<tr>
				  		<td>'. __('Name') .' : '.   $data['Client']['client_name_en'].'</td>
				  		<td>' . __('Phone') .' : '.  $data['Client']['client_phone'] .'</td>
				  	</tr>
				  	<tr style="background-color:#f7f8fa;">
				  		<td>'. __('ID') .' :	'.   $data['Client']['client_id'] .'</td>
				  		<td>'.  __('Gender') .' : '.  $data['Client']['client_gender'] .'</td>
				  	</tr>
				  	<tr>
				  		<td>'. __('Date Started') .' : '. $data['Client']['client_datestarted'] . '</td>
				  		<td>'.  __('Age') .' : ' . $data['Client']['client_date_of_birth'] . '</td>
				  	</tr>
				  	<tr style="background-color:#f7f8fa;">
				  		<td> '.  __('Province') .' : '. $data['Phum']['Khum']['Srok']['Khet']['khet_name_en'].' . '.$data['Phum']['Khum']['Srok']['Khet']['khet_code']. '</td>
				  		<td>'. __('District') .' : ' . $data['Phum']['Khum']['Srok']['srok_name_en'] .' . '.$data['Phum']['Khum']['Srok']['srok_code']. '</td>
				  	</tr>
				  	<tr>
				  		<td>'. __('Commune') .': '. $data['Phum']['Khum']['khum_name_en'] .' . '.$data['Phum']['Khum']['khum_code']. '</td>
				  		<td>'.  __('Village') .' : ' . $data['Phum']['phum_name_en'].' . '.$data['Phum']['phum_code']. '</td>
				  	</tr>
					</table>';
			}
			else
			{
				$st.='<div class="alert alert-dismissable alert-danger ">'.__('Client id has no data').'</div>';
			}
			
		}
		echo $st;
		exit();
	}
	public function setCondition()
	{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'client_id LIKE '=>'%'.$filter.'%',								
										'client_name_en LIKE '=>'%'.$filter.'%',
										'client_name_kh LIKE '=>'%'.$filter.'%',
										
																													
										)
											);
			}
		if(isset($this->request->data['select_client']))
		{
			$this->Session->write('Select.Client',$this->request->data['select_client']);	
		}
		$select_client = $this->Session->read('Select.Client');
		if($select_client !=null && $select_client!='')
		{
			$this->conditionFilter['state'] = $select_client;
		}
		
		
			$this->paginate['conditions'] = $this->conditionFilter;

	}

	public function viewdetail($client_id)
	{
			$sql ="
				SELECT * FROM clients AS c
				LEFT JOIN phums AS p ON c.phum_code= p.phum_code
				LEFT JOIN khums AS kh ON p.khum_code = kh.khum_code
				LEFT JOIN sroks AS s ON kh.srok_code = s.srok_code
				LEFT JOIN khets AS kt ON s.khet_code = kt.khet_code
				WHERE client_id='$client_id'";
			$data=$this->Client->query($sql);
			$this->set('data',$data);
			
	}
	 /*======NonClient become to CLient on Sale process========8*/
	 public function addNonClientToClient($vendor_code = 0)
	 {
	 		$userId = $this->Session->read('Auth.User.user_id');
			$this->request->data['created_by'] = $userId;
			
	 		$nonclient_id=$this->request->data['nonclient_id'];
	 		$client_datestarted=@$this->request->data['client_datestarted'];
	 		$client_date_ended=$this->request->data['client_date_ended'];
	 		$clientvendor_datestarted=$this->request->data['clientvendor_datestarted'];
	 		$sql="SELECT * FROM nonclients WHERE nonclient_id='$nonclient_id'";
	 		$data=$this->NonClient->query($sql);
	 		
	 		foreach ($data as $key => $value) {
	 			$phum_code=$value['nonclients']['phum_code'];
	 			$this->request->data['phum_code']=$phum_code;
	 			$client_id = 	$this->generateClientId(); 
	 			
	 			$this->request->data['client_id']=$client_id;
	 			$this->request->data['client_name_en']=$value['nonclients']['nonclient_name_en'];
	 			$this->request->data['client_name_kh']=$value['nonclients']['nonclient_name_kh'];
	 			$this->request->data['client_date_of_birth']=$value['nonclients']['nonclient_date_of_birth'];
	 			$this->request->data['client_gender']=$value['nonclients']['nonclient_gender'];
	 			$this->request->data['client_phone']=$value['nonclients']['nonclient_phone'];
	 			$this->request->data['client_datestarted']=$client_datestarted;
	 			$this->request->data['client_date_ended']=$client_date_ended;
	 			
	 			
	 		}

	 		$this->Client->create();		
			$ret = array('error'=>true,'msg'=>'');

			$id  = $client_id;

				$this->request->data['id'] = $id;
				$logMessage = json_encode($this->request->data);
				$this->generateLog($logMessage,' CREATE NEW :'.$id);

			if($this->Client->save($this->request->data))
			{
				$this->NonClient->id=$nonclient_id;
				$this->NonClient->save(array('nonclient_status'=>0));
				$this->ClientVendor->create();
				$this->ClientVendor->save(array(
						'client_id'=>$client_id,
						'vendor_code'=>$vendor_code,
						'clientvendor_datestarted'=>$clientvendor_datestarted
					));
				$ret['msg'] = __('Saving nonclient completed!');
				$ret['client_id'] = $this->Client->getLastInsertId();
				$ret['client_name_en'] = $this->request->data['client_name_en'];
				$ret['client_name_kh'] = $this->request->data['client_name_kh'];
				echo json_encode($ret);
				exit();
			}
			else
			{
				$ret['msg'] = __('Saving nonclient error');
				echo json_encode($ret);
				exit();
			}
	 		
	 }
}
 ?>