$(document).ready(function() {
	$('.dropdown').on('click','.dropdown-toggle', function(e) {
		$(this).parent('.dropdown').find('.dropdown-menu').toggle();
	});

});    