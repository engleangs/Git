<?php 
/**
* 
*/
class CropsController extends AppController
{
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 		= 'Crop';
	public $uses =array('Crop');

	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findBycrop_code($id);
		$this->set('data',$data);	
	}
	public function listing()
	{	
		parent::listing();
	}
	public function setCondition()
	{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'crop_code LIKE '=>'%'.$filter.'%',								
										'crop_name_en LIKE '=>'%'.$filter.'%',
										'crop_name_kh LIKE '=>'%'.$filter.'%',
										
																													
										)
											);
			}
		$this->paginate['conditions'] = $this->conditionFilter;

	}
	public function selectCropType()
	{
		$crop_code=@$this->request->data['crop_code'];
		$data= $this->Crop->findBycrop_code($crop_code);
	
		$st='';
		
		if(count($data))
		{
			echo $data['Crop']['crop_type'];
		}
		
		exit();
	}

	public function save($id=0)
	{
		$crop_type=$this->request->data['crop_type'];
		if($crop_type=='vegetable')
		{
			unset($this->request->data['crop_season']);
		}
		parent::save($id);
	}

	
}
 ?>