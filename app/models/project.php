<?php
class Project extends AppModel {
	var $name = 'Project';
	//var $actsAs = array('Logable');
	var $primaryKey = '_id';
	

	    function schema() {
	        $this->_schema = array(
	            '_id' => array('type' => 'integer', 'primary' => true, 'length' => 40),
				'id' => array('type' => 'integer'),
	            'title' => array('type' => 'string'),
	            'description' => array('type' => 'text'),
	            'user_id' => array('type' => 'integer'),
				'total_time' => array('type' => 'string','default'=>'00:00:00'),
				'created' => array('type' => 'string'),
				'modified' => array('type' => 'string'),
	        );
	        return $this->_schema;
	    }
	
	var $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A Title is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'A Description is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

}
?>