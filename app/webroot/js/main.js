function resize(){

	var viewportWidth  = $(window).width()
	, viewportHeight = $(window).height()
	var logoHeight = viewportHeight * 0.3;

	if(viewportWidth > 640){
		$('.elastic-row.new-york-city').css('height',(viewportHeight * 0.8) + 'px');
	} else {
		$('.elastic-row.new-york-city').css('height', viewportHeight + 'px');
	}
	$('.elastic-row.new-york-city > .elastic-container  h1').css('margin-top',logoHeight+'px');
	$('.elastic-row.contact-row').css('height', (viewportHeight - 120) + 'px');

	if(viewportHeight > 640){
		$('.elastic-row.contact-row > .elastic-container .single').css('margin-top',(logoHeight / 2 )+'px');
		$('.elastic-row.contact-row').css('height', (viewportHeight - 120) + 'px');
	} else {
		$('.elastic-row.contact-row > .elastic-container .single').css('margin-top',+'200px');
		$('.elastic-row.contact-row').css('height', 'auto');
	}
}

$(function(){

  	// whenever the window is resized
	$(window).resize(function() {
		resize();
	});
	resize();

	$('#submitButton').on('click', function(){

		var action = $('.contactForm').attr('action');
		var formdata = $(".contactForm").serialize();
		//console.log(action);

		$.post(action, formdata, function(data){
			//console.log(data);
			//$('.result').html(data);
			$('.contactFormContainer').slideUp();
			$('.thanks').slideDown();
		});
	});
});