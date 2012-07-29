<?php
class MyDispatcher extends Dispatcher{
	function cached($url) {
		if (Configure::read('Cache.check') === true) {
			$path = $this->here;
			if ($this->here == '/') {
				$path = 'home';
			}
			if($this->Session->check('Auth.User._id')){
				//$path = $_SESSION['Auth']['User']['_id'].'_'.strtolower(Inflector::slug($path));
				$path = '4d33940fda220a9606000003_'.strtolower(Inflector::slug($path));
			}else{
				$path = strtolower(Inflector::slug($path));
			}

			$filename = CACHE . 'views' . DS . $path . '.php';

			if (!file_exists($filename)) {
				$filename = CACHE . 'views' . DS . $path . '_index.php';
			}

			if (file_exists($filename)) {
				if (!class_exists('View')) {
					App::import('View', 'View', false);
				}
				$controller = null;
				$view =& new View($controller);
				$return = $view->renderCache($filename, getMicrotime());
				if (!$return) {
					ClassRegistry::removeObject('view');
				}
				return $return;
			}
		}
		return false;
	}
}
?>