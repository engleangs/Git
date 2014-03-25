<?php
	class FbasController extends AppController
	{
		 public $helpers =array('Html','Form');
		 public $components = array('Session');
		 public $context ='Fba';
		 public $uses  = array('Fba','CommercialAgronomist','Vendor');
		 
		public function add()
		{
		$data = $this->CommercialAgronomist->find('all');
		if(count($data)==0)
		{
			$this->Session->setFlash(__('No data of CA, Please input CA first!'),
									'default',
									array('class'=>'alert alert-dismissable alert-danger '));
		}
		$this->set('cas',$data);

		}
		public function edit($id=0)
		{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findByfba_code($id);
		$this->set('data',$data);
		$data=$this->CommercialAgronomist->find('all');
		$this->set('cas',$data);
		
		}
		public function setCondition()
		{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'fba_code LIKE '=>'%'.$filter.'%',
										'ca_code LIKE' => '%'.$filter.'%'								
																														
										)
											);
			}
			//$this->conditionFilter['user_id !='] = 'A001';
			$this->paginate['conditions'] = $this->conditionFilter;

		}
		/*submit data to Vendor form request by ajax*/
		public function selectfba()
		{
			$model = $this->getModel();
			$model->recursive = 0;
			$data = $model->find('all');
			$st='';
			
			if(count($data))
			{
				foreach ($data as $key => $value) {
					$st.='<option value="'.$value['Fba']['fba_code'].'">'.$value['Fba']['fba_code'].'</option>';
				}
			}
			echo $st;
			exit;
		}
		public function checkExistingFbaCode()
		{
			$fba_code=$this->request->data['code'];
			$data=$this->Fba->findByfba_code($fba_code);
			
			$st='';
			if(count($data))
			{
				$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated FBA Code. Try again!').'</div>';
			}
			else
			{
				$st.='';
			}
			echo $st;
			exit();
		}
	
	}
?>