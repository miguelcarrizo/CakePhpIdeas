<?php
// app/Controller/UsersController.php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
    public $helpers = array('Js' => array('Jquery'));
    public $components = array('RequestHandler');

    public function beforeFilter() {
    parent::beforeFilter();
    // Allow users to register and logout.
    //$this->Auth->allow('add', 'logout');
    //$this->Auth->allow('add', 'logout');
    $this->Auth->deny('*'); 
}
    
    public function login() {
    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirect(array('controller'=>'Homes','action'=>'home')));
        }
        $this->Session->setFlash(__('Invalid username or password, try again'));
    }
}

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) { 
            throw new NotFoundException(__('Usuario incorrecto'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario ha sido registrado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('El usuario no puede ser registrado. Por favor, intente denuevo.')
            );
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario incorrecto'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('El usuario no puede ser editado. Por favor, intente denuevo.')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
         
    }

    public function delete($id = null) {
        $this->User->id;
        //print_r($_REQUEST);
        //echo 'id_rut'.$id_rut;
        //echo 'id'.$id;
        //die();
        $this->User->delete($id);
        $this->Session->setFlash('Se ha borrado el usuario.');
        $this->redirect(array('action'=>'index'));
    }

}
?>