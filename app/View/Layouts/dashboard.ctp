<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title> PROLOGUE </title>
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('normalize');
		echo $this->Html->css('grater');
		echo $this->Html->css('dashboard');
		echo $this->fetch('meta');
		//echo $this->fetch('script');
		echo $this->Html->script('jquery');
	?>
</head>
<body>
	<div class="clearfix" id="content">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>
	<?php // echo $this->element('sql_dump'); ?>
<script>
$(document).ready(function(){

});
</script>
</body>
</html>