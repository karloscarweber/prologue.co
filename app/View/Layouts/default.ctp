<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title> PROLOGUE </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />	
	
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Cabin' rel='stylesheet' type='text/css'>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('grater');
		echo $this->Html->css('main');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('jquery');
		echo $this->Html->script('main');
	?>
	<meta name="google-site-verification" content="y5YPDUDxg3tCXmXpG65oTJK2Yye9KZqYddoHsN49n9s" />
</head>
<body><?php echo $this->Session->flash(); ?>
	<header>
		<a href="/" class="logo">prologue</a>
		<span class="headerlinks"><a href="/">About</a> | <a href="/">Contact</a></span>
		<?php echo $this->Session->flash(); ?>
	</header>
	<div id="content">
		<?php echo $this->fetch('content'); ?>
	</div>
	<footer>
		<p class="copyright">All Content Copyright <span class="prologueBlue">Prologue.co</span>.<!-- support questions can be sent to support@prologue.co --></a></p>
	</footer>
<?php // echo $this->element('sql_dump'); ?>
</body>
</html>