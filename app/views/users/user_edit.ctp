<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('_id');
		echo $this->Form->input('email');
		echo $this->Form->input('username');
		echo '<br /><br />To change your password, enter a new one into the two fields below.';
		echo $this->Form->input('password_1', array('type' => 'password'));
		echo $this->Form->input('password_2', array('type' => 'password'));
		echo $this->Form->input('group_id', array('value' => '3' , 'type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
