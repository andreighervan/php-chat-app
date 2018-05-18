// <![CDATA[
jQuery(document).ready(function($) {
	$('#easyoptin-slider').before('<div class="slider-controls"><a href="#" id="prev">&lt;</a> <a href="#" id="next">&gt;</a></div>').cycle({ 
    timeout: 0 * 1000,
	fx:      'scrollHorz',
	next:   '#prev',
	prev:   '#next',
});
});
// ]]>