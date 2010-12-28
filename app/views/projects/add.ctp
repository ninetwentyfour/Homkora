<div class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
 		<legend><?php __('Add Project'); ?></legend>
	<?php
		echo $this->Form->input('user_id', array('value' => $_SESSION['Auth']['User']['id'] , 'type' => 'hidden'));
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<br />
<div class="bottomLinks">
	<h3><?php __('Actions'); ?></h3><br />


	<?php echo $this->Html->link(__($html->image('icon_list_bullets.png', array('alt' => 'View','title'=>'View')).'List Projects', true), array('action' => 'index'),array('escape' => false,'class'=>'button addTimerIndex')); ?> 
	<?php echo $this->Html->link(__($html->image('icon_list_bullets.png', array('alt' => 'View','title'=>'View')).'List Timers', true), array('controller' => 'timers', 'action' => 'index'),array('escape' => false,'class'=>'button addTimerIndex')); ?> 
	<?php echo $this->Html->link(__($html->image('icon_timer.png', array('alt' => 'View','title'=>'View')).'New Timer', true), array('controller' => 'timers', 'action' => 'add'),array('escape' => false,'class'=>'button addTimerIndex')); ?> 
</div>