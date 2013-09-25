<div class="grater-container">
	<div class="grater">
		<h3><span class="prologueBlue"></span> Home</h3>
		<?= $this->element('adminnav'); ?>
	</div>
	<?php foreach($admins as $admin){ ?>
		<div class="grater">
			<p class="lead">Hello <?= $admin['Admin']['username'] ?>, We have <span class="prologueBlue"><?= $active_users ?></span> Active Users, and <span class="prologueBlue"><?= $total_users ?></span> Total Users. Users have received <span class="prologueBlue"><?= $total_votes ?></span> Total Votes and have used <span class="prologueBlue"><?= $used_votes ?></span> Votes</p>
		</div>
	<?php } ?>
</div>