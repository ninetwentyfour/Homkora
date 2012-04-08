<?php
class ApiKey extends AppModel {
	var $name = 'ApiKey';
	var $primaryKey = '_id';
	

	function schema() {
		$this->_schema = array(
			'_id' => array('type' => 'integer', 'primary' => true, 'length' => 40),
			'key' => array('type' => 'string'),
			'user_id' => array('type' => 'integer'),
			'created' => array('type' => 'string'),
			'modified' => array('type' => 'string'),
		);
		return $this->_schema;
	}
	
}
?>