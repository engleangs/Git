<?php 
	class VegetableWeek extends AppModel
	{
		var $name = 'VegetableWeek';
		var $useTable ='vegetableweeks';
		var $primaryKey ='vegetableweek_id';
    	var $belongsTo =array('Training'=>
	                            array('className'=>'Training',
                                  'foreignKey'=>'training_id')); 

	}
?>