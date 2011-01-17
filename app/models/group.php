<?php
class Group extends AppModel {
	var $name = 'Group';
	var $primaryKey = '_id';
	

	function schema() {
		$this->_schema = array(
			'_id' => array('type' => 'integer', 'primary' => true, 'length' => 40),
			'name' => array('type' => 'string'),
			'created' => array('type' => 'string'),
			'modified' => array('type' => 'string'),
		);
		return $this->_schema;
	}
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	var $actsAs = array('Acl' => array('type' => 'requester'));

	function parentNode() {
	    return null;
	}
	

}
?>