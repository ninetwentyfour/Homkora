// file: /app/webroot/js/common.js

//hide flash messages after 10 seconds
$(document).ready(function(){

	// fade out good flash messages after 3 seconds
	//$('.flash_good').animate({opacity: 1.0}, 5000).fadeOut();
	$('.flash_good').delay(10000).slideUp('slow','swing');
	//$('.flash_bad').animate({opacity: 1.0}, 5000).fadeOut();
	$('.flash_bad').delay(10000).slideUp('slow','swing');
});
