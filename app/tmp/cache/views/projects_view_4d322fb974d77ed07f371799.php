<!--cachetime:1295147335--><?php
			App::import('Controller', 'Projects');
			$controller =& new ProjectsController();
				$controller->plugin = $this->plugin = '';
				$controller->helpers = $this->helpers = unserialize('a:5:{i:0;s:4:"Html";i:1;s:4:"Form";i:2;s:7:"Session";i:3;s:5:"Cycle";i:4;s:5:"Cache";}');
				$controller->base = $this->base = '';
				$controller->layout = $this->layout = 'default';
				$controller->webroot = $this->webroot = '/';
				$controller->here = $this->here = '/projects/view/4d322fb974d77ed07f371799';
				$controller->params = $this->params = unserialize(stripslashes('a:10:{s:10:\"controller\";s:8:\"projects\";s:6:\"action\";s:4:\"view\";s:5:\"named\";a:0:{}s:4:\"pass\";a:1:{i:0;s:24:\"4d322fb974d77ed07f371799\";}s:6:\"plugin\";N;s:3:\"url\";a:2:{s:3:\"ext\";s:4:\"html\";s:3:\"url\";s:38:\"projects/view/4d322fb974d77ed07f371799\";}s:4:\"form\";a:0:{}s:6:\"_Token\";a:5:{s:3:\"key\";s:40:\"6ec363faa4a658e0ac1e03b2e485ff3586575c90\";s:7:\"expires\";i:1295149735;s:18:\"allowedControllers\";a:0:{}s:14:\"allowedActions\";a:0:{}s:14:\"disabledFields\";a:1:{i:0;s:4:\"time\";}}s:6:\"isAjax\";b:0;s:6:\"models\";a:1:{i:0;s:7:\"Project\";}}'));
				$controller->action = $this->action = unserialize('s:4:"view";');
				$controller->data = $this->data = unserialize(stripslashes('a:0:{}'));
				$controller->theme = $this->theme = '';
				Router::setRequestInfo(array($this->params, array('base' => $this->base, 'webroot' => $this->webroot)));
				$controller->constructClasses();
				$controller->Component->initialize($controller);
				$controller->beforeFilter();
				$controller->Component->startup($controller);
				$loadedHelpers = array();
				$loadedHelpers = $this->_loadHelpers($loadedHelpers, $this->helpers);
				foreach (array_keys($loadedHelpers) as $helper) {
					$camelBackedHelper = Inflector::variable($helper);
					${$camelBackedHelper} =& $loadedHelpers[$helper];
					$this->loaded[$camelBackedHelper] =& ${$camelBackedHelper};
					$this->{$helper} =& $loadedHelpers[$helper];
				}
		?><!DOCTYPE html>
<html><head><meta charset="utf-8" /><title>Time Tracking Made Simple | Homkora</title><link rel="stylesheet" type="text/css" href="/ccss/scss-style.css" /></head><body><header><h1> <a href="http://homkora.com">Homkora</a> </h1><nav><ul>
	<li><img align="left" style="border:1px solid #444;margin:0px 5px 0px 0px;" src="http://www.gravatar.com/avatar/e1633f5b321141db3e1ba770953ace7f?s=20&d=identicon&r=pg" /><a href="/profile/1">Profile</a></li>
	<li><a href="/users">Users</a></li>
	<li><a href="/projects">Projects</a></li>
	<li><a href="/timers">Timers</a></li>
	<li><a href="/groups">Groups</a></li>
	<li><a href="/users/logout">Logout</a></li>
</ul></nav></header><div id="container"><noscript>Homkora must have javascript enabled.</noscript><div id="content"><div class="projects view"><div class="project-view"><h2>Total Time</h2><div id="totalTime">00:00:18</div></div><div id="project-view-break"></div><div class="project-view"><h2>Title</h2>Chefs Finest</div><div class="project-view"><h2>Description</h2>Website for Chefs Finest.</div><div class="project-view"><h2>Created</h2>2010-12-31 16:54:13</div><div class="project-view"><h2>Modified</h2>2011-01-15 15:14:21</div></div><div style="clear:both;"></div></div><div style="clear:both;"></div></div><footer class="transparent_class"> <a href="http://homkora.com/about">About</a>  <a href="http://homkora.com/contact">Contact</a>  <a href="http://homkora.com/privacy">Privacy</a>  <a href="http://homkora.com/faq">FAQ</a>  <a href="http://homkora.com/help">Help</a> Created by <a href="http://www.travisberry.com">Travis Berry</a> </footer><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script></body></html>