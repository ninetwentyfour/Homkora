<?php
require_once '/var/www/Homkora/app/vendors/haml/HamlHelpers.php';
?><div class="clock1"></div><style type="text/css">
/*<![CDATA[*/
.submit input {
  margin-left:353px;	
}
/*]]>*/
</style>
<div class="timers form timer-form"><?php echo $this->Form->create('Timer',array('onsubmit'=>'return(checkForm(this));')); ?><fieldset><?php echo $this->Form->input('project_id'); ?><div class="timerAddFormSpacer"></div><?php echo $this->Form->input('title'); ?><?php echo $this->Form->input('time', array('value' => '' , 'type' => 'hidden')); ?><?php echo $this->Form->input('user_id', array('value' => $_SESSION['Auth']['User']['_id'] , 'type' => 'hidden')); ?><div class="timerAddFormSpacer"></div><?php echo $this->Form->input('description',array('type'=>'text')); ?></fieldset><?php echo $this->Form->end(__('Save Timer', true)); ?></div><div class="bottomLinks"><h3>Actions</h3><br /><?php echo $this->Html->link(__($html->image('icon_list_bullets.png', array('alt' => 'View','title'=>'View')).'List Timers', true), array('action' => 'index'),array('escape' => false,'class'=>'button addTimerIndex')); ?><?php echo $this->Html->link(__($html->image('icon_list_bullets.png', array('alt' => 'View','title'=>'View')).'List Projects', true), array('controller' => 'projects', 'action' => 'index'),array('escape' => false,'class'=>'button addTimerIndex')); ?><?php echo $html->link($html->image('icon_storage.png', array('alt' => 'Add','title'=>'Add')).'New Project',array('controller'=>'projects','action'=>'add'),array('escape' => false,'class'=>'button addTimerIndex')); ?></div>