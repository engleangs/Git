<?php
	Class ClientDemosController extends AppController
	{
		
		public $helpers = array('Html', 'Form');
		public $components = array('Session');
		public $context ="ClientDemo";
		public $uses =array('Vendor','Khet','Srok','Plot','Phum','Khum','Client');

		public function reportview() {
			   $sql="SELECT v.*,p.phum_name_en,p.phum_code,k.khum_code,k.khum_name_en,
            s.srok_code,s.srok_name_en,kh.khet_code,kh.khet_name_en
				    FROM vendors AS v
  				  INNER JOIN phums AS p ON v.phum_code = p.phum_code
            INNER JOIN khums AS k ON p.khum_code = k.khum_code
            INNER JOIN sroks AS s ON k.srok_code = s.srok_code
            INNER JOIN khets AS kh ON s.khet_code = kh.khet_code
  				  LIMIT 0,200";

            $data=$this->Plot->query($sql);
           
            $this->set('data',$data);
      			
		}
		
	}
?>