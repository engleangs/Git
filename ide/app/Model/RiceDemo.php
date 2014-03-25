<?php
	Class RiceDemo extends AppModel
	{
		var $name = 'RiceDemo';
		var $useTable=false;

		public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) 
		{
		   
		   
		    $sql="SELECT * FROM vw_ricedemos LIMIT " . (($page - 1) * $limit) . ', ' . $limit;
		    $results = $this->query($sql);
		    return $results;
		}
  	    public function paginateCount($conditions = null, $recursive = 0, $extra = array()) 
		{
		    		$sql="SELECT COUNT(*) AS total FROM vw_ricedemos";
					$this->recursive = $recursive;
					$results = $this->query($sql);
					return  $results[0][0]['total'];
					    
					   
		}
		/*public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) 
		{
		   
		   
		   $sql="SELECT p.*,pr.*,cv.*,
           v.vendor_name_en,v.vendor_code,v.vendor_gender,v.branch_manager,v.phum_code,
           c.client_id,c.client_name_en,c.client_gender,c.phum_code,co.crop_code,co.crop_name_en,
           co.crop_season,co.crop_type,co.product_code,ph.phum_code,ph.phum_name_en,ph.khum_code,
           kh.srok_code,kh.khum_code,kh.khum_name_en,sr.srok_code,sr.srok_name_en,sr.khet_code,
           kt.khet_code,kt.khet_name_en,ven_client.vendor_code,ven_client.vendor_name_en,ven_client.vendor_gender,
           ven_client.branch_manager
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
                   WHERE co.crop_type='rice' LIMIT " . (($page - 1) * $limit) . ', ' . $limit;
            
		    $results = $this->query($sql);
		    return $results;
		}
  	    public function paginateCount($conditions = null, $recursive = 0, $extra = array()) 
		{
		    $sql="
			SELECT
			  COUNT(*) AS total
				FROM (
				SELECT
			        p.*
			       
			      FROM plots AS p
			        LEFT JOIN vendors AS v
			          ON p.vendor_code = v.vendor_code
			        LEFT JOIN clients AS c
			          ON p.client_id = c.client_id
			        LEFT JOIN clientvendors AS cv
			          ON cv.client_id = c.client_id
			        LEFT JOIN vendors AS ven_client
			          ON ven_client.vendor_code = cv.vendor_code
			        INNER JOIN crops AS co
			          ON p.crop_code = co.crop_code
			        INNER JOIN projects AS pr
			          ON pr.project_id = p.project_id
			        INNER JOIN phums AS ph
			          ON (ph.phum_code = c.phum_code
			               OR v.phum_code = ph.phum_code)
			        INNER JOIN khums AS kh
			          ON ph.khum_code = kh.khum_code
			        INNER JOIN sroks AS sr
			          ON sr.srok_code = kh.srok_code
			        INNER JOIN khets AS kt
			          ON kt.khet_code = sr.khet_code
			      WHERE co.crop_type = 'rice') AS d
				";

			     	$this->recursive = $recursive;
					$results = $this->query($sql);
					return  $results[0][0]['total'];
					    
					   
		}*/
	}
?>