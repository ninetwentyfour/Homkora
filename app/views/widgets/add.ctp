<div class="widgets form">
<?php echo $this->Form->create('Widget');?>
	<fieldset>
 		<legend><?php __('Add Widget'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('part_no');
		echo $this->Form->input('quantity');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Widgets', true), array('action' => 'index'));?></li>
	</ul>
</div>