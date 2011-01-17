<?php
	App::import('Sanitize');
?>
<div id="responseSuccess" class="responseBox" style="display: none"></div>
<ul id="responseError" class="responseBox" style="display: none"></ul>
<div class="projects view">
	<div class="project-view">
		<h2><?php __('Total Time'); ?></h2>
		<div id="totalTime"><?php echo Sanitize::html($project['Project']['total_time']); ?></div>
	</div>
	
	<div id="project-view-break"></div>
	
	<div class="project-view">
		<h2><?php __('Title'); ?></h2>
		<?php echo Sanitize::html($project['Project']['title']); ?>
	</div>
			
	<div class="project-view">
		<h2><?php __('Description'); ?></h2>
		<?php echo Sanitize::html($project['Project']['description']); ?>
	</div>
	

	<div class="project-view">
		<h2><?php __('Created'); ?></h2>
		<?php echo Sanitize::html($project['Project']['created']); ?>
	</div>


	<div class="project-view">
		<h2><?php __('Modified'); ?></h2>
		<?php echo Sanitize::html($project['Project']['modified']); ?>
	</div>
</div>
<div class="timers form">
<form action="<?php echo $html->url('/projects/addTime'); ?>" method="post" onsubmit="return false;" id="UserAddForm" enctype="multipart/form-data">
			<?php 
				echo $form->input( 'id', array('value' => $project['Project']['id'] , 'type' => 'hidden') );
				echo $form->input( 'title', array('value' => $project['Project']['title'] , 'type' => 'hidden') );
				echo $form->input( 'description', array('value' => $project['Project']['description'] , 'type' => 'hidden') );
				echo $form->input( 'user_id', array('value' => $project['User']['id'] , 'type' => 'hidden') );
				
			?>
			<input type="submit" class="button" name="mailtoadvertiser" value="Update Timer Total" style="display:none;" onclick="addTime();" />
		</form>
</div><br /><br />
<div class="bottomLinks">
	<h3><?php __('Actions'); ?></h3><br />

	<?php echo $this->Html->link(__($html->image('icon_pencil.png', array('alt' => 'Edit','title'=>'Edit')).'Edit Project', true), array('action' => 'edit', $project['Project']['id']),array('escape' => false,'class'=>'button addTimerIndex')); ?> 
	<?php echo $this->Html->link(__($html->image('icon_delete.png', array('alt' => 'Delete','title'=>'Delete')).'Delete Project', true), array('action' => 'delete', $project['Project']['id']), array('escape' => false,'class'=>'button addTimerIndex'), sprintf(__('Are you sure you want to delete # %s?', true), $project['Project']['id'])); ?> 
	<?php echo $this->Html->link(__($html->image('icon_list_bullets.png', array('alt' => 'List','title'=>'List')).'List Projects', true), array('action' => 'index'),array('escape' => false,'class'=>'button addTimerIndex')); ?> 
	<?php echo $html->link($html->image('icon_storage.png', array('alt' => 'Add','title'=>'Add')).'New Project',array('action'=>'add'),array('escape' => false,'class'=>'button addTimerIndex'));?>


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
				<td><?php echo Sanitize::html($timer['title']);?></td>
				<td><?php echo Sanitize::html($timer['time']);?></td>
				<td><?php echo Sanitize::html($timer['description']);?></td>
				<td class="actions">
					<?php echo $html->link($html->image('icon_magnify_glass.png', array('alt' => 'View','title'=>'View')),array('controller' => 'timers', 'action' => 'view', $timer['id']),array( 'escape' => false,'class'=>'view-link' )); ?>
					<?php echo $html->link($html->image('icon_pencil.png', array('alt' => 'Edit','title'=>'Edit')),array('controller' => 'timers', 'action' => 'edit', $timer['id']),array( 'escape' => false,'class'=>'edit-link' )); ?>
					<?php echo $html->link($html->image('icon_delete.png', array('alt' => 'Delete','title'=>'Delete')),array('controller' => 'timers', 'action' => 'delete', $timer['id']),array( 'escape' => false,'class'=>'delete-link'), sprintf(__('Are you sure you want to delete # %s?', true), $timer['id'] )); ?>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	<br />
	<?php echo $html->link($html->image('icon_download.png').'Export Timers to CSV', array('controller'=>'projects','action'=>'exportcsvTimers',$project['Project']['id']),array( 'escape' => false,'class'=>'button addTimerIndex' )); ?>
	<?php endif; ?>

	
</div>
