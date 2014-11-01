<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Scenario
 *
 * @author Miguel
 */
class Scenario extends AppModel{
    public $validate = array(
        'id_idea' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere la idea'
            )
        ),
        'id_driver' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el impulsor'
            )
        ),
        'value' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el valor'
            )
        ),
        'status' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el estado'
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
