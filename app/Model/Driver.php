<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Driver
 *
 * @author Miguel
 */
class Driver extends AppModel{
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el nombre.'
            )
        ),
        'value' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el valor.'
            )
        ),
        'id_user' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el usuario.'
            )
        ),
        'id_role' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el rol.'
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
