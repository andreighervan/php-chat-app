<?php

// Set global variables
	$optinforms_form1_background = get_option('optinforms_form1_background');
	$optinforms_form1_border = get_option('optinforms_form1_border');
	$optinforms_form1_title = get_option('optinforms_form1_title');
	$optinforms_form1_title_font = get_option('optinforms_form1_title_font');
	$optinforms_form1_title_size = get_option('optinforms_form1_title_size');
	$optinforms_form1_title_color = get_option('optinforms_form1_title_color');
	$optinforms_form1_subtitle = get_option('optinforms_form1_subtitle');
	$optinforms_form1_subtitle_font = get_option('optinforms_form1_subtitle_font');
	$optinforms_form1_subtitle_size = get_option('optinforms_form1_subtitle_size');
	$optinforms_form1_subtitle_color = get_option('optinforms_form1_subtitle_color');
	$optinforms_form1_name_field = get_option('optinforms_form1_name_field');
	$optinforms_form1_email_field = get_option('optinforms_form1_email_field');
	$optinforms_form1_fields_font = get_option('optinforms_form1_fields_font');
	$optinforms_form1_fields_size = get_option('optinforms_form1_fields_size');
	$optinforms_form1_fields_color = get_option('optinforms_form1_fields_color');
	$optinforms_form1_button_text = get_option('optinforms_form1_button_text');
	$optinforms_form1_button_text_font = get_option('optinforms_form1_button_text_font');
	$optinforms_form1_button_text_size = get_option('optinforms_form1_button_text_size');
	$optinforms_form1_button_text_color = get_option('optinforms_form1_button_text_color');
	$optinforms_form1_button_background = get_option('optinforms_form1_button_background');
	$optinforms_form1_disclaimer = get_option('optinforms_form1_disclaimer');
	$optinforms_form1_disclaimer_font = get_option('optinforms_form1_disclaimer_font');
	$optinforms_form1_disclaimer_size = get_option('optinforms_form1_disclaimer_size');
	$optinforms_form1_disclaimer_color = get_option('optinforms_form1_disclaimer_color');
	$optinforms_form1_width = get_option('optinforms_form1_width');
	$optinforms_form1_width_pixels = get_option('optinforms_form1_width_pixels');
	$optinforms_form1_hide_title = get_option('optinforms_form1_hide_title');
	$optinforms_form1_hide_subtitle = get_option('optinforms_form1_hide_subtitle');
	$optinforms_form1_hide_name_field = get_option('optinforms_form1_hide_name_field');
	$optinforms_form1_hide_disclaimer = get_option('optinforms_form1_hide_disclaimer');
	$optinforms_form1_css = get_option('optinforms_form1_css');


// FORM1: default background color
function optinforms_form1_default_background() {
	global $optinforms_form1_background;
	if(empty($optinforms_form1_background)) {
		$optinforms_form1_background = "#FFFFFF";
	}
	return $optinforms_form1_background;
}

// FORM1: default border color
function optinforms_form1_default_border() {
	global $optinforms_form1_border;
	if(empty($optinforms_form1_border)) {
		$optinforms_form1_border = "#E0E0E0";
	}
	return $optinforms_form1_border;
}

// FORM1: default title
function optinforms_form1_default_title() {
	global $optinforms_form1_title;
	if(empty($optinforms_form1_title)) {
		$optinforms_form1_title = __('Get Free Email Updates!', 'optin-forms');
	}
	return $optinforms_form1_title;
}

// FORM1: default title font
function optinforms_form1_default_title_font() {
	global $optinforms_form1_title_font;
	if(empty($optinforms_form1_title_font)) {
		$optinforms_form1_title_font = "Damion";
	}
	return $optinforms_form1_title_font;
}

// FORM1: title font options
function optinforms_get_form1_title_font_options() {
	global $optinforms_form1_title_font;
	global $optinforms_included_fonts;
	foreach ($optinforms_included_fonts as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form1_title_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM1: default title font size
function optinforms_form1_default_title_size() {
	global $optinforms_form1_title_size;
	if(empty($optinforms_form1_title_size)) {
		$optinforms_form1_title_size = "36px";
	}
	return $optinforms_form1_title_size;
}

// FORM1: title font size options
function optinforms_get_form1_title_size_options() {
	global $optinforms_form1_title_size;
	foreach (range(10, 72) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form1_title_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM1: default title color
function optinforms_form1_default_title_color() {
	global $optinforms_form1_title_color;
	if(empty($optinforms_form1_title_color)) {
		$optinforms_form1_title_color = "#eb432c";
	}
	return $optinforms_form1_title_color;
}

// FORM1: default subtitle
function optinforms_form1_default_subtitle() {
	global $optinforms_form1_subtitle;
	if(empty($optinforms_form1_subtitle)) {
		$optinforms_form1_subtitle = __('Signup now and receive an email once I publish new content.', 'optin-forms');
	}
	return $optinforms_form1_subtitle;
}

// FORM1: default subtitle font
function optinforms_form1_default_subtitle_font() {
	global $optinforms_form1_subtitle_font;
	if(empty($optinforms_form1_subtitle_font)) {
		$optinforms_form1_subtitle_font = "Arial";
	}
	return $optinforms_form1_subtitle_font;
}

// FORM1: subtitle font options
function optinforms_get_form1_subtitle_font_options() {
	global $optinforms_form1_subtitle_font;
	global $optinforms_included_fonts;
	foreach ($optinforms_included_fonts as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form1_subtitle_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM1: default subtitle font size
function optinforms_form1_default_subtitle_size() {
	global $optinforms_form1_subtitle_size;
	if(empty($optinforms_form1_subtitle_size)) {
		$optinforms_form1_subtitle_size = "16px";
	}
	return $optinforms_form1_subtitle_size;
}

// FORM1: subtitle font size options
function optinforms_get_form1_subtitle_size_options() {
	global $optinforms_form1_subtitle_size;
	foreach (range(10, 72) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form1_subtitle_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM1: default subtitle color
function optinforms_form1_default_subtitle_color() {
	global $optinforms_form1_subtitle_color;
	if(empty($optinforms_form1_subtitle_color)) {
		$optinforms_form1_subtitle_color = "#000000";
	}
	return $optinforms_form1_subtitle_color;
}

// FORM1: default name field
function optinforms_form1_default_name_field() {
	global $optinforms_form1_name_field;
	if(empty($optinforms_form1_name_field)) {
		$optinforms_form1_name_field = __('Enter Your Name', 'optin-forms');
	}
	return $optinforms_form1_name_field;
}

// FORM1: default email field
function optinforms_form1_default_email_field() {
	global $optinforms_form1_email_field;
	if(empty($optinforms_form1_email_field)) {
		$optinforms_form1_email_field = __('Enter Your Email Address', 'optin-forms');
	}
	return $optinforms_form1_email_field;
}

// FORM1: default email fields font
function optinforms_form1_default_fields_font() {
	global $optinforms_form1_fields_font;
	if(empty($optinforms_form1_fields_font)) {
		$optinforms_form1_fields_font = "Arial, Helvetica, sans-serif";
	}
	return $optinforms_form1_fields_font;
}

// FORM1: email fields font options
function optinforms_get_form1_fields_font_options() {
	global $optinforms_form1_fields_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form1_fields_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM1: email fields font size
function optinforms_form1_default_fields_size() {
	global $optinforms_form1_fields_size;
	if(empty($optinforms_form1_fields_size)) {
		$optinforms_form1_fields_size = "12px";
	}
	return $optinforms_form1_fields_size;
}

// FORM1: email fields font size options
function optinforms_get_form1_fields_size_options() {
	global $optinforms_form1_fields_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form1_fields_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM1: default fields color
function optinforms_form1_default_fields_color() {
	global $optinforms_form1_fields_color;
	if(empty($optinforms_form1_fields_color)) {
		$optinforms_form1_fields_color = "#666666";
	}
	return $optinforms_form1_fields_color;
}

// FORM1: default button text
function optinforms_form1_default_button_text() {
	global $optinforms_form1_button_text;
	if(empty($optinforms_form1_button_text)) {
		$optinforms_form1_button_text = __('SIGN UP', 'optin-forms');
	}
	return $optinforms_form1_button_text;
}

// FORM1: default button text font
function optinforms_form1_default_button_text_font() {
	global $optinforms_form1_button_text_font;
	if(empty($optinforms_form1_button_text_font)) {
		$optinforms_form1_button_text_font = "Arial, Helvetica, sans-serif";
	}
	return $optinforms_form1_button_text_font;
}

// FORM1: button text font options
function optinforms_get_form1_button_text_font_options() {
	global $optinforms_form1_button_text_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form1_button_text_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM1: button text font size
function optinforms_form1_default_button_text_size() {
	global $optinforms_form1_button_text_size;
	if(empty($optinforms_form1_button_text_size)) {
		$optinforms_form1_button_text_size = "14px";
	}
	return $optinforms_form1_button_text_size;
}

// FORM1: button text font size options
function optinforms_get_form1_button_text_size_options() {
	global $optinforms_form1_button_text_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form1_button_text_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM1: default button text color
function optinforms_form1_default_button_text_color() {
	global $optinforms_form1_button_text_color;
	if(empty($optinforms_form1_button_text_color)) {
		$optinforms_form1_button_text_color = "#FFFFFF";
	}
	return $optinforms_form1_button_text_color;
}

// FORM1: default button background color
function optinforms_form1_default_button_background() {
	global $optinforms_form1_button_background;
	if(empty($optinforms_form1_button_background)) {
		$optinforms_form1_button_background = "#20A64C";
	}
	return $optinforms_form1_button_background;
}

// FORM1: default disclaimer
function optinforms_form1_default_disclaimer() {
	global $optinforms_form1_disclaimer;
	if(empty($optinforms_form1_disclaimer)) {
		$optinforms_form1_disclaimer = __('I will never give away, trade or sell your email address. You can unsubscribe at any time.', 'optin-forms');
	}
	return $optinforms_form1_disclaimer;
}

// FORM1: default disclaimer font
function optinforms_form1_default_disclaimer_font() {
	global $optinforms_form1_disclaimer_font;
	if(empty($optinforms_form1_disclaimer_font)) {
		$optinforms_form1_disclaimer_font = "Arial, Helvetica, sans-serif";
	}
	return $optinforms_form1_disclaimer_font;
}

// FORM1: disclaimer font options
function optinforms_get_form1_disclaimer_font_options() {
	global $optinforms_form1_disclaimer_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form1_disclaimer_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM1: disclaimer font size
function optinforms_form1_default_disclaimer_size() {
	global $optinforms_form1_disclaimer_size;
	if(empty($optinforms_form1_disclaimer_size)) {
		$optinforms_form1_disclaimer_size = "12px";
	}
	return $optinforms_form1_disclaimer_size;
}

// FORM1: disclaimer font size options
function optinforms_get_form1_disclaimer_size_options() {
	global $optinforms_form1_disclaimer_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form1_disclaimer_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM1: default disclaimer color
function optinforms_form1_default_disclaimer_color() {
	global $optinforms_form1_disclaimer_color;
	if(empty($optinforms_form1_disclaimer_color)) {
		$optinforms_form1_disclaimer_color = "#666666";
	}
	return $optinforms_form1_disclaimer_color;
}

// FORM1: default width
function optinforms_form1_default_width() {
	global $optinforms_form1_width;
	if(empty($optinforms_form1_width)) {
		$optinforms_form1_width = 0;
	}
}

// FORM1: 100% width checked
function optinforms_form1_checked_width_100() {
	global $optinforms_form1_width;
	if($optinforms_form1_width == 0) {
		echo "checked=\"checked\"";
	}
}

// FORM1: fixed width checked
function optinforms_form1_checked_width_fixed() {
	global $optinforms_form1_width;
	if($optinforms_form1_width == 1) {
		echo "checked=\"checked\"";
	}
}

// FORM1: fixed width disabled if width is 100%
function optinforms_form1_disabled_width_pixels() {
	global $optinforms_form1_width;
	if($optinforms_form1_width == 0) {
		echo "disabled=\"disabled\"";
	}
}

// FORM1: default width fixed
function optinforms_form1_default_width_pixels() {
	global $optinforms_form1_width_pixels;
	if(empty($optinforms_form1_width_pixels)) {
		$optinforms_form1_width_pixels = "700";
	}
	return $optinforms_form1_width_pixels;
}

// FORM1: default width fixed
function optinforms_form1_get_width() {
	global $optinforms_form1_width;
	if($optinforms_form1_width == 0) {
		// do nothing
	}
	elseif($optinforms_form1_width == 1) {
		return "style=\"width:" . optinforms_form1_default_width_pixels() . "px\"";
	}
}

// FORM1: hide the title
function optinforms_form1_hide_title() {
	global $optinforms_form1_hide_title;
	return $optinforms_form1_hide_title;
}

// FORM1: hide the title - convert to CSS
function optinforms_form1_hide_title_css() {
	global $optinforms_form1_hide_title;
	if($optinforms_form1_hide_title == 1) {
		return "#optinforms-form1-title{display:none;}";
	}
}

// FORM1: hide the subtitle
function optinforms_form1_hide_subtitle() {
	global $optinforms_form1_hide_subtitle;
	return $optinforms_form1_hide_subtitle;
}

// FORM1: hide the subtitle - convert to CSS
function optinforms_form1_hide_subtitle_css() {
	global $optinforms_form1_hide_subtitle;
	if($optinforms_form1_hide_subtitle == 1) {
		return "#optinforms-form1-subtitle{display:none;}";
	}
}

// FORM1: hide the name field
function optinforms_form1_hide_name_field() {
	global $optinforms_form1_hide_name_field;
	return $optinforms_form1_hide_name_field;
}

// FORM1: hide the name field - convert to CSS
function optinforms_form1_hide_name_field_css() {
	global $optinforms_form1_hide_name_field;
	if($optinforms_form1_hide_name_field == 1) {
		return "#optinforms-form1-name-field-container{display:none;}#optinforms-form1-email-field-container{width:78%;}";
	}
}

// FORM1: hide the disclaimer
function optinforms_form1_hide_disclaimer() {
	global $optinforms_form1_hide_disclaimer;
	return $optinforms_form1_hide_disclaimer;
}

// FORM1: hide the disclaimer - convert to CSS
function optinforms_form1_hide_disclaimer_css() {
	global $optinforms_form1_hide_disclaimer;
	if($optinforms_form1_hide_disclaimer == 1) {
		return "#optinforms-form1-disclaimer{display:none;}";
	}
}

// FORM1: get our custom CSS
function optinforms_form1_css() {
	global $optinforms_form1_css;
	return $optinforms_form1_css;
}

// FORM1: advanced styling options
function optinforms_form1_add_custom_css() {
	global $optinforms_form1_css;
	return "<style type='text/css'>" . optinforms_form1_hide_title_css() . optinforms_form1_hide_subtitle_css() . optinforms_form1_hide_name_field_css() . optinforms_form1_hide_disclaimer_css() . $optinforms_form1_css . "</style>";
}

?>