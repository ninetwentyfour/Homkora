<?php echo $this->Html->link(__('New Project', true), array('action' => 'add'),array('class'=>'button')); ?>
<br /><br />
<div class="projects index">
	<h2><?php __('Projects');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<?php
			if(isset($_SESSION['Auth']['User'])){
				if($_SESSION['Auth']['User']['group_id']=='1'){
					echo '<th>'.$this->Paginator->sort('user_id').'</th>';	
				}else{
					//do nothing
				}
			}
			?>

			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('total_time');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($projects as $project):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<?php
		if(isset($_SESSION['Auth']['User'])){
			if($_SESSION['Auth']['User']['group_id']=='1'){
				echo '<td>'.$this->Html->link($project['User']['id'], array('controller' => 'users', 'action' => 'view', $project['User']['id'])).'</td>';	
			}else{
				//do nothing
			}
		}
		?>
		
		<td><?php echo $project['Project']['title']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['description']; ?>&nbsp;</td>
		<td><?php echo $project['Project']['total_time']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $project['Project']['id'])); ?> | 
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $project['Project']['id'])); ?> | 
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $project['Project']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% projects out of %count% total.', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="bottomLinks">
	<h3><?php __('Actions'); ?></h3><br />

	<?php echo $this->Html->link(__('List Timers', true), array('controller' => 'timers', 'action' => 'index'),array('class'=>'button')); ?> 
	<?php echo $this->Html->link(__('New Timer', true), array('controller' => 'timers', 'action' => 'add'),array('class'=>'button')); ?> 
</div>