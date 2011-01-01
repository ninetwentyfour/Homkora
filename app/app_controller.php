<?php
class AppController extends Controller {
    var $components = array('Acl', 'Auth', 'Session','Email','Security');
    var $helpers = array('Html', 'Form', 'Session', 'Cycle');
	var $uses = array('User');

    function beforeFilter() {
        //Configure AuthComponent
		$this->Auth->actionPath = 'controllers/';
		$this->Auth->allowedActions = array('display','activate','logout','publicAdd');
        $this->Auth->authorize = 'actions';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'projects', 'action' => 'index');
		//logable
		if(isset($this->Session)){
	    	if (sizeof($this->uses) && $this->{$this->modelClass}->Behaviors->attached('Logable')) {
				$this->{$this->modelClass}->setUserData($this->Session->read('Auth'));
	    	}
		}
		//security compnent
		if ($this->action == 'addTime') {
		$this->Security->validatePost = false;
		}
		//$this->Security->requirePost('delete', 'add','edit');
		$this->Security->blackHoleCallback='invalidSecurity';
		$this->Security->requireAuth('delete', 'add','edit');
    }
	function entityName(){
		$user = $this->Auth->user();
		if($user!=null){
			$actual_user = $this->User->findByUsername($user['User']['username']);
			debug($actual_user['Group']['name']);
			return $actual_user['Group']['name'];
		}
	}
	
	function invalidSecurity(){
		$this->Session->setFlash(__('There was a security problem with your request. Please try again.', true));
		$this->redirect(array('controller'=>'projects','action' => 'index'));
	}
}
?>