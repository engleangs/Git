<?php 
	class ClientFieldDaysController extends AppController
	{
		public $helpers 	= 	array('Html','Form');	
		public $components 	= 	array('Session');
		public $context 		= 'ClientFieldDay';
		public $uses  = array('Client','FieldDay','ClientFieldDay','NonClient');

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

		public function viewdetail($field_day_id)
		{
			$this->ClientFieldDay->recursive=3;
			$data=$this->ClientFieldDay->find('all',array(
					'conditions'=>array('ClientFieldDay.field_day_id'=>$field_day_id),
					'fields'=>array('field_day_id','client_field_id','client_id','nonclient_id')
					
				));

			$listing_data = array();
			foreach ($data as  $value) 
			{
			    $key  = $value['ClientFieldDay']['field_day_id'];
			    if(!isset($listing_data[$key]))
			    {
			        $listing_data[$key] = $value['FieldDay'];
			        $listing_data[$key]['Clients'] = array();
			        $listing_data[$key]['NonClients'] = array();

			    }
			  
			    if(isset($value['Client']['client_id']))
			    {
			        $value['Client']['clientTrainingId'] = 
			            $value['ClientFieldDay']['client_field_id'];
			        $listing_data[$key]['Clients'][] = $value['Client'];
			    }
			    if(isset($value['NonClient']['nonclient_id']))
			    {
			        $value['NonClient']['clientTrainingId'] = 
			        $value['ClientFieldDay']['client_field_id'];
			        $listing_data[$key]['NonClients'][] = $value['NonClient'];
			    }
			    
			}
			$this->set('listing_data',$listing_data);
			
		}
		public function deleteNonClient()
		{
			$clientTrainingId=$this->request->data['client_field_id'];
			$keyName = $this->ClientFieldDay->primaryKey;
			$obj 	= $this->ClientFieldDay->find('all',array(
						'conditions'=>array($keyName=>$id)
			));
			if(!count($obj))
			{
			throw new  NotFoundException();
			}
			/* log for history of to be deleted record */
			$logMessage = json_encode($obj);
			$this->generateLog($logMessage,'DELETE : '.$id);
			$sql = 'DELETE FROM '.$this->ClientFieldDay->tablePrefix.$this->ClientFieldDay->table.' WHERE client_field_id= \''.$clientTrainingId.'\'';
			$this->ClientFieldDay->query($sql);
			exit();
		}
		public function deleteClient()
		{
			$clientTrainingId=$this->request->data['client_field_id'];
			$keyName = $this->ClientFieldDay->primaryKey;
			$obj 	= $this->ClientFieldDay->find('all',array(
						'conditions'=>array($keyName=>$id)
			));
			if(!count($obj))
			{
			throw new  NotFoundException();
			}
			/* log for history of to be deleted record */
			$logMessage = json_encode($obj);
			$this->generateLog($logMessage,'DELETE : '.$id);
			$sql = 'DELETE FROM '.$this->ClientFieldDay->tablePrefix.$this->ClientFieldDay->table.' WHERE client_field_id= \''.$clientTrainingId.'\'';
			$this->ClientFieldDay->query($sql);	
			exit();
		}

		public function deletedetail($id , $field_day_id)
		{

			$model 		= $this->getModel();
			$keyName = $this->ClientFieldDay->primaryKey;
			$obj 	= $this->ClientFieldDay->find('all',array(
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
		
			$this->redirect(array('controller'=>'ClientFieldDays','action' =>'viewdetail',$field_day_id));
		}
	}
?>