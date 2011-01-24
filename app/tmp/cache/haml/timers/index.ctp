<?php
require_once '/var/www/Homkora/app/vendors/haml/HamlHelpers.php';
?><?php
App::import('Sanitize');
?>
<?php echo $html->link($html->image('icon_timer.png', array('alt' => 'Add','title'=>'Add')).'New Timer',array('controller'=>'timers', 'action'=>'add'),array('escape' => false,'class'=>'button addTimerIndex')); ?><br /><br /><?php echo $form->create('Timer', array('action' => 'search')); ?><div class="searchBox"><?php echo $this->Form->input('search', array( 'label' => false,'placeholder'=>"Enter Timer Title",'class'=>'searchText')); ?><div class="submit"><input type="submit" value="Search" /></div></div><?php echo $form->end();; ?><div class="timers index"><h2>Timers</h2><table><tr class="altrow"><th><?php echo $this->Paginator->sort('project_id'); ?></th><th><?php echo $this->Paginator->sort('title'); ?></th><th><?php echo $this->Paginator->sort('time'); ?></th><th><?php echo $this->Paginator->sort('description'); ?></th><th class="actions">View | Edit | Delete</th></tr><?php
$i = 0;
foreach ($timers as $timer):
//print_r($timer);
$class = null;
if ($i++ % 2 == 0) {
  $class = ' class="altrow"';
}
?>
<tr><td><?php echo $this->Html->link(Sanitize::html($timer['Timer']['project_name']), array('controller' => 'projects', 'action' => 'view', $timer['Timer']['project_id'])); ?></td><td><?php echo Sanitize::html($timer['Timer']['title']); ?></td><td><?php echo Sanitize::html($timer['Timer']['time']); ?></td><td><?php echo Sanitize::html($timer['Timer']['description']); ?></td><td class="actions"><?php echo $html->link($html->image('icon_magnify_glass.png', array('alt' => 'View','title'=>'View')),array('action' => 'view', $timer['Timer']['_id']),array( 'escape' => false,'class'=>'view-link' )); ?><?php echo $html->link($html->image('icon_pencil.png', array('alt' => 'Edit','title'=>'Edit')),array('action' => 'edit', $timer['Timer']['_id']),array( 'escape' => false,'class'=>'edit-link' )); ?><?php echo $html->link($html->image('icon_delete.png', array('alt' => 'Delete','title'=>'Delete')),array('action' => 'delete', $timer['Timer']['_id']),array( 'escape' => false,'class'=>'delete-link'), sprintf(__('Are you sure you want to delete # %s?', true), $timer['Timer']['_id'] )); ?></td></tr><?php
endforeach;
?>
</table><p><?php
echo '<span class="counter-text">'.$this->Paginator->counter(array('format' => __('Page %page% of %pages%, showing %current% timers out of %count% total.', true))).'</span>';
?>
</p><div class="paging"><?php echo $this->Paginator->prev($html->image('icon_arrow_left.png', array('alt' => 'Previous','title'=>'Previous')) . __('', true), array('escape' => false), null, array('escape' => false,'class'=>'disabled')); ?><?php echo $this->Paginator->next(__('', true) . $html->image('icon_arrow_right.png', array('alt' => 'Next','title'=>'Next')), array('escape' => false), null, array('escape' => false,'class' => 'disabled')); ?></div></div><br /><div class="bottomLinks"><h3>Actions</h3><br /><?php echo $this->Html->link(__($html->image('icon_list_bullets.png', array('alt' => 'List','title'=>'List')).'List Projects', true), array('controller' => 'projects', 'action' => 'index'),array('escape' => false,'class'=>'button addTimerIndex')); ?><?php echo $this->Html->link(__($html->image('icon_storage.png', array('alt' => 'List','title'=>'List')).'New Project', true), array('controller' => 'projects', 'action' => 'add'),array('escape' => false,'class'=>'button addTimerIndex')); ?></div>