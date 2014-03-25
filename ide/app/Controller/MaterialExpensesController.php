<?Php
class MaterialExpensesController extends AppController
{
 		public $helpers =array('Html','Form');
 		public $components =array('Session');
 		public $context ="MaterialExpense";
 		public $name ="MaterialExpenses";
 		public $uses =array('ProductCategory','Vendor','Product','Client','Plot','MaterialExpense','PlotMaterialExpense');

 		public function add()
 		{
 			$data=$this->Client->find('all', array('conditions'=>array('Client.state'=>1)));
 			$this->set('clients',$data);

 			$data=$this->Vendor->find('all', array('conditions'=>array('Vendor.state'=>1,'Vendor.vendor_type'=>'fba')));
 			$this->set('vendors',$data);

 			$data=$this->ProductCategory->find('all');
 			$procate= array();
 			foreach ($data as $key => $value) 
 			{
 				
 				$key = $value['ProductCategory']['productcategory_code'];
 				$procate[$key]=$value['ProductCategory'];
 				$procate[$key]['products'] =array();
 				
 			}
 			$data = $this->Product->find('all');
 			foreach ($data as $key => $value) {
 				$key = $value['Product']['productcategory_code'];
 				if(isset($procate[$key]))
 				{
 					$procate[$key]['products'][] =$value['Product'];
 				}
 			}
 			$this->set('produccategories',$procate);

 		}
 		
 		public function savePlotMaterialExpense($materialexpense_id,$is_new=true)
 		{
 			
 			if($is_new)
 			{
	 			$product_code=$this->request->data['product_code'];
	 			$plot_id = $this->request->data['plot_id'];
	 			$data = array();
				$data [] =array('product_code'=>$product_code,
									'plot_id'=>$plot_id,
									'materialexpense_id'=>$materialexpense_id
									);
				if(count($data))
				{
					return $this->PlotMaterialExpense->saveAll($data);
				}
			}
			else
			{
				$this->PlotMaterialExpense->id=$materialexpense_id;
						
			    if($this->PlotMaterialExpense->save($this->request->data))
				{		
					$this->Session->setFlash(
					__('Material Expense has been saved')
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
		    	$this->MaterialExpense->create();		
				if($this->MaterialExpense->save($this->request->data))
				{
					$materialexpense_id=$this->MaterialExpense->getLastInsertId();
					$this->request->data['id'] = $materialexpense_id;
					$logMessage = json_encode($this->request->data);
					$this->generateLog($logMessage,' CREATE NEW :'.$id);				
					$this->savePlotMaterialExpense($materialexpense_id);
					$this->Session->setFlash(
								__('Material Expense has been saved')
									,'default'
									, array('class'=>'alert alert-dismissable alert-success '));
	    		 	$this->redirect(array('action' => 'listing'));
				}

		    	
		    } 
		    else
			{		
						$this->request->data['modified_by'] = $userId;
						$this->MaterialExpense->id=$id;
						$keyName = $this->MaterialExpense->primaryKey;
						$obj 	= $this->MaterialExpense->find('all',array(
							'conditions'=>array($keyName=>$id)
						));
						if(!count($obj))
						{
							throw new NotFoundException();
					
						}
						$logMessage = json_encode($obj);
						$this->generateLog($logMessage,' EDIT :'.$id);
			    		if($this->MaterialExpense->save($this->request->data))
						{		
								
								$this->Session->setFlash(
											__('Material Expense has been saved')
												,'default'
												, array('class'=>'alert alert-dismissable alert-success '));
				    		 	$this->redirect(array('action' => 'listing'));
						}


		    }
		    							
		}

		public function listing()
		{
			$this->MaterialExpense->recursive=3;
			parent::listing();
			
		}
		public function setCondition()
		{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'materialexpense_id LIKE '=>'%'.$filter.'%',								
																					
										)
											);
			}
			//$this->conditionFilter['user_id !='] = 'A001';
			$this->paginate['conditions'] = $this->conditionFilter;

		}
		public function edit($id=0)
		{
			if(!$id)
			{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
			}
			
			$data = $this->MaterialExpense->findBymaterialexpense_id($id);
			$this->set('data',$data);

			
		}
}

?>