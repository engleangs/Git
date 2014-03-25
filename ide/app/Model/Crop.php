<?php

class Crop extends AppModel
{   
	var $name = 'Crop';
	var $useTable ='crops';
	var $primaryKey ='crop_code';
	var $belongTo = array('Product'=>array('className'=>'Product','foreignKey'=>'product_id'));
}

?>