<?php 
/**
* 
*/
class TopicsController extends AppController
{
	public $helpers 	= 	array('Html','Form');	
	public $components 	= 	array('Session');
	public $context 	= 'Topic';
	public $uses  = array('Topic');
	
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		$data = $model->findBytopic_id($id);
		$this->set('data',$data);
			
	}
	public function setCondition()
	{
			parent::setCondition();
			if($filter = $this->Session->read('Filter.search'))
			{
				$this->conditionFilter = array(									
									'OR'=>array(
										'topic LIKE '=>'%'.$filter.'%',								
										'topic_id LIKE '=>'%'.$filter.'%',
																														
										)
											);
			}
			//$this->conditionFilter['user_id !='] = 'A001';
			$this->paginate['conditions'] = $this->conditionFilter;

	}
	
}
 ?>