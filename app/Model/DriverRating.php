<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DriverRating
 *
 * @author Miguel
 */
class DriverRating extends AppModel{
    public $validate = array(
        'rating' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Se requiere el Nombre rating'
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
