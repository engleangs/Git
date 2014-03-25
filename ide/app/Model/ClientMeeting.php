<?php 
	class ClientMeeting extends AppModel
	{
		var $name="ClientMeeting";
		var $useTable="clientmeetings";
		var $primaryKey ="clientmeeting_id";
		public $belongsTo = array(
				'Meeting'=>array(
						'className' =>'Meeting',
						'foreignKey'=>'meeting_id'
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