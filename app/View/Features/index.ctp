<div class="grater-container">
	<?php foreach($features as $feature){
		// debug($feature);
		?>
		<div class="grater">
			<h2><?= $feature['Feature']['name'] ?></h2>
			<p class="lead"><?= $feature['Feature']['short_description'] ?></p>
			<?= $feature['Feature']['description'] ?>
		</div>

		<?php
	} ?>
</div>