<?php
	class RiceWeekHarvestRicesController extends AppController
	{
		public $helper= array('Html','Form');
		public $components= array('Session');
		public $context 		= 'RiceWeekHarvestRice';
		public $uses  = array('HarvestRice','RiceWeek','RiceWeekHarvestRice');
	}
?>