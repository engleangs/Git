<?php 
	class FieldDay extends AppModel
	{
	 	var $name = 'FieldDay';
		var $useTable ='fielddays';
		var $primaryKey ='field_day_id';
    	public $hasMany = array(
        	'ClientFieldDay' => array(
            'className' => 'ClientFieldDay',
            'foreignKey' => 'field_day_id'
          
            )
    	);
	}
?>