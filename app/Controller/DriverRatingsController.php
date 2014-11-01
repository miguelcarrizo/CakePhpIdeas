<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DriverRatingsController
 *
 * @author Miguel
 */
class DriverRatingsController extends AppController{
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        //$this->Auth->allow('add', 'logout');
        $this->Auth->deny('*'); 
    }
    
    public function index() {
        //$this->Role->recursive = 0;
        $this->set('driverRatings', $this->paginate());
    }

    public function view($id = null) {
        $this->DriverRating->id = $id;
        if (!$this->DriverRating->exists()) { 
            throw new NotFoundException(__('valor de driver incorrecto'));
        }
        $this->set('driverRating', $this->DriverRating->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->DriverRating->create();
            if ($this->DriverRating->save($this->request->data)) {
                $this->Session->setFlash(__('El valor de driver ha sido registrado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('El valor de driver no puede ser registrado. Por favor, intente denuevo.')
            );
        }
        
    }

    public function edit($id = null) {
        $this->DriverRating->id = $id;
        if (!$this->DriverRating->exists()) {
            throw new NotFoundException(__('valor de driver incorrecto'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->DriverRating->save($this->request->data)) {
                $this->Session->setFlash(__('El valor de driver ha sido guardado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('La valor de driver no puede ser editado. Por favor, intente denuevo.')
            );
        } else {
            $this->request->data = $this->DriverRating->read(null, $id);
            unset($this->request->data['User']['password']);
        }
         
    }

    public function delete($id = null) {
        $this->DriverRating->id;
        $this->DriverRating->delete($id);
        $this->Session->setFlash('Se ha borrado el valor de driver.');
        $this->redirect(array('action'=>'index'));
    }
}
