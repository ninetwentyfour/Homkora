<?php
/* Projects Test cases generated on: 2010-12-26 17:12:03 : 1293408603*/
App::import('Controller', 'Projects');

class TestProjectsController extends ProjectsController {
	var $autoRender = false;
	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
	function render($action = null, $layout = null, $file = null)
	  {
	    $this->renderedAction = $action;
	    $this->renderedLayout = (is_null($layout) ? $this->layout : $layout);
	    $this->renderedFile = $file;
	  }

	function _stop($status = 0)
	{
	  $this->stopped = $status;
	}
}

class ProjectsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.project', 'app.user', 'app.group', 'app.post', 'app.timer');

	function startTest($method) {
		echo '<h3>Starting method ' . $method . '</h3>';
		$this->Projects =& new TestProjectsController();
		$this->Projects->constructClasses();
	}

	function endTest($method) {
		echo '<hr />'; 
		unset($this->Projects);
		ClassRegistry::flush();
	}
	function startCase() { 
		echo '<h1>Starting Test Case</h1>'; 
	} 
	function endCase() { 
		echo '<h1>Ending Test Case</h1>'; 
	} 
	
	function testIndex() {
		$result = $this->testAction('/projects/index',array('return'=>'vars'));
		
		$this->assertNotNull($result);
		$this->assertEqual('1',$result['projects']['0']['Project']['id']);
		$this->assertEqual('TestProject',$result['projects']['0']['Project']['title']);
	}

	function testView() {
		$result = $this->testAction('/projects/view/1',array('return'=>'vars')); 
		print_r($result);
		$this->assertNotNull($result);
		$this->assertEqual('1',$result['project']['Project']['id']);
		$this->assertEqual('TestProject',$result['project']['Project']['title']);
	}

	function testAdd() {
		$data = array('Project' => array('id' => 2, 'title' => 'bieMediaz', 'user_id'=>1,'description'=>'desc'));
		$result = $this->testAction('/projects/add', array('fixturize'=>true,'data' => $data, 'method' => 'post')); 
	
		//assert the record was added
		$this->assertEqual($result, 'true');
	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>