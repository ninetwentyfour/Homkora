<?php
class TimersController extends AppController {

	var $name = 'Timers';
	var $paginate = array('limit' => 10);
	
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    //$this->Auth->allowedActions = array('*');
	}

	function index() {
		$this->layout = 'timers';
		$this->Timer->recursive = 0;
		$this->set('timers', $this->paginate());
	}

	function view($id = null) {
		$this->layout = 'timers';
		if (!$id) {
			$this->Session->setFlash(__('Invalid timer', true));
			$this->redirect(array('action' => 'index'));
		}
		$timer = $this->Timer->read(null, $id);
		$this->set('timer', $timer);
		//check timer belongs to user or admin
		if($timer['Timer']['user_id']!=$_SESSION['Auth']['User']['id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash(__('Invalid timer', true));
			$this->redirect(array('action' => 'index'));
		}
	}

	function add() {
		$this->layout = 'timers';
		if (!empty($this->data)) {
			$this->Timer->create();
			if ($this->Timer->save($this->data)) {
				$this->Session->setFlash(__('The timer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timer could not be saved.', true));
			}
		}
		$projects = $this->Timer->Project->find('list', array('conditions' => array('Project.user_id' => $_SESSION['Auth']['User']['id'])));
		$this->set(compact('projects'));
	}

	function edit($id = null) {
		$this->layout = 'timers';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid timer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Timer->save($this->data)) {
				$this->Session->setFlash(__('The timer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timer could not be saved.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Timer->read(null, $id);
			//check timer belongs to user or admin
			if($this->data['Timer']['user_id']!=$_SESSION['Auth']['User']['id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
				$this->Session->setFlash(__('Invalid timer', true));
				$this->redirect(array('action' => 'index'));
			}
		}
		$projects = $this->Timer->Project->find('list', array('conditions' => array('Project.user_id' => $_SESSION['Auth']['User']['id'])));
		$this->set(compact('projects'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for timer', true));
			$this->redirect(array('action'=>'index'));
		}
		//check timer belongs to user or admin
		$userTimer = $this->Timer->read(null, $id);
		if($userTimer['Timer']['user_id']!=$_SESSION['Auth']['User']['id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash(__('Invalid timer', true));
			$this->redirect(array('action' => 'index'));
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