<?php
	Class VendorDemo extends AppModel
	{
		var $name = 'VendorDemo';
		var $useTable=false;

		
		public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) 
		{
		   
		    $sql="SELECT v.*,p.phum_name_en,p.phum_code,k.khum_code,k.khum_name_en,
            s.srok_code,s.srok_name_en,kh.khet_code,kh.khet_name_en
				FROM vendors AS v
  				INNER JOIN phums AS p ON v.phum_code = p.phum_code
            	INNER JOIN khums AS k ON p.khum_code = k.khum_code
            	INNER JOIN sroks AS s ON k.srok_code = s.srok_code
            	INNER JOIN khets AS kh ON s.khet_code = kh.khet_code
  				LIMIT ". (($page - 1) * $limit) . ', ' . $limit;
		    $results = $this->query($sql);
		    return $results;
		}
  	    public function paginateCount($conditions = null, $recursive = 0, $extra = array()) 
		{
		    	
				$sql="
					SELECT COUNT(*) AS total FROM (SELECT v.*
				    FROM vendors AS v
  				  	INNER JOIN phums AS p ON v.phum_code = p.phum_code
            		INNER JOIN khums AS k ON p.khum_code = k.khum_code
            		INNER JOIN sroks AS s ON k.srok_code = s.srok_code
            		INNER JOIN khets AS kh ON s.khet_code = kh.khet_code) AS d";

					$this->recursive = $recursive;
					$results = $this->query($sql);
					return  $results[0][0]['total'];

					    
					   
		}
	}
?>