<?php 
	class TrainingsController extends AppController
	{
		public $helpers = array('Html','Form');
		public $components = array('Session');
		public $context ="Training";
		public $uses =array('Client','NonClient','Training','Crop','ClientTraining','Plot','VegetableWeek','RiceWeek','Phum','Khet','Khum','Srok');

		public function add()
		{
			$crop_code=$this->Crop->find('all');
			$this->set('crops',$crop_code);

			$data = $this->Khet->find('all');
			$this->set('Khets',$data);
		}
		
 		public function saveClientTraining($training_id)
 		{
 			$client_id=@$this->request->data['client'];
 			$nonclient_id =@$this->request->data['nonclient'];
 			$vendor=@$this->request->data['vendor'];
 			$data = array();
			$sql = 'DELETE FROM '.$this->ClientTraining->tablePrefix.$this->ClientTraining->table.' WHERE training_id= \''.$training_id.'\'';
			
			$this->ClientTraining->query($sql);
			if(count($client_id)){				
				foreach($client_id as $i=> $client)				
				{		
					$data[] =array('client_id'=>@$client,
						'training_id'=>@$training_id	);	

				}	
			}
			if(count($nonclient_id))
			{
				foreach ($nonclient_id as $j => $nonclient) 
					{
						$data[] =array('nonclient_id'=>@$nonclient,
						'training_id'=>@$training_id	);	

					}
			}
			if(count($vendor))
			{
				foreach ($vendor as $k => $vendor_code) 
					{
						$data[] =array('vendor_code'=>@$vendor_code,
						'training_id'=>@$training_id	);	

					}
			}			
			if(count($data)){					
						return $this->ClientTraining->saveAll($data);				
					}			
					
			
		}
 		public function save($id=0)
		{	
			$userId = $this->Session->read('Auth.User.user_id');
			$crop_type=$this->request->data['crop_type'];
			$date_start=$this->request->data['training_datestart'];
			
			if($id===0)
		    {
		    	$this->request->data['created_by'] = $userId;
		    	$this->Training->create();		
				if($this->Training->save($this->request->data))
				{
					$training_id=$this->Training->getLastInsertId();
					$this->saveClientTraining($training_id);
					
					$this->request->data['id'] = $training_id;
					$logMessage = json_encode($this->request->data);
					$this->generateLog($logMessage,' CREATE NEW :'.$id);
					if($crop_type=='rice')
					{
						$this->redirect(array('controller'=>'RiceWeeks','action' => 'add',$training_id,$date_start));
					}

	    		 	$this->redirect(array('controller'=>'VegetableWeeks','action' => 'add',$training_id,$date_start));
				}

		    	
		    } 
		    else
			{		
				$this->request->data['modified_by'] = $userId;
				$training_id=$this->request->data['training_id'];
				$this->Training->id=$id;
				$keyName = $this->Training->primaryKey;
				$obj 	= $this->Training->find('all',array(
					'conditions'=>array($keyName=>$id)
				));
				if(!count($obj))
				{
					throw new NotFoundException();
					
				}
				$logMessage = json_encode($obj);
				$this->generateLog($logMessage,' EDIT :'.$id);
			    		if($this->Training->save($this->request->data))
						{		
							$this->saveClientTraining($this->request->data['training_id']);	
								$this->Session->setFlash(
											__('Training has been saved')
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
		
			$data = $model->findBytraining_id($id);
			$this->set('data',$data);

			
			$khet  	= $this->Khet->find('all');
			$this->set('khets',$khet);

			$selectKhetCode = '';

			$phum_code = @$data['Training']['phum_code'];
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
			
			
			$data = $this->Crop->find('all');
			$this->set('crops',$data);
			$this->ClientTraining->recursive=3;
			$data=$this->ClientTraining->find('all',
								array('conditions'=>array('ClientTraining.training_id'=>$id),
										'fields'=>array('client_id','nonclient_id','training_id','clienttraining_id','vendor_code')
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
										'training_id LIKE '=>'%'.$filter.'%',								
																					
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
	        	$sql = 'DELETE FROM '.$this->ClientTraining->tablePrefix.$this->ClientTraining->table.' WHERE training_id= \''.$id.'\'';
				$this->ClientTraining->query($sql);
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
		/*check existing crop, date start and date finish of training*/
		public function checkExsting()
		{
			$crop_code= $this->request->data['crop_code'];
			$date_start= $this->request->data['date_start'];
			$date_finish = $this->request->data['date_finish'];
			$data=$this->Training->find('all',array(
				'conditions'=>array(
							'Training.crop_code'=>$crop_code,
							'Training.training_datestart'=>$date_start,
							'Training.training_datefinish'=>$date_finish
						)
					));
			$st='';
			if(count($data))
			{
				$st.='<div class="alert alert-dismissable alert-danger">'.__('Training has been add already, Try again!').'</div>';
				echo $st;
				exit();
			}

			echo $st;
			exit();
		}
		public function getTrainingIdRice()
		{

			$plot_id=@$this->request->data['plot_id'];
			$data=$this->Plot->findByplot_id($plot_id);
			$crop_code=@$data['Crop']['crop_code'];
			$st='';
			$this->Training->recursive =-1;

			$training_id=$this->Training->find('all',array(
					'conditions'=>array('Training.crop_code'=>$crop_code),
					'fields'=>array('training_id')
				));
			
			$lst_training_id = array();
			foreach ($training_id as $key => $value) {
				$lst_training_id[] = @$value['Training']['training_id'];
			}
			if(count($lst_training_id))
			{
				$riceWeeks = $this->RiceWeek->find('all',
				array('conditions'=>array('RiceWeek.training_id'=>$lst_training_id,
										  'RiceWeek.week'=>8
									    )
				     ));	
			}
			$ret = array('error'=>true,'msg'=>'','data'=>'');
			if(count(@$riceWeeks))
			{
				
				foreach ($riceWeeks as $key => $value) {
					$st.='<option value="'.$value['RiceWeek']['riceweek_id'].'">'.$value['RiceWeek']['week'].'</option>';
				}
				$ret['error']=false;
				$ret['data'] = $st;
			}
			else
			{
				$st.=__('Plot can not Harvest Now!');
				$ret['msg'] = $st;
			}

			echo json_encode($ret);
				
			exit();
		}
		public function getTrainingIdVegetable()
		{
			$plot_id=@$this->request->data['plot_id'];
			$data=$this->Plot->findByplot_id($plot_id);
			$crop_code=@$data['Crop']['crop_code'];
			$st='';
			$this->Training->recursive =-1;

			$training_id=$this->Training->find('all',array(
					'conditions'=>array('Training.crop_code'=>$crop_code),
					'fields'=>array('training_id')
				));
			
			$lst_training_id = array();
			foreach ($training_id as $key => $value) {
				$lst_training_id[] = @$value['Training']['training_id'];
			}
			if(count($lst_training_id))
			{
				$vegetableWeeks = $this->VegetableWeek->find('all',
				array('conditions'=>array('VegetableWeek.training_id'=>$lst_training_id,
										  'VegetableWeek.week >='=>6,
										  'VegetableWeek.week <='=>10
										  )
				     ));	
			}

			if(count(@$vegetableWeeks))
			{
				
				foreach ($vegetableWeeks as $key => $value) {
					$st.='<option value="'.$value['VegetableWeek']['vegetableweek_id'].'">'.$value['VegetableWeek']['week'].'</option>';
				}
			}

			echo $st;
				
			exit();
		}

		public function listing()
		{
			  	$this->paginate['joins'] = array(
			  		array(
			         'alias'=>'C',
			         'table'=>'crops',
			         'type'=>'LEFT',
			         'conditions' => '`C`.`crop_code` = `Training`.`crop_code`'
			         ),
			  		 array(
			         'alias'=>'PH',
			         'table'=>'phums',
			         'type'=>'LEFT',
			         'conditions' => '`PH`.`phum_code` = `Training`.`phum_code`'
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
		 		   'Training.training_id',
		 		   'Training.training_datestart',
		 		   'Training.training_datefinish',
		 		   'Training.training_responsible_staff',
		 		   'Training.crop_code',
		           'PH.phum_code',
		           'PH.phum_name_en',
		           'Khum.khum_code',
		           'Khum.khum_name_en',
		           'Srok.srok_code',
		           'Srok.srok_name_en',
		           'Khet.khet_code',
		           'Khet.khet_name_en',
		           'C.crop_code',
		           'C.crop_name_en',
		           'Training.created_by',
		           'Training.modified_by',
		           'Training.modified',
		           'Training.created'

		          );
		  		$data = $this->paginate($this->getContext());   
		  		$this->set(compact('data'));

		}
		
	}
?>
