<?php
class Client extends AppModel
{   
	var $name = 'Client';
	var $useTable ='clients';
	var $primaryKey ='client_id';
    var $belongsTo =array('Phum'=>
	                            array('className'=>'Phum',
                                  'foreignKey'=>'phum_code')); 

}
?>