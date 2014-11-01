<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomesController
 *
 * @author Miguel
 */
class HomesController extends AppController{
    public function home(){
            $this->loadModel('User');
            $totalUsuarios = $this->User->find('count');
            $this->set('totalUsuarios',$totalUsuarios);
            
            $this->loadModel('Driver');
            $totalDrivers = $this->Driver->find('count');
            $this->set('totalDrivers',$totalDrivers);
            
            $this->loadModel('Idea');
            $totalIdeas = $this->Idea->find('count');
            $this->set('totalIdeas',$totalIdeas);
            
        }
}
