<div class="grater-container">
	<a href="/users/logout" class="button logout">Logout</a>
	<p class="lead">Account </p>
	<p>Hello <?= $user['User']['username']  ?>, You've been supporting Prologue since <?= date('F',$supporting) ?> <?= date('j',$supporting) ?> <?= date('Y',$supporting) ?>. In that time you've accumulated <?= $votes ?> Votes and used <?= $used?> of them. Currently You're not a <span class="prologueBlue">Plus</span> member.</p>

<p>

</p>
</div>
<div class="grater-container">
	<div class="grater">
		<h3 style="float:right;"><?= $votes ?> Votes</h3>
	</div>
</div>