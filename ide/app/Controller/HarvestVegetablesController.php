<?php 
	class HarvestVegetablesController  extends AppController
	{
		public $helpers = array('Html','Form');
		public $component = array('Session');
		public $name="HarvestVegetables";
		public $context="HarvestVegetable";
		public $uses =array('Client','Vendor','Plot','HarvestVegetable','VegetableWeekHarvestVegetable');
		
		
		public function add()
 		{
 			$data=$this->Client->find('all', array('conditions'=>array('Client.state'=>1)));
 			$this->set('clients',$data);

 			$data=$this->Vendor->find('all', array('conditions'=>array('Vendor.state'=>1)));
 			$this->set('vendors',$data);
		}
		/*Save data to table VegetablesWeekHarvestVegetables*/
		public function VegetablesWeekHarvestVegetables($harvestvegetable_id,$is_new=true)
 		{
 			
 			if($is_new)
 			{
	 			$client_id=@$this->request->data['client_id'];
				$week=@$this->request->data['week_training'];
				$date=@$this->request->data['harvestvegetable_date'];
				$week_training_value=@$this->request->data['week_training_value'];
		
	 			$data = array();
				$data [] =array('vegetableweekharvestvegetable_client_id'=>$client_id,
									'vegetableweekharvestvegetable_vegetableweek_id'=>$week,
									'vegetableweekharvestvegetable_week_6_10'=>$week_training_value,
									'vegetableweekharvestvegetable_date'=>$date,
									'vegetableweekharvestvegetable_harvestvegetable_id'=>$harvestvegetable_id
									);
				if(count($data))
				{
					return $this->VegetableWeekHarvestVegetable->saveAll($data);
				}

			}
			else
			{
				$this->VegetableWeekHarvestVegetable->id=$harvestvegetable_id;
						
			    if($this->VegetableWeekHarvestVegetable->save($this->request->data))
				{		
					$this->Session->setFlash(
					__('VegetableWeekHarvestVegetable has been saved')
								,'default'
								, array('class'=>'alert alert-dismissable alert-success '));
				    		 	$this->redirect(array('action' => 'listing'));
				}
			}
			

 		}

		/* Save and Edit Harvest Vegetable*/

 		public function save($id=0)
		{
			$userId = $this->Session->read('Auth.User.user_id');
			if($id===0)
		    {
		    	$this->request->data['created_by'] = $userId;
		    	$this->HarvestVegetable->create();	
		    		
				if($this->HarvestVegetable->save($this->request->data))
				{	$new_harvestvegetable=$this->HarvestVegetable->getLastInsertId();
					$this->VegetablesWeekHarvestVegetables($new_harvestvegetable);
					$this->Session->setFlash(
								__('HarvestVegetable has been saved')
									,'default'
									, array('class'=>'alert alert-dismissable alert-success '));
	    		 	$id  = $this->HarvestVegetable->getLastInsertId();
					$this->request->data['id'] = $id;
					$logMessage = json_encode($this->request->data);
					$this->generateLog($logMessage,' CREATE NEW :'.$id);
					
	    		 	$this->redirect(array('action' => 'listing'));
				}

		    	
		    } 
		    else
			{			$this->request->data['modified_by'] = $userId;
						$this->HarvestVegetable->id=$id;
						$new_harvestvegetable=$this->request->data['harvestvegetable_id'];
						$keyName = $this->HarvestVegetable->primaryKey;
						$obj 	= $this->HarvestVegetable->find('all',array(
							'conditions'=>array('HarvestVegetable.'.$keyName=>$id)
						));
						if(!count($obj))
						{
							throw new NotFoundException();
						}
						$logMessage = json_encode($obj);
						$this->generateLog($logMessage,' EDIT :'.$id);
			    		if($this->HarvestVegetable->save($this->request->data))
						{		
								//$this->VegetablesWeekHarvestVegetables($new_harvestvegetable,false);
								$this->Session->setFlash(
											__('HarvestVegetable has been saved')
												,'default'
												, array('class'=>'alert alert-dismissable alert-success '));
				    		 	$this->redirect(array('action' => 'listing'));
						}


		    }
		    							
		}

		/* Search function */

		public function setCondition()
		{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'harvestvegetable_id LIKE '=>'%'.$filter.'%',								
																					
										)
											);
			}
		
			$this->paginate['conditions'] = $this->conditionFilter;

		}
		/*Load data for edit form HarvestVegetable*/

		public function edit($id=0)
		{
			if(!$id)
			{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
			}
			
			$data = $this->HarvestVegetable->findByharvestvegetable_id($id);
			$this->set('data',$data);
		}
		/* Get Harvest Vegetable History complete or not */
		public function getHarvestVegetableHistory()
		{
			$plot_id=$this->request->data['plot_id'];
			$farmer=$this->request->data['client_id'];
			$data=$this->Client->findByclient_id($farmer);

			$st='';

			if($plot_id=='')
			{
				$st.='<div class="alert alert-dismissable alert-danger">'.__('Farmer has no Plot for Vegetable').'</div>';
				
			}
			else
			{
				$data=$this->HarvestVegetable->find('all',
						array(
							'conditions'=>array(
								'HarvestVegetable.plot_id'=>$plot_id
							 )
							));
				if(count($data))
				{

			    $st.='<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>'.__('Date') .'</th>
					<th>'.__('Surface m2').'</th>
					<th>'.__('Quantity') .'</th>
					<th>'.__('Price') .'</th>
					<th>'.__('Complete?') .'</th>
					
					<th>'.__('Total') .'</th>
				</tr></thead><tbody>';

				foreach ($data as $key => $value) {
					$st.='<tr>
							<td>'.$value['HarvestVegetable']['harvestvegetable_date'].'</td>
							<td>'.$value['HarvestVegetable']['harvestvegetable_surface_m2'].'</td>
							<td>'.$value['HarvestVegetable']['harvestvegetable_quantity_kg'].'</td>
							<td>'.$value['HarvestVegetable']['harvestvegetable_price_usd'].'</td>
							<td>'.($value['HarvestVegetable']['harvestvegetable_completed']?'Yes':'No').'</td>
							<td>'.$value['HarvestVegetable']['harvestvegetable_quantity_kg']*$value['HarvestVegetable']['harvestvegetable_price_usd'].'</td>
						 </tr>';		
				}
		 
				$st.='</tbody></table>';

				}
				else
				{
					$st.='<div class="alert alert-dismissable alert-danger">'
					.__('Plot has no History of Harvest').'</div>';
				}
				
			}
			echo $st;
			exit();
		}

		public function checkPreviousHarvestVegetable()
		{
			$plot_id=$this->request->data['plot_id'];
			$data=$this->HarvestVegetable->find('all',
						array(
							'conditions'=>array(
								'HarvestVegetable.plot_id'=>$plot_id
							 )
							));
				if(count($data))
				{
				    foreach ($data as $key => $value) {
				    	echo $value['HarvestVegetable']['harvestvegetable_date'];
					}
			    }

			exit();
		}
				
	}
?>