<?php
	App::import('Sanitize');
?>
<div class="users view">
<h2><?php  __('User');?></h2>
	<div class="project-view">
		<?php echo $gravatar2; ?>
		<h2><?php __('Username'); ?></h2>
		<?php echo Sanitize::html($user['User']['username']); ?>
	</div>
	
	<div class="project-view">
		<h2><?php __('API Key'); ?></h2>
		<?php echo Sanitize::html($user['User']['ApiKey'][0]['ApiKey']['key']); ?>
	</div>

	<div id="project-view-break"></div>
	
	<div class="project-view">
		<h2><?php __('Email'); ?></h2>
		<?php echo Sanitize::html($user['User']['email']); ?>
	</div>


	<div class="project-view">
		<h2><?php __('Created'); ?></h2>
		<?php echo date("M-d-Y",$user['User']['created']); ?>
	</div>
	<div class="bottomLinks">
		<br />
		<?php echo $html->link($html->image('icon_pencil.png', array('alt' => 'Add','title'=>'Add')).'Edit Account',array('controller'=>'users', 'action'=>'userEdit',$user['User']['_id']),array('escape' => false,'class'=>'button addTimerIndex'));?>
	</div>
</div>


