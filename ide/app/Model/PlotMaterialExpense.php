<?php 
	class PlotMaterialExpense extends AppModel
	{
		public $name="PlotMaterialExpense";
		public $useTable ="plotmaterialexpenses";
	
		public $belongsTo = array(
				'MaterialExpense'=>array(
						'className' =>'MaterialExpense',
						'foreignKey'=>'materialexpense_id'
					
					),
				'Product'=>array(
						'className'=>'Product',
						'foreignKey'=>'product_code'
					),
				'Plot'=> array(
						'className'=>'Plot',
						'foreignKey'=>'plot_id'
					)
			);
	}
?>