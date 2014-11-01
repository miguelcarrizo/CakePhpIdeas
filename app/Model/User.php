<?php

// app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    public $validate = array(
        'rut' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el Rut'
            )
        ),
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el nombre del Usuario'
            )
        ),
        'userlastname' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el aprellido del usuario del Usuario'
            )
        ),
        'user_email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el correo del Usuario'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere la contraseña'
            )
        )
    );
    
    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }
}
?>