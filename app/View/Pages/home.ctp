<div class="grater-container">
	

	<div class="whiteBorderBox centered">
<p class="lead">Login to Prologue</p>

		<?= $this->form->create(array('controller'=>'users', 'action' => 'login' )); ?>
		<input type="text" placeholder="username" class="username" />
		<input type="password" placeholder="password" class="password" />
<?php $options = array(
	'label' => 'Login',
	'class' => 'loginButton',
	'div' => false
);?>
		<?= $this->form->end($options); ?>
		<p>Don't have the cajones to login now. You can login later.</p>
	</div>
</div>