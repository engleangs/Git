<?php 
/**
* 
*/
/*=====StandardLabor======*/
class LaborsController extends AppController
{
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context ='Labor';
	public $uses =array('Labor');
	
	
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
	
		$data = $model->findBylabor_code($id);
		$this->set('data',$data);
		
	}
	public function setCondition()
	{
		parent::setCondition();
		if($filter = $this->Session->read('Filter.search'))
		{
			$this->conditionFilter = array(									
									'OR'=>array(
										'Labor.labor_code LIKE '=>'%'.$filter.'%',								
										'Labor.labor_name_en LIKE' => '%'.$filter .'%',
										'Labor.labor_name_kh LIKE' => '%'.$filter .'%',	
										'Labor.labor_unit LIKE' => '%'.$filter .'%',
										'Labor.labor_costper_unit_usd LIKE' => '%'.$filter .'%',																	
										)
											);
		}
			//$this->conditionFilter['user_id !='] = 'A001';
			$this->paginate['conditions'] = $this->conditionFilter;

	}
	public function getLaborUnit()
	{
		$labor_code = $this->request->data['labor_code'];
			$model = $this->getModel();
			
			$data = $model->findBylabor_code($labor_code);

			echo json_encode($data);
			
			exit;
	}

	public function checkExistingLaborCode()
	{
		$labor_code=$this->request->data['code'];
		$data=$this->Labor->findBylabor_code($labor_code);

		$st='';
		if(count($data))
		{
			$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated Labor Code. Try again!').'</div>';
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