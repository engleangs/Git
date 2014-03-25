<?php 
class NonClientsController extends AppController
{
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 		= 'NonClient';
	public $uses  = array('Phum','NonClient','Khum','Khet','Srok');

	public function add()
	{
		$data = $this->Khet->find('all');
		$this->set('khets',$data);
		
	}

	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
	
		$data = $model->findBynonclient_id($id);
		$this->set('data',$data);

		$khet  	= $this->Khet->find('all');
		$this->set('khets',$khet);

		$selectKhetCode = '';

		$phum_code = @$data['NonClient']['phum_code'];
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
	public function save($id=0)
	{
		$userId = $this->Session->read('Auth.User.user_id');
		if($id===0)
		{	
			$this->request->data['created_by'] = $userId;
			$this->NonClient->create();		
			
			if($this->NonClient->save($this->request->data))
			{
				$this->Session->setFlash(__( $this->context.' has been saved'),
									'default',
									array('class'=>'alert alert-dismissable alert-success '));
				
				$id  = $this->NonClient->getLastInsertId();
				$this->request->data['id'] = $id;
				$logMessage = json_encode($this->request->data);
				$this->generateLog($logMessage,' CREATE NEW :'.$id);
				$this->redirect(array('controller' =>'NonClients','action' => 'listing'));
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
				$this->NonClient->id = $id;
				$keyName = $this->NonClient->primaryKey;
				$obj 	= $this->NonClient->find('all',array(
					'conditions'=>array($keyName=>$id)
				));
				if(!count($obj))
				{
					throw new NotFoundException();
					
				}
				$logMessage = json_encode($obj);
				$this->generateLog($logMessage,' EDIT :'.$id);
				if($this->NonClient->save($this->request->data))
				{
					$this->Session->setFlash(__( $this->context.' has been saved'),
									'default',
									array('class'=>'alert alert-dismissable alert-success '));
					$this->redirect(array('controller' =>'NonClients','action' => 'listing'));
				}
			}
			$this->Session->setFlash(__('Unable to save '.$this->context),
										'default',
										array('class'=>'alert alert-dismissable alert-danger '));
			
		}
	}
	public function setCondition()
	{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'nonclient_id LIKE '=>'%'.$filter.'%',								
										'nonclient_name_en LIKE '=>'%'.$filter.'%',
										'nonclient_name_kh LIKE '=>'%'.$filter.'%',
										'phum_code LIKE'=>'%'.$filter.'%',
										
																													
										)
											);
			}
			$this->paginate['conditions'] = $this->conditionFilter;

	}

	/*function to submit info of nonclient to and training form*/
	public function selectnonclient()
	{

			$model = $this->getModel();
			$model->recursive = 0;
			$data = $model->find('all', 
					array('conditions'=>array('
							nonclient_status'=>1)
						)
					);
			$st='';
			
			if(count($data))
			{
				foreach ($data as $key => $value) {
					$st.='<option value="'.$value['NonClient']['nonclient_id'].'">'.$value['NonClient']['nonclient_name_en'].' : '. $value['NonClient']['nonclient_id'].'</option>';
				}
			}
			echo $st;
			exit;
	}

	public function checkExistingNonClientCode()
	{
		$nonclient_id=$this->request->data['code'];
		$data=$this->NonClient->findBynonclient_id($nonclient_id);

		$st='';
		if(count($data))
		{
			$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated NonClient Code. Try again!').'</div>';
		}
		else
		{
			$st.='';
		}
		echo $st;
		exit();
	}

	public function viewdetail($nonclient_id)
	{
			$sql ="
				SELECT * FROM nonclients AS c
				LEFT JOIN phums AS p ON c.phum_code= p.phum_code
				LEFT JOIN khums AS kh ON p.khum_code = kh.khum_code
				LEFT JOIN sroks AS s ON kh.srok_code = s.srok_code
				LEFT JOIN khets AS kt ON s.khet_code = kt.khet_code
				WHERE nonclient_id='$nonclient_id'";
			$data=$this->NonClient->query($sql);
			$this->set('data',$data);
			
	}
}?>