<?php 
	class MeetingsController extends AppController
	{
		public $helpers = array('Html','Form');
		public $components = array('Session');
		public $context ="Meeting";
		public $uses =array('Client','NonClient','Vendor','Meeting','Phum','Khet','Khum','Srok','ClientMeeting');

		public function add()
		{
			$data = $this->Khet->find('all');
			$this->set('Khets',$data);
		}
		
 		public function saveClientMeeting($meeting_id)
 		{
 			$client_id=@$this->request->data['client'];
 			$nonclient_id =@$this->request->data['nonclient'];
 			$vendor=@$this->request->data['vendor'];
 			$data = array();
			$sql = 'DELETE FROM '.$this->ClientMeeting->tablePrefix.$this->ClientMeeting->table.' WHERE meeting_id= \''.$meeting_id.'\'';
			
			$this->ClientMeeting->query($sql);
			if(count($client_id)){				
				foreach($client_id as $i=> $client)				
				{		
					$data[] =array('client_id'=>@$client,
						'meeting_id'=>@$meeting_id	);	

				}	
			}
			if(count($nonclient_id))
			{
				foreach ($nonclient_id as $j => $nonclient) 
					{
						$data[] =array('nonclient_id'=>@$nonclient,
						'meeting_id'=>@$meeting_id);	

					}
			}
			if(count($vendor))
			{
				foreach ($vendor as $k => $vendor_code) 
					{
						$data[] =array('vendor_code'=>@$vendor_code,
						'meeting_id'=>@$meeting_id	);	

					}
			}			
			if(count($data)){					
						return $this->ClientMeeting->saveAll($data);				
					}			
					
			
		}
 		public function save($id=0)
		{	
			$userId = $this->Session->read('Auth.User.user_id');
						
			if($id===0)
		    {
		    	$this->request->data['created_by'] = $userId;
		    	$this->Meeting->create();		
				if($this->Meeting->save($this->request->data))
				{
					
					$this->Session->setFlash(__( $this->context.' has been saved'),
									'default',
									array('class'=>'alert alert-dismissable alert-success '));
					$meeting_id=$this->Meeting->getLastInsertId();
					$this->saveClientMeeting($meeting_id);
					
					$this->request->data['id'] = $meeting_id;
					$logMessage = json_encode($this->request->data);
					$this->generateLog($logMessage,' CREATE NEW :'.$id);
					
					$this->redirect(array('action' => 'listing'));
				}
				$this->Session->setFlash(__('Unable to add '.$this->context),
									'default',
									array('class'=>'alert alert-dismissable alert-danger '));
		    	
		    } 
		    else
			{		
				$this->request->data['modified_by'] = $userId;
				
				$this->Meeting->id=$id;
				$keyName = $this->Meeting->primaryKey;
				$obj 	= $this->Meeting->find('all',array(
					'conditions'=>array($keyName=>$id)
				));
				if(!count($obj))
				{
					throw new NotFoundException();
					
				}
				$logMessage = json_encode($obj);
				$this->generateLog($logMessage,' EDIT :'.$id);
			    		if($this->Meeting->save($this->request->data))
						{		
							$this->saveClientMeeting($this->request->data['meeting_id']);	
								$this->Session->setFlash(
											__('Meeting has been saved')
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
		
			$data = $model->findBymeeting_id($id);
			$this->set('data',$data);

			
			$khet  	= $this->Khet->find('all');
			$this->set('khets',$khet);

			$selectKhetCode = '';

			$phum_code = @$data['Meeting']['phum_code'];
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
			
			
			
			$this->ClientMeeting->recursive=3;
			
			$data=$this->ClientMeeting->find('all',
								array('conditions'=>array('ClientMeeting.meeting_id'=>$id),
										'fields'=>array('client_id','nonclient_id','meeting_id','clientmeeting_id','vendor_code')
									 ));
			$this->set('clienttrainings',$data);
			
		}
		public function setCondition()
		{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'meeting_id LIKE '=>'%'.$filter.'%',	
										 'meeting_date LIKE' => '%'.$filter.'%',					
																					
										)
											);
			}
			
			$this->paginate['conditions'] = $this->conditionFilter;

		}
		
		public function delete($id)
		{
	        $model 		= $this->getModel();
	        $keyName = $model->primaryKey;
			$obj 	= $model->find('all',array(
				'conditions'=>array($keyName=>$id)
			));
			if(!count($obj))
			{
			throw new  NotFoundException();
			
			}
			/* log for history of to be deleted record */
			$logMessage = json_encode($obj);
			$this->generateLog($logMessage,'DELETE : '.$id);
	        if($id)
	        {
	        	$model->delete($id);
	        	$sql = 'DELETE FROM '.$this->ClientMeeting->tablePrefix.$this->ClientMeeting->table.' WHERE mmeeting_id= \''.$id.'\'';
				$this->ClientMeeting->query($sql);
			    $this->Session->setFlash(__( $this->context.' has been deleted'),
								'default',
								array('class'=>'alert alert-dismissable alert-success '));
	        }
			else
			{
				$this->Session->setFlash(__('Unable to delete '.$this->context),
										'default',
										array('class'=>'alert alert-dismissable alert-danger '));
			}
			
			$this->redirect(array('action' =>'listing'));
        
		}
		
		public function listing()
		{
			  	$this->paginate['joins'] = array(
			  		 array(
			         'alias'=>'PH',
			         'table'=>'phums',
			         'type'=>'LEFT',
			         'conditions' => '`PH`.`phum_code` = `Meeting`.`phum_code`'
			         ),
			        array(
			         'alias'=>'Khum',
			         'table'=>'khums',
			         'type'=>'LEFT',
			         'conditions' => '`Khum`.`khum_code` = `PH`.`khum_code`'

			         ),
			        array(
			         'alias'=>'Srok',
			         'table'=>'sroks',
			         'type'=>'LEFT',
			         'conditions' => '`Srok`.`srok_code` = `Khum`.`srok_code`'

			         ),
			        array(
			         'alias'=>'Khet',
			         'table'=>'khets',
			         'type'=>'LEFT',
			         'conditions' => '`Khet`.`khet_code` = `Srok`.`khet_code`'

			         )

       			);
		  
		  
		 		$this->paginate['fields'] = array(
		 		   'Meeting.meeting_id',
		 		   'Meeting.meeting_date',
		 		   'Meeting.meeting_subject',
		 		   'Meeting.meeting_responsible_staff',
		           'PH.phum_code',
		           'PH.phum_name_en',
		           'Khum.khum_code',
		           'Khum.khum_name_en',
		           'Srok.srok_code',
		           'Srok.srok_name_en',
		           'Khet.khet_code',
		           'Khet.khet_name_en',
		           'Meeting.created_by',
		           'Meeting.modified_by',
		           'Meeting.modified',
		           'Meeting.created'

		          );
		  		$data = $this->paginate($this->getContext());   
		  		$this->set(compact('data'));

		}
		
	}
?>
