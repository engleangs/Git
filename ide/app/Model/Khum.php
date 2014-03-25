<?php
	class Khum extends AppModel
	{   
		var $name = 'Khum';
		var $useTable ='khums';
		var $primaryKey ='khum_code';
	    var $belongsTo =array('Srok'=>
	                            array('className'=>'Srok',
                                  'foreignKey'=>'srok_code')); 

   
	    var $validate = array(
	        'khum_code' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Please enter khum code.' 
	        ),
	        'khum_name_en' => array(
	            'rule' => 'notEmpty',
	            'message' => 'Please enter khum name in english.' 
	        )
	    );
	}
?>