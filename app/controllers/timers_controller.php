<?php
class TimersController extends AppController {

	var $name = 'Timers';
	var $paginate = array('limit' => 6);
	
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    //$this->Auth->allowedActions = array('*');
		if ($this->RequestHandler->isXml()){
			
		}else{
			$this->layout = 'timers';
		}
	}
	/**
	* Get Timers For display in index
	*
	* @return $timers array for view
	*/
	function index() {
		$this->loadModel('Project');
		if ($this->RequestHandler->isXml()){
			$timers = $this->Timer->recursive = -1;
		}else{
			$timers = $this->paginate('Timer');
		}
		$this->set('timers', $timers);
	}
	/**
	* Get single Timer For display in view
	*
	* @return $timer array for view
	*/
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid timer', true));
			$this->redirect(array('action' => 'index'));
		}
		$timer = $this->Timer->read(array('_id','time' ,'title','description','created','modified','user_id'), $id);
		$this->set('timer', $timer);
		//check timer belongs to user or admin
		if($timer['Timer']['user_id']!=$_SESSION['Auth']['User']['_id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash(__('Invalid timer', true));
			$this->redirect(array('action' => 'index'));
		}
	}
	/**
	* Add a Timer
	*
	* @return set flash The timer has been saved
	*/
	function add() {
		if (!empty($this->data)) {
			$this->loadModel('Project');
			$params = array(
				'conditions' => array('_id' => (string)$this->data['Timer']['project_id'])
			);
			$project = $this->Project->find('all', $params);
			$this->data['Timer']['project_name'] = $project[0]['Project']['title'];
			$this->Timer->create();
			if ($this->Timer->save($this->data)) {
				$this->Session->setFlash(__('The timer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timer could not be saved.', true));
			}
		}
		$this->loadModel('Project');
		$params = array(
			'conditions' => array('user_id' => (string)$_SESSION['Auth']['User']['_id'])
		);
		$projects = $this->Project->find('list', $params);
		$this->set(compact('projects'));
	}
	/**
	* Edit a Timer
	*
	* @return set flash The timer has been saved
	*/
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
				$this->Session->setFlash(__('The timer could not be saved.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Timer->read(null, $id);
			//check timer belongs to user or admin
			if($this->data['Timer']['user_id']!=$_SESSION['Auth']['User']['_id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
				$this->Session->setFlash(__('Invalid timer', true));
				$this->redirect(array('action' => 'index'));
			}
		}
		$this->loadModel('Project');
		$params = array(
			'conditions' => array('user_id' => (string)$_SESSION['Auth']['User']['_id'])
		);
		$projects = $this->Project->find('list', $params);
		$this->set(compact('projects'));
	}
	/**
	* Delete a Timer
	*
	* @return set flash Timer deleted
	*/
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for timer', true));
			$this->redirect(array('action'=>'index'));
		}
		//check timer belongs to user or admin
		$userTimer = $this->Timer->read(null, $id);
		if($userTimer['Timer']['user_id']!=$_SESSION['Auth']['User']['_id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
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