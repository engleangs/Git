<?php 
	class CaVendorsController extends AppController
	{
		public $context ="CaVendor";
		public $helper= array('Html','Form');
		public $components= array('Session');
		public $uses  = array('CommercialArgonomist','Vendor','CaVendor');

		public function addCa()
 		{
 		$vendor_code = $this->request->data['v_code'];
 		$ca_code=$this->request->data['c_code'];
 		$data = array();
				$data [] =array(
							'ca_code'=>$ca_code,
							'vendor_code'=>$vendor_code
						);
				if(count($data))
				{
					return $this->CommercialAgronomist->saveAll($data);
				}
 		}
	}
?>