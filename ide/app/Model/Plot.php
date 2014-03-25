<?php
	class Plot extends AppModel
	{
		var $name="Plot";
		var $useTable="plots";
		var $primaryKey ='plot_id';
		var $belongsTo = array('Client'=>array('className' => 'Client','foreignKey'=>'client_id'),
								'Crop'=>array('className' =>'Crop','foreignKey'=>'crop_code'),
                                'Project'=>array('className'=>'Project','foreignKey'=>'project_id'),
                                'Vendor'=> array('className'=>'Vendor','foreignKey'=>'vendor_code')
							  );
    	
	}
?>