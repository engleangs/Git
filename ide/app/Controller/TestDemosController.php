<?php 
	class TestDemosController extends AppController
	{
		public $helpers = array('Html', 'Form',);
  		public $components = array('Session');
		public $name = "TestDemos";	
		public $context ="TestDemo";
    	public $paginate = array('limit' =>20);		
		public function reportview() 
		{
			  $data = $this->paginate($this->getContext());   
        $this->set(compact('data'));
      			
		}
	}
?>