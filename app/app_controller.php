<?php
class AppController extends Controller {
    var $components = array('Acl', 'Auth', 'Session','Email');
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
    }
	function entityName(){
		$user = $this->Auth->user();
		if($user!=null){
			$actual_user = $this->User->findByEmail($user['User']['email']);
			// debug($actual_user);
			return $actual_user['Group']['name'];
		}
	}
}
?>