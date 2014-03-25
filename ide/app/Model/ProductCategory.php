<?php
class ProductCategory extends AppModel
{   
	var $name = 'ProductCategory';
	var $useTable ='productcategorys';
	var $primaryKey ='productcategory_code';
   
    var $validate = array(
        'productcategory_code' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter category of product code.' 
        ),
        'productcategory_name_en' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter category of product name in english.' 
        )
       
    );
}
?>