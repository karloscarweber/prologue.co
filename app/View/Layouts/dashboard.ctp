<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title> PROLOGUE </title>
	<!--<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic' rel='stylesheet' type='text/css'>-->
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('normalize');
		echo $this->Html->css('grater-dash');
		echo $this->Html->css('dashboard');
		echo $this->fetch('meta');
		//echo $this->fetch('script');
		echo $this->Html->script('jquery');
	?>
	<!-- SkeuoCard Stuff -->
	<link rel="stylesheet" type="text/css" href="/styles/skeuocard.reset.css">
	<link rel="stylesheet" type="text/css" href="/styles/skeuocard.css">
	<script src="/javascripts/vendor/cssua.min.js"></script>
	<script src="/javascripts/skeuocard.min.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	
</head>
<body>
<div id="menu-container">
	<a href="/" class="logoLink"><h1 class="logo">Prologue</h1></a>
	<a href="#" class="hamburger"> <img src="/img/hamburger.svg"> </a>
	<a href="/users/dashboard" class="header logoLink" data-type="dashboard">Dashboard</a>
	<a href="#" class="header" data-type="account">Account</a>
	<a href="#" class="header" data-type="apps">Apps</a>
	<ul id="apps">
	<li><a href="#" data-slug="prologue" data-type="apps">Prologue</a></li>
	<li><a href="#" data-slug="climber" data-type="apps">Climber</a></li>
	<li><a href="#" data-slug="supercheddar" data-type="apps">SuperCheddar</a></li>
	</ul>
	<a href="#" class="header" data-type="books">Books</a>
	<ul id="books">
	<li><a href="#" data-slug="howtofail" data-type="books">How To Fail</a></li>
	<li><a href="#" data-slug="howtofail" data-type="books">How To Ghost</a></li>
	</ul>
</div>
<div id="dashboard-container">
	<?php echo $this->fetch('content'); ?>
</div><!--<div class="clearfix" id="content">
		<?php echo $this->Session->flash(); ?>
	</div>-->
	<?php // echo $this->element('sql_dump'); ?>
<script>
$(document).ready(function(){

	// menu animations
	$('#menu-container a').on('click', function(event){
		if($(this).hasClass('logoLink')){

		} else {
			event.preventDefault();
			var data = $(this).data();

			if($(this).hasClass('header')){

				$('ul').slideUp();
				$('#'+data.type).slideDown();

				if(data.type == 'account'){
					$('#menu-container').removeClass('active');	
				}
			} else {

				if($(this).hasClass('hamburger')){

					if($('#menu-container').hasClass('active')){
						$('#menu-container').removeClass('active');
					} else {
						$('#menu-container').addClass('active');
					}
				} else {
					$('#menu-container').removeClass('active');	
				}
			}

			var requestURL = "<?php echo $this->Html->url('/'); ?>"+data.type+"/";
			if(typeof data.slug !== 'undefined'){
				requestURL = requestURL+data.slug;
			}
			
			if(typeof data.type !== 'undefined'){
				$.get(requestURL,'',function(data){
					$('#dashboard-container').slideUp(function(){
						$(this).html(data).slideDown();
					});
				},'html');
			}
		}
	});
});
</script>
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