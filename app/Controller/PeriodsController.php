<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PeriodsController
 *
 * @author Miguel
 */
App::import('Controller', 'Users');

class PeriodsController extends AppController{
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        //$this->Auth->allow('add', 'logout');
        $this->Auth->deny('*'); 
    }
    
    public function index() {
        //$this->Role->recursive = 0;
        $this->set('periods', $this->paginate());
        
        $this->loadModel('User');
        $options1 = $this->User->find('all');
        $this->set('options1',$options1);
    }

    public function view($id = null) {
        $this->Period->id = $id;
        if (!$this->Period->exists()) { 
            throw new NotFoundException(__('Periodo incorrecto'));
        }
        $this->set('period', $this->Period->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Period->create();
            if ($this->Period->save($this->request->data)) {
                $this->Session->setFlash(__('El periodo ha sido registrado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('El periodo no ha sido registrado. Por favor, intente denuevo.')
            );
        }
        $this->loadModel('User');
        $options = $this->User->find('all');
        $this->set('options',$options);
    }

    public function edit($id = null) {
        $this->Period->id = $id;
        if (!$this->Period->exists()) {
            throw new NotFoundException(__('Periodo Incorrecto'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Period->save($this->request->data)) {
                $this->Session->setFlash(__('El periodo ha sido guardado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('El periodo no ha sido registrado. Por favor, intente denuevo.')
            );
        } else {
            $this->request->data = $this->Period->read(null, $id);
            unset($this->request->data['User']['password']);
        }
        $this->loadModel('User');
        $options = $this->User->find('all');
        $this->set('options',$options);
    }

    public function delete($id = null) {
        $this->Period->id;
        $this->Period->delete($id);
        $this->Session->setFlash('Se ha borrado el periodo.');
        $this->redirect(array('action'=>'index'));
    }
}
