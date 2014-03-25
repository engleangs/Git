<?php 
	class SalesController extends AppController
	{
		public $helpers = array('Html','Form');
		public $components = array('Session');
		public $context ='Sale';
		public $uses =array('Vendor','Client','Sale','VendorClientSale');

		public function add()
		{
			
			$data=$this->Vendor->find('all',
							array('conditions'=>array('Vendor.vendor_type'=>'fba','Vendor.state'=>1)
								 ));
			$this->set('vendors',$data);

		}
		public function saveVendorClientSale($sale_id,$is_new=true)
 		{
 			
 			if($is_new)
 			{
	 			$vendor_code=$this->request->data['vendor_code'];
	 			$client_id = $this->request->data['client_id'];
	 			$data = array();
				$data [] =array('vendor_code'=>$vendor_code,
									'client_id'=>$client_id,
									'sale_id'=>$sale_id
									);
				if(count($data))
				{
					return $this->VendorClientSale->saveAll($data);
				}
			}
			else
			{
				$this->VendorClientSale->id=$sale_id;
						
			    if($this->VendorClientSale->save($this->request->data))
				{		
					$this->Session->setFlash(
					__('Sale has been saved')
								,'default'
								, array('class'=>'alert alert-dismissable alert-success '));
				    		 	$this->redirect(array('action' => 'listing'));
				}
			}
			

 		}


 		public function listing()
 		{
 			$this->Sale->recursive = 3;
 			parent::listing();
 		}
		public function save($id=0)
		{
			$userId = $this->Session->read('Auth.User.user_id');	
			if($id===0)
		    {
		    	$this->request->data['created_by'] = $userId;
		    	$this->Sale->create();		
				if($this->Sale->save($this->request->data))
				{
					$sale_id=$this->Sale->getLastInsertId();
					$this->saveVendorClientSale($sale_id);
					$this->Session->setFlash(
								__('Sale has been saved')
									,'default'
									, array('class'=>'alert alert-dismissable alert-success '));
	    		 	$this->redirect(array('action' => 'listing'));
				}

		    	
		    } 
		    else
			{		
						$this->request->data['modified_by'] = $userId;
						$this->Sale->id=$id;
						$keyName = $this->Sale->primaryKey;
						$obj 	= $this->Sale->find('all',array(
							'conditions'=>array('Sale.'.$keyName=>$id)
						));
						if(!count($obj))
						{
							throw new NotFoundException();
					
						}
						$logMessage = json_encode($obj);
						$this->generateLog($logMessage,' EDIT :'.$id);
			    		if($this->Sale->save($this->request->data))
						{		
								$this->saveVendorClientSale($id,false);
								$this->Session->setFlash(
											__('Sale has been saved')
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
	
		$data = $model->findBysale_id($id);
		$this->set('data',$data);

		$data=$this->Vendor->find('all',
							array('conditions'=>array('Vendor.vendor_type'=>'fba','Vendor.state'=>1)
								 ));
		$this->set('vendors',$data);
		
		$data=$this->VendorClientSale->find('all',
							array('conditions'=>array('VendorClientSale.sale_id'=>$id),
									'fields'=>array('client_id','vendor_code')
								));
		
		$this->set('vendorclientsales',$data);
		
		}
		
		public function setCondition()
		{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'Sale.sale_id LIKE '=>'%'.$filter.'%',								
																									
										)
											);
			}
			//$this->conditionFilter['user_id !='] = 'A001';
			$this->paginate['conditions'] = $this->conditionFilter;

		}
	}
?>