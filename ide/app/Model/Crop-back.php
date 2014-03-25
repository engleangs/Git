<?php
class Crop extends AppModel
{   
	var $name = 'Crop';
	var $useTable ='crops';
	var $primaryKey ='crop_code';
    var $hasOne =array('Training'=>
                                array('className'=>'Training',
                                  'foreignKey'=>'crop_code'),
                        'Plot' => array('className'=>'Plot',
                                    'foreignKey'=>'crop_code'
                                )
                        ); 
    
}
?>