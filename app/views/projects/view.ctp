<div class="projects view">
<h2><?php  __('Project');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total Time'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['total_time']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $project['Project']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="timers form">
<form action="<?php echo $html->url('/projects/addTime'); ?>" method="post" enctype="multipart/form-data">
			<?php 
				echo $form->input( 'id', array('value' => $project['Project']['id'] , 'type' => 'hidden') );
				echo $form->input( 'title', array('value' => $project['Project']['title'] , 'type' => 'hidden') );
				echo $form->input( 'description', array('value' => $project['Project']['description'] , 'type' => 'hidden') );
				echo $form->input( 'user_id', array('value' => $project['User']['id'] , 'type' => 'hidden') );
				
			?>
			<input type="submit" class="button" name="mailtoadvertiser" value="Update Timer Total" class="vista green" onclick="showz('LoadingDiv');" />
		</form>
</div>
<div class="bottomLinks">
	<h3><?php __('Actions'); ?></h3><br />

	<?php echo $this->Html->link(__('Edit Project', true), array('action' => 'edit', $project['Project']['id']),array('class'=>'button')); ?> 
	<?php echo $this->Html->link(__('Delete Project', true), array('action' => 'delete', $project['Project']['id']), array('class'=>'button'), sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?> 
	<?php echo $this->Html->link(__('List Projects', true), array('action' => 'index'),array('class'=>'button')); ?> 
	<?php echo $this->Html->link(__('New Project', true), array('action' => 'add'),array('class'=>'button')); ?> 
	<?php echo $this->Html->link(__('List Timers', true), array('controller' => 'timers', 'action' => 'index'),array('class'=>'button')); ?> 
	<?php echo $this->Html->link(__('New Timer', true), array('controller' => 'timers', 'action' => 'add'),array('class'=>'button')); ?> 

</div>
<div class="related">
	<h3><?php __('Related Timers');?></h3>
	<?php if (!empty($project['Timer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>

		<th><?php __('Title'); ?></th>
		<th><?php __('Time'); ?></th>
		<th><?php __('Description'); ?></th>

		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($project['Timer'] as $timer):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $timer['title'];?></td>
			<td><?php echo $timer['time'];?></td>
			<td><?php echo $timer['description'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'timers', 'action' => 'view', $timer['id'])); ?> | 
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'timers', 'action' => 'edit', $timer['id'])); ?> | 
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'timers', 'action' => 'delete', $timer['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
</div>
