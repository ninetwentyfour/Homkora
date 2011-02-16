<?php
App::import('Vendor', 'indextank_client');
class TimersController extends AppController {

	var $name = 'Timers';
	var $paginate = array('limit' => 6);
	
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    //$this->Auth->allowedActions = array('*');
		if ($this->RequestHandler->isXml()){
			$this->layout = '';
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
		//$this->loadModel('Project');
		if ($this->RequestHandler->isXml()){
			$timers = $this->Timer->find('all');
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
			$this->Session->setFlash('Invalid timer', 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
		$timer = $this->Timer->read(array('_id','time' ,'title','description','created','modified','user_id'), $id);
		$this->set('timer', $timer);
		//check timer belongs to user or admin
		if($timer['Timer']['user_id']!=$_SESSION['Auth']['User']['_id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash('Invalid timer', 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
	}
	/**
	* Add a Timer
	*
	* @return set flash The timer has been saved
	*/
	function add() {
		if ($this->RequestHandler->isXml()){
			$this->layout = '';
			if(isset($this->params['url']['title'],$this->params['url']['description'],$this->params['url']['projectId'],$this->params['url']['projectName'],$this->params['url']['time'])){
				$this->data['Timer']['user_id'] = $_SESSION['Auth']['User']['_id'];
				$this->data['Timer']['title'] = $this->params['url']['title'];
				$this->data['Timer']['description'] = $this->params['url']['description'];
				$this->data['Timer']['project_id'] = $this->params['url']['projectId'];
				$this->data['Timer']['project_name'] = $this->params['url']['projectName'];
				$this->data['Timer']['time'] = $this->params['url']['time'];
				$this->Timer->create();
				if($this->Timer->save($this->data)){
					$indexData = array('text'=>$this->data['Timer']['title'],'title'=>$this->data['Timer']['title'],'description'=>$this->data['Timer']['description'],'projectName'=>$this->data['Timer']['project_name'],'user_id'=>$_SESSION['Auth']['User']['_id']);
					$id = $this->Timer->id;
					$this->addIndextank("HomkoraTimers",$id,$indexData);
					$result = array('success'=>'1');
				}else{
					$result = array('success'=>'0');
				}
				$this->set(compact('result'));
				return $result;
			}else{
				$result = array('success'=>'0');
				$this->set(compact('result'));
			}
		}
		if (!empty($this->data)) {
			$this->loadModel('Project');
			$params = array(
				'conditions' => array('_id' => (string)$this->data['Timer']['project_id'])
			);
			$project = $this->Project->find('all', $params);
			$this->data['Timer']['project_name'] = $project[0]['Project']['title'];
			$this->Timer->create();
			if ($this->Timer->save($this->data)) {
				//send timer to index tank
				// $API_URL = 'http://:SJERrm8lyjguSe@1o5v.api.indextank.com';
				// 				$client = new ApiClient($API_URL);
				// 				$index = $client->get_index("HomkoraTimers");
				// 				$title = $this->data['Timer']['title'];
				// 				$doc_id = $this->Timer->id;
				// 				$desc = $this->data['Timer']['description'];
				// 				$index->add_document($doc_id, array('text'=>$title,'title'=>$title,'description'=>$desc,'projectName'=>$this->data['Timer']['project_name'],'user_id'=>$_SESSION['Auth']['User']['_id']));
				$indexData = array('text'=>$this->data['Timer']['title'],'title'=>$this->data['Timer']['title'],'description'=>$this->data['Timer']['description'],'projectName'=>$this->data['Timer']['project_name'],'user_id'=>$_SESSION['Auth']['User']['_id']);
				$id = $this->Timer->id;
				$this->addIndextank("HomkoraTimers",$id,$indexData);
				$this->Session->setFlash('The timer has been saved', 'default', array('class' => 'flash_good'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The timer could not be saved.', 'default', array('class' => 'flash_bad'));
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
		if ($this->RequestHandler->isXml()){
			$this->layout = '';
			$this->data['Timer']['_id'] = $id;
			$this->data['Timer']['user_id'] = $_SESSION['Auth']['User']['_id'];
			if(isset($this->params['url']['title'])){
				$this->data['Timer']['title'] = $this->params['url']['title'];
			}
			if(isset($this->params['url']['description'])){
				$this->data['Timer']['description'] = $this->params['url']['description'];
			}
			if(isset($this->params['url']['projectId'],$this->params['url']['projectName'])){
				$this->data['Timer']['project_id'] = $this->params['url']['projectId'];
				$this->data['Timer']['project_name'] = $this->params['url']['projectName'];
			}
			if(isset($this->params['url']['time'])){
				$this->data['Timer']['time'] = $this->params['url']['time'];
			}
			if($this->Timer->save($this->data)){
				$result = array('success'=>'1');
			}else{
				$result = array('success'=>'0');
			}
			$this->set(compact('result'));
			return $result;
		}
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Invalid timer', 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->loadModel('Project');
			$params = array(
				'conditions' => array('_id' => (string)$this->data['Timer']['project_id'])
			);
			$project = $this->Project->find('all', $params);
			$this->data['Timer']['project_name'] = $project[0]['Project']['title'];
			if ($this->Timer->save($this->data)) {
				//send timer to index tank
				// $API_URL = 'http://:SJERrm8lyjguSe@1o5v.api.indextank.com';
				// $client = new ApiClient($API_URL);
				// $index = $client->get_index("HomkoraTimers");
				// $title = $this->data['Timer']['title'];
				// $doc_id = $id;
				// $desc = $this->data['Timer']['description'];
				// $index->add_document($doc_id, array('text'=>$title,'title'=>$title,'description'=>$desc,'projectName'=>$this->data['Timer']['project_name'],'user_id'=>$_SESSION['Auth']['User']['_id']));
				$indexData = array('text'=>$this->data['Timer']['title'],'title'=>$this->data['Timer']['title'],'description'=>$this->data['Timer']['description'],'projectName'=>$this->data['Timer']['project_name'],'user_id'=>$_SESSION['Auth']['User']['_id']);
				$id = $this->Timer->id;
				$this->addIndextank("HomkoraTimers",$id,$indexData);
				$this->Session->setFlash('The timer has been saved', 'default', array('class' => 'flash_good'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The timer could not be saved.', 'default', array('class' => 'flash_bad'));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Timer->read(null, $id);
			//check timer belongs to user or admin
			if($this->data['Timer']['user_id']!=$_SESSION['Auth']['User']['_id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
				$this->Session->setFlash('Invalid timer', 'default', array('class' => 'flash_bad'));
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
			$this->Session->setFlash('Invalid id for timer', 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action'=>'index'));
		}
		//check timer belongs to user or admin
		$userTimer = $this->Timer->read(null, $id);
		if($userTimer['Timer']['user_id']!=$_SESSION['Auth']['User']['_id'] && $_SESSION['Auth']['User']['group_id'] != '1'){
			$this->Session->setFlash('Invalid timer', 'default', array('class' => 'flash_bad'));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Timer->delete($id)) {
			$this->deleteIndextank("HomkoraTimers",$id);
			$this->Session->setFlash('Timer deleted', 'default', array('class' => 'flash_good'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash('Timer was not deleted', 'default', array('class' => 'flash_bad'));
		$this->redirect(array('action' => 'index'));
	}
	function search(){
		//$API_URL = 'http://:SJERrm8lyjguSe@1o5v.api.indextank.com';
		//$client = new ApiClient($API_URL);
		//$index = $client->get_index("HomkoraTimers");
		//$index->add_function(2, "relevance");
		$query = $this->data['Timer']['search'];
		//$res = $index->search($query);
		$res = $this->searchIndextank("HomkoraTimers",$query);
		$i = 0;
		foreach($res->results as $doc_id){
			$params = array(
				'conditions' => array('_id' => $doc_id->docid,'user_id'=>$_SESSION['Auth']['User']['_id'])
			);
			$timers[$i++] = $this->Timer->find('first',$params);
		}
		$this->set('timers', $timers);
	}
}
?>