<?php
	Class FieldDayDemosController extends AppController
	{
		
		public $helpers = array('Html', 'Form');
		public $components = array('Session');
		public $context ="FieldDayDemo";
		public $uses =array('FieldDay','Training','Topic','Plot','CommercialAgronomists');

		public function reportview() {
			/*$sql="SELECT p.*,v.*,c.*,co.*,pr.*,ph.*,kh.*,sr.*,kt.*,cv.*,ven_client.*
				   FROM plots AS p
  				   LEFT JOIN vendors AS v ON p.vendor_code = v.vendor_code
  				   LEFT JOIN clients AS c ON p.client_id = c.client_id 
  				   LEFT JOIN clientvendors as cv ON cv.client_id= c.client_id
  				   LEFT JOIN vendors AS ven_client ON ven_client.vendor_code=cv.vendor_code
  				   INNER JOIN crops AS co ON p.crop_code=co.crop_code
    			   INNER JOIN projects AS pr ON pr.project_id=p.project_id
    			   INNER JOIN phums AS ph ON (ph.phum_code =c.phum_code OR v.phum_code=ph.phum_code)
                   INNER JOIN khums AS kh ON ph.khum_code=kh.khum_code
                   INNER JOIN sroks AS sr ON sr.srok_code = kh.srok_code
                   INNER JOIN khets AS kt ON kt.khet_code=sr.khet_code
                   WHERE co.crop_type='vegetable' LIMIT 0,200";

            $data=$this->Plot->query($sql);
           
            $this->set('data',$data);*/
      			
		}
		
	}
?>