<?php 
/**
* 
*/
class ProductCategorysController extends AppController
{
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 	= 'ProductCategory';
	
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findByproductcategory_code($id);
		$this->set('data',$data);
				
	}
	public function setCondition()
	{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'productcategory_code LIKE '=>'%'.$filter.'%',								
										'productcategory_name_en LIKE '=>'%'.$filter.'%',
										'productcategory_name_kh' =>'%' .$filter. '%',
																													
										)
											);
			}
			
			$this->paginate['conditions'] = $this->conditionFilter;

	}
	public function checkExistingProductCategoryCode()
	{
		$productcategory_code=$this->request->data['code'];
		$data=$this->ProductCategory->findByproductcategory_code($productcategory_code);

		$st='';
		if(count($data))
		{
			$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated ProductCategory Code. Try again!').'</div>';
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