<?php 
	class VegetableWeekHarvestVegetable extends AppModel
	{
		var $name = 'VegetableWeekHarvestVegetable';
		var $useTable ='vegetableweekharvestvegetables';
		
		public $belongsTo = array(
				'Client'=>array(
					'className'=> 'Client',
					'foreignKey' =>'vegetableweekharvestvegetable_client_id'
					),
				'VegetableWeek'=>array(
					'className'=>'VegetableWeek',
					'foreignKey'=>'vegetableweekharvestvegetable_vegetableweek_id'
				),
				'HarvestVegetable'=>array(
					'className'=>'HarvestVegetable',
					'foreignKey'=>'vegetableweekharvestvegetable_harvestvegetable_id'
					)
			);
	}
?>