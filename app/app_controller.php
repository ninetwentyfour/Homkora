<?php
class AppController extends Controller {
    var $components = array('Acl', 'Auth', 'Session','Email','Security');
    var $helpers = array('Html', 'Form', 'Session', 'Cycle','Cache');
	var $persistModel = true;
	var $cacheAction = array('view' => array('callbacks' => true, 'duration' => 60));

    function beforeFilter() {
        //Configure AuthComponent
		$this->Auth->actionPath = 'controllers/';
		$this->Auth->allowedActions = array('display','activate','logout','publicAdd');
        $this->Auth->authorize = 'actions';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = '/login';
        $this->Auth->loginRedirect = array('controller' => 'projects', 'action' => 'index');

		//logable
		if(isset($this->Session)){
	    	if (sizeof($this->uses) && $this->{$this->modelClass}->Behaviors->attached('Logable')) {
				$this->{$this->modelClass}->setUserData($this->Session->read('Auth'));
	    	}
		}
		
		//security compnent
		if ($this->action == 'addTime') {
			// don't check this form. this is ajax on project view
			$this->Security->validatePost = false;
		}
		$this->Security->blackHoleCallback='invalidSecurity';
		//must ignore the time field in edit and add timers. these are hidden and supposed to change
		$this->Security->disabledFields = array('time'); 
		$this->Security->requireAuth('delete', 'add','edit','publicAdd');
    }

	//this gets the group of the current user to check in admin/acl to see if they have permission
	function entityName(){
		//the loadModel way 
		$this->loadModel('User'); 
		$user = $this->Auth->user();
		if($user!=null){
			$actual_user = $this->User->findByUsername($user['User']['username']);
			debug($actual_user['Group']['name']);
			return $actual_user['Group']['name'];
		}
	}
	
	//if security is invalid do this 
	function invalidSecurity(){
		$this->Session->setFlash(__('There was a security problem with your request. Please try again.', true));
		$this->redirect('/');
	}
}
?>