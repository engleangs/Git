<?php
	class Training extends AppModel
	{
		var $name= 'Training';
		var $useTable = 'trainings';
		var $primaryKey ='training_id';
		public $hasMany = array(
        	'ClientTraining' => array(
            'className' => 'ClientTraining',
            'foreignKey' => 'training_id'
          
            )
    	);
    	var $belongsTo =array('Crop'=>
                                array(
                                  'className'=>'Crop',
                                  'foreignKey'=>'crop_code'),
                              'Phum'=>
                                array(
                                  'className'=>'Phum',
                                  'foreignKey'=>'phum_code'
                                )
                            ); 

    	
	}
?>