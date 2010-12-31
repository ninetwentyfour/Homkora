<div class="projects form">
<?php echo $this->Form->create('Project');?>
	<fieldset>
 		<legend><?php __('Edit Project'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id', array('type' => 'hidden'));
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="bottomLinks">
	<h3><?php __('Actions'); ?></h3><br />


		
		<?php echo $this->Html->link(__($html->image('icon_list_bullets.png', array('alt' => 'View','title'=>'View')).'Back', true), array('action' => 'index'),array('escape' => false,'class'=>'button addTimerIndex')); ?> 

</div>