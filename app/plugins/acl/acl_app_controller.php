<?php

class AclAppController extends AppController {
	var $helpers = array('Session');
	
	function beforeFilter() {
		$entity_name = parent::entityName();
		if($entity_name == 'Admin'){
			$this->Auth->allow(array( '*'));
		} else {
			$this->Session->setFlash('The URL you\'ve followed requires biemedia admin permissions.');
			$this->redirect('/');
		}				
	}
	
	
	function success() {
		header("HTTP/1.0 200 Success", null, 200);
		exit;
	}

	function failure() {
		header("HTTP/1.0 404 Failure", null, 404);
		exit;
	}

}

?>