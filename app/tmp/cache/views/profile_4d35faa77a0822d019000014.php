<!--cachetime:1295390560--><?php
			App::import('Controller', 'Users');
			$controller =& new UsersController();
				$controller->plugin = $this->plugin = '';
				$controller->helpers = $this->helpers = unserialize('a:5:{i:0;s:4:"Html";i:1;s:4:"Form";i:2;s:7:"Session";i:3;s:5:"Cycle";i:4;s:5:"Cache";}');
				$controller->base = $this->base = '';
				$controller->layout = $this->layout = 'default';
				$controller->webroot = $this->webroot = '/';
				$controller->here = $this->here = '/profile/4d35faa77a0822d019000014';
				$controller->params = $this->params = unserialize(stripslashes('a:10:{s:5:\"named\";a:0:{}s:4:\"pass\";a:1:{i:0;s:24:\"4d35faa77a0822d019000014\";}s:10:\"controller\";s:5:\"users\";s:6:\"action\";s:7:\"profile\";s:6:\"plugin\";N;s:3:\"url\";a:2:{s:3:\"ext\";s:4:\"html\";s:3:\"url\";s:32:\"profile/4d35faa77a0822d019000014\";}s:4:\"form\";a:0:{}s:6:\"_Token\";a:5:{s:3:\"key\";s:40:\"5e8da4484841de5f32fcb50c9cdfee1350ff7221\";s:7:\"expires\";i:1295389360;s:18:\"allowedControllers\";a:0:{}s:14:\"allowedActions\";a:0:{}s:14:\"disabledFields\";a:1:{i:0;s:4:\"time\";}}s:6:\"isAjax\";b:0;s:6:\"models\";a:2:{i:0;s:4:\"User\";i:1;s:6:\"ApiKey\";}}'));
				$controller->action = $this->action = unserialize('s:7:"profile";');
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
	<li><img align="left" style="border:1px solid #444;margin:0px 5px 0px 0px;" src="http://www.gravatar.com/avatar/8b29a0d910e45d5b5ce26aa5be056c85?s=20&d=identicon&r=pg" /><a href="/profile/4d35faa77a0822d019000014">Profile</a></li>
	<li><a href="/projects">Projects</a></li>
	<li><a href="/timers">Timers</a></li>
	<li><a href="/users/logout">Logout</a></li>
</ul></nav></header><div id="container"><noscript>Homkora must have javascript enabled.</noscript><div id="content"><div class="users view">
<h2>User</h2>
	<div class="project-view">
		<img align="left" style="border:1px solid #444;margin:0px 5px 0px 0px;" src="http://www.gravatar.com/avatar/8b29a0d910e45d5b5ce26aa5be056c85?s=80&d=identicon&r=pg" />		<h2>Username</h2>
		test30	</div>
	
	<div class="project-view">
		<h2>API Key</h2>
		N4DJUx4W7l1n3dwsaHz6	</div>

	<div id="project-view-break"></div>
	
	<div class="project-view">
		<h2>Email</h2>
		tberry@biemedia.com	</div>


	<div class="project-view">
		<h2>Created</h2>
		Jan-18-2011	</div>
	<div class="bottomLinks">
		<br />
		<a href="/users/userEdit/4d35faa77a0822d019000014" class="button addTimerIndex"><img src="/img/icon_pencil.png" alt="Add" title="Add" />Edit Account</a>	</div>
</div>


<div style="clear:both;"></div></div><div style="clear:both;"></div></div><footer class="transparent_class"> <a href="http://homkora.com/about">About</a>  <a href="http://homkora.com/contact">Contact</a>  <a href="http://homkora.com/privacy">Privacy</a>  <a href="http://homkora.com/faq">FAQ</a>  <a href="http://homkora.com/help">Help</a> Created by <a href="http://www.travisberry.com">Travis Berry</a> </footer><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script></body></html>