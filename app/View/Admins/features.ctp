<div class="grater-container">
	<div class="grater">
		<h3><span class="prologueBlue"></span> Features</h3>
		<?= $this->element('adminnav'); ?>
	</div>
	<div class="grater">
	<p><a href="/admins" class="button logout">Add Feature</a></p>
	</div>
	<?php foreach($features as $feature){ ?>
		<div class="grater">
			<p class="lead">We have <span class="prologueBlue"><?= $active_users ?></span> Active Users, and <span class="prologueBlue"><?= $total_users ?></span> Total Users. Users have received <span class="prologueBlue"><?= $total_votes ?></span> Total Votes and have used <span class="prologueBlue"><?= $used_votes ?></span> Votes</p>
			<br>
			<table>
				<tr>
					<th>Feature</th>
					<th>Number of Votes</th>
				</tr>
				<?php foreach($features as $feature){
					//debug($feature);
					echo "<tr><td>".$feature['Feature']['name']."</td>";
					echo "<td><span class=\"prologueBlue\">".$feature['Feature']['votestotal']."</span> / ".$feature['Feature']['votestotal']."</td>";
				} ?>
			</table>
		</div>
	<?php } ?>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>