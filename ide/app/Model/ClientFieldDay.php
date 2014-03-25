<?php 
	class ClientFieldDay extends AppModel
	{
		var $name = 'ClientFieldDay';
		var $useTable ='clientfielddays';
		var $primaryKey ='client_field_id';
   		var $belongsTo =array('FieldDay'=>array('className'=>'FieldDay','foreignKey'=>'field_day_id'),
	                          'Client'=>array('className'=>'Client','foreignKey'=>'client_id'),
	                          'NonClient'=>array('className'=>'NonClient','foreignKey'=>'nonclient_id')
	                   ); 
	}
?>