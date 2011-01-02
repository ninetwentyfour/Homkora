<?php
class AppModel extends Model {
	var $cacheQueries = true;
    var $entity_id;//not sure what this does, was in example. doesn;t seem to do anything
    
    function beforeFind($queryData) { //this limits the amount of data returned to the user based on the entity
        if(isset($_SESSION['Auth']['User'])){
            $group = $_SESSION['Auth']['User']['group_id'];//read the entity id from the session
            $user = $_SESSION['Auth']['User']['id'];
            if($group!='1'){// only limit data if it's not a biemedia user. needs to be based on name in future
                if(isset($this->_schema['user_id'])) {
                    $queryData['conditions'][$this->name.'.user_id'] = $user;//use a condition to limit data
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
