<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DriversController
 *
 * @author Miguel
 */

App::import('Controller', 'Periods');
App::import('Controller', 'Users');
App::import('Controller', 'DriverRatings');

class DriversController extends AppController{
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        //$this->Auth->allow('add', 'logout');
        $this->Auth->deny('*'); 
    }
    
    public function index() {
        //$this->Role->recursive = 0;
        $this->set('drivers', $this->paginate());
        
        $this->loadModel('User');
        $options1 = $this->User->find('all');
        $this->set('options1',$options1);
        
        $this->loadModel('DriverRating');
        $options3 = $this->DriverRating->find('all');
        $this->set('options3',$options3);
        
        $this->loadModel('Period');
        $options4 = $this->Period->find('all');
        $this->set('options4',$options4);
    }

    public function view($id = null) {
        $this->Driver->id = $id;
        if (!$this->Driver->exists()) { 
            throw new NotFoundException(__('Relación incorrecta'));
        }
        $this->set('driver', $this->Driver->read(null, $id));
    } 

    public function add() {
        if ($this->request->is('post')) {
            $this->Driver->create();
            if ($this->Driver->save($this->request->data)) {
                $this->Session->setFlash(__('La relación ha sido registrada.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('La relación no pudo ser registrada. Por favor, intente denuevo.')
            );
        }
        $this->loadModel('Period');
        $options = $this->Period->find('all');
        $this->set('options',$options);
        
        $this->loadModel('User');
        $options1 = $this->User->find('all');
        $this->set('options1',$options1);
        
        $this->loadModel('DriverRating');
        $options2 = $this->DriverRating->find('all');
        $this->set('options2',$options2);
    }

    public function edit($id = null) {
        $this->Driver->id = $id;
        if (!$this->Driver->exists()) {
            throw new NotFoundException(__('Relación incorrecta.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Driver->save($this->request->data)) {
                $this->Session->setFlash(__('La relación ha sido registrada.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('La relación no pudo ser registrada. Por favor, intente denuevo.')
            );
        } else {
            $this->request->data = $this->Driver->read(null, $id);
            unset($this->request->data['User']['password']);
        }
        $this->loadModel('Period');
        $options = $this->Period->find('all');
        $this->set('options',$options);
        
        $this->loadModel('User');
        $options1 = $this->User->find('all');
        $this->set('options1',$options1);
        
        $this->loadModel('DriverRating');
        $options2 = $this->DriverRating->find('all');
        $this->set('options2',$options2);
    }

    public function delete($id = null) {
        $this->Driver->id;
        $this->Driver->delete($id);
        $this->Session->setFlash('Se ha borrado la relación.');
        $this->redirect(array('action'=>'index'));
    }
    public function valoracion(){
        $this->set('drivers', $this->paginate());
        
        $this->loadModel('User');
        $options1 = $this->User->find('all');
        $this->set('options1',$options1);
        
        $this->loadModel('DriverRating');
        $options2 = $this->DriverRating->find('all');
        $this->set('options2',$options2);
        
        $this->loadModel('DriverRating');
        $options3 = $this->DriverRating->find('all');
        $this->set('options3',$options3);
        
        $this->loadModel('Period');
        $options4 = $this->Period->find('all');
        $this->set('options4',$options4);
        if ($this->data) {
            App::import('Core', 'sanitize');
            $title = Sanitize::clean($this->Driver['Driver']['value']);

            $this->Driver->id = $this->Driver['Driver']['id'];
            $this->Driver->saveField('title', $title);
            $this->set('posttitle', $title);
        }
    }
}
