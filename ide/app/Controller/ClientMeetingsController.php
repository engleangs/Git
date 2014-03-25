<?php
	class ClientMeetingsController extends AppController
	{
		public $helpers =array('Html','Form');
		public $components= array('Session');
		public $name="ClientMeetings";
		public $context ="ClientMeeting";
		public $uses  = array('ClientMeeting','Meeting','Client','Vendor','NonClient');

		public function listing()
		{

			$this->setCondition();
			$this->paginate['conditions'] = $this->conditionFilter;
			$data = $this->paginate($this->getContext());		
			$this->set(compact('data'));
		}

		public function setCondition()
		{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'ClientMeeting.meeting_id LIKE '=>'%'.$filter.'%',
										'ClientMeeting.client_id LIKE '=>'%'.$filter.'%',
										'ClientMeeting.nonclient_id LIKE '=>'%'.$filter.'%',
										'ClientMeeting.vendor_code LIKE '=>'%'.$filter.'%',								
																					
										)
											);
			}
			
			$this->paginate['conditions'] = $this->conditionFilter;

		}

		public function viewdetail($meeting_id)
		{
			$this->ClientMeeting->recursive=3;
			$data=$this->ClientMeeting->find('all',array(
					'conditions'=>array('ClientMeeting.meeting_id'=>$meeting_id),
					'fields'=>array('meeting_id','clientmeeting_id','client_id','nonclient_id','vendor_code')
					
				));
			$listing_data = array();
			foreach ($data as  $value) 
			{
			    $key  = $value['ClientMeeting']['meeting_id'];
			    if(!isset($listing_data[$key]))
			    {
			        $listing_data[$key] = $value['Meeting'];
			        $listing_data[$key]['Clients'] = array();
			        $listing_data[$key]['NonClients'] = array();
			        $listing_data[$key]['Vendors'] = array();

			    }
			  
			    if(isset($value['Client']['client_id']))
			    {
			        $value['Client']['clientTrainingId'] = 
			            $value['ClientMeeting']['clientmeeting_id'];
			        $listing_data[$key]['Clients'][] = $value['Client'];
			    }
			    if(isset($value['NonClient']['nonclient_id']))
			    {
			        $value['NonClient']['clientTrainingId'] = 
			        $value['ClientMeeting']['clientmeeting_id'];
			        $listing_data[$key]['NonClients'][] = $value['NonClient'];
			    }
			    if(isset($value['Vendor']['vendor_code']))
			    {
			        $value['Vendor']['clientTrainingId'] = 
			        $value['ClientMeeting']['clientmeeting_id'];
			        $listing_data[$key]['Vendors'][] = $value['Vendor'];
			    }
			    
			}
			
			$this->set('listing_data',$listing_data);
			
		}
		public function deleteNonClient()
		{
			$clientMeetingId=$this->request->data['clientmeeting_id'];
			
			$keyName = $this->ClientMeeting->primaryKey;
			$obj 	= $this->ClientMeeting->find('all',array(
						'conditions'=>array($keyName=>$clientMeetingId)
			));
			if(!count($obj))
			{
			throw new  NotFoundException();
			}
			/* log for history of to be deleted record */
			$logMessage = json_encode($obj);
			$this->generateLog($logMessage,'DELETE : '.$clientMeetingId);
			$sql = 'DELETE FROM '.$this->ClientMeeting->tablePrefix.$this->ClientMeeting->table.' WHERE clientmeeting_id= \''.$clientMeetingId.'\'';
			$this->ClientMeeting->query($sql);
			exit();
		}
		public function deleteClient()
		{
			$clientMeetingId=$this->request->data['clientmeeting_id'];
			
			$keyName = $this->ClientMeeting->primaryKey;
			$obj 	= $this->ClientMeeting->find('all',array(
						'conditions'=>array($keyName=>$clientMeetingId)
			));
			if(!count($obj))
			{
			throw new  NotFoundException();
			}
			/* log for history of to be deleted record */
			$logMessage = json_encode($obj);
			$this->generateLog($logMessage,'DELETE : '.$clientMeetingId);
			$sql = 'DELETE FROM '.$this->ClientMeeting->tablePrefix.$this->ClientMeeting->table.' WHERE clientmeeting_id= \''.$clientMeetingId.'\'';
			$this->ClientMeeting->query($sql);	
			exit();
		}
		public function deleteVendor()
		{
			$clientMeetingId=$this->request->data['clientmeeting_id'];
			$keyName = $this->ClientMeeting->primaryKey;
			$obj 	= $this->ClientMeeting->find('all',array(
						'conditions'=>array($keyName=>$clientMeetingId)
			));
			if(!count($obj))
			{
			throw new  NotFoundException();
			}
			/* log for history of to be deleted record */
			$logMessage = json_encode($obj);
			$this->generateLog($logMessage,'DELETE : '.$clientMeetingId);
			$sql = 'DELETE FROM '.$this->ClientMeeting->tablePrefix.$this->ClientMeeting->table.' WHERE clientmeeting_id= \''.$clientMeetingId.'\'';
			$this->ClientMeeting->query($sql);	
			exit();
		}

		public function deletedetail($id,$meeting_id)
		{
			$model 		= $this->getModel();
			$keyName = $this->ClientMeeting->primaryKey;
			$obj 	= $this->ClientMeeting->find('all',array(
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
		
			$this->redirect(array('controller'=>'ClientMeetings','action' =>'viewdetail',$meeting_id));
		}

		
	}
?>