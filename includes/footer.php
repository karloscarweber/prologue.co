	<div class="single copyright">
		
		<p>A Prologue Production</p>
		<p>Say <a href="mailto:hello@prologue.co">hello@prologue.co</a></p>

	</div>
<script type='text/javascript' src='https://plasso.co/embed/v2/embed.js'></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
$(function(){
	setTimeout(function(){
		$('.gumroad-button').find('span').remove();
	}, 200);

	setTimeout(function(){
		$('.gumroad-button').find('span').remove();
	}, 1000);

});

$(function(){
    // menu
    $('.site-nav-menu-button').click(function(){
        $(this).toggleClass('active');

        var $sitnav = $('.site-nav');

        if($(this).hasClass('active')) {
            
            $sitnav.slideDown(200, function(){
                $sitnav.removeClass('mobile-hidden');
            });
        } else {

            $sitnav.slideUp(200, function(){
                $sitnav.addClass('mobile-hidden');
            });
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
    t.setAttribute('data-site-id', '53e7e0e5e32bb44ef20086e4');
    t.src = '//secure.gaug.es/track.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(t, s);
  })();
</script>