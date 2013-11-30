<div class="grater-container">
	<div class="whiteBorderBox centered">
		<p class="lead center">Subscribe To Plus!</p>
	<?php
		
		if($user['User']['plan'] == 'free'){
			echo "<p>Subscribe to <span class=\"prologueBlue\">Plus</span>, only $1.99 a month. You'll recieve premium access to all prologue apps and 5 votes twice a month. As a bonus for subscribing to Plus You'll get 10 votes.</p>";
			echo $this->form->create('users', array('action' => 'savetoken', 'div' => false ));
			echo '<script src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button" data-key="pk_test_HEePwUD8F7fmmQKqGddKcZeH" data-amount="199" data-name="Plus" data-description="Monthly Subscription to Prologue Plus" data-image="/128x128.png"></script>';
			echo "<p>All Credit Card details and charges are handled by <a href=\"https://stripe.com/\" target=\"_blank\">Stripe</a>. We never keep your card info.</p>";

		} else {
			echo "<p>You're a Plus subscriber and we love you!</p>";
			echo "<a href=\"/users/dashboard\" class=\"button\">GoBack</a>";
		}
		
	?>


	</div>
</div>