<?php
	class FieldDaysController extends AppController
	{
		public $helpers 	= 	array('Html','Form');	
		public $components 	= 	array('Session');
		public $context 		= 'FieldDay';
		public $uses  = array('FieldDay','ClientFieldDay');

		public function saveClientFieldDay($field_day_id)
 		{
 			$client_id=@$this->request->data['client'];
 			$nonclient_id =@$this->request->data['nonclient'];
 			$data = array();
			$sql = 'DELETE FROM '.$this->ClientFieldDay->tablePrefix.$this->ClientFieldDay->table.' WHERE field_day_id= \''.$field_day_id.'\'';
			
			$this->ClientFieldDay->query($sql);
			if(count($client_id)){				
				foreach($client_id as $i=> $client)				
				{		
					$data[] =array('client_id'=>@$client,
						'field_day_id'=>@$field_day_id	);	

				}	
			}
			if(count($nonclient_id))
			{
				foreach ($nonclient_id as $j => $nonclient) 
					{
						$data[] =array('nonclient_id'=>@$nonclient,
						'field_day_id'=>@$field_day_id	);	

					}
			}
						
			if(count($data)){					
						return $this->ClientFieldDay->saveAll($data);				
					}			
					
			
		}
 		public function save($id=0)
		{	
			$userId = $this->Session->read('Auth.User.user_id');
						
			if($id===0)
		    {
		    	$this->request->data['created_by'] = $userId;
		    	$this->FieldDay->create();		
				if($this->FieldDay->save($this->request->data))
				{
					$field_day_id=$this->FieldDay->getLastInsertId();
					$this->saveClientFieldDay($field_day_id);
					
					$this->request->data['id'] = $field_day_id;
					$logMessage = json_encode($this->request->data);
					$this->generateLog($logMessage,' CREATE NEW :'.$id);
					$this->redirect(array('controller' =>'FieldDays','action' => 'listing'));
				}

			$this->Session->setFlash(__('Unable to add '.$this->context),
									'default',
									array('class'=>'alert alert-dismissable alert-danger '));

		    } 
		    else
			{		
				$this->request->data['modified_by'] = $userId;
				$this->FieldDay->id=$id;
				$keyName = $this->FieldDay->primaryKey;
				$obj 	= $this->FieldDay->find('all',array(
					'conditions'=>array($keyName=>$id)
				));
				if(!count($obj))
				{
					throw new NotFoundException();
					
				}
				$logMessage = json_encode($obj);
				$this->generateLog($logMessage,' EDIT :'.$id);
			    		if($this->FieldDay->save($this->request->data))
						{		
							$this->saveClientFieldDay($this->request->data['field_day_id']);	
								$this->Session->setFlash(
											__('Field Day has been saved')
												,'default'
												, array('class'=>'alert alert-dismissable alert-success '));
				    		 	$this->redirect(array('action' => 'listing'));
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
		
			$data = $model->findByfield_day_id($id);
			$this->set('data',$data);
 			/*---------Edit Data of Client Field Day------------------*/
			$this->ClientFieldDay->recursive=3;
			$data=$this->ClientFieldDay->find('all',
								array('conditions'=>array('ClientFieldDay.field_day_id'=>$id),
										'fields'=>array('client_id','nonclient_id','field_day_id','client_field_id')
									 ));
			$this->set('clientfieldDays',$data);
		}
		public function setCondition()
		{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'training_id LIKE '=>'%'.$filter.'%',								
																					
										)
											);
			}
			
			$this->paginate['conditions'] = $this->conditionFilter;

		}
	}
?>