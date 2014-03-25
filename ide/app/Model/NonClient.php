<?php
class NonClient extends AppModel
{   
	var $name = 'NonClient';
	var $useTable ='nonclients';
	var $primaryKey ='nonclient_id';
    var $belongsTo =array('Phum'=>
	                            array('className'=>'Phum',
                                  'foreignKey'=>'phum_code')); 

}
?>