<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of rolesController
 *
 * @author Miguel
 */
class RolesController extends AppController{
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        //$this->Auth->allow('add', 'logout');
        $this->Auth->deny('*'); 
    }
    
    public function index() {
        //$this->Role->recursive = 0;
        $this->set('roles', $this->paginate());
    }

    public function view($id = null) {
        $this->Role->id = $id;
        if (!$this->Role->exists()) { 
            throw new NotFoundException(__('Rol incorrecto'));
        }
        $this->set('role', $this->Role->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Role->create();
            if ($this->Role->save($this->request->data)) {
                $this->Session->setFlash(__('El Rol ha sido registrado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('El Rol no puede ser registrado. Por favor, intente denuevo.')
            );
        }
        
    }

    public function edit($id = null) {
        $this->Role->id = $id;
        if (!$this->Role->exists()) {
            throw new NotFoundException(__('Rol incorrecto'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Role->save($this->request->data)) {
                $this->Session->setFlash(__('El Rol ha sido guardado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('El Rol no puede ser editado. Por favor, intente denuevo.')
            );
        } else {
            $this->request->data = $this->Role->read(null, $id);
            unset($this->request->data['User']['password']);
        }
         
    }

    public function delete($id = null) {
        $this->Role->id;
        $this->Role->delete($id);
        $this->Session->setFlash('Se ha borrado el usuario.');
        $this->redirect(array('action'=>'index'));
    }
}