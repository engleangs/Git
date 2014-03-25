<?php
class Srok extends AppModel
{   
	var $name = 'Srok';
	var $useTable ='sroks';
	var $primaryKey ='srok_code';
    var $belongsTo =array('Khet'=>
                            array('className'=>'Khet',
                                  'foreignKey'=>'khet_code')); 


}
?>