$(function(){

	$('.site-nav__link').on('click', function(){

		$('nav').addClass('active');
		$('.site-nav').addClass('active');
		$('.site-nav__link').parent().addClass('hidden');
		$('.close-nav__link').parent().removeClass('hidden');
	});

	$('.close-nav__link').on('click', function(){
		$('nav').removeClass('active');
		$('.site-nav').removeClass('active');
		$('.site-nav__link').parent().removeClass('hidden');
		$('.close-nav__link').parent().addClass('hidden');
	});

});
