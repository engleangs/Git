<?php 
	class ClientTraining extends AppModel
	{
		var $name="ClientTraining";
		var $useTable="clienttrainings";
		var $primaryKey ="clienttraining_id";
		public $belongsTo = array(
				'Training'=>array(
						'className' =>'Training',
						'foreignKey'=>'training_id'
					),
				'Client'=>array(
						'className'=>'Client',
						'foreignKey'=>'client_id'
						
					),
				'NonClient'=> array(
						'className'=>'NonClient',
						'foreignKey'=>'nonclient_id'
					),
				'Vendor'=>array(
						'className'=>'Vendor',
						'foreignKey'=>'vendor_code'
					)
			);
	}
?>