<div class="users form">
<<<<<<< HEAD
	<h2>Sign Up</h2>
<?php echo $this->Form->create('User');?>
	<fieldset>
=======
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Sign Up'); ?></legend>
>>>>>>> caf9a442dffd98d2b3d60a3c5742ce6078d50f66
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('group_id', array('value' => '3' , 'type' => 'hidden'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<<<<<<< HEAD
<br />
=======
<br />
This app is currently in beta. You may see errors and you may lose data. You have been warned.
>>>>>>> caf9a442dffd98d2b3d60a3c5742ce6078d50f66
