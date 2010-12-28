<div class="timers view">
<h2><?php  __('Timer');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timer['Timer']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timer['Timer']['time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timer['Timer']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timer['Timer']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $timer['Timer']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<br /><br />
<div class="bottomLinks">
	<h3><?php __('Actions'); ?></h3><br />

	<?php echo $this->Html->link(__('Edit Timer', true), array('action' => 'edit', $timer['Timer']['id']),array('class'=>'button')); ?>
	<?php echo $this->Html->link(__('Delete Timer', true), array('action' => 'delete', $timer['Timer']['id']),array('class'=>'button'), sprintf(__('Are you sure you want to delete # %s?', true), $timer['Timer']['id'])); ?> </li>
	<?php echo $this->Html->link(__('List Timers', true), array('action' => 'index'),array('class'=>'button')); ?> 
	<?php echo $this->Html->link(__('New Timer', true), array('action' => 'add'),array('class'=>'button')); ?> 
	<?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index'),array('class'=>'button')); ?> 
	<?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add'),array('class'=>'button')); ?> 

</div>
