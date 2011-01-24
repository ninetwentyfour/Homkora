<?php
require_once '/var/www/Homkora/app/vendors/haml/HamlHelpers.php';
?><?php
App::import('Sanitize');
?>
<br /><?php echo $html->link($html->image('icon_storage.png', array('alt' => 'Add','title'=>'Add')).'New Project',array('action'=>'add'),array('escape' => false,'class'=>'button addTimerIndex')); ?><br /><br /><?php echo $form->create('Project', array('action' => 'search')); ?><?php echo $this->Form->input('search'); ?><?php echo $this->Form->end(__('Submit', true)); ?><div class="projects index"><h2>Projects</h2><table><tr class="altrow"><?php
//only show user ids to admin
if(isset($_SESSION['Auth']['User'])){
  if($_SESSION['Auth']['User']['group_id']=='1'){
    echo '<th>'.$this->Paginator->sort('user_id').'</th>';	
  }else{
    //do nothing
  }
}
?>
<th>Title</th><th>Description</th><th>Total Time</th><th class="actions">View | Edit | Delete</th></tr><?php
$i = 0;
foreach ($projects as $project):
  $class = null;
  if ($i++ % 2 == 0) {
    $class = ' class="altrow"';
  }
?>
<tr><?php
//only show user ids to admin
if(isset($_SESSION['Auth']['User'])){
  if($_SESSION['Auth']['User']['group_id']=='1'){
    echo '<td>'.$this->Html->link($project['Project']['user_id'], array('controller' => 'users', 'action' => 'view', $project['Project']['user_id'])).'</td>';	
  }else{
    //do nothing
  }
}
?>
<td><?php echo Sanitize::html($project['Project']['title']); ?></td><td><?php echo Sanitize::html($project['Project']['description']); ?></td><td><?php echo Sanitize::html($project['Project']['total_time']); ?></td><td class="actions"><?php echo $html->link($html->image('icon_magnify_glass.png', array('alt' => 'View','title'=>'View')),array('action' => 'view', $project['Project']['_id']),array( 'escape' => false,'class'=>'view-link' )); ?><?php echo $html->link($html->image('icon_pencil.png', array('alt' => 'Edit','title'=>'Edit')),array('action' => 'edit', $project['Project']['_id']),array( 'escape' => false,'class'=>'edit-link' )); ?><?php echo $html->link($html->image('icon_delete.png', array('alt' => 'Delete','title'=>'Delete')),array('action' => 'delete', $project['Project']['_id']),array( 'escape' => false,'class'=>'delete-link'), sprintf(__('This will delete all timers part of this project too. Are you sure?', true), $project['Project']['_id'] )); ?></td></tr><?php
endforeach;
?>
</table></div><div class="bottomLinks"><h3>Actions</h3><br /><?php echo $this->Html->link(__($html->image('icon_list_bullets.png', array('alt' => 'List','title'=>'List')).'List Timers', true), array('controller' => 'timers', 'action' => 'index'),array('escape' => false,'class'=>'button addTimerIndex')); ?><?php echo $this->Html->link(__($html->image('icon_timer.png', array('alt' => 'Add','title'=>'Add')).'New Timer', true), array('controller' => 'timers', 'action' => 'add'),array('escape' => false,'class'=>'button addTimerIndex')); ?><?php echo $html->link($html->image('icon_download.png').'Export Projects to CSV', array('controller'=>'projects','action'=>'exportcsvProjects'),array( 'escape' => false,'class'=>'button addTimerIndex' )); ?></div>