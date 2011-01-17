<?php
/* Timer Fixture generated on: 2010-12-26 17:12:34 : 1293408514 */
class TimerFixture extends CakeTestFixture {
	var $name = 'Timer';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'project_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'title' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'time' => array('type' => 'string', 'null' => false, 'default' => NULL),
		'description' => array('type' => 'text', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'project_id' => 1,
			'user_id' => 1,
			'title' => 'TestTimer',
			'time' => '00:07:13',
			'description' => 'TestDescription',
			'created' => '2010-12-26 17:08:34',
			'modified' => '2010-12-26 17:08:34'
		),
	);
}
?>