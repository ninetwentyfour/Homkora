<div id="clock1"></div>
<style>
.submit input {
margin-left:353px;	
}
</style>
	<?php
		//this takes the saved time and explodes the value. write hour min sec to hidden divs for the timer jquery to find 
		$pieces = explode(":", $this->Form->value('Timer.time'));
		echo '<div class="hour-edit">'.$pieces[0].'</div>';
		echo '<div class="min-edit">'.$pieces[1].'</div>';
		echo '<div class="sec-edit">'.$pieces[2].'</div>';
	?>
<div class="timers form timer-form">
<?php echo $this->Form->create('Timer',array('onsubmit'=>'return(checkForm(this));'));?>
	<fieldset>
 		<legend><?php __('Edit Timer'); ?></legend>
	<?php
		echo $this->Form->input('_id');
		echo $this->Form->input('project_id');
		echo '<div class="timerAddFormSpacer"> </div>';
		echo $this->Form->input('title');
		echo $this->Form->input('time', array('type' => 'hidden'));
		echo '<div class="timerAddFormSpacer"> </div>';
		echo $this->Form->input('description',array('type'=>'text'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="bottomLinks">
	<h3><?php __('Actions'); ?></h3><br />
	
	<?php echo $this->Html->link(__($html->image('icon_list_bullets.png', array('alt' => 'View','title'=>'View')).'List Timers', true), array('action' => 'index'),array('escape' => false,'class'=>'button addTimerIndex'));?>

</div>