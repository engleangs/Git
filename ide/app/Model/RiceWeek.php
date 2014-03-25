<?php 
	class RiceWeek extends AppModel
	{
		var $name = 'RiceWeek';
		var $useTable ='riceweeks';
		var $primaryKey ='riceweek_id';
    	var $belongsTo =array('Training'=>
	                            array('className'=>'Training',
                                  'foreignKey'=>'training_id')); 

	}
?>