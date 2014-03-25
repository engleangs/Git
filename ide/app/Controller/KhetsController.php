<?php 
/**
* 
*/
class KhetsController extends AppController
{
	
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 		= 'Khet';
	
	public function setCondition()
	{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'khet_name_en LIKE '=>'%'.$filter.'%',								
										'khet_name_kh LIKE '=>'%'.$filter.'%',	
										'khet_code LIKE' => '%'.$filter. '%',																				
										)
											);
			}
		
			$this->paginate['conditions'] = $this->conditionFilter;

	}
	public function checkExistingKhetCode()
	{
		$code =$this->request->data['code'];
		$data=$this->Khet->findBykhet_code($code);
		$st='';
		if(count($data))
		{
			$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated Khet Code. Try again!').'</div>';
		}
		else
		{
			$st.='';
		}
		echo $st;
		exit();
	}
	/*each edit and Add form that has Phum Code*/
	public function getKhetByPhum($phum_code=0)
	{
		$selectedKhetCode = '';
		$model = $this->getModel();
		if($phum_code)
		{
			$sql = "SELECT Khet.khet_code FROM khets as Khet LEFT JOIN sroks as Srok ON 
				Khet.khet_code = Srok.khet_code LEFT JOIN khums as Khum ON 
				 Srok.srok_code = Khum.srok_code LEFT JOIN phums as Phum ON 
				 Phum.khum_code = Khum.khum_code  WHERE Phum.phum_code='$phum_code'";
			$temp = $model->query($sql);
			if(count($temp))
			{
				$selectedKhetCode = $temp[0]['Khet']['khet_code'];
			}

		}
		$khets = $model->find('all');
		$st = '';
		foreach ($khets as $key => $value) {
			$stSelect = '';
			if($value['Khet']['khet_code'] == $selectedKhetCode)
			{
				$stSelect = ' selected = "selected" ';
			}
			$st.='<option value="'.$value['Khet']['khet_code'].'" '.$stSelect.'>'.
				 $value['Khet']['khet_name_en'].' : '.$value['Khet']['khet_code'].
				 '</option>';
		}
		echo $st;
		exit;
	}

	public function getKhet()
	{
		$data = $this->Khet->find('all');
		if(count($data))
		{
				foreach ($data as $key => $value) {
					$st.='<option value="'.$value['Khet']['Khet_code'].'">'.$value['Khet']['khet_name_en'].' : '.$value['Khet']['khet_code'].'</option>';
				}
		}
		echo $st;
		exit;

	}
}
 ?>