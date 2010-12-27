<div class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
 		<legend><?php __('Edit Project'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Project.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Project.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Timers', true), array('controller' => 'timers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timer', true), array('controller' => 'timers', 'action' => 'add')); ?> </li>
	</ul>
</div>