<?php
class User extends AppModel {
	var $name = 'User';
	var $primaryKey = '_id';
	

	function schema() {
		$this->_schema = array(
			'_id' => array('type' => 'integer', 'primary' => true, 'length' => 40),
			'username' => array('type' => 'string'),
			'password' => array('type' => 'string'),
			'group_id' => array('type' => 'string'),
			'email' => array('type' => 'string'),
			'active' => array('type' => 'string','default'=>'0'),
			'created' => array('type' => 'string'),
			'modified' => array('type' => 'string'),
		);
		return $this->_schema;
	}
	var $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'You need a user name yo.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email'=>array('rule'=>'email', 'message' => 'This doesn\'t look like an email'),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Passwords make logging in much easier.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	
	//var $actsAs = array('Acl' => array('type' => 'requester'));
	
	function parentNode() {
	    if (!$this->id && empty($this->data)) {
	        return null;
	    }
	    if (isset($this->data['User']['group_id'])) {
		$groupId = $this->data['User']['group_id'];
	    } else {
	    	$groupId = $this->field('group_id');
	    }
	    if (!$groupId) {
		return null;
	    } else {
	        return array('Group' => array('id' => $groupId));
	    }
	}
	
	function bindNode($user) {
	    return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}
	
	function getActivationHash()
        {
                if (!isset($this->id)) {
                        return false;
                }
                return substr(Security::hash(Configure::read('Security.salt') . $this->field('created') . date('Ymd')), 0, 8);
        }
	

}
?>