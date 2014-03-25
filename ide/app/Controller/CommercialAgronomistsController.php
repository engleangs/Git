<?php
	class CommercialAgronomistsController extends AppController
	{
		public $helpers 	= 	array('Html','Form');	
		public $components 	= 	array('Session');
		public $context 		= 'CommercialAgronomist';
		public $uses  = array('CommercialAgronomist','Vendor');

		public function edit($id=0)
		{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findByca_code($id);
		$this->set('data',$data);
				
		}
		public function listing()
		{
			parent::listing();
		}
		
		public function getCA()
		{
			$model = $this->getModel();
			$model->recursive = 0;
			$data = $model->find('all');
			$st='';
			$ret = array('error'=>true,'msg'=>'','data'=>'');
			

			
			if(count($data))
			{
				foreach ($data as $key => $value) {
					$st.='<option value="'.$value['CommercialAgronomist']['ca_code'].'">'.$value['CommercialAgronomist']['ca_code'].'</option>';
				}
				$ret['error']=false;
				$ret['data'] = $st;
			}
			else
			{
				$st.=__('Please, Input CA info first!');
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
																		
										'ca_code LIKE '=>'%'.$filter.'%',
																														
										)
											);
			}
			$this->paginate['conditions'] = $this->conditionFilter;

		}
		public function checkExistingCaCode()
		{
			$ca_code=$this->request->data['code'];
			$data=$this->CommercialAgronomist->findByca_code($ca_code);

			$st='';
			if(count($data))
			{
				$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated CA Code. Try again!').'</div>';
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