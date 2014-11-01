<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of viewIdeasController
 *
 * @author Miguel
 */
App::import('Controller', 'Users');
class IdeasController  extends AppController{
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        //$this->Auth->allow('add', 'logout');
        $this->Auth->deny('*'); 
    }
    
    public function index() {
        //$this->Role->recursive = 0;
        $this->set('ideas', $this->paginate());
        
        $this->loadModel('User');
        $options1 = $this->User->find('all');
        $this->set('options1',$options1);
    }

    public function view($id = null) {
        $this->Idea->id = $id;
        if (!$this->Idea->exists()) { 
            throw new NotFoundException(__('Idea incorrecta'));
        }
        $this->set('idea', $this->Idea->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Idea->create();
            if ($this->Idea->save($this->request->data)) {
                $this->Session->setFlash(__('La idea ha sido registrada'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('La idea no ha sido registrada. Por favor, intente denuevo.')
            );
        }
        $this->loadModel('User');
        $options = $this->User->find('all');
        $this->set('options',$options);
    }

    public function edit($id = null) {
        $this->Idea->id = $id;
        if (!$this->Idea->exists()) {
            throw new NotFoundException(__('Idea incorrecta'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Idea->save($this->request->data)) {
                $this->Session->setFlash(__('La idea ha sido guardada'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('La idea no ha sido registrada. Por favor, intente denuevo.')
            );
        } else {
            $this->request->data = $this->Idea->read(null, $id);
            unset($this->request->data['User']['password']);
        }
        $this->loadModel('User');
        $options = $this->User->find('all');
        $this->set('options',$options);
    }

    public function delete($id = null) {
        $this->Idea->id;
        $this->Idea->delete($id);
        $this->Session->setFlash('Se ha borrado la idea.');
        $this->redirect(array('action'=>'index'));
    }
}
