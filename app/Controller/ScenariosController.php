<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ScenariosController
 *
 * @author Miguel
 */
App::import('Controller', 'Users');
App::import('Controller', 'Drivers');
App::import('Controller', 'Ideas');

class ScenariosController extends AppController{
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        //$this->Auth->allow('add', 'logout');
        $this->Auth->deny('*'); 
    }
    
    public function index() {
        //$this->Role->recursive = 0;
        $this->set('scenarios', $this->paginate());
        
        $this->loadModel('Driver');
        $optionsDrivers = $this->Driver->find('all');
        $this->set('optionsDrivers',$optionsDrivers);
        
        $this->loadModel('Idea');
        $optionsIdeas = $this->Idea->find('all');
        $this->set('optionsIdeas',$optionsIdeas);
    }
    public function categorizacion(){
        $this->set('scenarios', $this->paginate());
        
        
        $this->loadModel('Driver');
        $optionsDrivers = $this->Driver->find('all');
        $this->set('optionsDrivers',$optionsDrivers);
        
        $this->loadModel('Idea');
        $optionsIdeas = $this->Idea->find('all');
        $this->set('optionsIdeas',$optionsIdeas);
        
        $this->loadModel('DriverRating');
        $options2 = $this->DriverRating->find('all');
        $this->set('options2',$options2);
    }

    public function view($id = null) {
        $this->Scenario->id = $id;
        if (!$this->Scenario->exists()) { 
            throw new NotFoundException(__('Escenario incorrecto'));
        }
        $this->set('scenario', $this->Scenario->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Scenario->create();
            if ($this->Scenario->save($this->request->data)) {
                $this->Session->setFlash(__('El Escenario ha sido registrado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('El Escenario no ha sido registrado. Por favor, intente denuevo.')
            );
        }
        $this->loadModel('Driver');
        $optionsDrivers = $this->Driver->find('all');
        $this->set('optionsDrivers',$optionsDrivers);
        
        $this->loadModel('Idea');
        $optionsIdeas = $this->Idea->find('all');
        $this->set('optionsIdeas',$optionsIdeas);
    }

    public function edit($id = null) {
        $this->Scenario->id = $id;
        if (!$this->Scenario->exists()) {
            throw new NotFoundException(__('Escenario Incorrecto'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Scenario->save($this->request->data)) {
                $this->Session->setFlash(__('El Escenario ha sido guardado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('El Escenario no ha sido registrado. Por favor, intente denuevo.')
            );
        } else {
            $this->request->data = $this->Scenario->read(null, $id);
            unset($this->request->data['User']['password']);
        }
        $this->loadModel('Driver');
        $optionsDrivers = $this->Driver->find('all');
        $this->set('optionsDrivers',$optionsDrivers);
        
        $this->loadModel('Idea');
        $optionsIdeas = $this->Idea->find('all');
        $this->set('optionsIdeas',$optionsIdeas);
    }

    public function delete($id = null) {
        $this->Scenario->id;
        $this->Scenario->delete($id);
        $this->Session->setFlash('Se ha borrado el Escenario.');
        $this->redirect(array('action'=>'index'));
    }
}
