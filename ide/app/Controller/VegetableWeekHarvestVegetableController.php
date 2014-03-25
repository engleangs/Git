<?php 
	class VegetableWeekHarvestVegetablesController extends AppController
	{
		public $helper= array('Html','Form');
		public $components= array('Session');
		public $context 		= 'VegetableWeekHarvestVegetable';
		public $uses  = array('HarvestVegetable','VegetablesWeek','VegetableWeekHarvestVegetable');
	
	}
?>