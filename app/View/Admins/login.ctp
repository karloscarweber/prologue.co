<div class="grater-container">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
		<?= $this->form->create('Admin', array('action' => 'login', 'div' => false )); ?>
			<?= $this->form->input('username', array('placeholder'=>'username', 'class'=>'username', 'label'=> false, 'div'=>false))  ?>
			<?= $this->form->input('password', array('placeholder'=>'password', 'class'=>'password', 'label'=> false, 'div'=>false))  ?>
			<?php $options = array('label' => 'Login','class' => 'loginButton','div' => false);?>
		<?= $this->form->end($options); ?>
</div>