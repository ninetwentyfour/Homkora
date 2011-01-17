<?php
/* Project Test cases generated on: 2010-12-26 17:12:34 : 1293408514*/
App::import('Model', 'Project');

class ProjectTestCase extends CakeTestCase {
	var $fixtures = array('app.project', 'app.user', 'app.timer');

	function startTest() {
		$this->Project =& ClassRegistry::init('Project');
	}

	function endTest() {
		unset($this->Project);
		ClassRegistry::flush();
	}

}
?>