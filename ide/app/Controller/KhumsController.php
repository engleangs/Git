<?php 
/**
* 
*/
class KhumsController extends AppController
{
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 	= 'Khum';
	public $uses  = array('Srok','Khum','Khet');
	public function add()
	{
		$data = $this->Khet->find('all');
		$this->set('Khets',$data);
		
	}
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findBykhum_code($id);
		$this->set('data',$data);
		
		$khet  	= $this->Khet->find('all');
		$this->set('khets',$khet);

		$selectKhetCode = '';

		$khum_code = @$data['Khum']['khum_code'];
		$sql = "SELECT Khet.khet_code FROM khets as Khet LEFT JOIN sroks as Srok ON 
				 Khet.khet_code = Srok.khet_code LEFT JOIN khums as Khum ON 
				 Srok.srok_code = Khum.srok_code WHERE Khum.khum_code='$khum_code'";
		$selectKhets = $model->query($sql);
		
		if(count($selectKhets))
		{
			$selectKhetCode = $selectKhets[0]['Khet']['khet_code'];
		}
		$this->set('selectKhetCode',$selectKhetCode);
		
	}
	public function setCondition()
	{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'khum_name_en LIKE '=>'%'.$filter.'%',								
										'khum_name_kh LIKE '=>'%'.$filter.'%',
										'khum_code LIKE' => '%'.$filter. '%',																					
										)
											);
			}
			//$this->conditionFilter['user_id !='] = 'A001';
			$this->paginate['conditions'] = $this->conditionFilter;

	}
	public function checkExistingKhumCode()
	{
		$code =$this->request->data['code'];
		$data=$this->Khum->findBykhum_code($code);
		$st='';
		if(count($data))
		{
			$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated Khum Code. Try again!').'</div>';
		}
		else
		{
			$st.='';
		}
		echo $st;
		exit();
	}
	/*each edit and Add form that has Phum Code*/
	public function getKhumByPhum($phum_code = 0)
	{

		$selectKhumCode = '';
		$model = $this->getModel();
		if($phum_code)
		{
			$sql = "SELECT Phum.khum_code FROM phums as Phum WHERE  Phum.phum_code='$phum_code'";
			$temp = $model->query($sql);
			if(count($temp))
			{
				$selectKhumCode = $temp[0]['Phum']['khum_code'];
			}

		}
		$srok_code = @$this->request->data['srok_code'];	
		$khums = $model->find('all',array('conditions'=>array('Khum.srok_code'=>$srok_code)));
		$st = '';
		foreach ($khums as $key => $value) 
		{
			$stSelect = '';
			if($value['Khum']['khum_code'] == $selectKhumCode)
			{
				$stSelect = ' selected = "selected" ';
			}
			$st.='<option value="'.$value['Khum']['khum_code'].'" '.$stSelect.'>'.
				 $value['Khum']['khum_name_en'].' : '.$value['Khum']['khum_code'].
				 '</option>';
		}
		echo $st;
		exit;
	}
	public function listing()
	{
		$this->Khum->recursive=3;
		parent::listing();
	}


}
 ?>