<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of viewIdeas
 *
 * @author Miguel
 */
class Ideas extends AppModel{
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el nombre'
            )
        ),
        'aprox_value' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el valor'
            )
        ),
        'van' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el van'
            )
        ),
        'tir' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el tir'
            )
        ),
        'area' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere la area a la cual va enfocada la idea'
            )
        ),
        'id_user' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el usuario'
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
