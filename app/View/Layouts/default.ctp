<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title> PROLOGUE </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />	
	
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>
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
</head>
<body><?php echo $this->Session->flash(); ?>
	<div id="content">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
	</div>

	<div id="footer">

		<div class="elastic-container">
		<p class="copyright">All Content Copyright <span class="prologueBlue">Prologue.co</span>.<!-- support questions can be sent to support@prologue.co --></a></p>
		</div>


	</div>

<?php // echo $this->element('sql_dump'); ?>
<script type="text/javascript">
  var _gauges = _gauges || [];
  (function() {
    var t   = document.createElement('script');
    t.type  = 'text/javascript';
    t.async = true;
    t.id    = 'gauges-tracker';
    t.setAttribute('data-site-id', '523c8b1a613f5d47b5000060');
    t.src = '//secure.gaug.es/track.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(t, s);
  })();
</script>	
</body>
</html>