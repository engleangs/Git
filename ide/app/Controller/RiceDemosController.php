<?php 
	class RiceDemosController extends AppController
	{
		public $helpers = array('Html', 'Form',);
	  	public $components = array('Session');
		public $name = "RiceDemos";	
		public $context ="RiceDemo";
    	public $paginate = array('limit' =>30);		
    	public $condition =array();
    	public function setCondition()
    	{
    		if(isset($this->request->data['date-range']))
    		{
    			$this->Session->write('Filter.date_range',$this->request->data['date-range']);
    		}
    		if($date_range = $this->Session->read('Filter.date_range'))
    		{
    			$this->set('date_range',$date_range );
    			$dates = explode("-", $date_range);
				$date_start = $this->changeDate(@$dates[0]);
				$date_end 	= $this->changeDate(@$dates[1]);
    			$this->condition = array(
    										'plot_datestart BETWEEN ? AND ?'=>
															 	array($date_start, $date_end)
													);
    		}
    		$this->paginate['conditions'] = $this->condition;

    	}
		public function reportview() 
		{
				$this->setCondition();
			  	$data = $this->paginate($this->getContext());   			  	
        		$this->set(compact('data'));
      			
		}
		public function export()
		{
			$this->setCondition();
			$model = $this->getModel('RiceDemo');
			$count = $model->find('count',
										array(
												'conditions'=>$this->condition
									));
			if($count>2000)
			{
				$this->Session->setFlash(__( "  Too large records (%d) to be exported . Please filter or select date range for reduce size.",$count)
										.'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>',
									'default',
									array('class'=>'alert alert-dismissable alert-danger '));
				return $this->redirect(array('action'=>'reportview'));
			}
			$data = $model->find('all',
							array(
									'conditions'=>$this->condition
								)
						);
			$this->set('data',$data);
			App::import('Vendor','excel_xml'); 
		}

		public function printReport()
		{
			$this->setCondition();
			$model = $this->getModel('RiceDemo');
			$count = $model->find('count',
										array(
												'conditions'=>$this->condition
									));
			if($count>2000)
			{
				$this->Session->setFlash(__( "  Too large records (%d) to be exported . Please filter or select date range for reduce size.",$count)
										.'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>',
									'default',
									array('class'=>'alert alert-dismissable alert-danger '));
				return $this->redirect(array('action'=>'reportview'));
			}
			$data = $model->find('all',
							array(
									'conditions'=>$this->condition
								)
						);
			$this->set('data',$data);
			$this->layout ='ajax';
			
		}
	}

?>