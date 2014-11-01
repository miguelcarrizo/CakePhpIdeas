<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Period
 *
 * @author Miguel
 */
class Period extends AppModel{
    public $validate = array(
        'iniciation_date' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere la fecha de iniciación'
            )
        ),
        'final_date' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere la fecha de termino'
            )
        ),
        'id_user' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el nombre del Usuario'
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
