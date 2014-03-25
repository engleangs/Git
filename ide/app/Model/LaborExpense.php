<?php 
	class LaborExpense extends AppModel
	{
		public $name="LaborExpense";
		public $useTable = "laborexpenses";
		public $primaryKey ="laborexpense_id";
		public $hasMany = array(
        	'PlotLaborExpense' => array(
            'className' => 'PlotLaborExpense',
            'foreignKey' => 'laborexpense_id'
            )
    	);
	}
?>