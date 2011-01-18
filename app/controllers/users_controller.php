<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Random','SwiftMailer');
	
	function beforeFilter() {
	    parent::beforeFilter();
	    //$this->Auth->autoRedirect = false;
	    $this->Auth->allow(array('userEdit','profile','build_acl','publicAdd','activate'));
	    $user = $this->Auth->user();
	    if($user['User']['group_id'] != '1'){
          if($this->action != 'userEdit' && $this->action != 'profile' && $this->action != 'publicAdd' && $this->action != 'login' && $this->action != 'logout' && $this->action != 'activate'){
            $this->Session->setFlash('That action is not allowed.');
            $this->redirect('/projects/index');
          }
	    }
	}
	
	function login() {
		//if ($this->Session->read('Auth.User')) {
		//	$this->Session->setFlash('You are logged in!');
		//	$this->redirect('/', null, false);
		//}
		if ($this->data) {
			// Use the AuthComponentÕs login action
			if ($this->Auth->login($this->data)) {
				// Retrieve user data
				$params = array('conditions' => array('username' => $this->data['User']['username']));
				$results = $this->User->find('first',$params);
				print_r($results);
				// Check to see if the UserÕs account isnÕt active
				if ($results['User']['active'] == "0") {
					// Uh Oh!
					$this->Session->setFlash('Your account has not been activated yet!');
					//$this->Auth->logout();
					//$this->redirect($this->Auth->logout());
				}
				// Cool, user is active, redirect post login
				else {
				$this->Session->setFlash('Gets here!');
					//$this->redirect('/projects/index');
				}
			}
		}
	}

	function logout() {
	    //Leave empty for now.
		$this->Session->setFlash('Good-Bye');
		$this->redirect($this->Auth->logout());
	}
	
	
	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}
	function publicAdd() {
		if (!empty($this->data)) {
			$this->User->set($this->data);
			if ($this->User->validates()) {
				// it validated logic
				//check user name against db
				$params = array(
         			'conditions' => array('username' => $this->data['User']['username'])
        		);
				$userExists = $this->User->find('all',$params);
				if(isset($userExists[0]['User']['username'])){
				
				}else{
    				$userExists[0]['User']['username'] = '';
				}
				if($userExists[0]['User']['username']==$this->data['User']['username']){
					//if found and matches - dont save and alert user
					$this->Session->setFlash(__('User Name Taken. Please, try again.', true));
				}else{
					//no user found - save it
					$this->User->create();
					if ($this->User->save($this->data)) {
						$this->__sendActivationEmail($this->User->id);
						$this->__createApiKey($this->User->id);
						$this->Session->setFlash(__('Check your email for account verification.', true));
						$this->redirect('/login');
					} else {
						//general problem saving to db
						$this->Session->setFlash(__('There was a problem saving the user. Please, try again.', true));
					}
				}
			} else {
				$this->Session->setFlash(__('Fix Errors Below.', true));
			}
		}
		$this->loadModel('Group');
		$groups = $this->Group->find('list');
		$this->set(compact('groups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function build_acl() {
			if (!Configure::read('debug')) {
				return $this->_stop();
			}
			$log = array();

			$aco =& $this->Acl->Aco;
			$root = $aco->node('controllers');
			if (!$root) {
				$aco->create(array('parent_id' => null, 'model' => null, 'alias' => 'controllers'));
				$root = $aco->save();
				$root['Aco']['id'] = $aco->id; 
				$log[] = 'Created Aco node for controllers';
			} else {
				$root = $root[0];
			}   

			App::import('Core', 'File');
			$Controllers = Configure::listObjects('controller');
			$appIndex = array_search('App', $Controllers);
			if ($appIndex !== false ) {
				unset($Controllers[$appIndex]);
			}
			$baseMethods = get_class_methods('Controller');
			$baseMethods[] = 'build_acl';

			$Plugins = $this->_getPluginControllerNames();
			$Controllers = array_merge($Controllers, $Plugins);

			// look at each controller in app/controllers
			foreach ($Controllers as $ctrlName) {
				$methods = $this->_getClassMethods($this->_getPluginControllerPath($ctrlName));

				// Do all Plugins First
				if ($this->_isPlugin($ctrlName)){
					$pluginNode = $aco->node('controllers/'.$this->_getPluginName($ctrlName));
					if (!$pluginNode) {
						$aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $this->_getPluginName($ctrlName)));
						$pluginNode = $aco->save();
						$pluginNode['Aco']['id'] = $aco->id;
						$log[] = 'Created Aco node for ' . $this->_getPluginName($ctrlName) . ' Plugin';
					}
				}
				// find / make controller node
				$controllerNode = $aco->node('controllers/'.$ctrlName);
				if (!$controllerNode) {
					if ($this->_isPlugin($ctrlName)){
						$pluginNode = $aco->node('controllers/' . $this->_getPluginName($ctrlName));
						$aco->create(array('parent_id' => $pluginNode['0']['Aco']['id'], 'model' => null, 'alias' => $this->_getPluginControllerName($ctrlName)));
						$controllerNode = $aco->save();
						$controllerNode['Aco']['id'] = $aco->id;
						$log[] = 'Created Aco node for ' . $this->_getPluginControllerName($ctrlName) . ' ' . $this->_getPluginName($ctrlName) . ' Plugin Controller';
					} else {
						$aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $ctrlName));
						$controllerNode = $aco->save();
						$controllerNode['Aco']['id'] = $aco->id;
						$log[] = 'Created Aco node for ' . $ctrlName;
					}
				} else {
					$controllerNode = $controllerNode[0];
				}

				//clean the methods. to remove those in Controller and private actions.
				foreach ($methods as $k => $method) {
					if (strpos($method, '_', 0) === 0) {
						unset($methods[$k]);
						continue;
					}
					if (in_array($method, $baseMethods)) {
						unset($methods[$k]);
						continue;
					}
					$methodNode = $aco->node('controllers/'.$ctrlName.'/'.$method);
					if (!$methodNode) {
						$aco->create(array('parent_id' => $controllerNode['Aco']['id'], 'model' => null, 'alias' => $method));
						$methodNode = $aco->save();
						$log[] = 'Created Aco node for '. $method;
					}
				}
			}
			if(count($log)>0) {
				debug($log);
			}
		}

		function _getClassMethods($ctrlName = null) {
			App::import('Controller', $ctrlName);
			if (strlen(strstr($ctrlName, '.')) > 0) {
				// plugin's controller
				$num = strpos($ctrlName, '.');
				$ctrlName = substr($ctrlName, $num+1);
			}
			$ctrlclass = $ctrlName . 'Controller';
			$methods = get_class_methods($ctrlclass);

			// Add scaffold defaults if scaffolds are being used
			$properties = get_class_vars($ctrlclass);
			if (array_key_exists('scaffold',$properties)) {
				if($properties['scaffold'] == 'admin') {
					$methods = array_merge($methods, array('admin_add', 'admin_edit', 'admin_index', 'admin_view', 'admin_delete'));
				} else {
					$methods = array_merge($methods, array('add', 'edit', 'index', 'view', 'delete'));
				}
			}
			return $methods;
		}

		function _isPlugin($ctrlName = null) {
			$arr = String::tokenize($ctrlName, '/');
			if (count($arr) > 1) {
				return true;
			} else {
				return false;
			}
		}

		function _getPluginControllerPath($ctrlName = null) {
			$arr = String::tokenize($ctrlName, '/');
			if (count($arr) == 2) {
				return $arr[0] . '.' . $arr[1];
			} else {
				return $arr[0];
			}
		}

		function _getPluginName($ctrlName = null) {
			$arr = String::tokenize($ctrlName, '/');
			if (count($arr) == 2) {
				return $arr[0];
			} else {
				return false;
			}
		}

		function _getPluginControllerName($ctrlName = null) {
			$arr = String::tokenize($ctrlName, '/');
			if (count($arr) == 2) {
				return $arr[1];
			} else {
				return false;
			}
		}

	/**
	 * Get the names of the plugin controllers ...
	 * 
	 * This function will get an array of the plugin controller names, and
	 * also makes sure the controllers are available for us to get the 
	 * method names by doing an App::import for each plugin controller.
	 *
	 * @return array of plugin names.
	 *
	 */
		function _getPluginControllerNames() {
			App::import('Core', 'File', 'Folder');
			$paths = Configure::getInstance();
			$folder =& new Folder();
			$folder->cd(APP . 'plugins');

			// Get the list of plugins
			$Plugins = $folder->read();
			$Plugins = $Plugins[0];
			$arr = array();

			// Loop through the plugins
			foreach($Plugins as $pluginName) {
				// Change directory to the plugin
				$didCD = $folder->cd(APP . 'plugins'. DS . $pluginName . DS . 'controllers');
				// Get a list of the files that have a file name that ends
				// with controller.php
				$files = $folder->findRecursive('.*_controller\.php');

				// Loop through the controllers we found in the plugins directory
				foreach($files as $fileName) {
					// Get the base file name
					$file = basename($fileName);

					// Get the controller name
					$file = Inflector::camelize(substr($file, 0, strlen($file)-strlen('_controller.php')));
					if (!preg_match('/^'. Inflector::humanize($pluginName). 'App/', $file)) {
						if (!App::import('Controller', $pluginName.'.'.$file)) {
							debug('Error importing '.$file.' for plugin '.$pluginName);
						} else {
							/// Now prepend the Plugin name ...
							// This is required to allow us to fetch the method names.
							$arr[] = Inflector::humanize($pluginName) . "/" . $file;
						}
					}
				}
			}
			return $arr;
		}
		
	/**
         * Send out an activation email to the user.id specified by $user_id
         *  @param Int $user_id User to send activation email to
         *  @return Boolean indicates success
        */
        function __sendActivationEmail($user_id) {
				$user = $this->User->read(null, $user_id);
                //$user = $this->User->find(array('User.id' => $user_id), array('User.email', 'User.username'), null, false);
                if (empty($user)) {
						echo 'WOAH';
                        debug(__METHOD__." failed to retrieve User data for user.id: {$user_id}");
                        return false;
                }

                // Set data for the "view" of the Email
                $this->set('activate_url', 'http://' . env('SERVER_NAME') . '/users/activate/' . $user_id . '/' . $this->User->getActivationHash());
                $this->set('username', $this->data['User']['username']);
               
                //$this->Email->to = $user['User']['email'];
                //$this->Email->subject = env('SERVER_NAME') . ' Ð Please confirm your email address';
                //$this->Email->from = 'noreply@' . env('SERVER_NAME');
                $this->SwiftMailer->template = 'user_confirm';
                //$this->Email->sendAs = 'text';   // you probably want to use both :)   
                //return $this->Email->send();
                $this->SwiftMailer->sendAs = 'text';
                $this->SwiftMailer->smtpType = 'tls';
         	    $this->SwiftMailer->smtpHost = 'smtp.gmail.com';
         	    $this->SwiftMailer->smtpPort = 465;
         	    $this->SwiftMailer->smtpUsername = 'noreply@homkora.com';
         	    $this->SwiftMailer->smtpPassword = '221westwood';
         	    $this->SwiftMailer->from = 'noreply@homkora.com';
         	    $emailData['to'] = $user['User']['email'];
         	    $emailData['from'] = 'noreply@homkora.com';
         	    $emailData['subject'] = 'Homkora - Please confirm your email address';
        		$emailData['body'] = 'To complete your sign up. Please click or copy this link to your browser. '.'http://' . env('SERVER_NAME') . '/users/activate/' . $user_id . '/' . $this->User->getActivationHash();

         	    $this->SwiftMailer->fromName = 'Homkora SignUp';
         	    $this->SwiftMailer->to = $emailData['to'];
         	    $this->set('message', $emailData['body']);
         	    try{
         			if(isset($emailData['subject'])){
         			    $sendResult = $this->SwiftMailer->send('user_confirm',$emailData['subject']);
         			}else{
         			    $sendResult[0] = 'false';
         			}
         			if($sendResult[0]=='false') {
         			    //Add code here to handle the error message
           			    $this->Session->setFlash('There was an error sending your email.');
         			    $this->log("Error sending email");
         			}else{
         			    $this->Session->setFlash('The Email has been successfully sent');
           			}
           			if (isset($this->params['requested'])) {
         			    return $_SESSION['Message']['flash']['message'];
         			}
         			return $sendResult[0];
         	    }
         	    catch(Exception $e) {
         	  		$this->log("Failed to send email: ".$e->getMessage());
           	    }
        }
	
	/**
	* Activates a user account from an incoming link
	*
	*  @param Int $user_id User.id to activate
	*  @param String $in_hash Incoming Activation Hash from the email
	*/
	function activate($user_id = null, $in_hash = null) {
	        $this->User->id = $user_id;
	        if ($this->User->exists() && ($in_hash == $this->User->getActivationHash()))
	        {
	                // Update the active flag in the database
	                $this->User->saveField('active', 1);
               
	                // Let the user know they can now log in!
	                $this->Session->setFlash('Your account has been activated, please log in below');
	                $this->redirect('/login');
	        }
       
	        // Activation failed, render Ô/views/user/activate.ctpÕ which should tell the user.
	}
	
	function userEdit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'profile',$id));
		}
		$user = $this->User->read(null, $id);
		if($user['User']['_id']!=$_SESSION['Auth']['User']['_id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'profile',$id));
		}
		if (!empty($this->data)) {
			//check for password update
			if($this->data['User']['password_1']!=''){
				//check the two password fields match
				if($this->data['User']['password_1']==$this->data['User']['password_2']){
					//hash the password
					$password = $this->Auth->password($this->data['User']['password_1']);
					//save the password field
					$this->User->saveField('password', $password);
				}else{
					$this->Session->setFlash(__('Passwords Didn\'t Match. Try Again.', true));
				}
			}
			//check user name against db
			$params = array(
				'conditions' => array('username' => $this->data['User']['username'])
			);
			$params2 = array(
				'conditions' => array('_id' => $id)
			);
			$userExists = $this->User->find('all',$params);
			$userExistsID = $this->User->find('all',$params2);
			//check that username isnt taken and isnt the old one
			if($userExists[0]['User']['username']==$this->data['User']['username'] && $userExistsID[0]['User']['username']!=$this->data['User']['username']){
				//if found and matches - dont save and alert user
				$this->Session->setFlash(__('User Name Taken. Please, try again.', true));
			}else{
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('The user has been saved', true));
					$this->redirect(array('action' => 'profile',$id));
				} else {
					$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
				}
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		//$groups = $this->User->Group->find('list');
		//$this->set(compact('groups'));
	}

	function profile($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$user = $this->User->read(null, $id);
		$this->loadModel('ApiKey');
		$params = array(
			'conditions' => array('user_id' => (string)$_SESSION['Auth']['User']['_id'])
		);
		$user['User']['ApiKey'] = $this->ApiKey->find('all', $params);
		if($user['User']['_id']!=$_SESSION['Auth']['User']['_id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		//$user['User']['ApiKey'] = $this->User->ApiKey->read(null, $user['User']['id']);
		$this->set('user', $user);
		
		
	}
	
	function __createApiKey($user_id){
		$random = $this->Random->randomString();
		$this->data = array('ApiKey'=>array('key'=>$random,'user_id'=>$user_id));
		$this->loadModel('ApiKey');
		$this->ApiKey->create();
		if ($this->ApiKey->save($this->data)){
			return true;
		}else{
			echo 'oh shit';
		}
	}
	
}
?>