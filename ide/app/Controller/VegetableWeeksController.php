<?php 
	class VegetableWeeksController extends AppController
	{
		public $helpers = array('Html', 'Form');
		public $components = array('Session');
		public $name = "VegetableWeeks";	
		public $context ="VegetableWeek";
		public $uses =array('VegetableWeek','Training','Topic');

		public function add($id=0,$date_start=0)
		{
			
			$sql = " SELECT v.training_id
					FROM vegetableweeks AS v
					WHERE v.week = 10 ";
			$trainings  = $this->Training->query($sql);
			$training_ids = array();
			foreach ($trainings as $key => $value) {
				$training_ids[] = $value['v']['training_id'];
			}

			$data=$this->Training->find('all',array(
				'conditions'=>array(
						'Crop.crop_type'=>'vegetable',
						'NOT'=>array('Training.training_id'=>$training_ids)
					)
				));
			
			$topic=$this->Topic->find('all', array(
			'conditions'=>array('type'=>'vegetabletopic')
			));
			$this->set('topics',$topic);
			$this->set('training_id',$id);
			$this->set('date_start',$date_start);
			$this->set('trainings',$data);
			
		}
		public function edit($id=0)
		{
			if(!$id)
			{
				throw new NotFoundException(__('Invalid '.$this->getContext()));
			}
			$model = $this->getModel();
		
			$data = $model->findByvegetableweek_id($id);
			$this->set('data',$data);

			$data = $this->Training->find('all');
			$this->set('trainings',$data);
			$topic=$this->Topic->find('all', array(
				'conditions'=>array('type'=>'vegetabletopic')
				));
			$this->set('topics',$topic);
		}
		public function setCondition()
		{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'vegetableweek_id LIKE '=>'%'.$filter.'%',
										'week LIKE '=>'%'.$filter.'%',	
										'training_id LIKE '=>'%'.$filter.'%',							
																					
										)
											);
			}
		
			$this->paginate['conditions'] = $this->conditionFilter;

		}
		public function save($id=0)
		{
			$week_topic=array(@$this->request->data['week_topic1'],
							@$this->request->data['week_topic2'],
							@$this->request->data['week_topic3'],
							@$this->request->data['week_topic4']
							);

			for ($i=0; $i <count($week_topic)-1; $i++) { 
					for ($j=$i+1; $j <count($week_topic) ; $j++) { 
						if($week_topic[$i]==$week_topic[$j])
						{
							$this->Session->setFlash(__('Topic are duplicated. Choose other one!'),
									'default',
									array('class'=>'alert alert-dismissable alert-danger'));
							$action = $id==0?'add':'edit';
							return $this->redirect(array('controller'=>'VegetableWeeks','action'=>$action,$id));
						}
					}
					
				}

			if($id==0)
			{
				$week = @$this->request->data['week'];
				$training_id = @$this->request->data['training_id'];				
				$count = $this->VegetableWeek->find('count',array(
								'conditions'=>array(
										'VegetableWeek.training_id'=>$training_id,
										'week'=>$week
									)
								));
				if($count)
				{
					$this->Session->setFlash(__('Week has been saved'),
									'default',
									array('class'=>'alert alert-dismissable alert-success '));
					
					
					return $this->redirect(array('action'=>'add'));
				}
				
							

			}
			
			parent::save($id);
		}
		/*=======return to ajax function for requesting vegetable by training id*/
		public function getVegetableWeekByTraining()
		{
			$training_id=@$this->request->data['training_id'];
			
			$st='';

			if($training_id=='')
			{
				$st.='<div class="alert alert-dismissable alert-danger ">'.__('Training not found').'</div>';
			}
			else
			{
				$data=$this->VegetableWeek->find('all',
						array(
							'conditions'=>array(
								'VegetableWeek.training_id'=>$training_id
							 )
							));
				if($data){

			    $st.='<table id="data-training" cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
				<thead>
				<tr>
					<th>'.__('Week') .'</th>
					<th>'.__('Date').'</th>
					<th>'.__('Trainer') .'</th>
					<th>'.__('Topic 1') .'</th>
					<th>'.__('Topic 2') .'</th>
					<th>'.__('Topic 3') .'</th>
					<th>'.__('Topic 4') .'</th>
					<th>'.__('Non client') .'</th>
					
				</tr></thead><tbody>';

				foreach ($data as $key => $value) {
					$st.='<tr>
							<td class="week">'.$value['VegetableWeek']['week'].'</td>
							<td>'.$value['VegetableWeek']['week_date'].'</td>
							<td>'.$value['VegetableWeek']['week_trainer'].'</td>
							<td>'.$value['VegetableWeek']['week_topic1'].'</td>
							<td>'.$value['VegetableWeek']['week_topic2'].'</td>
							<td>'.$value['VegetableWeek']['week_topic3'].'</td>
							<td>'.$value['VegetableWeek']['week_topic4'].'</td>
							<td>'.($value['VegetableWeek']['week_client_attend']?'Yes':'No').'</td>
							
						 </tr>';		
				}
				$st.='</tbody></table>';
				}
				else{
					$st.='<div class="alert alert-dismissable alert-danger ">'.('This training id has no data').'</div>';
				}		
			}
			echo $st;
			exit();
		}

	
	}
?>