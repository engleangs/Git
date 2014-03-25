<?php 
	class FbaVendorsController extends AppController
	{
		public $context ="FbaVendor";
		public $helper= array('Html','Form');
		public $components= array('Session');
		public $uses  = array('Fba','Vendor','FbaVendor');

		public function addFba()
		{
			$vendor_code = $this->request->data['v_code'];
 			$fba_code =$this->request->data['f_code'];
 			/*var_dump($vendor_code);
 			exit();*/
 			$data = array();
				$data [] =array('fba_code'=>$fba_code,
								 'vendor_code'=>$vendor_code
								
									);
				if(count($data))
				{
					return $this->FbaVendor->saveAll($data);
				}

		}
	}
?>