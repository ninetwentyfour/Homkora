<?php
	App::import('Sanitize');
?>
<div class="timers view">
	<div class="project-view">
		<h2><?php __('Time'); ?></h2>
		<?php echo Sanitize::html($timer['Timer']['time']); ?>
	</div>
	
	<div id="project-view-break"></div>
	
	<div class="project-view">
		<h2><?php __('Title'); ?></h2>
		<?php echo Sanitize::html($timer['Timer']['title']); ?>
	</div>

	<div class="project-view">
		<h2><?php __('Description'); ?></h2>
		<?php echo Sanitize::html($timer['Timer']['description']); ?>
	</div>

	<div class="project-view">
		<h2><?php __('Created'); ?></h2>
		<?php echo Sanitize::html(date("M-d-Y",$timer['Timer']['created'])); ?>
	</div>

	<div class="project-view">
		<h2><?php __('Modified'); ?></h2>
		<?php echo Sanitize::html(date("M-d-Y",$timer['Timer']['modified'])); ?>
	</div>
</div>
<br /><br />
<div class="bottomLinks">
	<h3><?php __('Actions'); ?></h3><br />

	<?php echo $this->Html->link(__($html->image('icon_pencil.png', array('alt' => 'Edit','title'=>'Edit')).'Edit Timer', true), array('action' => 'edit', $timer['Timer']['_id']),array('escape' => false,'class'=>'button addTimerIndex')); ?>
	<?php echo $this->Html->link(__($html->image('icon_delete.png', array('alt' => 'Delete','title'=>'Delete')).'Delete Timer', true), array('action' => 'delete', $timer['Timer']['_id']),array('escape' => false,'class'=>'button addTimerIndex'), sprintf(__('Are you sure you want to delete # %s?', true), $timer['Timer']['_id'])); ?> </li>
	<?php echo $this->Html->link(__($html->image('icon_list_bullets.png', array('alt' => 'List','title'=>'List')).'List Timers', true), array('action' => 'index'),array('escape' => false,'class'=>'button addTimerIndex')); ?> 
	<?php echo $html->link($html->image('icon_timer.png', array('alt' => 'Add','title'=>'Add')).'New Timer',array('controller'=>'timers', 'action'=>'add'),array('escape' => false,'class'=>'button addTimerIndex'));?>

</div>
