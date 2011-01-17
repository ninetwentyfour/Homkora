<?php
class Log extends AppModel {

	var $name = 'Log';
	var $order = 'created DESC';
	var $primaryKey = '_id';

	    function schema() {
	        $this->_schema = array(
	            '_id' => array('type' => 'integer', 'primary' => true, 'length' => 40),
	            'title' => array('type' => 'string'),
	            'created' => array('type' => 'string'),
				'modified' => array('type' => 'string'),
				'user_id' => array('type' => 'integer'),
				'action' => array('type' => 'text'),
				'model' => array('type' => 'text'),
				'description' => array('type' => 'text'),
				'change' => array('type' => 'text'),
	        );
	        return $this->_schema;
	    }
	
}
?>