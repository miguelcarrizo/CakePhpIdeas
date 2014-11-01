<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Role
 *
 * @author Miguel
 */
class Role extends AppModel{
    public $validate = array(
        'role_name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el Nombre del Rol'
            )
        ),
        'role_status' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el estado del Rol'
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
