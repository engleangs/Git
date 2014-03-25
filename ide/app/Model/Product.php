<?php
	class Product extends AppModel
	{
		var $name='Product';
		var $useTable ='products';
		var $primaryKey ='product_code';
    	var $belongsTo =array('ProductCategory'=>array('className'=>'ProductCategory','foreignKey'=>'productcategory_code')
    						);
	}
?>