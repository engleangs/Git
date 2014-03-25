<?php
	class Survey extends AppModel
	{
		var $name = 'Survey';
		var $useTable ='surveys';
		var $primaryKey ='survey_id';
    	var $belongsTo =array('HarvestRice'=>array(
    		 				   'className'=>'HarvestRice',
                               'foreignKey'=>'survey_harvest_id',
                               'conditions'=>array('Survey.harvest_type'=>'HarvestRice')),
    						  'HarvestVegetable'=>array(
    						  	'className'=>'HarvestVegetable',
    						  	'foreignKey'=>'survey_harvest_id',
                                'conditions'=>array('Survey.harvest_type'=>'HarvestVegetable'))

    	);
	}
?>