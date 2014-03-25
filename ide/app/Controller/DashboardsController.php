<?php 
/**
* 
*/
class DashboardsController extends AppController
{
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 		= 'Dashboard';
	public $uses  = array('Client','Vendor','User','Plot','Labor','Crop',
						  'Product','ProductCategory','RiceWeek','VegetableWeek',
						  'HarvestVegetable','HarvestRice');
	public function index()
	{
		$vendor=$this->Vendor->find('count');
		$this->set('vendors',$vendor);

		$client=$this->Client->find('count');
		$this->set('clients',$client);

		$plot=$this->Plot->find('count');
		$this->set('plots',$plot);

		$labor=$this->Labor->find('count');
		$this->set('labors',$labor);

		$productcategory=$this->ProductCategory->find('count');
		$this->set('ProductCategorys',$productcategory);

		$product=$this->Product->find('count');
		$this->set('products',$product);

		$crop=$this->Crop->find('count');
		$this->set('crops',$crop);

		$user=$this->User->find('count');
		$this->set('users',$user);

		$RiceWeek=$this->RiceWeek->find('count');
		$this->set('riceweeks',$RiceWeek);

		$VegetableWeek =$this->VegetableWeek->find('count');
		$this->set('VegetableWeeks',$VegetableWeek);

		$HarvestRice=$this->HarvestRice->find('count');
		$this->set('HarvestRices',$HarvestRice);

		$HarvestVegetable=$this->HarvestVegetable->find('count');
		$this->set('HarvestVegetables',$HarvestVegetable);
		
	}
	
}
 ?>