<!--cachetime:1295668092--><?php
			App::import('Controller', 'Timers');
			$controller =& new TimersController();
				$controller->plugin = $this->plugin = '';
				$controller->helpers = $this->helpers = unserialize('a:5:{i:0;s:4:"Html";i:1;s:4:"Form";i:2;s:7:"Session";i:3;s:5:"Cycle";i:4;s:5:"Cache";}');
				$controller->base = $this->base = '';
				$controller->layout = $this->layout = 'timers';
				$controller->webroot = $this->webroot = '/';
				$controller->here = $this->here = '/timers/view/4d339460da220a9806000004';
				$controller->params = $this->params = unserialize(stripslashes('a:10:{s:10:\"controller\";s:6:\"timers\";s:6:\"action\";s:4:\"view\";s:5:\"named\";a:0:{}s:4:\"pass\";a:1:{i:0;s:24:\"4d339460da220a9806000004\";}s:6:\"plugin\";N;s:3:\"url\";a:2:{s:3:\"ext\";s:4:\"html\";s:3:\"url\";s:36:\"timers/view/4d339460da220a9806000004\";}s:4:\"form\";a:0:{}s:6:\"_Token\";a:5:{s:3:\"key\";s:40:\"6ad99d7ff665235eecfefe35f89838b299734caa\";s:7:\"expires\";i:1295670492;s:18:\"allowedControllers\";a:0:{}s:14:\"allowedActions\";a:0:{}s:14:\"disabledFields\";a:1:{i:0;s:4:\"time\";}}s:6:\"isAjax\";b:0;s:6:\"models\";a:1:{i:0;s:5:\"Timer\";}}'));
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
<html><head><meta charset="utf-8" /><title>Time Tracking Made Simple | Homkora</title><link rel="stylesheet" type="text/css" href="/ccss/scss-style.css" /><link rel="stylesheet" type="text/css" href="/ccss/jquery.stopwatch.css" /></head><body><header><h1> <a href="http://homkora.com">Homkora</a> </h1><nav><ul>
	<li><img align="left" style="border:1px solid #444;margin:0px 5px 0px 0px;" src="http://www.gravatar.com/avatar/e1633f5b321141db3e1ba770953ace7f?s=20&d=identicon&r=pg" /><a href="/profile/4d33940fda220a9606000003">Profile</a></li>
	<li><a href="/projects">Projects</a></li>
	<li><a href="/timers">Timers</a></li>
	<li><a href="/users/logout">Logout</a></li>
</ul></nav></header><div id="container"><noscript>Homkora must have javascript enabled.</noscript><div id="content"><div class="timers view"><div class="project-view"><h2>Time</h2>00:00:07</div><div id="project-view-break"></div><div class="project-view"><h2>Title</h2>Timer 1</div><div class="project-view"><h2>Description</h2>this is a timer</div><div class="project-view"><h2>Created</h2>Jan-17-2011</div><div class="project-view"><h2>Created</h2>Jan-17-2011</div></div><br /><br /><div class="bottomLinks"><h3>Actions</h3><br /><a href="/timers/edit/4d339460da220a9806000004" class="button addTimerIndex"><img src="/img/icon_pencil.png" alt="Edit" title="Edit" />Edit Timer</a><a href="/timers/delete/4d339460da220a9806000004" class="button addTimerIndex" onclick="return confirm('Are you sure you want to delete # 4d339460da220a9806000004?');"><img src="/img/icon_delete.png" alt="Delete" title="Delete" />Delete Timer</a><a href="/timers" class="button addTimerIndex"><img src="/img/icon_list_bullets.png" alt="List" title="List" />List Timers</a><a href="/timers/add" class="button addTimerIndex"><img src="/img/icon_timer.png" alt="Add" title="Add" />New Timer</a></div><div style="clear:both;"></div></div><div style="clear:both;"></div></div><footer class="transparent_class"> <a href="http://homkora.com/about">About</a>  <a href="http://homkora.com/contact">Contact</a>  <a href="http://homkora.com/privacy">Privacy</a>  <a href="http://homkora.com/faq">FAQ</a>  <a href="http://homkora.com/help">Help</a> Created by <a href="http://www.travisberry.com">Travis Berry</a> </footer><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script><script type="text/javascript" src="/js/jquery.stopwatch.js"></script><script type="text/javascript">
  //<![CDATA[
//write the timer to the time input in add timer on form submit
function checkForm(frm) {
  frm.submit.disabled=true;
  var o = $('div.display').text();
  //alert(o);
  if (o){
    document.getElementById("TimerTime").value = o;
    return true; //returns true if all validation passes
  }else{
    alert('Please Add Feedback before requesting a revision');
    return false;
  }
}
  //]]>
</script>
<script type="text/javascript">
  //<![CDATA[
//create the clock
$(function() {
  $('#clock1').stopwatch();
});
  //]]>
</script>
</body></html>