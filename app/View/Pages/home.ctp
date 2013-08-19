<div class="grater-container">
	<h1>Prologue</h1>
	<div class="grater">
		<?= $this->form->create(); ?>
		<input type="text" placeholder="username" class="username" /><br>
		<input type="password" placeholder="password" class="password" />
		<?= $this->form->end('Login', array('class' => 'login' )); ?>
	</div>
</div>