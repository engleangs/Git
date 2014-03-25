<?php 
	class RiceWeekHarvestRice extends AppModel
	{
	 	var $name = 'RiceWeekHarvestRice';
		var $useTable ='riceweekharvestrices';
	
		public $belongsTo = array(
				'Client'=>array(
					'className'=> 'Client',
					'foreignKey' =>'riceweekharvestrice_client_id'
					),
				'RiceWeek'=>array(
					'className'=>'RiceWeek',
					'foreignKey'=>'riceweekharvestrice_riceweek_id'
				),
				'HarvestRice'=>array(
					'className'=>'HarvestVegetable',
					'foreignKey'=>'riceweekharvestrice_harvestrice_id'
					)
			);
	}
?>