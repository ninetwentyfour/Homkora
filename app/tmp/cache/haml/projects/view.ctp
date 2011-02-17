<?php
require_once '/var/www/Homkora/app/vendors/haml/HamlHelpers.php';
?><?php
App::import('Sanitize');
?>
<div class="projects view"><div class="project-view"><h2>Total Time</h2><div id="totalTime"><?php echo Sanitize::html($project[0]['Project']['total_time']); ?></div></div><div id="project-view-break"></div><div class="project-view"><h2>Title</h2><?php echo Sanitize::html($project[0]['Project']['title']); ?></div><div class="project-view"><h2>Description</h2><?php echo Sanitize::html($project[0]['Project']['description']); ?></div><div class="project-view"><h2>Created</h2><?php echo Sanitize::html(date("M-d-Y",$project[0]['Project']['created'])); ?></div><div class="project-view"><h2>Modified</h2><?php echo Sanitize::html(date("M-d-Y",$project[0]['Project']['modified'])); ?></div></div><br /><div class="bottomLinks"><h3>Actions</h3><br /><?php echo $this->Html->link(__($html->image('https://s3.amazonaws.com/homkora-static/img/icon_pencil.png', array('alt' => 'Edit','title'=>'Edit')).'Edit Project', true), array('action' => 'edit', $project[0]['Project']['_id']),array('escape' => false,'class'=>'button addTimerIndex')); ?><?php echo $this->Html->link(__($html->image('https://s3.amazonaws.com/homkora-static/img/icon_delete.png', array('alt' => 'Delete','title'=>'Delete')).'Delete Project', true), array('action' => 'delete', $project[0]['Project']['_id']), array('escape' => false,'class'=>'button addTimerIndex'), sprintf(__('Are you sure you want to delete # %s?', true), $project[0]['Project']['_id'])); ?><?php echo $this->Html->link(__($html->image('https://s3.amazonaws.com/homkora-static/img/icon_list_bullets.png', array('alt' => 'List','title'=>'List')).'List Projects', true), array('action' => 'index'),array('escape' => false,'class'=>'button addTimerIndex')); ?><?php echo $html->link($html->image('https://s3.amazonaws.com/homkora-static/img/icon_storage.png', array('alt' => 'Add','title'=>'Add')).'New Project',array('action'=>'add'),array('escape' => false,'class'=>'button addTimerIndex')); ?></div><div class="related"><h3>Related Timers</h3><?php
if (!empty($timers)):
?>
<table><tr><th>Title</th><th>Time</th><th>Description</th><th class="action">Actions</th></tr><?php
$i = 0;
foreach ($timers as $timer):
  $class = null;
  if ($i++ % 2 == 0) {
    $class = ' class="altrow"';
  }
?>
<tr><td><?php echo Sanitize::html($timer['Timer']['title']); ?></td><td><?php echo Sanitize::html($timer['Timer']['time']); ?></td><td><?php echo Sanitize::html($timer['Timer']['description']); ?></td><td><?php echo $html->link($html->image('https://s3.amazonaws.com/homkora-static/img/icon_magnify_glass.png', array('alt' => 'View','title'=>'View')),array('controller' => 'timers', 'action' => 'view', $timer['Timer']['_id']),array( 'escape' => false,'class'=>'view-link' )); ?><?php echo $html->link($html->image('https://s3.amazonaws.com/homkora-static/img/icon_pencil.png', array('alt' => 'Edit','title'=>'Edit')),array('controller' => 'timers', 'action' => 'edit', $timer['Timer']['_id']),array( 'escape' => false,'class'=>'edit-link' )); ?><?php echo $html->link($html->image('https://s3.amazonaws.com/homkora-static/img/icon_delete.png', array('alt' => 'Delete','title'=>'Delete')),array('controller' => 'timers', 'action' => 'delete', $timer['Timer']['_id']),array( 'escape' => false,'class'=>'delete-link'), sprintf(__('Are you sure you want to delete # %s?', true), $timer['Timer']['_id'] )); ?></td></tr><?php
endforeach;
?>
</table><br /><?php echo $html->link($html->image('https://s3.amazonaws.com/homkora-static/img/icon_download.png').'Export Timers to CSV', array('controller'=>'projects','action'=>'exportcsvTimers',$project[0]['Project']['_id']),array( 'escape' => false,'class'=>'button addTimerIndex' )); ?><?php
endif;
?>
</div>