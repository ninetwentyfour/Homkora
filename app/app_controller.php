<?php
class AppController extends Controller {
    var $components = array('Acl', 'Auth', 'Session','Email','Security','RequestHandler');
    var $helpers = array('Html', 'Form', 'Session', 'Cycle','Cache');
	var $persistModel = true;
	var $cacheAction = array('view' => array('callbacks' => true, 'duration' => '1 hour'),'profile' => array('callbacks' => true, 'duration' => '2 hours'));
	var $view = 'Haml';
	
    function beforeFilter() {
		//check for api calls
		$this->__checkAPI();
		
        //Configure AuthComponent
		// $this->Auth->actionPath = 'controllers/';
		// 		$this->Auth->allowedActions = array('display','activate','logout','publicAdd');
		//         $this->Auth->authorize = 'actions';
		//         $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		//         $this->Auth->logoutRedirect = '/login';
		//         $this->Auth->loginRedirect = array('controller' => 'projects', 'action' => 'index');

		//logable
		// if(isset($this->Session)){
		// 	    	if (sizeof($this->uses) && $this->{$this->modelClass}->Behaviors->attached('Logable')) {
		// 				$this->{$this->modelClass}->setUserData($this->Session->read('Auth'));
		// 	    	}
		// 		}
		
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

	function beforeRender(){
		if ($this->action == 'profile') {
			$gravatar2 = $this->get_gravatar($_SESSION['Auth']['User']['email'],'80');
			$this->set('gravatar2', $gravatar2);
		}
		if(isset($_SESSION['Auth']['User'])){
			$gravatar = $this->get_gravatar($_SESSION['Auth']['User']['email'],'20');
			$this->set('gravatar', $gravatar);
		}
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
	
	/**
	 * Get either a Gravatar URL or complete image tag for a specified email address.
	 *
	 * @param string $email The email address
	 * @param string $s Size in pixels, defaults to 80px [ 1 - 512 ]
	 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
	 * @param boole $img True to return a complete IMG tag False for just the URL
	 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
	 * @return String containing either just a URL or a complete image tag
	 * @source http://gravatar.com/site/implement/images/php/
	 */
	function get_gravatar( $email, $s = 80, $d = 'identicon', $r = 'pg', $img = true, $atts = array() ) {
		$url = 'http://www.gravatar.com/avatar/';
		$url .= md5( strtolower( trim( $email ) ) );
		$url .= "?s=$s&d=$d&r=$r";
		if ( $img ) {
			$url = '<img align="left" style="border:1px solid #444;margin:0px 5px 0px 0px;" src="' . $url . '"';
			foreach ( $atts as $key => $val )
				$url .= ' ' . $key . '="' . $val . '"';
			$url .= ' />';
		}
		
		return $url;
	}
	
	//check for partner api key for api access
	function __checkAPI(){
		if(isset($this->params['url']['partner'])){ //if partner param for url is set
			$this->loadModel('ApiKey'); 
			$tag = $this->params['url']['partner'];
			$api = $this->ApiKey->findByKey($tag); // see if that key exists in the db
			$this->loadModel('User'); 
			$user = $this->User->findById($api['ApiKey']['user_id']);
			if($api){
	    		//write a user to the session for authentication
	    		$this->Session->write('Auth.User.id', $user['User']['id']);
	    		$this->Session->write('Auth.User.email', $user['User']['email']);
	    		$this->Session->write('Auth.User.username', $user['User']['username']);
	    		$this->Session->write('Auth.User.group_id', $user['User']['group_id']);
				$this->Session->write('Auth.User.active', $user['User']['active']);
	    		$this->Session->write('Auth.User.created', $user['User']['created']);
	    		$this->Session->write('Auth.User.modified', $user['User']['modified']);
			}
       	}
	}
	
}
?>