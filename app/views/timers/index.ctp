<?php echo $html->link('Add Timer',array('controller'=>'timers', 'action'=>'add'),array('class'=>'button'));?>
<br /><br />
<div class="timers index">
	<h2><?php __('Timers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr class="altrow">
			
			<th><?php echo $this->Paginator->sort('project_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('time');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($timers as $timer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $cycle->cycle('', ' class="altrow"');?>>
		
		<td>
			<?php echo $this->Html->link($timer['Project']['title'], array('controller' => 'projects', 'action' => 'view', $timer['Project']['id'])); ?>
		</td>
		<td><?php echo $timer['Timer']['title']; ?>&nbsp;</td>
		<td><?php echo $timer['Timer']['time']; ?>&nbsp;</td>
		<td><?php echo $timer['Timer']['description']; ?>&nbsp;</td>
		<td><?php echo $timer['Timer']['created']; ?>&nbsp;</td>
		<td><?php echo $timer['Timer']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $timer['Timer']['id'])); ?> | 
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $timer['Timer']['id'])); ?> | 
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $timer['Timer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $timer['Timer']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div><br />
<div class="bottomLinks">
	<h3>Actions</h3><br />
	<?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index'),array('class'=>'button')); ?> 
	<?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add'),array('class'=>'button')); ?> 
	</ul>
</div>