
<div class="grater-container">

<p>
<!--<a href="/users/logout" class="button logout">Logout</a>-->
<?php
	if($user['User']['plan'] == 'free'){
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
	<div class="grater">
		<p></p>

	</div>
</div>
<div class="grater-container">
	<p>Suggest a new feature or project by email: <a href="mailto:karl@prologue.co">karl@prologue.co</a>.</p>
</div>