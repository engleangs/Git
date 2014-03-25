<?php 
	class FbaVendor extends AppModel
	{
		var $name = 'FbaVendor';
		var $useTable ='fbavendors';
	   	var $belongsTo =array('Fba'=>array('className'=>'Fba','foreignKey'=>'fba_code'),
    						'Vendor'=>array('className'=>'Vendor','foreignKey'=>'vendor_code')
    						);
	}
?>