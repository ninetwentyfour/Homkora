<!--cachetime:1295147038--><?php
			App::import('Controller', 'Projects');
			$controller =& new ProjectsController();
				$controller->plugin = $this->plugin = '';
				$controller->helpers = $this->helpers = unserialize('a:5:{i:0;s:4:"Html";i:1;s:4:"Form";i:2;s:7:"Session";i:3;s:5:"Cycle";i:4;s:5:"Cache";}');
				$controller->base = $this->base = '';
				$controller->layout = $this->layout = 'default';
				$controller->webroot = $this->webroot = '/';
				$controller->here = $this->here = '/projects/view/1';
				$controller->params = $this->params = unserialize(stripslashes('a:10:{s:10:\"controller\";s:8:\"projects\";s:6:\"action\";s:4:\"view\";s:5:\"named\";a:0:{}s:4:\"pass\";a:1:{i:0;s:1:\"1\";}s:6:\"plugin\";N;s:3:\"url\";a:2:{s:3:\"ext\";s:4:\"html\";s:3:\"url\";s:15:\"projects/view/1\";}s:4:\"form\";a:0:{}s:6:\"_Token\";a:5:{s:3:\"key\";s:40:\"6ec363faa4a658e0ac1e03b2e485ff3586575c90\";s:7:\"expires\";i:1295149438;s:18:\"allowedControllers\";a:0:{}s:14:\"allowedActions\";a:0:{}s:14:\"disabledFields\";a:1:{i:0;s:4:\"time\";}}s:6:\"isAjax\";b:0;s:6:\"models\";a:1:{i:0;s:7:\"Project\";}}'));
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
</ul></nav></header><div id="container"><noscript>Homkora must have javascript enabled.</noscript><div id="content"><div class="projects view"><div class="project-view"><h2>Total Time</h2><div id="totalTime"><pre class="cake-debug"><a href="javascript:void(0);" onclick="document.getElementById('cakeErr1-trace').style.display = (document.getElementById('cakeErr1-trace').style.display == 'none' ? '' : 'none');"><b>Notice</b> (8)</a>: Undefined index: Project [<b>APP/tmp/cache/haml/projects/view.ctp</b>, line <b>6</b>]<div id="cakeErr1-trace" class="cake-stack-trace" style="display: none;"><a href="javascript:void(0);" onclick="document.getElementById('cakeErr1-code').style.display = (document.getElementById('cakeErr1-code').style.display == 'none' ? '' : 'none')">Code</a> | <a href="javascript:void(0);" onclick="document.getElementById('cakeErr1-context').style.display = (document.getElementById('cakeErr1-context').style.display == 'none' ? '' : 'none')">Context</a><div id="cakeErr1-code" class="cake-code-dump" style="display: none;"><pre><code><span style="color: #000000">App::import('Sanitize');</span></code>
<code><span style="color: #000000">?&gt;</span></code>
<span class="code-highlight"><code><span style="color: #000000">&lt;div&nbsp;class="projects&nbsp;view"&gt;&lt;div&nbsp;class="project-view"&gt;&lt;h2&gt;Total&nbsp;Time&lt;/h2&gt;&lt;div&nbsp;id="totalTime"&gt;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">Sanitize</span><span style="color: #007700">::</span><span style="color: #0000BB">html</span><span style="color: #007700">(</span><span style="color: #0000BB">$project</span><span style="color: #007700">[</span><span style="color: #DD0000">'Project'</span><span style="color: #007700">][</span><span style="color: #DD0000">'total_time'</span><span style="color: #007700">]);&nbsp;</span><span style="color: #0000BB">?&gt;</span>&lt;/div&gt;&lt;/div&gt;&lt;div&nbsp;id="project-view-break"&gt;&lt;/div&gt;&lt;div&nbsp;class="project-view"&gt;&lt;h2&gt;Title&lt;/h2&gt;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">Sanitize</span><span style="color: #007700">::</span><span style="color: #0000BB">html</span><span style="color: #007700">(</span><span style="color: #0000BB">$project</span><span style="color: #007700">[</span><span style="color: #DD0000">'Project'</span><span style="color: #007700">][</span><span style="color: #DD0000">'title'</span><span style="color: #007700">]);&nbsp;</span><span style="color: #0000BB">?&gt;</span>&lt;/div&gt;&lt;div&nbsp;class="project-view"&gt;&lt;h2&gt;Description&lt;/h2&gt;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">Sanitize</span><span style="color: #007700">::</span><span style="color: #0000BB">html</span><span style="color: #007700">(</span><span style="color: #0000BB">$project</span><span style="color: #007700">[</span><span style="color: #DD0000">'Project'</span><span style="color: #007700">][</span><span style="color: #DD0000">'description'</span><span style="color: #007700">]);&nbsp;</span><span style="color: #0000BB">?&gt;</span>&lt;/div&gt;&lt;div&nbsp;class="project-view"&gt;&lt;h2&gt;Created&lt;/h2&gt;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">Sanitize</span><span style="color: #007700">::</span><span style="color: #0000BB">html</span><span style="color: #007700">(</span><span style="color: #0000BB">$project</span><span style="color: #007700">[</span><span style="color: #DD0000">'Project'</span><span style="color: #007700">][</span><span style="color: #DD0000">'created'</span><span style="color: #007700">]);&nbsp;</span><span style="color: #0000BB">?&gt;</span>&lt;/div&gt;&lt;div&nbsp;class="project-view"&gt;&lt;h2&gt;Modified&lt;/h2&gt;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">Sanitize</span><span style="color: #007700">::</span><span style="color: #0000BB">html</span><span style="color: #007700">(</span><span style="color: #0000BB">$project</span><span style="color: #007700">[</span><span style="color: #DD0000">'Project'</span><span style="color: #007700">][</span><span style="color: #DD0000">'modified'</span><span style="color: #007700">]);&nbsp;</span><span style="color: #0000BB">?&gt;</span>&lt;/div&gt;&lt;/div&gt;</span></code></span></pre></div><pre id="cakeErr1-context" class="cake-context" style="display: none;">$___viewFn	=	"/var/www/cake/app/tmp/cache/haml/projects/view.ctp"
$___dataForView	=	array(
	"gravatar" => "&lt;img align=&quot;left&quot; style=&quot;border:1px solid #444;margin:0px 5px 0px 0px;&quot; src=&quot;http://www.gravatar.com/avatar/e1633f5b321141db3e1ba770953ace7f?s=20&amp;d=identicon&amp;r=pg&quot; /&gt;",
	"project" => array(
	array()
)
)
$loadHelpers	=	true
$cached	=	false
$cache	=	CacheHelper
CacheHelper::$__replace = array
CacheHelper::$__match = array
CacheHelper::$cacheAction = NULL
CacheHelper::$helpers = NULL
CacheHelper::$base = ""
CacheHelper::$webroot = "/"
CacheHelper::$theme = NULL
CacheHelper::$here = "/projects/view/1"
CacheHelper::$params = array
CacheHelper::$action = "view"
CacheHelper::$plugin = NULL
CacheHelper::$data = array
CacheHelper::$namedArgs = NULL
CacheHelper::$argSeparator = NULL
CacheHelper::$validationErrors = NULL
CacheHelper::$tags = array
CacheHelper::$__tainted = NULL
CacheHelper::$__cleaned = NULL
$cycle	=	CycleHelper
CycleHelper::$helpers = NULL
CycleHelper::$base = ""
CycleHelper::$webroot = "/"
CycleHelper::$theme = NULL
CycleHelper::$here = "/projects/view/1"
CycleHelper::$params = array
CycleHelper::$action = "view"
CycleHelper::$plugin = NULL
CycleHelper::$data = array
CycleHelper::$namedArgs = NULL
CycleHelper::$argSeparator = NULL
CycleHelper::$validationErrors = NULL
CycleHelper::$tags = array
CycleHelper::$__tainted = NULL
CycleHelper::$__cleaned = NULL
$session	=	SessionHelper
SessionHelper::$helpers = array
SessionHelper::$__active = true
SessionHelper::$valid = false
SessionHelper::$error = false
SessionHelper::$_userAgent = ""
SessionHelper::$path = "/"
SessionHelper::$lastError = NULL
SessionHelper::$security = "medium"
SessionHelper::$time = 1295143438
SessionHelper::$sessionTime = 1303787438
SessionHelper::$cookieLifeTime = false
SessionHelper::$watchKeys = array
SessionHelper::$id = NULL
SessionHelper::$host = NULL
SessionHelper::$timeout = NULL
SessionHelper::$base = ""
SessionHelper::$webroot = "/"
SessionHelper::$here = "/projects/view/1"
SessionHelper::$params = array
SessionHelper::$action = "view"
SessionHelper::$data = array
SessionHelper::$theme = NULL
SessionHelper::$plugin = NULL
$form	=	FormHelper
FormHelper::$helpers = array
FormHelper::$fieldset = array
FormHelper::$__options = array
FormHelper::$fields = array
FormHelper::$requestType = NULL
FormHelper::$defaultModel = NULL
FormHelper::$_inputDefaults = array
FormHelper::$base = ""
FormHelper::$webroot = "/"
FormHelper::$theme = NULL
FormHelper::$here = "/projects/view/1"
FormHelper::$params = array
FormHelper::$action = "view"
FormHelper::$plugin = NULL
FormHelper::$data = array
FormHelper::$namedArgs = NULL
FormHelper::$argSeparator = NULL
FormHelper::$validationErrors = NULL
FormHelper::$tags = array
FormHelper::$__tainted = NULL
FormHelper::$__cleaned = NULL
FormHelper::$Html = HtmlHelper object
$html	=	HtmlHelper
HtmlHelper::$tags = array
HtmlHelper::$_crumbs = array
HtmlHelper::$__includedScripts = array
HtmlHelper::$_scriptBlockOptions = array
HtmlHelper::$__docTypes = array
HtmlHelper::$helpers = NULL
HtmlHelper::$base = ""
HtmlHelper::$webroot = "/"
HtmlHelper::$theme = NULL
HtmlHelper::$here = "/projects/view/1"
HtmlHelper::$params = array
HtmlHelper::$action = "view"
HtmlHelper::$plugin = NULL
HtmlHelper::$data = array
HtmlHelper::$namedArgs = NULL
HtmlHelper::$argSeparator = NULL
HtmlHelper::$validationErrors = NULL
HtmlHelper::$__tainted = NULL
HtmlHelper::$__cleaned = NULL
$gravatar	=	"&lt;img align=&quot;left&quot; style=&quot;border:1px solid #444;margin:0px 5px 0px 0px;&quot; src=&quot;http://www.gravatar.com/avatar/e1633f5b321141db3e1ba770953ace7f?s=20&amp;d=identicon&amp;r=pg&quot; /&gt;"
$project	=	array(
	array(
	"Project" => array()
)
)</pre><pre class="stack-trace">include - APP/tmp/cache/haml/projects/view.ctp, line 6
View::_render() - CORE/cake/libs/view/view.php, line 724
HamlView::_render() - APP/views/haml.php, line 265
View::render() - CORE/cake/libs/view/view.php, line 419
Controller::render() - CORE/cake/libs/controller/controller.php, line 913
Dispatcher::_invoke() - CORE/cake/dispatcher.php, line 207
Dispatcher::dispatch() - CORE/cake/dispatcher.php, line 171
[main] - APP/webroot/index.php, line 83</pre></div></pre></div></div><div id="project-view-break"></div><div class="project-view"><h2>Title</h2></div><div class="project-view"><h2>Description</h2></div><div class="project-view"><h2>Created</h2></div><div class="project-view"><h2>Modified</h2></div></div><div style="clear:both;"></div></div><div style="clear:both;"></div></div><footer class="transparent_class"> <a href="http://homkora.com/about">About</a>  <a href="http://homkora.com/contact">Contact</a>  <a href="http://homkora.com/privacy">Privacy</a>  <a href="http://homkora.com/faq">FAQ</a>  <a href="http://homkora.com/help">Help</a> Created by <a href="http://www.travisberry.com">Travis Berry</a> </footer><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script></body></html>