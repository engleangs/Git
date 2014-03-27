<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');
App::uses('AppModel', 'Model');
App::uses('Userlog', 'Model');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	var $components = array('Session','Cookie',
			'Auth'=>array(
				'loginRedirect' => array('controller' => 'dashboards', 'action' => 'index'),
            	'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
            	'authenticate' => array(
				            'Form' => array(
				                'passwordHasher' => array('className' => 'Simple','hashType' => 'sha256'),
				                'fields'=>array('username'=>'user_username','password'=>'user_password')
				                )
				            )
				        )
			);
	var $helpers = array('Form','Html','Session');
	var $context  ='';
	var $conditionFilter = array();
	function setCondition()
	{
		if(isset($this->request->data['filter_search']))
			{
				$this->Session->write('Filter.search',$this->request->data['filter_search']);	
		}
		$this->conditionFilter = array();
	}
	function beforeFilter()
	{
		$this->__setLanguage();
	}
	function getContext()
	{
		if(isset($this->context) && $this->context)return $this->context;
		$className = get_class($this);
		$className = substr($className, 0,strlen($className)- strlen('Controller'));
		return $className;
	}
	private function __setLanguage()
	{
		if($this->Cookie->read('lang')&&!$this->Session->check('Config.language'))
		{
			$this->Session->write('Config.language',$this->Cookie->read('lang'));
		}

		elseif(isset($this->params['language'])&&
					$this->params['language']!=$this->Session->read('Config.language'))					
		{
			$this->Session->write('Config.language',$this->params['language']);	
			$this->Cookie->write('lang',$this->params['language']);
		}		
	
	}

	public function redirect( $url, $status = NULL, $exit = true ) 
	{
		/*if (!isset($url['language']) && $this->Session->check('Config.language')) {
			$url['language'] = $this->Session->read('Config.language');
		}	*/	
		parent::redirect($url,$status,$exit);
	}

	public function getModel($name='')
	{
		if(!$name) $name= $this->context;
		if(!$name) $name = $this->getContext();
		return $this->$name;
	}
	public function save($id=0)
	{

		$model = $this->getModel();
		$userId = $this->Session->read('Auth.User.user_id');
		if($id===0)
		{
			//add new 
			$this->request->data['created_by'] = $userId;
			$model->create();		
			if($model->save($this->request->data))
			{
				$this->Session->setFlash(__( $this->context.' has been saved'),
									'default',
									array('class'=>'alert alert-dismissable alert-success '));
				$id  = $model->getLastInsertId();
				$this->request->data['id'] = $id;
				$logMessage = json_encode($this->request->data);
				$this->generateLog($logMessage,' CREATE NEW :'.$id);
				return $this->redirect(array('action' =>'listing'));
			}

			$this->Session->setFlash(__('Unable to add '.$this->context),
									'default',
									array('class'=>'alert alert-dismissable alert-danger '));

		}
		else
		{
			$this->request->data['modified_by'] = $userId;
			if($this->request->is(array('post','put')))
			{
				$model->id = $id;
				$keyName = $model->primaryKey;
				$obj 	= $model->find('all',array(
					'conditions'=>array($this->context.'.'.$keyName=>$id)
				));
				if(!count($obj))
				{
					throw new NotFoundException();
					
				}
				$logMessage = json_encode($obj);
				$this->generateLog($logMessage,' EDIT :'.$id);

				if($model->save($this->request->data))
				{
					$this->Session->setFlash(__( $this->context.' has been saved'),
									'default',
									array('class'=>'alert alert-dismissable alert-success '));
					return $this->redirect(array('action' =>'listing'));
				}
			}
			$this->Session->setFlash(__('Unable to save '.$this->context),
										'default',
										array('class'=>'alert alert-dismissable alert-danger '));
			
		}
		if($id==0)return $this->redirect(array('action'=>'add'));
		return $this->redirect(array('action'=>'edit',$id));
	}

	public $paginate = array('limit' =>5);
	public function listing()
	{		
		$this->setCondition();
		$this->paginate['conditions'] = $this->conditionFilter;
		$data = $this->paginate($this->getContext());		
		$this->set(compact('data'));
		
	}

	public function deleteList()
	{
		$cb = $this->request->data['cb'];
		
		if(count($cb))
		{
			for($i=0;$i<count($cb);$i++)
			{
				$model = $this->getModel();
				$this->logDeleteList($cb[$i]);
				$sql 	='DELETE FROM '.$model->table.
						' WHERE '.$model->primaryKey.'='."'".$cb[$i]."'";
		
				$model->query($sql);
			}

				$this->Session->setFlash(
									__( '%d '.$this->context.'(s) has been selected',count($cb))
										,'default'
										, array('class'=>'alert alert-dismissable alert-success '));
				
				return $this->redirect(array('action' =>'listing'));
		}
		else
		{
			$this->Session->setFlash(
									__( 'No '. $this->context.' has been selected')
										,'default'
										, array('class'=>'alert alert-dismissable alert-warning '));
				
				return $this->redirect(array('action' =>'listing'));
		}
	}

	public function logDeleteList($id=array())
	{
		$model = $this->getModel();
		$model 		= $this->getModel();
		$keyName = $model->primaryKey;
		$obj 	= $model->find('all',array(
			'conditions'=>array($this->context.'.'.$keyName=>$id)
		));
		if(!count($obj))
		{
			throw new  NotFoundException();
			
		}
		
		$logMessage = json_encode($obj);
		$this->generateLog($logMessage,' DELETE LIST');
	}
	public function edit($id=0)
	{
		if(!$id)
		{
			throw new NotFoundException(__('Invalid '.$this->getContext()));
		}
		$model = $this->getModel();
		/*$data= $model->query("SELECT * FROM khets WHERE khet_code='".$id."'LIMIT 1;");*/
		$data = $model->findBykhet_code($id);
		$this->set('data',$data);
		
	}
	public function state($id,$state=1)
	{
		$model 		= $this->getModel();
		$keyName = $model->primaryKey;
		$obj 	= $model->find('all',array(
			'conditions'=>array($this->context.'.'.$keyName=>$id)
		));
		if(!count($obj))
		{
			throw new  NotFoundException();
			
		}
		$logMessage = json_encode($obj);
		$this->generateLog($logMessage,' UPDATE STATE : '.$state);
		$model->id 	= $id;
		$status  = array(0=>'deactivated',1=>'activated');
		if($model->save(array('state'=>$state)))
		{
			$this->Session->setFlash(__( $this->context.' has been ').
										__($status[$state]),
									'default',
									array('class'=>'alert alert-dismissable alert-success '));
				
				return $this->redirect(array('action' =>'listing'));
		}


	}

	public function delete($id)
	{
        $model 		= $this->getModel();
        $keyName = $model->primaryKey;
		$obj 	= $model->find('all',array(
			'conditions'=>array($this->context.'.'.$keyName=>$id)
		));
		if(!count($obj))
		{
			throw new  NotFoundException();
			
		}
		/* log for history of to be deleted record */
		$logMessage = json_encode($obj);
		$this->generateLog($logMessage,'DELETE : '.$id);
        if($id)
        {
        	$model->delete($id);
		    $this->Session->setFlash(__( $this->context.' has been deleted'),
							'default',
							array('class'=>'alert alert-dismissable alert-success '));
        }
		else
		{
			$this->Session->setFlash(__('Unable to delete '.$this->context),
									'default',
									array('class'=>'alert alert-dismissable alert-danger '));
		}
		
		return $this->redirect(array('action' =>'listing'));
        
	}

	public function generateLog($message,$action)
	{
		$user = CakeSession::read("Auth.User");
		$this->Userlog = new Userlog();
		$total = $this->Userlog->find('count');
		if($total>10000)
		{
			$this->Userlog->query('TRUNCATE TABLE '.$this->Userlog->table);
		}
		$this->Userlog->create();
		$this->Userlog->save(
							array('userid'=>$user['user_id'],							
								'log'=>$message,
								'action'=>$action,
								'context'=>$this->getContext(),
								'ip'=>$this->request->clientIp()
								)
							);

	}
	public function search()
	{

	}
	public function add()
	{

	}
	public function editList()
	{
		
	}
	public function changeDate($date)
	{ 
		$dates = explode("/", $date);
		$temp = trim( trim(@$dates[2]).'-'.trim(@$dates[0]).'-'.trim(@$dates[1])); 
		
		return $temp;
	}
	public function index()
	{
		return $this->redirect(array('action'=>'listing'));
	}

	
}
