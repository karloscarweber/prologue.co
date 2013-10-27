function resize(){

	var viewportWidth  = $(window).width()
	, viewportHeight = $(window).height()

	$('#header').css('height',viewportHeight+'px')
	$('#header').css('width',viewportWidth+'px')

	var logoHeight = viewportHeight / 3;
	$('.logo, .logo-white').css('margin-top',logoHeight+'px')

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