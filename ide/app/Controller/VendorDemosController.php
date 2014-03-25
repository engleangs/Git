<?php
	Class VendorDemosController extends AppController
	{
		
		public $helpers = array('Html', 'Form');
		public $components = array('Session');
		public $context ="VendorDemo";
		public $paginate = array('limit' =>50);
		
		public function reportview() {
			  $data = $this->paginate($this->getContext());   
        $this->set(compact('data'));
      			
		}
		
	}
?>