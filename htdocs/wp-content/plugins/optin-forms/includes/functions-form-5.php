<?php

// Set global variables
	$optinforms_form5_background = get_option('optinforms_form5_background');
	$optinforms_form5_title = get_option('optinforms_form5_title');
	$optinforms_form5_title_font = get_option('optinforms_form5_title_font');
	$optinforms_form5_title_size = get_option('optinforms_form5_title_size');
	$optinforms_form5_title_color = get_option('optinforms_form5_title_color');
	$optinforms_form5_subtitle = get_option('optinforms_form5_subtitle');
	$optinforms_form5_subtitle_font = get_option('optinforms_form5_subtitle_font');
	$optinforms_form5_subtitle_size = get_option('optinforms_form5_subtitle_size');
	$optinforms_form5_subtitle_color = get_option('optinforms_form5_subtitle_color');
	$optinforms_form5_name_field = get_option('optinforms_form5_name_field');
	$optinforms_form5_email_field = get_option('optinforms_form5_email_field');
	$optinforms_form5_fields_font = get_option('optinforms_form5_fields_font');
	$optinforms_form5_fields_size = get_option('optinforms_form5_fields_size');
	$optinforms_form5_fields_color = get_option('optinforms_form5_fields_color');
	$optinforms_form5_button_text = get_option('optinforms_form5_button_text');
	$optinforms_form5_button_text_font = get_option('optinforms_form5_button_text_font');
	$optinforms_form5_button_text_size = get_option('optinforms_form5_button_text_size');
	$optinforms_form5_button_text_color = get_option('optinforms_form5_button_text_color');
	$optinforms_form5_button_background = get_option('optinforms_form5_button_background');
	$optinforms_form5_disclaimer = get_option('optinforms_form5_disclaimer');
	$optinforms_form5_disclaimer_font = get_option('optinforms_form5_disclaimer_font');
	$optinforms_form5_disclaimer_size = get_option('optinforms_form5_disclaimer_size');
	$optinforms_form5_disclaimer_color = get_option('optinforms_form5_disclaimer_color');
	$optinforms_form5_width = get_option('optinforms_form5_width');
	$optinforms_form5_width_pixels = get_option('optinforms_form5_width_pixels');
	$optinforms_form5_hide_title = get_option('optinforms_form5_hide_title');
	$optinforms_form5_hide_subtitle = get_option('optinforms_form5_hide_subtitle');
	$optinforms_form5_hide_name_field = get_option('optinforms_form5_hide_name_field');
	$optinforms_form5_hide_disclaimer = get_option('optinforms_form5_hide_disclaimer');
	$optinforms_form5_css = get_option('optinforms_form5_css');


// FORM5: default background color
function optinforms_form5_default_background() {
	global $optinforms_form5_background;
	if(empty($optinforms_form5_background)) {
		$optinforms_form5_background = "#333333";
	}
	return $optinforms_form5_background;
}

// FORM5: default title
function optinforms_form5_default_title() {
	global $optinforms_form5_title;
	if(empty($optinforms_form5_title)) {
		$optinforms_form5_title = __('JOIN OUR NEWSLETTER', 'optin-forms');
	}
	return $optinforms_form5_title;
}

// FORM5: default title font
function optinforms_form5_default_title_font() {
	global $optinforms_form5_title_font;
	if(empty($optinforms_form5_title_font)) {
		$optinforms_form5_title_font = "News Cycle";
	}
	return $optinforms_form5_title_font;
}

// FORM5: title font options
function optinforms_get_form5_title_font_options() {
	global $optinforms_form5_title_font;
	global $optinforms_included_fonts;
	foreach ($optinforms_included_fonts as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form5_title_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM5: default title font size
function optinforms_form5_default_title_size() {
	global $optinforms_form5_title_size;
	if(empty($optinforms_form5_title_size)) {
		$optinforms_form5_title_size = "24px";
	}
	return $optinforms_form5_title_size;
}

// FORM5: title font size options
function optinforms_get_form5_title_size_options() {
	global $optinforms_form5_title_size;
	foreach (range(10, 72) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form5_title_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM5: default title color
function optinforms_form5_default_title_color() {
	global $optinforms_form5_title_color;
	if(empty($optinforms_form5_title_color)) {
		$optinforms_form5_title_color = "#fb6a13";
	}
	return $optinforms_form5_title_color;
}

// FORM5: default subtitle
function optinforms_form5_default_subtitle() {
	global $optinforms_form5_subtitle;
	if(empty($optinforms_form5_subtitle)) {
		$optinforms_form5_subtitle = __('Join over 3.000 visitors who are receiving our newsletter and learn how to optimize your blog for search engines, find free traffic, and monetize your website.', 'optin-forms');
	}
	return $optinforms_form5_subtitle;
}

// FORM5: default subtitle font
function optinforms_form5_default_subtitle_font() {
	global $optinforms_form5_subtitle_font;
	if(empty($optinforms_form5_subtitle_font)) {
		$optinforms_form5_subtitle_font = "Georgia";
	}
	return $optinforms_form5_subtitle_font;
}

// FORM5: subtitle font options
function optinforms_get_form5_subtitle_font_options() {
	global $optinforms_form5_subtitle_font;
	global $optinforms_included_fonts;
	foreach ($optinforms_included_fonts as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form5_subtitle_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM5: default subtitle font size
function optinforms_form5_default_subtitle_size() {
	global $optinforms_form5_subtitle_size;
	if(empty($optinforms_form5_subtitle_size)) {
		$optinforms_form5_subtitle_size = "16px";
	}
	return $optinforms_form5_subtitle_size;
}

// FORM5: subtitle font size options
function optinforms_get_form5_subtitle_size_options() {
	global $optinforms_form5_subtitle_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form5_subtitle_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM5: default subtitle color
function optinforms_form5_default_subtitle_color() {
	global $optinforms_form5_subtitle_color;
	if(empty($optinforms_form5_subtitle_color)) {
		$optinforms_form5_subtitle_color = "#cccccc";
	}
	return $optinforms_form5_subtitle_color;
}

// FORM5: default name field
function optinforms_form5_default_name_field() {

	global $optinforms_form5_name_field;
	if(empty($optinforms_form5_name_field)) {
		$optinforms_form5_name_field = __('Enter Your Name', 'optin-forms');
	}
	return $optinforms_form5_name_field;
}

// FORM5: default email field
function optinforms_form5_default_email_field() {
	global $optinforms_form5_email_field;
	if(empty($optinforms_form5_email_field)) {
		$optinforms_form5_email_field = __('Enter Your Email', 'optin-forms');
	}
	return $optinforms_form5_email_field;
}

// FORM5: default email fields font
function optinforms_form5_default_fields_font() {
	global $optinforms_form5_fields_font;
	if(empty($optinforms_form5_fields_font)) {
		$optinforms_form5_fields_font = "Arial, Helvetica, sans-serif";
	}
	return $optinforms_form5_fields_font;
}

// FORM5: email fields font options
function optinforms_get_form5_fields_font_options() {
	global $optinforms_form5_fields_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form5_fields_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM5: email fields font size
function optinforms_form5_default_fields_size() {
	global $optinforms_form5_fields_size;
	if(empty($optinforms_form5_fields_size)) {
		$optinforms_form5_fields_size = "12px";
	}
	return $optinforms_form5_fields_size;
}

// FORM5: email fields font size options
function optinforms_get_form5_fields_size_options() {
	global $optinforms_form5_fields_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form5_fields_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM5: default fields color
function optinforms_form5_default_fields_color() {
	global $optinforms_form5_fields_color;
	if(empty($optinforms_form5_fields_color)) {
		$optinforms_form5_fields_color = "#000000";
	}
	return $optinforms_form5_fields_color;
}

// FORM5: default button text
function optinforms_form5_default_button_text() {
	global $optinforms_form5_button_text;
	if(empty($optinforms_form5_button_text)) {
		$optinforms_form5_button_text = __('SUBSCRIBE FOR FREE', 'optin-forms');
	}
	return $optinforms_form5_button_text;
}

// FORM5: default button text font
function optinforms_form5_default_button_text_font() {
	global $optinforms_form5_button_text_font;
	if(empty($optinforms_form5_button_text_font)) {
		$optinforms_form5_button_text_font = "Arial, Helvetica, sans-serif";
	}
	return $optinforms_form5_button_text_font;
}

// FORM5: button text font options
function optinforms_get_form5_button_text_font_options() {
	global $optinforms_form5_button_text_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form5_button_text_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM5: button text font size
function optinforms_form5_default_button_text_size() {
	global $optinforms_form5_button_text_size;
	if(empty($optinforms_form5_button_text_size)) {
		$optinforms_form5_button_text_size = "16px";
	}
	return $optinforms_form5_button_text_size;
}

// FORM5: button text font size options
function optinforms_get_form5_button_text_size_options() {
	global $optinforms_form5_button_text_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form5_button_text_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM5: default button text color
function optinforms_form5_default_button_text_color() {
	global $optinforms_form5_button_text_color;
	if(empty($optinforms_form5_button_text_color)) {
		$optinforms_form5_button_text_color = "#FFFFFF";
	}
	return $optinforms_form5_button_text_color;
}

// FORM5: default button background color
function optinforms_form5_default_button_background() {
	global $optinforms_form5_button_background;
	if(empty($optinforms_form5_button_background)) {
		$optinforms_form5_button_background = "#fb6a13";
	}
	return $optinforms_form5_button_background;
}

// FORM5: default disclaimer
function optinforms_form5_default_disclaimer() {
	global $optinforms_form5_disclaimer;
	if(empty($optinforms_form5_disclaimer)) {
		$optinforms_form5_disclaimer = __('We hate spam. Your email address will not be sold or shared with anyone else.', 'optin-forms');
	}
	return $optinforms_form5_disclaimer;
}

// FORM5: default disclaimer font
function optinforms_form5_default_disclaimer_font() {
	global $optinforms_form5_disclaimer_font;
	if(empty($optinforms_form5_disclaimer_font)) {
		$optinforms_form5_disclaimer_font = "Georgia, Times New Roman, Times, serif";
	}
	return $optinforms_form5_disclaimer_font;
}

// FORM5: disclaimer font options
function optinforms_get_form5_disclaimer_font_options() {
	global $optinforms_form5_disclaimer_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form5_disclaimer_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM5: disclaimer font size
function optinforms_form5_default_disclaimer_size() {
	global $optinforms_form5_disclaimer_size;
	if(empty($optinforms_form5_disclaimer_size)) {
		$optinforms_form5_disclaimer_size = "14px";
	}
	return $optinforms_form5_disclaimer_size;
}

// FORM5: disclaimer font size options
function optinforms_get_form5_disclaimer_size_options() {
	global $optinforms_form5_disclaimer_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form5_disclaimer_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM5: default disclaimer color
function optinforms_form5_default_disclaimer_color() {
	global $optinforms_form5_disclaimer_color;
	if(empty($optinforms_form5_disclaimer_color)) {
		$optinforms_form5_disclaimer_color = "#727272";
	}
	return $optinforms_form5_disclaimer_color;
}

// FORM5: default width
function optinforms_form5_default_width() {
	global $optinforms_form5_width;
	if(empty($optinforms_form5_width)) {
		$optinforms_form5_width = 0;
	}
}

// FORM5: 100% width checked
function optinforms_form5_checked_width_100() {
	global $optinforms_form5_width;
	if($optinforms_form5_width == 0) {
		echo "checked=\"checked\"";
	}
}

// FORM5: fixed width checked
function optinforms_form5_checked_width_fixed() {
	global $optinforms_form5_width;
	if($optinforms_form5_width == 1) {
		echo "checked=\"checked\"";
	}
}

// FORM5: fixed width disabled if width is 100%
function optinforms_form5_disabled_width_pixels() {
	global $optinforms_form5_width;
	if($optinforms_form5_width == 0) {
		echo "disabled=\"disabled\"";
	}
}

// FORM5: default width fixed
function optinforms_form5_default_width_pixels() {
	global $optinforms_form5_width_pixels;
	if(empty($optinforms_form5_width_pixels)) {
		$optinforms_form5_width_pixels = "700";
	}
	return $optinforms_form5_width_pixels;
}

// FORM5: default width fixed
function optinforms_form5_get_width() {
	global $optinforms_form5_width;
	if($optinforms_form5_width == 0) {
		// do nothing
	}
	elseif($optinforms_form5_width == 1) {
		return "style=\"width:" . optinforms_form5_default_width_pixels() . "px\"";
	}
}

// FORM5: hide the title
function optinforms_form5_hide_title() {
	global $optinforms_form5_hide_title;
	return $optinforms_form5_hide_title;
}

// FORM5: hide the title - convert to CSS
function optinforms_form5_hide_title_css() {
	global $optinforms_form5_hide_title;
	if($optinforms_form5_hide_title == 1) {
		return "#optinforms-form5-title{display:none;}";
	}
}

// FORM5: hide the subtitle
function optinforms_form5_hide_subtitle() {
	global $optinforms_form5_hide_subtitle;
	return $optinforms_form5_hide_subtitle;
}

// FORM5: hide the subtitle - convert to CSS
function optinforms_form5_hide_subtitle_css() {
	global $optinforms_form5_hide_subtitle;
	if($optinforms_form5_hide_subtitle == 1) {
		return "#optinforms-form5-subtitle{display:none;}#optinforms-form5-disclaimer{margin:0 20px;}";
	}
}

// FORM5: hide the name field
function optinforms_form5_hide_name_field() {
	global $optinforms_form5_hide_name_field;
	return $optinforms_form5_hide_name_field;
}

// FORM5: hide the name field - convert to CSS
function optinforms_form5_hide_name_field_css() {
	global $optinforms_form5_hide_name_field;
	if($optinforms_form5_hide_name_field == 1) {
		return "#optinforms-form5-name-field{display:none;}";
	}
}

// FORM5: hide the disclaimer
function optinforms_form5_hide_disclaimer() {
	global $optinforms_form5_hide_disclaimer;
	return $optinforms_form5_hide_disclaimer;
}

// FORM5: hide the disclaimer - convert to CSS
function optinforms_form5_hide_disclaimer_css() {
	global $optinforms_form5_hide_disclaimer;
	if($optinforms_form5_hide_disclaimer == 1) {
		return "#optinforms-form5-disclaimer{display:none;}";
	}
}

// FORM5: if both subtitle and disclaimer are hidden, hide the right container
function optinforms_form5_hide_subtitle_disclaimer_css() {
	global $optinforms_form5_hide_subtitle, $optinforms_form5_hide_disclaimer;
	if(($optinforms_form5_hide_subtitle == 1) && ($optinforms_form5_hide_disclaimer == 1)) {
		return "#optinforms-form5-container-right{display:none;}#optinforms-form5-container-left{margin:10px 0;width:100%;}";
	}
}

// FORM5: get our custom CSS
function optinforms_form5_css() {
	global $optinforms_form5_css;
	return $optinforms_form5_css;
}

// FORM5: advanced styling options
function optinforms_form5_add_custom_css() {
	global $optinforms_form5_css;
	return "<style type='text/css'>" . optinforms_form5_hide_title_css() . optinforms_form5_hide_subtitle_css() . optinforms_form5_hide_name_field_css() . optinforms_form5_hide_disclaimer_css() . optinforms_form5_hide_subtitle_disclaimer_css() . $optinforms_form5_css . "</style>";
}		

?>