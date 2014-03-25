<?php
	class Meeting extends AppModel
	{
		var $name= 'Meeting';
		var $useTable = 'meetings';
		var $primaryKey ='meeting_id';
		public $hasMany = array(
        	'ClientMeeting' => array(
            'className' => 'ClientMeeting',
            'foreignKey' => 'meeting_id'
          
            )
    	);
    	var $belongsTo =array('Phum'=>
                                array(
                                  'className'=>'Phum',
                                  'foreignKey'=>'phum_code'
                                )
                            ); 

    	
	}
?>