<div class="grater-container">
	<div class="whiteBorderBox centered">
		<p class="lead center">Subscribe for Plus!</p>
		<?php		
			if($user['User']['plan'] == 'free'){
				echo "<p>Sign up For Plus!</p>";
				echo $this->form->create('users', array('action' => 'savetoken', 'div' => false ));
				echo '<script src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button" data-key="pk_test_HEePwUD8F7fmmQKqGddKcZeH" data-amount="199" data-name="Plus" data-description="Monthly Subscription to Prologue Plus" data-image="/128x128.png"></script>';

			} else {
				echo "<p>You're a Plus subscriber and we love you!</p>";
			}
		?>
	</div>
</div>