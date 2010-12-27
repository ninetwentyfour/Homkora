<?php
/* Widget Test cases generated on: 2010-12-26 17:12:34 : 1293408514*/
App::import('Model', 'Widget');

class WidgetTestCase extends CakeTestCase {
	var $fixtures = array('app.widget');

	function startTest() {
		$this->Widget =& ClassRegistry::init('Widget');
	}

	function endTest() {
		unset($this->Widget);
		ClassRegistry::flush();
	}

}
?>