<?php
App::import('Model', 'CakeSession');
class AppModel extends Model {
	var $cacheQueries = true;
	var $entity_id;//not sure what this does, was in example. doesn;t seem to do anything
    
	//this limits the amount of data returned to the user based on the user
	function beforeFind($queryData) { 
		if(CakeSession::check('Auth.User')){
			$group = CakeSession::read('Auth.User.group_id');//read the entity id from the session
			$user = CakeSession::read('Auth.User._id');
			if($group!='1'){// only limit data if it's not a admin user. needs to be based on name in future
				if(isset($this->_schema['user_id'])) {
					//use a condition to limit data
					$queryData['conditions'][$this->name.'.user_id'] = $user;
					return $queryData;
				}
			}else{
				//Do nothing
				return $queryData;
			}
		}else{
			//Do nothing
			return $queryData;
		}
	}

}
?>
