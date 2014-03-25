<?php 
/**
*  
*/
class TasksController extends AppController
{
	
	var $name = 'tasks';
	function index()
	{
		$this->set(
						'tasks',
						$this->Task->find('all')

			);
	}
}
 ?>