<?php 
	class PlotLaborExpense extends AppModel
	{
		public $name="PlotLaborExpense";
		public $useTable ="plotlaborexpenses";
	
		
		public $belongsTo = array(
				'Labor'=>array(
						'className' =>'Labor',
						'foreignKey'=>'labor_code'
					),
				'LaborExpense'=>array(
						'className'=>'LaborExpense',
						'foreignKey'=>'laborexpense_id'
					
					),
				'Plot'=> array(
						'className'=>'Plot',
						'foreignKey'=>'plot_id'
					)
			);
	}
?>