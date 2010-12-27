<div id="clock1"></div>
<div class="timers form">
<?php echo $this->Form->create('Timer',array('onsubmit'=>'return(checkForm(this));'));?>
<!--<form name="approveVideo" onsubmit="return(checkForm(this));" id="approveVideo" action="add" method="post" enctype="multipart/form-data">-->
	<fieldset>
 		
	<?php
		echo $this->Form->input('project_id');
		echo $this->Form->input('title');
		echo $this->Form->input('time', array('value' => '' , 'type' => 'hidden'));
		echo $this->Form->input('description',array('type'=>'text'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Save Timer', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Timers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Projects', true), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project', true), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>