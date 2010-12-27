<?php
/* Timers Test cases generated on: 2010-12-26 17:12:03 : 1293408603*/
App::import('Controller', 'Timers');

class TestTimersController extends TimersController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TimersControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.timer', 'app.project', 'app.user', 'app.group', 'app.post');

	function startTest() {
		$this->Timers =& new TestTimersController();
		$this->Timers->constructClasses();
	}

	function endTest() {
		unset($this->Timers);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>