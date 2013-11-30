<div class="grater-container">
	<p>
	<!--<a href="/users/logout" class="button logout">Logout</a>-->
	<?php
		if($user['User']['plan'] != 'free'){
			echo '<a href="/users/account" class="button badge">'.$user['User']['username'].'&nbsp;<span class="prologueBlue">Plus</span></a>';

		} else {
			echo '<a href="/users/account" class="button">'.$user['User']['username'].'</a><a class="button" style="margin-left:15px;" href="/users/subscribe">Subscribe to <span class="prologueBlue">Plus</span></a>';
		}
	?>
	</p>
</div>
<div class="grater-container">
	<div class="grater">
		<h3 class="votes"><span class="prologueBlue"><?= $votes ?></span> Votes</h3>
	</div>
	<h2>Projects:</h2>
	<?php foreach($features as $feature){ ?>
		<div class="grater">
			<?php //debug($feature); ?>
			<h2><?= $feature['Feature']['name'] ?></h2>
			<p class="lead"><?= $feature['Feature']['short_description'] ?></p>
			<p><?= $feature['Feature']['description'] ?></p>
			<p><?= $this->Html->link('View', array('controller' => 'pages', 'action' => 'display', $feature['Feature']['url']), array('class'=>'button')); ?></p>
		</div>
	<?php } ?>
</div>
<div class="grater-container">
	<p>Suggest a new feature or project by email: <a href="mailto:me@karloscarweber.com">me@karloscarweber.com</a>.</p>
</div>