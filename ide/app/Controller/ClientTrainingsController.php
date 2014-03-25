<?php
	class ClientTrainingsController extends AppController
	{
		public $helpers =array('Html','Form');
		public $components= array('Session');
		public $name="ClientTrainings";
		public $context ="ClientTraining";
		public $uses  = array('ClientTraining','Training','Client','Vendor','NonClient');

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
										'ClientTraining.training_id LIKE '=>'%'.$filter.'%',
										'ClientTraining.client_id LIKE '=>'%'.$filter.'%',
										'ClientTraining.nonclient_id LIKE '=>'%'.$filter.'%',								
																					
										)
											);
			}
			
			$this->paginate['conditions'] = $this->conditionFilter;

		}

		public function viewdetail($training_id)
		{
			$this->ClientTraining->recursive=3;
			$data=$this->ClientTraining->find('all',array(
					'conditions'=>array('ClientTraining.training_id'=>$training_id),
					'fields'=>array('training_id','clienttraining_id','client_id','nonclient_id','vendor_code')
					
				));
			$listing_data = array();
			foreach ($data as  $value) 
			{
			    $key  = $value['ClientTraining']['training_id'];
			    if(!isset($listing_data[$key]))
			    {
			        $listing_data[$key] = $value['Training'];
			        $listing_data[$key]['Clients'] = array();
			        $listing_data[$key]['NonClients'] = array();
			        $listing_data[$key]['Vendors'] = array();

			    }
			  
			    if(isset($value['Client']['client_id']))
			    {
			        $value['Client']['clientTrainingId'] = 
			            $value['ClientTraining']['clienttraining_id'];
			        $listing_data[$key]['Clients'][] = $value['Client'];
			    }
			    if(isset($value['NonClient']['nonclient_id']))
			    {
			        $value['NonClient']['clientTrainingId'] = 
			        $value['ClientTraining']['clienttraining_id'];
			        $listing_data[$key]['NonClients'][] = $value['NonClient'];
			    }
			    if(isset($value['Vendor']['vendor_code']))
			    {
			        $value['Vendor']['clientTrainingId'] = 
			        $value['ClientTraining']['clienttraining_id'];
			        $listing_data[$key]['Vendors'][] = $value['Vendor'];
			    }
			    
			}
			
			$this->set('listing_data',$listing_data);
			
		}
		public function deleteNonClient()
		{
			$clientTrainingId=$this->request->data['clienttraining_id'];
			
			$keyName = $this->ClientTraining->primaryKey;
			$obj 	= $this->ClientTraining->find('all',array(
						'conditions'=>array($keyName=>$clientTrainingId)
			));
			if(!count($obj))
			{
			throw new  NotFoundException();
			}
			/* log for history of to be deleted record */
			$logMessage = json_encode($obj);
			$this->generateLog($logMessage,'DELETE : '.$clientTrainingId);
			$sql = 'DELETE FROM '.$this->ClientTraining->tablePrefix.$this->ClientTraining->table.' WHERE clienttraining_id= \''.$clientTrainingId.'\'';
			$this->ClientTraining->query($sql);
			exit();
		}
		public function deleteClient()
		{
			$clientTrainingId=$this->request->data['clienttraining_id'];
			$keyName = $this->ClientTraining->primaryKey;
			$obj 	= $this->ClientTraining->find('all',array(
						'conditions'=>array($keyName=>$clientTrainingId)
			));
			if(!count($obj))
			{
			throw new  NotFoundException();
			}
			/* log for history of to be deleted record */
			$logMessage = json_encode($obj);
			$this->generateLog($logMessage,'DELETE : '.$clientTrainingId);
			$sql = 'DELETE FROM '.$this->ClientTraining->tablePrefix.$this->ClientTraining->table.' WHERE clienttraining_id= \''.$clientTrainingId.'\'';
			$this->ClientTraining->query($sql);	
			exit();
		}
		public function deleteVendor()
		{
			$clientTrainingId=$this->request->data['clienttraining_id'];
			$keyName = $this->ClientTraining->primaryKey;
			$obj 	= $this->ClientTraining->find('all',array(
						'conditions'=>array($keyName=>$clientTrainingId)
			));
			if(!count($obj))
			{
			throw new  NotFoundException();
			}
			/* log for history of to be deleted record */
			$logMessage = json_encode($obj);
			$this->generateLog($logMessage,'DELETE : '.$clientTrainingId);
			$sql = 'DELETE FROM '.$this->ClientTraining->tablePrefix.$this->ClientTraining->table.' WHERE clienttraining_id= \''.$clientTrainingId.'\'';
			$this->ClientTraining->query($sql);	
			exit();
		}

		public function deletedetail($id,$training_id)
		{
			$model 		= $this->getModel();
			$keyName = $this->ClientTraining->primaryKey;
			$obj 	= $this->ClientTraining->find('all',array(
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
		
			$this->redirect(array('controller'=>'ClientTrainings','action' =>'viewdetail',$training_id));
		}

		
	}
?>