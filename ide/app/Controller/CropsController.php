<?php 
class CropsController extends AppController
{
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 		= 'Crop';
	public $uses = array('Product','Crop');

	public function add()
	{
		$data=$this->Product->find('all');
		$this->set('product',$data);
	}
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findBycrop_code($id);
		$this->set('data',$data);
		
		$data=$this->Product->find('all');
		$this->set('product',$data);
			
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

			//$this->conditionFilter['user_id !='] = 'A001';

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
	public function checkExistingCropCode()
	{
		$crop_code=$this->request->data['code'];
		$data=$this->Crop->findBycrop_code($crop_code);

		$st='';
		if(count($data))
		{
			$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated Crop Code. Try again!').'</div>';
		}
		else
		{
			$st.='';
		}
		echo $st;
		exit();
	}
	public function save($id=0)
	{
		$crop_type=$this->request->data['crop_type'];
		if($crop_type=='vegetable')
		{
			$this->request->data['crop_season']='';
		}
		parent::save($id);
	}

	

}

 ?>