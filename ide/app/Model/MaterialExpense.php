<?php
	class MaterialExpense extends AppModel
	{
		var $name='MaterialExpense';
		var $useTable='materialexpenses';
		var $primaryKey='materialexpense_id';
		public $hasMany = array(
        'PlotMaterialExpense' => array(
            'className' => 'PlotMaterialExpense',
            'foreignKey' => 'materialexpense_id'
           
            )
    	);
	}
?>