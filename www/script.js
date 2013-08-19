$(document).ready(function(){
	//Awesome Widgets

	// checkbox clicker
	$('.checkboxes').on('click', function(event){

		var checked = $(this).find('input').prop('checked');
		if(checked == undefined || checked == false){
			$(this).find('input').prop('checked', true);
		} else {
			$(this).find('input').prop('checked', false);
		}
	});
	$('.checkboxes input').on('click', function(event){
		$(this).parent().click();
	});

});
