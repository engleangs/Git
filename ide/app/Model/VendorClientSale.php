<?php 
 	class VendorClientSale extends AppModel
 	{
 		var $name = 'VendorClientSale';
		var $useTable ='vendorclientsales';
		var $primaryKey ='sale_id';
		var $belongsTo =array('Client'=>array('className'=>'Client','foreignKey'=>'client_id'),
    						'Vendor'=>array('className'=>'Vendor','foreignKey'=>'vendor_code')
    						);
	}
?>