// file: /app/webroot/js/common.js

//hide flash messages after 10 seconds
$(document).ready(function(){

	// fade out good flash messages after 3 seconds
	//$('.flash_good').animate({opacity: 1.0}, 5000).fadeOut();
	$('.flash_good').delay(10000).slideUp('slow','swing');
	//$('.flash_bad').animate({opacity: 1.0}, 5000).fadeOut();
	$('.flash_bad').delay(10000).slideUp('slow','swing');
});

//placeholder text in forms
jQuery(function() {
	jQuery.support.placeholder = false;
	test = document.createElement('input');
	if('placeholder' in test) jQuery.support.placeholder = true;
});
$(function() {
	if(!$.support.placeholder) { 
		var active = document.activeElement;
		$(':text').focus(function () {
			if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
				$(this).val('').removeClass('hasPlaceholder');
			}
		}).blur(function () {
			if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
				$(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
			}
		});
		$(':text').blur();
		$(active).focus();
		$('form').submit(function () {
			$(this).find('.hasPlaceholder').each(function() { $(this).val(''); });
		});
	}
});