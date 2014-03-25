<?php 
	class Sale extends AppModel
	{
		var $name='Sale';
		var $useTable='sales';
		var $primaryKey='sale_id';
		public $hasOne = array(
			    'VendorClientSale' => array(
			        'className'     => 'VendorClientSale',
			        'foreignKey'    =>  'sale_id'
			    ));
	}
?>