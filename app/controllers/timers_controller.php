<?php
class TimersController extends AppController {

	var $name = 'Timers';
	var $paginate = array('limit' => 10);
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('*');
	}

	function index() {
		$this->Timer->recursive = 0;
		$this->set('timers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid timer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('timer', $this->Timer->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Timer->create();
			if ($this->Timer->save($this->data)) {
				$this->Session->setFlash(__('The timer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timer could not be saved. Please, try again.', true));
			}
		}
		$projects = $this->Timer->Project->find('list', array('conditions' => array('Project.user_id' => $_SESSION['Auth']['User']['id'])));
		$this->set(compact('projects'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid timer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Timer->save($this->data)) {
				$this->Session->setFlash(__('The timer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Timer->read(null, $id);
		}
		$projects = $this->Timer->Project->find('list', array('conditions' => array('Project.user_id' => $_SESSION['Auth']['User']['id'])));
		$this->set(compact('projects'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for timer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Timer->delete($id)) {
			$this->Session->setFlash(__('Timer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Timer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>