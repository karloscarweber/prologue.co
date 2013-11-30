<div class="grater-container">
	<div class="whiteBorderBox centered">
		<p class="lead center">Signup</p>
		<?= $this->form->create('User', array('action' => 'signup', 'div' => false )); ?>
			<?= $this->form->input('username', array('placeholder'=>'username', 'class'=>'username', 'label'=> false, 'div'=>false))  ?>
			<?= $this->form->input('email', array('placeholder'=>'email', 'class'=>'email', 'label'=> false, 'div'=>false))  ?>
			<?= $this->form->input('password', array('placeholder'=>'password', 'class'=>'password', 'label'=> false, 'div'=>false))  ?>
			<?php $options = array('label' => 'Signup','class' => 'loginButton','div' => false);?>
		<?= $this->form->end($options); ?>
	</div>
</div>	