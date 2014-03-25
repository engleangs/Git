<?php 
class UsersController extends AppController

{

	public $helpers 	= 	array('Html','Form');	

	public $components 	= 	array('Session',
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

	public $context 		= 'User';

	var $name="Users";



	public function setCondition()

	{

			parent::setCondition();

			if($filter = $this->Session->read('Filter.search'))

			{

				$this->conditionFilter = array(									

									'OR'=>array(

										'user_name_en LIKE '=>'%'.$filter.'%',

										'user_username LIKE '=>'%'.$filter.'%',										

										'user_name_kh LIKE '=>'%'.$filter.'%',																				

										)

											);

			}

			$this->paginate['conditions'] = $this->conditionFilter;



	}

	public function login()

	{

		if ($this->request->is('post')) 

		{

            if ($this->Auth->login()) 

            {

                return $this->redirect($this->Auth->redirect());

            }

            $this->Session->setFlash(__('Invalid username or password, try again'));

        }

		 $this->layout = 'login';

	}

	public function edit($id=0)

	{

		if(!$id)

		{

			throw new NotFoundException(__('Invalid '.$this->getContext()));

		}

		$model = $this->getModel();

	

		$data = $model->findByuser_id($id);

		$this->set('data',$data);	

	}

	public function beforeFilter()

	{

		$this->Auth->allow(array('add','save'));



		parent::beforeFilter();

		

	}

	public function logout() {

		return $this->redirect($this->Auth->logout());

	}



	public function save($id=0)

	{

			 $userId = $this->Session->read('Auth.User.user_id');

		    if($id===0)

		    {

		    	$this->request->data['created_by'] = $userId;

		    	$this->User->create();		

				if($this->User->save($this->request->data))

					{

					

					$this->Session->setFlash(

								__('User has been saved')

									,'default'

									, array('class'=>'alert alert-dismissable alert-success '));

	    		 	$id  = $this->User->getLastInsertId();
					$this->request->data['id'] = $id;
					$logMessage = json_encode($this->request->data);
					$this->generateLog($logMessage,' CREATE NEW :'.$id);
	    		 	$this->redirect(array('action' => 'listing'));

				}



		    	

		    } 

		    else

			{		

				$this->User->id=$id;
				$this->request->data['modified_by'] = $userId;
				$keyName = $this->User->primaryKey;
				$obj 	= $this->User->find('all',array(
					'conditions'=>array($keyName=>$id)
				));
				if(!count($obj))
				{
					throw new NotFoundException();
					
				}
				$logMessage = json_encode($obj);
				$this->generateLog($logMessage,' EDIT :'.$id);
				if($this->request->data['user_password']=='') unset($this->request->data['user_password']);

				if($this->User->save($this->request->data))

				{

					$this->Session->setFlash(

										__('User has been saved')

											,'default'

											, array('class'=>'alert alert-dismissable alert-success '));

			    		 	$this->redirect(array('action' => 'listing'));

						

		    	}

					

			}

		    

	}

	public function saveprofile($id=0)

	{

			

				$this->User->id=$id;

				if($this->request->data['user_password']=='') unset($this->request->data['user_password']);

				if($this->User->save($this->request->data))

				{

					$user = $this->User->findByuser_id($id);

		    	

		    	$this->Session->write('Auth.User',$user['User']);

					$this->Session->setFlash(

										__('User has been saved')

											,'default'

											, array('class'=>'alert alert-dismissable alert-success '));

			    		 	return $this->redirect(array('action' => 'editProfile',$id));

						

		    	}

		    	return $this->redirect(array('action' => 'editProfile',$id));





	}

	public function editProfile($id=0) 

	{

		if(!$id)

		{

			throw new NotFoundException(__('Invalid '.$this->getContext()));

		}

		$model = $this->getModel();

	

		$data = $model->findByuser_id($id);

		$this->set('data',$data);	

	}

	public function checkExistingUserId()
	{
		$user_id=$this->request->data['code'];
		$data=$this->User->findByuser_id($user_id);

		$st='';
		if(count($data))
		{
			$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated User Code. Try again!').'</div>';
		}
		else
		{
			$st.='';
		}
		echo $st;
		exit();
	}
	public function checkExistingUserName()
	{
		$user_name=$this->request->data['user_name'];
		$data=$this->User->find('all', 
				array(
					'conditions'=>array('User.user_username'=>$user_name))
				);

		$st='';
		if(count($data))
		{
			$st.='<div class="alert alert-dismissable alert-danger">'.__('Duplicated Username. Try again!').'</div>';
		}
		else
		{
			$st.='';
		}
		echo $st;
		exit();
	}

}

 ?>