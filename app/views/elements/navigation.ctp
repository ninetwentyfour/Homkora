<ul>
	<li><?php echo $gravatar; ?><?php echo $html->link('Profile',array('controller'=>'users', 'action'=>'profile',$this->Session->read('Auth.User._id')));?></li>
	<li><?php echo $html->link('Users',array('controller'=>'users', 'action'=>'index'));?></li>
	<li><?php echo $html->link('Projects',array('controller'=>'projects', 'action'=>'index'));?></li>
	<li><?php echo $html->link('Timers',array('controller'=>'timers', 'action'=>'index'));?></li>
	<li><?php echo $html->link('Groups',array('controller'=>'groups', 'action'=>'index'));?></li>
	<li><?php echo $html->link('Logout',array('controller'=>'users', 'action'=>'logout'));?></li>
</ul>