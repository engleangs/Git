<?php
	class SurveysController extends AppController
	{
		public $helpers 	= 	array('Html','Form');	
		public $components 	= 	array('Session');
		public $context 	= 'Survey';
		public $uses  = array('HarvestRice','HarvestVegetable','Survey');
		public function edit($id=0)
		{
			$data=$this->Survey->findBysurvey_id($id);
			$this->set('data',$data);
		}
		public function save($id=0)
		{
				$checking = $this->request->data['harvest'];
				$surveyoption=$this->request->data['farmer_spend_income'];

				if ($surveyoption=='Other')
				{
					$this->request->data['farmer_spend_income']=$this->request->data['other_farmer_spend_income'];
				}
				if($checking=='HarvestVegetable')
				{
					$this->request->data['harvest_type']=$checking;
				}
				if($checking=='HarvestRice')
				{
					$this->request->data['harvest_type']=$checking;
				}

			parent::save($id);
		}
		public function selectHarvestRice($id =0)
		{
			$data=$this->HarvestRice->find('all');
			$selected_id = -1;		
			if($id)
			{
				$survey = $this->Survey->findBysurvey_id($id);
				if(count($survey))
				{
					$selected_id = $survey['Survey']['survey_harvest_id'];

				}
			}

			$ret = array('error'=>true,'msg'=>'','data'=>'');
			$st='';
			if(count(@$data))
			{
				
				foreach ($data as $key => $value) {
					$stSelected = '';
					if($value['HarvestRice']['harvestrice_id']==$selected_id)
						$stSelected = ' selected="selected" ';
					$st.='<option value="'.$value['HarvestRice']['harvestrice_id'].'"  '.
					$stSelected.'>'.$value['HarvestRice']['harvestrice_id'].'</option>';
				}
				$ret['error']=false;
				$ret['data'] = $st;
			}
			else
			{
				$st.=__('Rice not yet Harvest Now!');
				$ret['msg'] = $st;
			}

			echo json_encode($ret);
				
			exit();
		}
		public function selectHarvestVegetable($id=0)
		{
			$data=$this->HarvestVegetable->find('all');
			$selected_id = -1;		
			if($id)
			{
				$survey = $this->Survey->findBysurvey_id($id);
				if(count($survey))
				{
					$selected_id = $survey['Survey']['survey_harvest_id'];

				}
			}
			$ret = array('error'=>true,'msg'=>'','data'=>'');
			$st='';
			if(count(@$data))
			{
				
				foreach ($data as $key => $value) {

					$stSelected = '';
					if($value['HarvestVegetable']['harvestvegetable_id']==$selected_id)
						$stSelected = ' selected="selected" ';
					$st.='<option value="'.$value['HarvestVegetable']['harvestvegetable_id'].'"  '.
					$stSelected.'>'.$value['HarvestVegetable']['harvestvegetable_id'].'</option>';
									
				}
				$ret['error']=false;
				$ret['data'] = $st;
			}
			else
			{
				$st.=__('Vegetable not yet Harvest Now!');
				$ret['msg'] = $st;
			}

			echo json_encode($ret);
				
			exit();
		}

		public function setCondition()
		{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'survey_id LIKE '=>'%'.$filter.'%',								
										'harvest_type LIKE '=>'%'.$filter.'%',
										'survey_harvest_id LIKE' =>'%' .$filter. '%'																
										)
											);
			}
		
			$this->paginate['conditions'] = $this->conditionFilter;

		}

		public function listing()
		{
			$this->Survey->recursive=3;
			parent::listing();
		}
	}
?>