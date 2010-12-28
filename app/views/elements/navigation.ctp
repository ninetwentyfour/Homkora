<ul>
	<li><?php echo $html->link('Users',array('controller'=>'users', 'action'=>'index'));?></li>
	<li><?php echo $html->link('Projects',array('controller'=>'projects', 'action'=>'index'));?></li>
	<li><?php echo $html->link('Timers',array('controller'=>'timers', 'action'=>'index'));?></li>
	<li><?php echo $html->link('Groups',array('controller'=>'groups', 'action'=>'index'));?></li>
	<li><?php echo $html->link('Login',array('controller'=>'users', 'action'=>'login'));?></li>
	<li><?php echo $html->link('Logout',array('controller'=>'users', 'action'=>'logout'));?></li>
</ul>