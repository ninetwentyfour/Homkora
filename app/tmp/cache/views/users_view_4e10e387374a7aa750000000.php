<!--cachetime:1333908504--><?php
			App::import('Controller', 'Users');
			$controller =& new UsersController();
				$controller->plugin = $this->plugin = '';
				$controller->helpers = $this->helpers = unserialize('a:5:{i:0;s:4:"Html";i:1;s:4:"Form";i:2;s:7:"Session";i:3;s:5:"Cycle";i:4;s:5:"Cache";}');
				$controller->base = $this->base = '';
				$controller->layout = $this->layout = 'default';
				$controller->webroot = $this->webroot = '/';
				$controller->here = $this->here = '/users/view/4e10e387374a7aa750000000';
				$controller->params = $this->params = unserialize(stripslashes('a:10:{s:10:\"controller\";s:5:\"users\";s:6:\"action\";s:4:\"view\";s:5:\"named\";a:0:{}s:4:\"pass\";a:1:{i:0;s:24:\"4e10e387374a7aa750000000\";}s:6:\"plugin\";N;s:3:\"url\";a:2:{s:3:\"ext\";s:4:\"html\";s:3:\"url\";s:35:\"users/view/4e10e387374a7aa750000000\";}s:4:\"form\";a:0:{}s:6:\"_Token\";a:5:{s:3:\"key\";s:40:\"c3f9f309240b3b98330604da578417068142bcf4\";s:7:\"expires\";i:1333910904;s:18:\"allowedControllers\";a:0:{}s:14:\"allowedActions\";a:0:{}s:14:\"disabledFields\";a:1:{i:0;s:4:\"time\";}}s:6:\"isAjax\";b:0;s:6:\"models\";a:1:{i:0;s:4:\"User\";}}'));
				$controller->action = $this->action = unserialize('s:4:"view";');
				$controller->data = $this->data = unserialize(stripslashes('a:0:{}'));
				$controller->theme = $this->theme = '';
				Router::setRequestInfo(array($this->params, array('base' => $this->base, 'webroot' => $this->webroot)));
				$loadedHelpers = array();
				$loadedHelpers = $this->_loadHelpers($loadedHelpers, $this->helpers);
				foreach (array_keys($loadedHelpers) as $helper) {
					$camelBackedHelper = Inflector::variable($helper);
					${$camelBackedHelper} =& $loadedHelpers[$helper];
					$this->loaded[$camelBackedHelper] =& ${$camelBackedHelper};
					$this->{$helper} =& $loadedHelpers[$helper];
				}
		?><!DOCTYPE html>
<html><head><meta charset="utf-8" /><title>Time Tracking Made Simple | Homkora</title><link href="http://static.homkora.com/css/homkora-static.gz.css" type="text/css" rel="stylesheet"></head><body><header><h1> <a href="http://homkora.com">Homkora</a> </h1><nav><ul>
	<li><img align="left" style="border:1px solid #444;margin:0px 5px 0px 0px;" src="http://www.gravatar.com/avatar/e1633f5b321141db3e1ba770953ace7f?s=20&d=identicon&r=pg" /><a href="/profile/4d322dcf74d77ed07f370ef2">Profile</a></li>
	<li><a href="/users">Users</a></li>
	<li><a href="/projects">Projects</a></li>
	<li><a href="/timers">Timers</a></li>
	<li><a href="/groups">Groups</a></li>
	<li><a href="/users/logout">Logout</a></li>
</ul></nav></header><div id="container"><noscript>Homkora must have javascript enabled.</noscript><div id="content"><div class="users view">
<h2>User</h2>
	<dl>		<dt class="altrow">Id</dt>
		<dd class="altrow">
			<pre class="cake-debug"><a href="javascript:void(0);" onclick="document.getElementById('cakeErr1-trace').style.display = (document.getElementById('cakeErr1-trace').style.display == 'none' ? '' : 'none');"><b>Notice</b> (8)</a>: Undefined index: id [<b>APP/views/users/view.ctp</b>, line <b>9</b>]<div id="cakeErr1-trace" class="cake-stack-trace" style="display: none;"><a href="javascript:void(0);" onclick="document.getElementById('cakeErr1-code').style.display = (document.getElementById('cakeErr1-code').style.display == 'none' ? '' : 'none')">Code</a> | <a href="javascript:void(0);" onclick="document.getElementById('cakeErr1-context').style.display = (document.getElementById('cakeErr1-context').style.display == 'none' ? '' : 'none')">Context</a><div id="cakeErr1-code" class="cake-code-dump" style="display: none;"><pre><code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;dt<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$i&nbsp;</span><span style="color: #007700">%&nbsp;</span><span style="color: #0000BB">2&nbsp;</span><span style="color: #007700">==&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">)&nbsp;echo&nbsp;</span><span style="color: #0000BB">$class</span><span style="color: #007700">;</span><span style="color: #0000BB">?&gt;</span>&gt;<span style="color: #0000BB">&lt;?php&nbsp;__</span><span style="color: #007700">(</span><span style="color: #DD0000">'Id'</span><span style="color: #007700">);&nbsp;</span><span style="color: #0000BB">?&gt;</span>&lt;/dt&gt;</span></code>
<code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;dd<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$i</span><span style="color: #007700">++&nbsp;%&nbsp;</span><span style="color: #0000BB">2&nbsp;</span><span style="color: #007700">==&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">)&nbsp;echo&nbsp;</span><span style="color: #0000BB">$class</span><span style="color: #007700">;</span><span style="color: #0000BB">?&gt;</span>&gt;</span></code>
<span class="code-highlight"><code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$user</span><span style="color: #007700">[</span><span style="color: #DD0000">'User'</span><span style="color: #007700">][</span><span style="color: #DD0000">'id'</span><span style="color: #007700">];&nbsp;</span><span style="color: #0000BB">?&gt;</span></span></code></span></pre></div><pre id="cakeErr1-context" class="cake-context" style="display: none;">$___viewFn	=	"/var/www/Homkora/app/views/users/view.ctp"
$___dataForView	=	array(
	"gravatar" => "&lt;img align=&quot;left&quot; style=&quot;border:1px solid #444;margin:0px 5px 0px 0px;&quot; src=&quot;http://www.gravatar.com/avatar/e1633f5b321141db3e1ba770953ace7f?s=20&amp;d=identicon&amp;r=pg&quot; /&gt;",
	"user" => array(
	"User" => array()
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
CacheHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
CycleHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
SessionHelper::$time = 1333904904
SessionHelper::$sessionTime = 1342548904
SessionHelper::$cookieLifeTime = false
SessionHelper::$watchKeys = array
SessionHelper::$id = NULL
SessionHelper::$host = NULL
SessionHelper::$timeout = NULL
SessionHelper::$base = ""
SessionHelper::$webroot = "/"
SessionHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
FormHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
HtmlHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
$user	=	array(
	"User" => array(
	"_id" => "4e10e387374a7aa750000000",
	"active" => 1,
	"created" => 1309729671,
	"email" => "geoster@gmail.com",
	"group_id" => "3",
	"modified" => 1309729738,
	"password" => "f114d3358705646fbc597bbbde2fe11f71405ba3",
	"username" => "geoster"
)
)
$i	=	1
$class	=	" class=&quot;altrow&quot;"</pre><pre class="stack-trace">include - APP/views/users/view.ctp, line 9
View::_render() - CORE/cake/libs/view/view.php, line 724
HamlView::_render() - APP/views/haml.php, line 268
View::render() - CORE/cake/libs/view/view.php, line 419
Controller::render() - CORE/cake/libs/controller/controller.php, line 913
Dispatcher::_invoke() - CORE/cake/dispatcher.php, line 207
Dispatcher::dispatch() - CORE/cake/dispatcher.php, line 171
[main] - APP/webroot/index.php, line 85</pre></div></pre>			&nbsp;
		</dd>
		<dt>Username</dt>
		<dd>
			geoster			&nbsp;
		</dd>
		<dt class="altrow">Password</dt>
		<dd class="altrow">
			f114d3358705646fbc597bbbde2fe11f71405ba3			&nbsp;
		</dd>
		<dt>Group</dt>
		<dd>
			<pre class="cake-debug"><a href="javascript:void(0);" onclick="document.getElementById('cakeErr2-trace').style.display = (document.getElementById('cakeErr2-trace').style.display == 'none' ? '' : 'none');"><b>Notice</b> (8)</a>: Undefined index: Group [<b>APP/views/users/view.ctp</b>, line <b>24</b>]<div id="cakeErr2-trace" class="cake-stack-trace" style="display: none;"><a href="javascript:void(0);" onclick="document.getElementById('cakeErr2-code').style.display = (document.getElementById('cakeErr2-code').style.display == 'none' ? '' : 'none')">Code</a> | <a href="javascript:void(0);" onclick="document.getElementById('cakeErr2-context').style.display = (document.getElementById('cakeErr2-context').style.display == 'none' ? '' : 'none')">Context</a><div id="cakeErr2-code" class="cake-code-dump" style="display: none;"><pre><code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;dt<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$i&nbsp;</span><span style="color: #007700">%&nbsp;</span><span style="color: #0000BB">2&nbsp;</span><span style="color: #007700">==&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">)&nbsp;echo&nbsp;</span><span style="color: #0000BB">$class</span><span style="color: #007700">;</span><span style="color: #0000BB">?&gt;</span>&gt;<span style="color: #0000BB">&lt;?php&nbsp;__</span><span style="color: #007700">(</span><span style="color: #DD0000">'Group'</span><span style="color: #007700">);&nbsp;</span><span style="color: #0000BB">?&gt;</span>&lt;/dt&gt;</span></code>
<code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;dd<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">if&nbsp;(</span><span style="color: #0000BB">$i</span><span style="color: #007700">++&nbsp;%&nbsp;</span><span style="color: #0000BB">2&nbsp;</span><span style="color: #007700">==&nbsp;</span><span style="color: #0000BB">0</span><span style="color: #007700">)&nbsp;echo&nbsp;</span><span style="color: #0000BB">$class</span><span style="color: #007700">;</span><span style="color: #0000BB">?&gt;</span>&gt;</span></code>
<span class="code-highlight"><code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">Html</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">link</span><span style="color: #007700">(</span><span style="color: #0000BB">$user</span><span style="color: #007700">[</span><span style="color: #DD0000">'Group'</span><span style="color: #007700">][</span><span style="color: #DD0000">'name'</span><span style="color: #007700">],&nbsp;array(</span><span style="color: #DD0000">'controller'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'groups'</span><span style="color: #007700">,&nbsp;</span><span style="color: #DD0000">'action'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'view'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$user</span><span style="color: #007700">[</span><span style="color: #DD0000">'Group'</span><span style="color: #007700">][</span><span style="color: #DD0000">'id'</span><span style="color: #007700">]));&nbsp;</span><span style="color: #0000BB">?&gt;</span></span></code></span></pre></div><pre id="cakeErr2-context" class="cake-context" style="display: none;">$___viewFn	=	"/var/www/Homkora/app/views/users/view.ctp"
$___dataForView	=	array(
	"gravatar" => "&lt;img align=&quot;left&quot; style=&quot;border:1px solid #444;margin:0px 5px 0px 0px;&quot; src=&quot;http://www.gravatar.com/avatar/e1633f5b321141db3e1ba770953ace7f?s=20&amp;d=identicon&amp;r=pg&quot; /&gt;",
	"user" => array(
	"User" => array()
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
CacheHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
CycleHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
SessionHelper::$time = 1333904904
SessionHelper::$sessionTime = 1342548904
SessionHelper::$cookieLifeTime = false
SessionHelper::$watchKeys = array
SessionHelper::$id = NULL
SessionHelper::$host = NULL
SessionHelper::$timeout = NULL
SessionHelper::$base = ""
SessionHelper::$webroot = "/"
SessionHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
FormHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
HtmlHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
$user	=	array(
	"User" => array(
	"_id" => "4e10e387374a7aa750000000",
	"active" => 1,
	"created" => 1309729671,
	"email" => "geoster@gmail.com",
	"group_id" => "3",
	"modified" => 1309729738,
	"password" => "f114d3358705646fbc597bbbde2fe11f71405ba3",
	"username" => "geoster"
)
)
$i	=	4
$class	=	" class=&quot;altrow&quot;"</pre><pre class="stack-trace">include - APP/views/users/view.ctp, line 24
View::_render() - CORE/cake/libs/view/view.php, line 724
HamlView::_render() - APP/views/haml.php, line 268
View::render() - CORE/cake/libs/view/view.php, line 419
Controller::render() - CORE/cake/libs/controller/controller.php, line 913
Dispatcher::_invoke() - CORE/cake/dispatcher.php, line 207
Dispatcher::dispatch() - CORE/cake/dispatcher.php, line 171
[main] - APP/webroot/index.php, line 85</pre></div></pre><a href="/groups/view"></a>			&nbsp;
		</dd>
		<dt class="altrow">Created</dt>
		<dd class="altrow">
			1309729671			&nbsp;
		</dd>
		<dt>Modified</dt>
		<dd>
			1309729738			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3>Actions</h3>
	<ul>
		<li><pre class="cake-debug"><a href="javascript:void(0);" onclick="document.getElementById('cakeErr3-trace').style.display = (document.getElementById('cakeErr3-trace').style.display == 'none' ? '' : 'none');"><b>Notice</b> (8)</a>: Undefined index: id [<b>APP/views/users/view.ctp</b>, line <b>42</b>]<div id="cakeErr3-trace" class="cake-stack-trace" style="display: none;"><a href="javascript:void(0);" onclick="document.getElementById('cakeErr3-code').style.display = (document.getElementById('cakeErr3-code').style.display == 'none' ? '' : 'none')">Code</a> | <a href="javascript:void(0);" onclick="document.getElementById('cakeErr3-context').style.display = (document.getElementById('cakeErr3-context').style.display == 'none' ? '' : 'none')">Context</a><div id="cakeErr3-code" class="cake-code-dump" style="display: none;"><pre><code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&lt;h3&gt;<span style="color: #0000BB">&lt;?php&nbsp;__</span><span style="color: #007700">(</span><span style="color: #DD0000">'Actions'</span><span style="color: #007700">);&nbsp;</span><span style="color: #0000BB">?&gt;</span>&lt;/h3&gt;</span></code>
<code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&gt;</span></code>
<span class="code-highlight"><code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">Html</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">link</span><span style="color: #007700">(</span><span style="color: #0000BB">__</span><span style="color: #007700">(</span><span style="color: #DD0000">'Edit&nbsp;User'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">true</span><span style="color: #007700">),&nbsp;array(</span><span style="color: #DD0000">'action'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'edit'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$user</span><span style="color: #007700">[</span><span style="color: #DD0000">'User'</span><span style="color: #007700">][</span><span style="color: #DD0000">'id'</span><span style="color: #007700">]));&nbsp;</span><span style="color: #0000BB">?&gt;</span>&nbsp;&lt;/li&gt;</span></code></span></pre></div><pre id="cakeErr3-context" class="cake-context" style="display: none;">$___viewFn	=	"/var/www/Homkora/app/views/users/view.ctp"
$___dataForView	=	array(
	"gravatar" => "&lt;img align=&quot;left&quot; style=&quot;border:1px solid #444;margin:0px 5px 0px 0px;&quot; src=&quot;http://www.gravatar.com/avatar/e1633f5b321141db3e1ba770953ace7f?s=20&amp;d=identicon&amp;r=pg&quot; /&gt;",
	"user" => array(
	"User" => array()
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
CacheHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
CycleHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
SessionHelper::$time = 1333904904
SessionHelper::$sessionTime = 1342548904
SessionHelper::$cookieLifeTime = false
SessionHelper::$watchKeys = array
SessionHelper::$id = NULL
SessionHelper::$host = NULL
SessionHelper::$timeout = NULL
SessionHelper::$base = ""
SessionHelper::$webroot = "/"
SessionHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
FormHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
HtmlHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
$user	=	array(
	"User" => array(
	"_id" => "4e10e387374a7aa750000000",
	"active" => 1,
	"created" => 1309729671,
	"email" => "geoster@gmail.com",
	"group_id" => "3",
	"modified" => 1309729738,
	"password" => "f114d3358705646fbc597bbbde2fe11f71405ba3",
	"username" => "geoster"
)
)
$i	=	6
$class	=	" class=&quot;altrow&quot;"</pre><pre class="stack-trace">include - APP/views/users/view.ctp, line 42
View::_render() - CORE/cake/libs/view/view.php, line 724
HamlView::_render() - APP/views/haml.php, line 268
View::render() - CORE/cake/libs/view/view.php, line 419
Controller::render() - CORE/cake/libs/controller/controller.php, line 913
Dispatcher::_invoke() - CORE/cake/dispatcher.php, line 207
Dispatcher::dispatch() - CORE/cake/dispatcher.php, line 171
[main] - APP/webroot/index.php, line 85</pre></div></pre><a href="/users/edit">Edit User</a> </li>
		<li><pre class="cake-debug"><a href="javascript:void(0);" onclick="document.getElementById('cakeErr4-trace').style.display = (document.getElementById('cakeErr4-trace').style.display == 'none' ? '' : 'none');"><b>Notice</b> (8)</a>: Undefined index: id [<b>APP/views/users/view.ctp</b>, line <b>43</b>]<div id="cakeErr4-trace" class="cake-stack-trace" style="display: none;"><a href="javascript:void(0);" onclick="document.getElementById('cakeErr4-code').style.display = (document.getElementById('cakeErr4-code').style.display == 'none' ? '' : 'none')">Code</a> | <a href="javascript:void(0);" onclick="document.getElementById('cakeErr4-context').style.display = (document.getElementById('cakeErr4-context').style.display == 'none' ? '' : 'none')">Context</a><div id="cakeErr4-code" class="cake-code-dump" style="display: none;"><pre><code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&lt;ul&gt;</span></code>
<code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">Html</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">link</span><span style="color: #007700">(</span><span style="color: #0000BB">__</span><span style="color: #007700">(</span><span style="color: #DD0000">'Edit&nbsp;User'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">true</span><span style="color: #007700">),&nbsp;array(</span><span style="color: #DD0000">'action'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'edit'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$user</span><span style="color: #007700">[</span><span style="color: #DD0000">'User'</span><span style="color: #007700">][</span><span style="color: #DD0000">'id'</span><span style="color: #007700">]));&nbsp;</span><span style="color: #0000BB">?&gt;</span>&nbsp;&lt;/li&gt;</span></code>
<span class="code-highlight"><code><span style="color: #000000">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&lt;li&gt;<span style="color: #0000BB">&lt;?php&nbsp;</span><span style="color: #007700">echo&nbsp;</span><span style="color: #0000BB">$this</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">Html</span><span style="color: #007700">-&gt;</span><span style="color: #0000BB">link</span><span style="color: #007700">(</span><span style="color: #0000BB">__</span><span style="color: #007700">(</span><span style="color: #DD0000">'Delete&nbsp;User'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">true</span><span style="color: #007700">),&nbsp;array(</span><span style="color: #DD0000">'action'&nbsp;</span><span style="color: #007700">=&gt;&nbsp;</span><span style="color: #DD0000">'delete'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">$user</span><span style="color: #007700">[</span><span style="color: #DD0000">'User'</span><span style="color: #007700">][</span><span style="color: #DD0000">'id'</span><span style="color: #007700">]),&nbsp;</span><span style="color: #0000BB">null</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">sprintf</span><span style="color: #007700">(</span><span style="color: #0000BB">__</span><span style="color: #007700">(</span><span style="color: #DD0000">'Are&nbsp;you&nbsp;sure&nbsp;you&nbsp;want&nbsp;to&nbsp;delete&nbsp;#&nbsp;%s?'</span><span style="color: #007700">,&nbsp;</span><span style="color: #0000BB">true</span><span style="color: #007700">),&nbsp;</span><span style="color: #0000BB">$user</span><span style="color: #007700">[</span><span style="color: #DD0000">'User'</span><span style="color: #007700">][</span><span style="color: #DD0000">'id'</span><span style="color: #007700">]));&nbsp;</span><span style="color: #0000BB">?&gt;</span>&nbsp;&lt;/li&gt;</span></code></span></pre></div><pre id="cakeErr4-context" class="cake-context" style="display: none;">$___viewFn	=	"/var/www/Homkora/app/views/users/view.ctp"
$___dataForView	=	array(
	"gravatar" => "&lt;img align=&quot;left&quot; style=&quot;border:1px solid #444;margin:0px 5px 0px 0px;&quot; src=&quot;http://www.gravatar.com/avatar/e1633f5b321141db3e1ba770953ace7f?s=20&amp;d=identicon&amp;r=pg&quot; /&gt;",
	"user" => array(
	"User" => array()
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
CacheHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
CycleHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
SessionHelper::$time = 1333904904
SessionHelper::$sessionTime = 1342548904
SessionHelper::$cookieLifeTime = false
SessionHelper::$watchKeys = array
SessionHelper::$id = NULL
SessionHelper::$host = NULL
SessionHelper::$timeout = NULL
SessionHelper::$base = ""
SessionHelper::$webroot = "/"
SessionHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
FormHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
HtmlHelper::$here = "/users/view/4e10e387374a7aa750000000"
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
$user	=	array(
	"User" => array(
	"_id" => "4e10e387374a7aa750000000",
	"active" => 1,
	"created" => 1309729671,
	"email" => "geoster@gmail.com",
	"group_id" => "3",
	"modified" => 1309729738,
	"password" => "f114d3358705646fbc597bbbde2fe11f71405ba3",
	"username" => "geoster"
)
)
$i	=	6
$class	=	" class=&quot;altrow&quot;"</pre><pre class="stack-trace">include - APP/views/users/view.ctp, line 43
View::_render() - CORE/cake/libs/view/view.php, line 724
HamlView::_render() - APP/views/haml.php, line 268
View::render() - CORE/cake/libs/view/view.php, line 419
Controller::render() - CORE/cake/libs/controller/controller.php, line 913
Dispatcher::_invoke() - CORE/cake/dispatcher.php, line 207
Dispatcher::dispatch() - CORE/cake/dispatcher.php, line 171
[main] - APP/webroot/index.php, line 85</pre></div></pre><a href="/users/delete" onclick="return confirm(&#039;Are you sure you want to delete # ?&#039;);">Delete User</a> </li>
		<li><a href="/users">List Users</a> </li>
		<li><a href="/users/add">New User</a> </li>
		<li><a href="/groups">List Groups</a> </li>
		<li><a href="/groups/add">New Group</a> </li>
		<li><a href="/posts">List Posts</a> </li>
		<li><a href="/posts/add">New Post</a> </li>
		<li><a href="/projects">List Projects</a> </li>
		<li><a href="/projects/add">New Project</a> </li>
	</ul>
</div>
<div class="related">
	<h3>Related Posts</h3>
	
	<div class="actions">
		<ul>
			<li><a href="/posts/add">New Post</a> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3>Related Projects</h3>
	
	<div class="actions">
		<ul>
			<li><a href="/projects/add">New Project</a> </li>
		</ul>
	</div>
</div>
<div style="clear:both;"></div></div><div style="clear:both;"></div></div><footer class="transparent_class"> <a href="http://homkora.com/about">About</a>  <a href="http://homkora.com/contact">Contact</a>  <a href="http://homkora.com/privacy">Privacy</a>  <a href="http://homkora.com/faq">FAQ</a>  <a href="http://homkora.com/help">Help</a>  <a href="http://homkora.com/api">API</a> Created by <a href="http://www.travisberry.com">Travis Berry</a> </footer><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script><script type="text/javascript" src="http://static.homkora.com/js/common.gz.js"></script></body></html>