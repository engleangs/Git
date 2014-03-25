<?php 
class VendorsController extends AppController
{
	/*public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');*/
	public $context 		= 'Vendor';
	public $uses  = array('Khet','Vendor','ClientVendor','Client','Phum','CommercialAgronomist','Fba');
	public function add()
	{
		$data = $this->Khet->find('all');
		$this->set('khets',$data);
		
	}
	public function getExts($str)
 	{
		$strimage=strpos($str,".");
		if(!$strimage)
		  {
		     return "";
		  }
		$lengimage=strlen($str) - $strimage;
		$ext=substr($str,$strimage+1,$lengimage);
		return $ext;
 	}
 	public function saveClientVendor($vendor_id)
 	{
 			$client_id=@$this->request->data['client'];
 			$date_started =@$this->request->data['datestarted'];
 			$data = array();
			$sql = 'DELETE FROM '.$this->ClientVendor->tablePrefix.$this->ClientVendor->table.' WHERE vendor_code= \''.$vendor_id.'\'';
			
			$this->ClientVendor->query($sql);
			if(count($client_id)){				
				foreach($client_id as $i=> $client)
					{
						$data [] =array('client_id'=>$client,
						'clientvendor_datestarted'=>$date_started[$i],
						'vendor_code'=>$vendor_id);
					}if(count($data)){
						return $this->ClientVendor->saveAll($data);	
					}			
				}			
			
			

 	}
 	public function saveFbaOrCa($vendor_code,$new=true)
 	{
 		$position =@$this->request->data['vendor_type'];
 		$ca_code=@$this->request->data['ca_code'];
 		$userId = $this->Session->read('Auth.User.user_id');
 		$data = array();
 		if($position=='fba')
 		{	
 			if($new)
 			{
 				$data [] =array('fba_code'=>$vendor_code,
								'ca_code'=>$ca_code
							   );  
				$id  = $this->Fba->getLastInsertId();
				$this->request->data['id'] = $id;
				$logMessage = json_encode($this->request->data);
				$this->generateLog($logMessage,' CREATE NEW :'.$id);
				if(count($data))
				{
					return $this->Fba->saveAll($data);
				}
 			}
 			else
 			{
 				$keyName = $this->Fba->primaryKey;
				$obj 	= $this->Fba->find('all',array(
					'conditions'=>array('Fba.'.$keyName=>$vendor_code)
				));
						
				$logMessage = json_encode($obj);
				$this->generateLog($logMessage,' EDIT :'.$userId);
 				$sql = 'DELETE FROM '.$this->Fba->tablePrefix.$this->Fba->table.' WHERE fba_code= \''.$vendor_code.'\'';
				$this->Fba->query($sql);
				$data [] =array('fba_code'=>$vendor_code,
								'ca_code'=>$ca_code
								);
				if(count($data))
				{
					return $this->Fba->saveAll($data);
				}
 			}
 				
				
 		}
 		if($position=='ca')
 		{
 			if($new)
 			{
 				$data [] =array('ca_code'=>$vendor_code
 			   					
								);
				$id  = $this->CommercialAgronomist->getLastInsertId();
				$this->request->data['id'] = $id;
				$logMessage = json_encode($this->request->data);
				$this->generateLog($logMessage,' CREATE NEW :'.$id);
				if(count($data))
				{
					return $this->CommercialAgronomist->saveAll($data);
				}
 			}
 			else
 			{
 				$keyName = $this->CommercialAgronomist->primaryKey;
						$obj 	= $this->CommercialAgronomist->find('all',array(
							'conditions'=>array('CommercialAgronomist.'.$keyName=>$vendor_code)
						));
					
						$logMessage = json_encode($obj);
						$this->generateLog($logMessage,' EDIT :'.$userId);
 				$sql = 'DELETE FROM '.$this->CommercialAgronomist->tablePrefix.$this->CommercialAgronomist->table.' WHERE ca_code= \''.$vendor_code.'\'';
				$this->CommercialAgronomist->query($sql);
 			    $data [] =array('ca_code'=>$vendor_code
 			   					
								);
				$id  = $this->CommercialAgronomist->getLastInsertId();
				$this->request->data['id'] = $id;
				$logMessage = json_encode($this->request->data);
				$this->generateLog($logMessage,' CREATE NEW :'.$id);
				if(count($data))
				{
					return $this->CommercialAgronomist->saveAll($data);
				}
 			}
 				
			
 		}
 	}
 	public function save($id=0)
	{		
			$image_format=array("jpg","png","gif","jpeg","PNG","JPG","GIF","JPEG","BMP");
		    $userId = $this->Session->read('Auth.User.user_id');
		    $name = $_FILES["file"]["name"];
		    $tmp=  $_FILES["file"]["tmp_name"];
		    $size=$_FILES["file"]["size"];
		    $ext = $this->getExts($name);
		    $position=@$this->request->data['vendor_type'];
		   
		    if($id===0)  
		    {
		    			    	
		    	$this->request->data['created_by'] = $userId;
		    	if($size>0)
		    	{
		    		if(in_array($ext,$image_format))	
		    		{
		    			$actual_image_name = sha1(time().rand(1,100)).".".$ext;
		    			move_uploaded_file($_FILES["file"]["tmp_name"],"vendors/" . $actual_image_name);
			        	$this->request->data["vendor_photo"]="vendors/".$actual_image_name;

		    		}
		    		else
		    		{
		    			$this->Session->setFlash(
									__( $_FILES["file"]["name"]. ' file type not allowed')
										,'default'
										, array('class'=>'alert alert-dismissable alert-warning '));
		    			$this->redirect(array('action' => 'listing'));
		    		}
		    	}
		    	if($position=='fba')
		    	{
		    		unset($this->request->data['branch_manager']);
		    	}
		    	$this->Vendor->create();		
				if($this->Vendor->save($this->request->data))
				{
					$this->saveClientVendor($this->request->data['vendor_code']);
					$this->saveFbaOrCa($this->request->data['vendor_code'],true);

					$this->Session->setFlash(
								__('Vender has been saved')
									,'default'
									, array('class'=>'alert alert-dismissable alert-success '));
	    		 	
					$id  = $this->Vendor->getLastInsertId();
					$this->request->data['id'] = $id;
					$logMessage = json_encode($this->request->data);
					$this->generateLog($logMessage,' CREATE NEW :'.$id);
	    		 	$this->redirect(array('action' => 'listing'));
				}

		    	
		    } 
		    else
			{		
					$this->request->data['modified_by'] = $userId;
					if($position=='fba')
		    		{
		    				unset($this->request->data['branch_manager']);
		    		}
					if($size>0)
		    		{
			    		if(in_array($ext,$image_format))	
			    		{
			    			$actual_image_name = sha1(time().rand(1,100)).".".$ext;
			    			move_uploaded_file($_FILES["file"]["tmp_name"],"vendors/" . $actual_image_name);
				        	$this->request->data["vendor_photo"]="vendors/".$actual_image_name;

			    		
			    		}
			    		else
			    		{
			    			$this->Session->setFlash(
										__( $_FILES["file"]["name"]. ' file type not allowed')
											,'default'
											, array('class'=>'alert alert-dismissable alert-warning '));
			    			$this->redirect(array('action' => 'add'));
			    		}
			    		
			    		$this->Vendor->id=$id;
			    		$photo=$this->request->data['photo'];
						if(file_exists($photo))
			    		{
			    			unlink($photo);
			    		}
						$keyName = $this->Vendor->primaryKey;
						$obj 	= $this->Vendor->find('all',array(
							'conditions'=>array('Vendor.'.$keyName=>$id)
						));
						if(!count($obj))
						{
							throw new NotFoundException();
							
						}
						$logMessage = json_encode($obj);
						$this->generateLog($logMessage,' EDIT :'.$id);
						
						if($this->Vendor->save($this->request->data))
						{
								$this->saveClientVendor($this->request->data['vendor_code']);
								$this->saveFbaOrCa($this->request->data['vendor_code'],false);
								$this->Session->setFlash(
											__('Vender has been saved')
												,'default'
												, array('class'=>'alert alert-dismissable alert-success '));
				    		 	$this->redirect(array('action' => 'listing'));
						}


		    		}
		    		else
		    		{
		    			$this->Vendor->id=$id;
						if($this->Vendor->save($this->request->data))
						{
							$this->saveClientVendor($this->request->data['vendor_code']);
							$this->saveFbaOrCa($this->request->data['vendor_code'],false);
							$this->Session->setFlash(
										__('Vender has been saved')
											,'default'
											, array('class'=>'alert alert-dismissable alert-success '));
			    		 	$this->redirect(array('action' => 'listing'));
						}
		    		}
					
			}
		    
	}

	
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
	
		$data = $model->findByvendor_code($id);
		$this->set('data',$data);

		$khet  	= $this->Khet->find('all');
		$this->set('khets',$khet);
		
		$selectKhetCode = '';
		$phum_code = @$data['Vendor']['phum_code'];
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

		$data=$this->ClientVendor->find('all',
							array('conditions'=>array('ClientVendor.vendor_code'=>$id),
									'fields'=>array('client_id','clientvendor_datestarted')
								 ));
		$this->set('clientvendors',$data);

		$data=$this->CommercialAgronomist->find('all');
		$this->set('CA',$data);
		
	}
	public function setCondition()
	{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'vendor_name_en LIKE '=>'%'.$filter.'%',								
										'vendor_name_kh LIKE '=>'%'.$filter.'%',
										'vendor_email LIKE' =>'%' .$filter. '%',
										'vendor_code LIKE' => '%'.$filter. '%',																				
										)
											);
			}
			//$this->conditionFilter['user_id !='] = 'A001';
		if(isset($this->request->data['select_vendor']))
		{
			$this->Session->write('Select.Vendor',$this->request->data['select_vendor']);	
		}
		if($select_vendor = $this->Session->read('Select.Vendor'))
		{
			$this->conditionFilter['vendor_type'] = $select_vendor;
		}
			$this->paginate['conditions'] = $this->conditionFilter;

	}
	
	public function getVendorCode()
	{
		$data=$this->Vendor->find('all',array('conditions'=>array('Vendor.state'=>1)));
	
		$vendor=array();
		foreach ($data as $key => $value) {
			$vendor[]=$value['Vendor']['vendor_name_en'];
		}
		echo json_encode($vendor);
		exit();
	}

	public function checkExistingVendorCode()
	{
		$vendor_code=$this->request->data['code'];
		$data=$this->Vendor->findByvendor_code($vendor_code);

		$st='';
		if(count($data))
		{
			$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated Vendor Code. Try again!').'</div>';
		}
		else
		{
			$st.='';
		}
		echo $st;
		exit();
	}

	public function viewdetail($vendor_code)
	{
			$sql ="
				SELECT * FROM vendors AS v
				LEFT JOIN phums AS p ON v.phum_code= p.phum_code
				LEFT JOIN khums AS kh ON p.khum_code = kh.khum_code
				LEFT JOIN sroks AS s ON kh.srok_code = s.srok_code
				LEFT JOIN khets AS kt ON s.khet_code = kt.khet_code
				WHERE vendor_code='$vendor_code'";
			$data=$this->Vendor->query($sql);
			$this->set('data',$data);
			
	}
	/*get Vendor info by ajax from form sale*/
	public function getVendor(){
			$vendor_code=$this->request->data['vendor_code'];
			$sql="
				SELECT v.*,p.phum_name_en,p.phum_code,kh.khum_name_en,kh.khum_code,
				sr.srok_name_en,sr.srok_code,kt.khet_code,kt.khet_name_en 
				FROM vendors AS v 
				LEFT JOIN phums AS p ON p.phum_code=v.phum_code
				LEFT JOIN khums AS kh ON p.khum_code=kh.khum_code
				LEFT JOIN sroks AS sr ON kh.srok_code = sr.srok_code
				LEFT JOIN khets AS kt ON sr.khet_code= kt.khet_code
				WHERE vendor_code='$vendor_code'
			";
			$vendor=$this->Vendor->query($sql);
			$st="";
			if($vendor)
			{
				foreach ($vendor as $key => $data) {
				
				$st.='<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
				  	<tr>
				  		<td>'. __('Name') .' : '.   $data['v']['vendor_name_en'].'</td>
				  		<td>' . __('Phone') .' : '.  $data['v']['vendor_phone'] .'</td>
				  	</tr>
				  	<tr style="background-color:#f7f8fa;">
				  		<td>'. __('ID') .' :	'.   $data['v']['vendor_code'] .'</td>
				  		<td>'.  __('Email') .' : ' . $data['v']['vendor_email'] . '</td>
				  		
				  	</tr>
				  	<tr>
				  		<td>'.  __('Gender') .' : '.  $data['v']['vendor_gender'] .'</td>
				  		<td>'. __('Date Started') .' : '. $data['v']['vendor_datestarted'] . '</td>
				  	</tr>
				  	<tr style="background-color:#f7f8fa;">
				  		<td>'.  __('Age') .' : ' . $data['v']['vendor_date_of_birth'] . '</td>
				  		<td>'. __('Date End') .' : '. $data['v']['vendor_date_ended'] . '</td>
				  		
				  	</tr>
				  	<tr style="background-color:#f7f8fa;">
				  		<td> '.  __('Province') .' : '. $data['kt']['khet_name_en'].' . '.$data['kt']['khet_code']. '</td>
				  		<td>'. __('District') .' : ' . $data['sr']['srok_name_en'] .' . '.$data['sr']['srok_code']. '</td>
				  	</tr>
				  	<tr style="background-color:#f7f8fa;">
				  		<td>'. __('Commune') .': '. $data['kh']['khum_name_en'] .' . '.$data['kh']['khum_code']. '</td>
				  		<td>'.  __('Village') .' : ' . $data['p']['phum_name_en'].' . '.$data['p']['phum_code']. '</td>
				  	</tr>
					</table>';
				}
			}
			else
			{
				$st.='<div class="alert alert-dismissable alert-danger ">'.__('Vendor id has no data').'</div>';
			}
		echo $st;
		exit();
	}
	/*query client that belong to vendor on sale form*/
	public function getClientBelongToVendor($hidden_client_id=0)
	{
		$vendor_code=@$this->request->data['vendor_code'];
		$sql="
			SELECT * FROM clients AS c
			LEFT JOIN clientvendors AS cv ON c.client_id=cv.client_id
			WHERE cv.vendor_code='$vendor_code' AND c.state =1";
		$data=$this->Client->query($sql);

		$ret = array('error'=>true,'msg'=>'','data'=>'');
		$st="";
		$stSelect = '';
		
		if(count(@$data))
		{
				
				foreach ($data as $key => $value) {
					$stSelect = '';
					if($value['c']['client_id']==$hidden_client_id)
					$stSelect=' selected = "selected" ';
					$st.='<option value="'.$value['c']['client_id'].'" '.$stSelect.'>'.$value['c']['client_name_en'].' : '.$value['c']['client_id'].'</option>';
				}
				$ret['error']=false;
				$ret['data'] = $st;
		}
		else
		{
				$st.=__('Vendor has no Client');
				$ret['msg'] = $st;
		}

			echo json_encode($ret);
				
			exit();
	}

	/*Select Vendor code when Add training on Form Training*/
	public function selectvendor()
	{

			$model = $this->getModel();
			$model->recursive = 0;
			$data = $model->find('all',array('conditions'=>array('Vendor.state'=>1))
				);
			$st='';
			
			if(count($data))
			{
				foreach ($data as $key => $value) {
					$st.='<option value="'.$value['Vendor']['vendor_code'].'">'.$value['Vendor']['vendor_name_en'] .' : '.$value['Vendor']['vendor_code'].'</option>';
				}
			}
			echo $st;
			exit;
	}
}
 ?>