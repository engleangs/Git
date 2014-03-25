<?php
	class CommercialAgronomist extends AppModel
	{
		var $name = 'CommercialAgronomist';
		var $useTable ='commercialagronomists';
		var $primaryKey ='ca_code';
		var $belongsTo =array(
    		'Vendor'=>array(
    			'className'=>'Vendor',
    			'foreignKey'=>'ca_code'
    			)
    	); 
    	

	}
?>