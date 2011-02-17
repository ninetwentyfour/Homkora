<?php
require_once '/var/www/Homkora/app/vendors/haml/HamlHelpers.php';
?><div id="clock1"></div><style type="text/css">
/*<![CDATA[*/
.submit input {
  margin-left:353px;	
}
/*]]>*/
</style>
<?php
$pieces = explode(":", $this->Form->value('Timer.time'));
echo '<div class="hour-edit">'.$pieces[0].'</div>';
echo '<div class="min-edit">'.$pieces[1].'</div>';
echo '<div class="sec-edit">'.$pieces[2].'</div>';
?>
<div class="timers form timer-form"><?php echo $this->Form->create('Timer',array('onsubmit'=>'return(checkForm(this));')); ?><fieldset><legend>Edit Timer</legend><?php echo $this->Form->input('_id'); ?><?php echo $this->Form->input('project_id'); ?><div class="timerAddFormSpacer"></div><?php echo $this->Form->input('title'); ?><?php echo $this->Form->input('time', array('type' => 'hidden')); ?><div class="timerAddFormSpacer"></div><?php echo $this->Form->input('description',array('type'=>'text')); ?></fieldset><?php echo $this->Form->end(__('Submit', true)); ?></div><div class="bottomLinks"><h3>Actions</h3><br /><?php echo $this->Html->link(__($html->image('https://s3.amazonaws.com/homkora-static/img/icon_list_bullets.png', array('alt' => 'View','title'=>'View')).'List Timers', true), array('action' => 'index'),array('escape' => false,'class'=>'button addTimerIndex')); ?></div>