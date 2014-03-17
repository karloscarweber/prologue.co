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
		<span class="headerlinks"><a href="/work">Work</a> | <a href="mailto:hello@prologue.co">Contact</a></span>
		<?php echo $this->Session->flash(); ?>
	</header>
	<div id="content">
		<?php echo $this->fetch('content'); ?>
	</div>
	<section class="elastic-row contact-row">
	<div class="elastic-container clearfix">
		<h2>Contact</h2>
		
		<div class="single">
			<p class="lead">We're you ready to get started on You're next project.</p>
			<p>We respond to Email:<br> <a href="mailto:hello@prologue.co" class="button color-white">hello@prologue.co</a> We are also on <a href="https://twitter.com/whatspast">Twitter</a>.<!-- <br> Read our <a href="http://blog.prologue.co">Blog</a>. --></p>
		</div>
	</div>
	</section>
	<footer>
		<p class="copyright">All Content Copyright <span class="prologueBlue">Prologue.co</span>.<!-- support questions can be sent to support@prologue.co --></a></p>
	</footer>
<?php // echo $this->element('sql_dump'); ?>
</body>
</html>