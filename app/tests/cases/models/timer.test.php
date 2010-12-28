<?php
/* Timer Test cases generated on: 2010-12-26 17:12:34 : 1293408514*/
App::import('Model', 'Timer');

class TimerTestCase extends CakeTestCase {
	var $fixtures = array('app.timer', 'app.project', 'app.user');

	function startTest() {
		$this->Timer =& ClassRegistry::init('Timer');
	}

	function endTest() {
		unset($this->Timer);
		ClassRegistry::flush();
	}

}
?>