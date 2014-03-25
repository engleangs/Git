<?php 
	class HarvestRicesController extends AppController
	{
		public $helpers = array('Html','Form');
		public $component = array('Session');
		public $name="HarvestRices";
		public $context="HarvestRice";
		public $uses =array('Client','Vendor','Plot','HarvestRice','RiceWeekHarvestRice');
		
		
		public function add()
 		{
 			$data=$this->Client->find('all',array('conditions'=>array('Client.state'=>1)));
 			$this->set('clients',$data);

 			$data=$this->Vendor->find('all',array('conditions'=>array('Vendor.state'=>1)));
 			$this->set('vendors',$data);
		}
		/*Save data to table VegetablesWeekHarvestVegetables*/
		public function RiceWeekHarvestRices($harvestrice_id,$is_new=true)
 		{
 			
 			if($is_new)
 			{
	 			$client_id=@$this->request->data['client_id'];
				$week=@$this->request->data['week_training'];
				$date=@$this->request->data['harvestrice_date'];
				$week_training_value=@$this->request->data['week_training_value'];
		
	 			$data = array();
				$data [] =array('riceweekharvestrice_client_id'=>$client_id,
									'riceweekharvestrice_riceweek_id'=>$week,
									'riceweekharvestrice_week_8'=>$week_training_value,
									'riceweekharvestrice_date'=>$date,
									'riceweekharvestrice_harvestrice_id'=>$harvestrice_id
									);
				$id  = $this->RiceWeekHarvestRice->getLastInsertId();
				$this->request->data['id'] = $harvestrice_id;
				$logMessage = json_encode($this->request->data);
				$this->generateLog($logMessage,' CREATE NEW :'.$id);
			if(count($data))
			{
				return $this->RiceWeekHarvestRice->saveAll($data);
			}

			}
			else
			{
				$this->RiceWeekHarvestRice->id=$harvestrice_id;
						
			    if($this->RiceWeekHarvestRice->save($this->request->data))
				{		
					$this->Session->setFlash(
					__('RiceWeekHarvestRice has been saved')
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
		    	$this->HarvestRice->create();		
				if($this->HarvestRice->save($this->request->data))
				{	$new_harvestrice=$this->HarvestRice->getLastInsertId();
					$this->RiceWeekHarvestRices($new_harvestrice);
					$this->Session->setFlash(
								__('HarvestRice has been saved')
									,'default'
									, array('class'=>'alert alert-dismissable alert-success '));
	    		 	$id  = $this->HarvestRice->getLastInsertId();
					$this->request->data['id'] = $id;
					$logMessage = json_encode($this->request->data);
					$this->generateLog($logMessage,' CREATE NEW :'.$id);

	    		 	$this->redirect(array('action' => 'listing'));
				}

		    	
		    } 
		    else
			{		
				$this->request->data['modified_by'] = $userId;
				$this->HarvestRice->id=$id;
				$new_harvestrice=$this->request->data['harvestrice_id'];
				$keyName = $this->HarvestRice->primaryKey;
				$obj 	= $this->HarvestRice->find('all',array(
						'conditions'=>array('HarvestRice.'.$keyName=>$id)
				));
						if(!count($obj))
						{
							throw new NotFoundException();
					
						}
						$logMessage = json_encode($obj);
						$this->generateLog($logMessage,' EDIT :'.$id);
			    		if($this->HarvestRice->save($this->request->data))
						{		
								//$this->VegetablesWeekHarvestVegetables($new_harvestvegetable,false);
								$this->Session->setFlash(
											__('HarvestRice has been saved')
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
										'harvestrice_id LIKE '=>'%'.$filter.'%',								
																					
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
			
			$data = $this->HarvestRice->findByharvestrice_id($id);
			$this->set('data',$data);
		}
		/* Get Harvest Vegetable History complete or not */
		public function getHarvestRiceHistory()
		{
			$plot_id=$this->request->data['plot_id'];
			$farmer=$this->request->data['client_id'];
			$data=$this->Client->findByclient_id($farmer);
			$st='';
			
			
			if($plot_id=='')
			{
				$st.='<div class="alert alert-dismissable alert-danger">'.
				__('Farmer has no Plot for Rice').'</div>';
				
			}
			else
			{
				$data=$this->HarvestRice->find('all',
						array(
							'conditions'=>array(
								'HarvestRice.plot_id'=>$plot_id
							 )
							));
				if(count($data))
				{

				    $st.='<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>'.__('Date') .'</th>
							<th>'.__('Quadrat').'</th>
							<th>'.__('Price') .'</th>
							<th>'.__('Complete?') .'</th>
						</tr>
					</thead>
					<tbody>';

					foreach ($data as $key => $value) {
					$yield1=(($value['HarvestRice']['harvestrice_q1_weight_kg']* 100 - $value['HarvestRice']['harvestrice_q1_moisture_%']) / 86)*10000/$value['HarvestRice']['harvestrice_quadrat_size_m2'];
					$yield2=(($value['HarvestRice']['harvestrice_q2_weight_kg']* 100 - $value['HarvestRice']['harvestrice_q2_moisture_%']) / 86)*10000/$value['HarvestRice']['harvestrice_quadrat_size_m2'];
					$yield3=(($value['HarvestRice']['harvestrice_q3_weight_kg']* 100 - $value['HarvestRice']['harvestrice_q3_moisture_%']) / 86)*10000/$value['HarvestRice']['harvestrice_quadrat_size_m2'];
					  $st.='<tr>
								<td>'.$value['HarvestRice']['harvestrice_date'].'</td>
								<td>'.$value['HarvestRice']['harvestrice_quadrat_size_m2'].'</td>
								<td>'.$value['HarvestRice']['harvestrice_price'].'</td>
								<td>'.($value['HarvestRice']['harvestrice_completed']?'Yes':'No').'</td>
							</tr>
							<tr>
								<td colspan="4">				
								<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
		                    	  	<thead>
		                    	  		<tr>
					                        <th></th>
					                        <th>'. __('Weight (kg)').'</th>
					                        <th>'.__('Moisture (%)').'</th>
					                        <th>'.__('Yield (@ 14% (kg/ha))').'</th>
					                        <th>'.__('Return ($)').'</th>
		                        		</tr>
		                    	  	</thead>
		                    	    <tbody>
		                    	  		<tr>
		                    	  			<td>'.__('Q1').'</td>
		                            		<td>
		                                			<input type="text" value ="'.$value['HarvestRice']['harvestrice_q1_weight_kg'].'" id="weight1" class="form-control"  readonly="readonly">                         
		                            		</td>
					                        <td>
					                                <input type="text" value ="'.$value['HarvestRice']['harvestrice_q1_moisture_%'].'" id="moisture1" class="form-control"  readonly="readonly">                           
					                        </td>
					                        <td>
					                                <input type="text" id="yield1" value="'.$yield1.'" class="form-control"
					                                readonly="readonly">
					                        </td>
					                        <td></td>
		                        		</tr>
		                       			<tr>
					                            <td>'.__('Q2').'</td>
					                            <td>
					                                <input type="text" id="weight2" value ="'.$value['HarvestRice']['harvestrice_q2_weight_kg'].'" class="form-control" readonly="readonly">                          
					                            </td>
					                            <td>
					                                <input type="text" id="moisture2" value ="'.$value['HarvestRice']['harvestrice_q2_moisture_%'].'" class="form-control" readonly="readonly">                           
					                            </td>
					                            <td>
					                                <input type="text" id="yield2" class="form-control"
					                                value="'.$yield2.'"
					                                readonly="readonly">
					                            </td>
					                            <td></td>
					                    </tr>
					                    <tr>
					                        <td>'.__('Q3').'</td>
					                        <td>
					                            <input type="text" id="weight3" value ="'.$value['HarvestRice']['harvestrice_q3_weight_kg'].'" class="form-control" readonly="readonly">                          
					                        </td>
					                        <td>
					                            <input type="text" id="moisture3" value ="'.$value['HarvestRice']['harvestrice_q3_moisture_%'].'" class="form-control" readonly="readonly">                          
					                        </td>
					                        <td>
					                            <input type="text" id="yield3" class="form-control"
					                                value="'.$yield3.'"
					                                readonly="readonly">
					                        </td>
					                        <td></td>
					                    </tr>
					                    <tr>
					                            <td>'.__('Average').'</td>
					                            <td>
					                                <input type="text" id="averageweight" class="form-control"
					                                value="'.(($value['HarvestRice']['harvestrice_q1_weight_kg']+$value['HarvestRice']['harvestrice_q2_weight_kg']+$value['HarvestRice']['harvestrice_q3_weight_kg'])/3).'"
					                                readonly="readonly">
					                            </td>
					                            <td>
					                                <input type="text" value="'.(($value['HarvestRice']['harvestrice_q1_moisture_%']+$value['HarvestRice']['harvestrice_q2_moisture_%']+$value['HarvestRice']['harvestrice_q3_moisture_%'])/3).'" id="averagemoisture" class="form-control"
					                                readonly="readonly">
					                            </td>
					                            <td>
					                                <input type="text" value="'.(($yield1+$yield2+$yield3)/3).'" id="averageyield" class="form-control"
					                                readonly="readonly">
					                            </td>
					                            <td></td>
					                    </tr>
		                    		</tbody>
					            </table>
					            </td>
                		 </tr>';

		 			}
					$st.='</tbody></table>';
			    }                       	
      			else
				{
					$st.='<div class="alert alert-dismissable alert-danger">'.__('Plot has no History of Harvest').'</div>';
				}
				
			}
			echo $st;
			exit();
		}

		public function checkPreviousHarvestRice()
		{
			$plot_id=$this->request->data['plot_id'];
			$data=$this->HarvestRice->find('all',
						array(
							'conditions'=>array(
								'HarvestRice.plot_id'=>$plot_id
							 )
							));
				if(count($data))
				{
				    foreach ($data as $key => $value) {
				    	echo $value['HarvestRice']['harvestrice_date'];
					}
			    }
			    else
			    {
			    	echo date('Y-m-d');
			    }
			  			
			exit();
		}

		public function viewdetail($harvestrice_id)
		{
			
			$data=$this->HarvestRice->findByharvestrice_id($harvestrice_id);
			$this->set('data',$data);
		}
				
}
?>