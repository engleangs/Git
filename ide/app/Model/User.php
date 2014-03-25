<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends AppModel
{   
	var $name = 'User';
	var $useTable ='users';
	var $primaryKey ='user_id';

    public function beforeSave($options = array()) 
    {
        
    /* password hashing */    
    if (isset($this->data[$this->alias]['user_password'])) 
    {
        $passwordHasher = new SimplePasswordHasher(array('hashType'=>'sha256'));
        $hashedPassword = $passwordHasher->hash(
                $this->data['User']['user_password']
            );
        $this->data['User']['user_password'] = $hashedPassword;
        //$this->data[$this->alias]['user_password'] = AuthComponent::password($this->data[$this->alias]['user_password']);
    }
        return parent::beforeSave($options);
    }
    var $validate = array(
        'user_id' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter khet code.' 
        ),
        'user_name_en' => array(
            'rule' => 'notEmpty',
            'message' => 'Please enter khet name in english.' 
        ) 
    );
}
?>