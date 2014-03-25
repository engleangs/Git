<?php 
 	class ClientVendor extends AppModel
 	{
 		var $name = 'ClientVendor';
		var $useTable ='clientvendors';
	   	var $belongsTo =array('Client'=>array('className'=>'Client','foreignKey'=>'client_id'),
    						'Vendor'=>array('className'=>'Vendor','foreignKey'=>'vendor_code')
    						);
 	}
?>