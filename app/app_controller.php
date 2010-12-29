<?php
class AppController extends Controller {
    var $components = array('Acl', 'Auth', 'Session');
    var $helpers = array('Html', 'Form', 'Session', 'Cycle');

    function beforeFilter() {
        //Configure AuthComponent
	$this->Auth->actionPath = 'controllers/';
	$this->Auth->allowedActions = array('display','build_acl','logout','publicAdd');
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
}
?>