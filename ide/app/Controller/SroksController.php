<?php 
/**
* 
*/
class SroksController extends AppController
{
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 	= 'Srok';
	public $uses  = array('Khet','Srok');
	public function add()
	{
		$data = $this->Khet->find('all');
		$this->set('khets',$data);
		
	}
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findBysrok_code($id);
		$this->set('data',$data);
		
		$data = $this->Khet->find('all');
		$this->set('khets',$data);
		
	}
	
	public function setCondition()
	{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'srok_name_en LIKE '=>'%'.$filter.'%',								
										'srok_name_kh LIKE '=>'%'.$filter.'%',	
										'srok_code LIKE' => '%'.$filter. '%',																				
										)
											);
			}
		$this->paginate['conditions'] = $this->conditionFilter;

	}
	public function checkExistingSrokCode()
	{
		$code =$this->request->data['code'];
		$data=$this->Srok->findBysrok_code($code);
		$st='';
		if(count($data))
		{
			$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated Srok Code. Try again!').'</div>';
		}
		else
		{
			$st.='';
		}
		echo $st;
		exit();
	}
	/*each edit and Add form that has Phum Code*/
	public function getSrokByPhum($phum_code=0)
	{
		$selectedSrokCode = '';
		$model = $this->getModel();
		if($phum_code)
		{
			$sql = "SELECT Srok.srok_code  FROM sroks as Srok  LEFT JOIN khums as Khum ON 
				 Srok.srok_code = Khum.srok_code LEFT JOIN phums as Phum ON 
				 Phum.khum_code = Khum.khum_code  WHERE Phum.phum_code='$phum_code'";
			$temp = $model->query($sql);
			if(count($temp))
			{
				$selectedSrokCode = $temp[0]['Srok']['srok_code'];
			}

		}
		$khet_code = @$this->request->data['khet_code'];
		$Sroks = $model->find('all',array('conditions'=>array('Srok.khet_code'=>$khet_code)));
		$st = '';
		foreach ($Sroks as $key => $value) {
			$stSelect = '';
			if($value['Srok']['srok_code'] == $selectedSrokCode)
			{
				$stSelect = ' selected = "selected" ';
			}
			$st.='<option value="'.$value['Srok']['srok_code'].'" '.$stSelect.'>'.
				 $value['Srok']['srok_name_en'].' : '.$value['Srok']['srok_code'].
				 '</option>';
		}
		echo $st;
		exit;
	}

	public function getSrokCodebyKhum($khum_code=0)
	{
		$selectedSrokCode = '';
		$model = $this->getModel();
		if($khum_code)
		{
			$sql = "SELECT Srok.srok_code  FROM sroks as Srok  LEFT JOIN khums as Khum ON 
				 Srok.srok_code = Khum.srok_code WHERE Khum.khum_code='$khum_code'";
			$temp = $model->query($sql);
			var_dump($temp);
			if(count($temp))
			{
				$selectedSrokCode = $temp[0]['Srok']['srok_code'];
			}

		}
		$khet_code = @$this->request->data['khet_code'];
		$Sroks = $model->find('all',array('conditions'=>array('Srok.khet_code'=>$khet_code)));
		$st = '';
		foreach ($Sroks as $key => $value) {
			$stSelect = '';
			if($value['Srok']['srok_code'] == $selectedSrokCode)
			{
				$stSelect = ' selected = "selected" ';
			}
			$st.='<option value="'.$value['Srok']['srok_code'].'" '.$stSelect.'>'.
				 $value['Srok']['srok_name_en'].' : '.$value['Srok']['srok_code'].
				 '</option>';
		}
		echo $st;
		exit;
	}
	
	
}
 ?>