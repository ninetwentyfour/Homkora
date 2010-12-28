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


	<?php echo $this->Html->link(__('List Projects', true), array('action' => 'index'),array('class'=>'button'));?>
	<?php echo $this->Html->link(__('List Timers', true), array('controller' => 'timers', 'action' => 'index'),array('class'=>'button')); ?> 
	<?php echo $this->Html->link(__('New Timer', true), array('controller' => 'timers', 'action' => 'add'),array('class'=>'button')); ?> 
</div>