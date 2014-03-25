<?php 
	class LaborExpensesController extends AppController
	{
		public $helpers = array('Html','Form');
		public $component = array('Session');
		public $name="LaborExpenses";
		public $context="LaborExpense";
		public $uses =array('Client','Plot','Labor','LaborExpense','PlotLaborExpense');
		public function add()
 		{
 			$data=$this->Client->find('all',array('conditions'=>array('Client.state'=>1)));
 			$this->set('clients',$data);

 			$data=$this->Labor->find('all');
 			$this->set('labors',$data);

 		}
 		public function savePlotLaborExpense($laborexpense_id,$is_new=true)
 		{
 			
 			if($is_new)
 			{
	 			$labor_code=$this->request->data['labor_code'];
	 			$plot_id = $this->request->data['plot_id'];
	 			$data = array();
				$data [] =array('labor_code'=>$labor_code,
									'plot_id'=>$plot_id,
									'laborexpense_id'=>$laborexpense_id
									);
				if(count($data))
				{
					return $this->PlotLaborExpense->saveAll($data);
				}
			}
			else
			{
				$this->PlotLaborExpense->id=$laborexpense_id;
						
			    if($this->PlotLaborExpense->save($this->request->data))
				{		
					$this->Session->setFlash(
					__('Labor Expense has been saved')
								,'default'
								, array('class'=>'alert alert-dismissable alert-success '));
				    		 	$this->redirect(array('action' => 'listing'));
				}
			}
			

 		}

 		public function save($id=0)
		{
			$userId = $this->Session->read('Auth.User.user_id');
			if($id===0)
		    {
		    	$this->request->data['created_by'] = $userId;
		    	$this->LaborExpense->create();		
				if($this->LaborExpense->save($this->request->data))
				{
					$laborexpense_id=$this->LaborExpense->getLastInsertId();
					
					$this->request->data['id'] = $laborexpense_id;
					$logMessage = json_encode($this->request->data);
					$this->generateLog($logMessage,' CREATE NEW :'.$id);
					$this->savePlotLaborExpense($laborexpense_id);
					$this->Session->setFlash(
								__('Labor Expense has been saved')
									,'default'
									, array('class'=>'alert alert-dismissable alert-success '));
	    		 	$this->redirect(array('action' => 'listing'));
				}

		    	
		    } 
		    else
			{			$this->request->data['modified_by'] = $userId;
						$this->LaborExpense->id=$id;
						$keyName = $this->LaborExpense->primaryKey;
						$obj 	= $this->LaborExpense->find('all',array(
							'conditions'=>array($keyName=>$id)
						));
						if(!count($obj))
						{
							throw new NotFoundException();
					
						}
						$logMessage = json_encode($obj);
						$this->generateLog($logMessage,' EDIT :'.$id);
			    		if($this->LaborExpense->save($this->request->data))
						{		
								
								$this->Session->setFlash(
											__('Labor Expense has been saved')
												,'default'
												, array('class'=>'alert alert-dismissable alert-success '));
				    		 	$this->redirect(array('action' => 'listing'));
						}


		    }
		    							
		}

		public function setCondition()
		{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'laborexpense_id LIKE '=>'%'.$filter.'%',								
																					
										)
											);
			}
			
			$this->paginate['conditions'] = $this->conditionFilter;

		}
		public function edit($id=0)
		{
			if(!$id)
			{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
			}
			
			$data = $this->LaborExpense->findBylaborexpense_id($id);
			$this->set('data',$data);

			
		}
		public function listing()
		{		
			$this->LaborExpense->recursive=3;
			parent::listing();
		}
		
	}
?>