<?php 
/**
* 
*/
class PhumsController extends AppController
{
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 	= 'Phum';
	public $uses  = array('Khum','Phum','Khet');
	public function add()
	{
		$data = $this->Khet->find('all');
		$this->set('khets',$data);
		
	}
	public function selectphum()
	{
		$data = $this->Phum->find('all');
		if(count($data))
		{
				foreach ($data as $key => $value) {
					$st.='<option value="'.$value['Phum']['phum_code'].'">'.$value['Phum']['phum_name_en'].' : '.$value['Phum']['phum_code'].'</option>';
				}
		}
		echo $st;
		exit;
	}
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findByphum_code($id);
		$this->set('data',$data);
		
		$khet  	= $this->Khet->find('all');
		$this->set('khets',$khet);
		
		$selectKhetCode = '';
		$phum_code = @$data['Phum']['phum_code'];
		$sql = "SELECT Khet.khet_code FROM khets as Khet LEFT JOIN sroks as Srok ON 
				Khet.khet_code = Srok.khet_code LEFT JOIN khums as Khum ON 
				 Srok.srok_code = Khum.srok_code LEFT JOIN phums as Phum ON 
				 Phum.khum_code = Khum.khum_code  WHERE Phum.phum_code='$phum_code'";
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
										'phum_name_en LIKE '=>'%'.$filter.'%',								
										'phum_name_kh LIKE '=>'%'.$filter.'%',
										'phum_code LIKE' => '%'.$filter. '%',																					
										)
											);
			}
			
			$this->paginate['conditions'] = $this->conditionFilter;

	}
	
	public function checkExistingPhumCode()
	{
		$code =$this->request->data['code'];
		$data=$this->Phum->findByphum_code($code);
		$st='';
		if(count($data))
		{
			$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated Phum Code. Try again!').'</div>';
		}
		else
		{
			$st.='';
		}
		echo $st;
		exit();
	}
	
	public function getPhumByPhum($phum_code=0)
	{
		$khum_code 	= @$this->request->data['khum_code'];
		$model 		= $this->getModel();
		$phums 		= $model->find('all',
					array('conditions'=>array('Phum.khum_code'=>$khum_code)));
		$st 		= '';
		foreach ($phums as $key => $value) 
		{
			$stSelect = '';
			if($value['Phum']['phum_code']==$phum_code)
					$stSelect=' selected = "selected" ';
			$st.='<option value="'.$value['Phum']['phum_code'].'" '.$stSelect.' >'.
				 $value['Phum']['phum_name_en'].' : '.$value['Phum']['phum_code'].
				'</option>';
		}
		echo $st;
		exit;
	}

	public function listing()
	{
		$this->Phum->recursive=3;
		parent::listing();
	}

}
 ?>