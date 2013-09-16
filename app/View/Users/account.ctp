<div class="grater-container">
	<a href="/users/logout" class="button logout">Logout</a>
	<p class="lead">Account </p>
	<p>Hello <?= $user['User']['username']  ?>, You've been supporting Prologue since <?= date('F',$supporting) ?> <?= date('j',$supporting) ?> <?= date('Y',$supporting) ?>. In that time you've accumulated <?= $votes ?> Votes and used <?= $used?> of them. Currently You're not a <span class="prologueBlue">Plus</span> member.</p>
	<?php
		
		if($user['User']['plan'] != 'free'){
			echo "<p>Subscribe to <span class=\"prologueBlue\">Plus</span>, only $1.99 a month. You'll recieve premium access to all prologue apps and 5 votes twice a month. As a bonus for subscribing to Plus You'll get 10 votes.</p>";
			echo $this->form->create('users', array('action' => 'savetoken', 'div' => false ));
			echo '<script src="https://checkout.stripe.com/v2/checkout.js" class="stripe-button" data-key="pk_test_HEePwUD8F7fmmQKqGddKcZeH" data-amount="199" data-name="Plus" data-description="Monthly Subscription to Prologue Plus" data-image="/128x128.png"></script>';

		} else {
			echo "<p>You're a Plus subscriber and we love you!</p>";
		}
		
	?>



<p>

</p>
</div>
<div class="grater-container">
	<div class="grater">
		<h3 style="float:right;"><?= $votes ?> Votes</h3>
	</div>
</div>