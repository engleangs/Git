<?php 
	class RiceDemosController extends AppController
	{
		public $helpers = array('Html', 'Form',);
	  	public $components = array('Session');
		public $name = "RiceDemos";	
		public $context ="RiceDemo";
    	public $paginate = array('limit' =>50);		
		public function reportview() 
		{
			  	$data = $this->paginate($this->getContext());   
        		$this->set(compact('data'));
      			
		}
		public function export()
		{
			$count = $this->find('count',
										array(
												'condition'=>array('')
									))
		}
	}
?>