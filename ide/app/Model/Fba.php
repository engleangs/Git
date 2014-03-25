<?php
	class Fba extends AppModel
	{
		var $name = 'Fba';
		var $useTable ='fbas';
		var $primaryKey ='fba_code';
    	var $belongsTo =array(
    		'CommercialAgronomist'=>array(
    			'className'=>'CommercialAgronomist',
    			'foreignKey'=>'ca_code'),
    		'Vendor'=>array(
    			'className'=>'Vendor',
    			'foreignKey'=>'fba_code'
    			)
    	); 
	}
?>