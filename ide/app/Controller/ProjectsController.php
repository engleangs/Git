<?php 
/**
* 
*/
class ProjectsController extends AppController
{
	
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 		= 'Project';
	public $uses = array('Client','Fba','Project');
	
	public function setCondition()
	{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'project_name_en LIKE '=>'%'.$filter.'%',								
										'project_id LIKE'=> '%'.$filter.'%',																			
										)
											);
			}
			$this->paginate['conditions'] = $this->conditionFilter;

	}
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findByproject_id($id);
		$this->set('data',$data);

		/*$client=$this->Client->find('all');
		$this->set('clients',$client);

		$fba=$this->Fba->find('all');
		$this->set('fbas',$fba);*/
		
		
	}
	public function add()
	{
		/*$data=$this->Client->find('all');
		$this->set('clients',$data);

		$data=$this->Fba->find('all');
		$this->set('fbas',$data);*/
	}

	
}
 ?>