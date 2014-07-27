<?php
class User extends AppModel {
    public $name = 'User';
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Preencha o usuário'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Preencha a senha'
            )
        )
    );

   public function beforeSave($options = array()) {
       if (isset($this->data[$this->alias]['password'])) {
           $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
       }
       return true;
   }
}