<?php 
	class HarvestVegetable extends AppModel
	{
		public $name="HarvestVegetable";
		public $useTable = "harvestvegetables";
		public $primaryKey ="harvestvegetable_id";
		public $belongsTo = array(
				'Plot'=>array(
					'className'=> 'Plot',
					'foreignKey' =>'plot_id'
					)
			);
		/*public $hasMany = array(
        	'InputPlotLabor' => array(
            'className' => 'InputPlotLabor',
            'foreignKey' => 'inputs_labor_id'
            )
    	);*/
	}
?>