<?php 
	class HarvestRice extends AppModel
	{
		public $name="HarvestRice";
		public $useTable = "harvestrices";
		public $primaryKey ="harvestrice_id";
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