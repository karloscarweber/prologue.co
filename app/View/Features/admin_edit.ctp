<div class="grater-container">
	<div class="grater">
		<h3><span class="prologueBlue"></span> Features</h3>
		<?= $this->element('adminnav'); ?>
	</div>
	<?php if(!empty($this->data)){ ?>
		<h2>Edit Feature: <?= $this->data['Feature']['id'] ?>, <span class="prologueBlue"><?= $this->data['Feature']['name'] ?></span></h2>
	<?php 
	} else {
	?>
		<h2>Add Feature</h2>
	<?php } ?>

	<br>
	<?= $this->Form->create('Feature') ?>
	<?= $this->Form->input('id', array('type' => 'hidden')) ?>
	<?= $this->Form->input('name', array('type' => 'text')) ?>
	<?= $this->Form->input('url', array('type' => 'text', 'label' => 'Pages Slug' )) ?>
	<?= $this->Form->input('description', array('type' => 'text')) ?>
	<?= $this->Form->input('short_description', array('type' => 'text')) ?>
	<?= $this->Form->input('votesneeded', array('type' => 'text')) ?>
	<p style="text-align:right;margin:20px 0px;"><input class="button right" type="submit" value="Save"/></p>
	<?php $this->Form->end(); ?>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>