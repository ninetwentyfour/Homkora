<div id="clock1"></div>
<style>
.submit input {
margin-left:353px;	
}
</style>
<div class="timers form timer-form">
<?php echo $this->Form->create('Timer',array('onsubmit'=>'return(checkForm(this));'));?>
<!--<form name="approveVideo" onsubmit="return(checkForm(this));" id="approveVideo" action="add" method="post" enctype="multipart/form-data">-->
	<fieldset>
 		
	<?php
		echo $this->Form->input('project_id');
		echo '<div class="timerAddFormSpacer"> </div>';
		echo $this->Form->input('title');
		echo $this->Form->input('time', array('value' => '' , 'type' => 'hidden'));
		echo $this->Form->input('user_id', array('value' => $_SESSION['Auth']['User']['id'] , 'type' => 'hidden'));
		echo '<div class="timerAddFormSpacer"> </div>';
		echo $this->Form->input('description',array('type'=>'text'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Save Timer', true));?>
</div>
<div class="bottomLinks">
	<h3><?php __('Actions'); ?></h3><br />
	

	<?php echo $this->Html->link(__('List Timers', true), array('action' => 'index'),array('class'=>'button'));?>
	<?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index'),array('class'=>'button')); ?> 
	<?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add'),array('class'=>'button')); ?> 
	
</div>