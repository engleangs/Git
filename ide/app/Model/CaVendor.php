<?php 
	class CaVendor extends AppModel
	{
		var $name = 'CaVendor';
		var $useTable ='cavendors';
		var $belongsTo =array('CommercialAgronomist'=>array('className'=>'CommercialAgronomist','foreignKey'=>'ca_code'),
    						'Vendor'=>array('className'=>'Vendor','foreignKey'=>'vendor_code')
    						);
	}
?>