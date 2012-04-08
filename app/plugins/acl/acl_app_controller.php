<?php

class AclAppController extends AppController {
	var $helpers = array('Session');
	
	function beforeFilter() {
		$entity_name = parent::entityName();
		print_r($entity_name);
		if($entity_name == 'Admin'){
			$this->Auth->allow(array( '*'));
		} else {
			$this->Session->setFlash('Come on. You shouldn\'t be trying to go there. You aren\'t an admin.');
			$this->redirect('/projects/index');
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