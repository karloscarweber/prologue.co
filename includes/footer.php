
<!--     <div class="elastic-container blue-row">
        <div class="single marketing-text">

            <p style="text-align:center;color:white;">Learning to program without help was difficult and frustrating. I can give you the advice and help that I was missing.<br>Join the newsletter to stay up to date with the best Books, Articles, and Apps about Swift Programming.</p>

            <a href="https://gumroad.com/karloscarweber/follow" class="button">Subscribe</a>

        </div>
    </div> -->
    <div class="blue-row">
    <div class="grater-container">
    	<div class="grater copyright">
            <div>
                <p>Prologue is a solo venture by Karl Oscar Weber. Subscribe to get infrequent emails about new books and apps.</p>
                <br>
                <a href="http://eepurl.com/8bFhL" class="button">Subscribe</a>
            </div>
            <div>
                <p>Follow <a href="https://www.twitter.com/whatspast">@whatspast</a> on Twitter for more frequent updates, or say <a href="mailto:hello@prologue.co">hello@prologue.co</a></p>
                <a href="/" class="prologueproduction">A Prologue Production</a>
            </div>
    	</div>
    </div>
    </div>
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