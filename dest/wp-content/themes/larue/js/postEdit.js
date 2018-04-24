(function($) {
    "use strict";
    function show_hide_boxes(val) {
	    switch (val) {
	        case 'image':
	            $('#post_slides, #post_quote, #post_url').css({'display':'none'})
	             $('#post_image').slideDown('normal');
	            break;
	        case 'gallery':
	            $('#post_quote, #post_image, #post_url').slideUp('normal');
	            $('#post_slides').slideDown('normal');
	            break;
	        case 'link':
	            $('#post_slides, #post_image, #post_quote').slideUp('normal');
	            $('#post_url').slideDown('normal');
	            break;
	        case 'quote':
	            $('#post_slides, #post_image, #post_url').slideUp('normal');
	            $('#post_quote').slideDown('normal');
	            break;
	        default:
	            $('#post_slides, #post_image, #post_url, #post_quote').css({'display':'none'})
	    }
	}
	$(document).ready(function(){
		$('#post_slides, #post_image, #post_url, #post_quote').addClass('hide-if-js');
	       show_hide_boxes($('input:radio[name="post_format"]:checked').val());
		$('input:radio[name="post_format"]').change(function(){
		    show_hide_boxes($(this).val());
		});
	});
})(jQuery);