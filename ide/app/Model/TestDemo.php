<?php
	Class TestDemo extends AppModel
	{
		var $name = 'TestDemo';
		var $useTable=false;

		
		public function paginate($conditions, $fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) 
		{
		   
		   
		    $sql="SELECT * FROM vw_vegetabledemos LIMIT " . (($page - 1) * $limit) . ', ' . $limit;
		    $results = $this->query($sql);
		    return $results;
		}
  	    public function paginateCount($conditions = null, $recursive = 0, $extra = array()) 
		{
		    		$sql="SELECT COUNT(*) AS total FROM vw_vegetabledemos";
					$this->recursive = $recursive;
					$results = $this->query($sql);
					return  $results[0][0]['total'];
					    
					   
		}
	}
?>