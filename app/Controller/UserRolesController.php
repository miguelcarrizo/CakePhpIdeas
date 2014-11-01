<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserRolesController
 *
 * @author Miguel
 */
App::import('Controller', 'Roles');
App::import('Controller', 'Users');

class UserRolesController extends AppController{
     public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        //$this->Auth->allow('add', 'logout');
        $this->Auth->deny('*'); 
    }
    
    public function index() {
        //$this->Role->recursive = 0;
        $this->set('userRoles', $this->paginate());
        $this->loadModel('Role');
        $options = $this->Role->find('all');
        $this->set('options',$options);
        
        $this->loadModel('User');
        $options1 = $this->User->find('all');
        $this->set('options1',$options1);
        
    }

    public function view($id = null) {
        $this->UserRole->id = $id;
        if (!$this->UserRole->exists()) { 
            throw new NotFoundException(__('Relación incorrecta'));
        }
        $this->set('userRole', $this->UserRole->read(null, $id));
    } 

    public function add() {
        if ($this->request->is('post')) {
            $this->UserRole->create();
            if ($this->UserRole->save($this->request->data)) {
                $this->Session->setFlash(__('La relación ha sido registrada.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('La relación no pudo ser registrada. Por favor, intente denuevo.')
            );
        }
        $this->loadModel('Role');
        $options = $this->Role->find('all');
        $this->set('options',$options);
        
        $this->loadModel('User');
        $options1 = $this->User->find('all');
        $this->set('options1',$options1);
    }

    public function edit($id = null) {
        $this->UserRole->id = $id;
        if (!$this->UserRole->exists()) {
            throw new NotFoundException(__('Relación incorrecta.'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->UserRole->save($this->request->data)) {
                $this->Session->setFlash(__('La relación ha sido registrada.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('La relación no pudo ser registrada. Por favor, intente denuevo.')
            );
        } else {
            $this->request->data = $this->UserRole->read(null, $id);
            unset($this->request->data['User']['password']);
        }
        $this->loadModel('Role');
        $options = $this->Role->find('all');
        $this->set('options',$options);
        
        $this->loadModel('User');
        $options1 = $this->User->find('all');
        $this->set('options1',$options1);
    }

    public function delete($id = null) {
        $this->UserRole->id;
        $this->UserRole->delete($id);
        $this->Session->setFlash('Se ha borrado la relación.');
        $this->redirect(array('action'=>'index'));
    }
}
