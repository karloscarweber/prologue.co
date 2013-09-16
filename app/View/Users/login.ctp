<div class="grater-container">
	<div class="whiteBorderBox centered">
		<p class="lead center">Login</p>
		<?= $this->form->create('users', array('action' => 'login', 'div' => false )); ?>
			<?= $this->form->input('username', array('placeholder'=>'username', 'class'=>'username', 'label'=> false, 'div'=>false))  ?>
			<?= $this->form->input('password', array('placeholder'=>'password', 'class'=>'password', 'label'=> false, 'div'=>false))  ?>
			<?php $options = array('label' => 'Login','class' => 'loginButton','div' => false);?>
		<?= $this->form->end($options); ?>
		<p>Don't have an account? <?= $this->Html->link('Signup in 10 seconds', array('controller'=>'users', 'action'=>'signup')) ?>.</p>
	</div>
</div>