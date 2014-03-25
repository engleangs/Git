<?php
class Vendor extends AppModel
{   
	var $name = 'Vendor';
	var $useTable ='vendors';
	var $primaryKey ='vendor_code';
    var $belongsTo =array('Phum'=>
	                            array('className'=>'Phum',
                                  'foreignKey'=>'phum_code')); 
    var $hasMany = array(
    	'Fba'=>array('className'=>'Fba',
    						  'foreignKey'=>'fba_code'
    						  
    						  ),
    	'CommercialAgronomist'=>array('className'=>'CommercialAgronomist',
    					  'foreignKey'=>'ca_code'
    					 
    						),
    	'ClientVendor'=>array('className'=>'ClientVendor',
    					  'foreignKey'=>'vendor_code'
    					 
    						)
    				);

}
?>