<div class="users form">
	<h2>Sign Up</h2>
<?php echo $this->Form->create('User');?>
	<fieldset>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('group_id', array('value' => '3' , 'type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<br />