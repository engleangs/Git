<?php
	class Phum extends AppModel
	{   
		var $name = 'Phum';
		var $useTable ='phums';
		var $primaryKey ='phum_code';
	    var $belongsTo =array('Khum'=>
	                            array('className'=>'Khum',
                                  'foreignKey'=>'khum_code')); 

	}
?>