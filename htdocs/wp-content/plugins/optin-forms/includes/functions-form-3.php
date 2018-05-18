<?php

// Set global variables
	$optinforms_form3_background = get_option('optinforms_form3_background');
	$optinforms_form3_title = get_option('optinforms_form3_title');
	$optinforms_form3_title_font = get_option('optinforms_form3_title_font');
	$optinforms_form3_title_size = get_option('optinforms_form3_title_size');
	$optinforms_form3_title_color = get_option('optinforms_form3_title_color');
	$optinforms_form3_subtitle = get_option('optinforms_form3_subtitle');
	$optinforms_form3_subtitle_font = get_option('optinforms_form3_subtitle_font');
	$optinforms_form3_subtitle_size = get_option('optinforms_form3_subtitle_size');
	$optinforms_form3_subtitle_color = get_option('optinforms_form3_subtitle_color');
	$optinforms_form3_name_field = get_option('optinforms_form3_name_field');
	$optinforms_form3_email_field = get_option('optinforms_form3_email_field');
	$optinforms_form3_fields_font = get_option('optinforms_form3_fields_font');
	$optinforms_form3_fields_size = get_option('optinforms_form3_fields_size');
	$optinforms_form3_fields_color = get_option('optinforms_form3_fields_color');
	$optinforms_form3_button_text = get_option('optinforms_form3_button_text');
	$optinforms_form3_button_text_font = get_option('optinforms_form3_button_text_font');
	$optinforms_form3_button_text_size = get_option('optinforms_form3_button_text_size');
	$optinforms_form3_button_text_color = get_option('optinforms_form3_button_text_color');
	$optinforms_form3_button_background = get_option('optinforms_form3_button_background');
	$optinforms_form3_width = get_option('optinforms_form3_width');
	$optinforms_form3_width_pixels = get_option('optinforms_form3_width_pixels');
	$optinforms_form3_hide_title = get_option('optinforms_form3_hide_title');
	$optinforms_form3_hide_subtitle = get_option('optinforms_form3_hide_subtitle');
	$optinforms_form3_hide_name_field = get_option('optinforms_form3_hide_name_field');
	$optinforms_form3_css = get_option('optinforms_form3_css');


// FORM3: default background color
function optinforms_form3_default_background() {
	global $optinforms_form3_background;
	if(empty($optinforms_form3_background)) {
		$optinforms_form3_background = "#FFFFFF";
	}
	return $optinforms_form3_background;
}

// FORM3: default title
function optinforms_form3_default_title() {
	global $optinforms_form3_title;
	if(empty($optinforms_form3_title)) {
		$optinforms_form3_title = __('Did you enjoy this article?', 'optin-forms');
	}
	return $optinforms_form3_title;
}

// FORM3: default title font
function optinforms_form3_default_title_font() {
	global $optinforms_form3_title_font;
	if(empty($optinforms_form3_title_font)) {
		$optinforms_form3_title_font = "Droid Serif";
	}
	return $optinforms_form3_title_font;
}

// FORM3: title font options
function optinforms_get_form3_title_font_options() {
	global $optinforms_form3_title_font;
	global $optinforms_included_fonts;
	foreach ($optinforms_included_fonts as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form3_title_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM3: default title font size
function optinforms_form3_default_title_size() {
	global $optinforms_form3_title_size;
	if(empty($optinforms_form3_title_size)) {
		$optinforms_form3_title_size = "28px";
	}
	return $optinforms_form3_title_size;
}

// FORM3: title font size options
function optinforms_get_form3_title_size_options() {
	global $optinforms_form3_title_size;
	foreach (range(10, 72) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form3_title_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM3: default title color
function optinforms_form3_default_title_color() {
	global $optinforms_form3_title_color;
	if(empty($optinforms_form3_title_color)) {
		$optinforms_form3_title_color = "#505050";
	}
	return $optinforms_form3_title_color;
}

// FORM3: default subtitle
function optinforms_form3_default_subtitle() {
	global $optinforms_form3_subtitle;
	if(empty($optinforms_form3_subtitle)) {
		$optinforms_form3_subtitle = __('Signup today and receive free updates straight in your inbox. We will never share or sell your email address.', 'optin-forms');
	}
	return $optinforms_form3_subtitle;
}

// FORM3: default subtitle font
function optinforms_form3_default_subtitle_font() {
	global $optinforms_form3_subtitle_font;
	if(empty($optinforms_form3_subtitle_font)) {
		$optinforms_form3_subtitle_font = "Arial";
	}
	return $optinforms_form3_subtitle_font;
}

// FORM3: subtitle font options
function optinforms_get_form3_subtitle_font_options() {
	global $optinforms_form3_subtitle_font;
	global $optinforms_included_fonts;
	foreach ($optinforms_included_fonts as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form3_subtitle_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM3: default subtitle font size
function optinforms_form3_default_subtitle_size() {
	global $optinforms_form3_subtitle_size;
	if(empty($optinforms_form3_subtitle_size)) {
		$optinforms_form3_subtitle_size = "16px";
	}
	return $optinforms_form3_subtitle_size;
}

// FORM3: subtitle font size options
function optinforms_get_form3_subtitle_size_options() {
	global $optinforms_form3_subtitle_size;
	foreach (range(10, 24) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form3_subtitle_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM3: default subtitle color
function optinforms_form3_default_subtitle_color() {
	global $optinforms_form3_subtitle_color;
	if(empty($optinforms_form3_subtitle_color)) {
		$optinforms_form3_subtitle_color = "#000000";
	}
	return $optinforms_form3_subtitle_color;
}

// FORM3: default name field
function optinforms_form3_default_name_field() {
	global $optinforms_form3_name_field;
	if(empty($optinforms_form3_name_field)) {
		$optinforms_form3_name_field = __('Your Name', 'optin-forms');
	}
	return $optinforms_form3_name_field;
}

// FORM3: default email field
function optinforms_form3_default_email_field() {
	global $optinforms_form3_email_field;
	if(empty($optinforms_form3_email_field)) {
		$optinforms_form3_email_field = __('Your Email Address', 'optin-forms');
	}
	return $optinforms_form3_email_field;
}

// FORM3: default email fields font
function optinforms_form3_default_fields_font() {
	global $optinforms_form3_fields_font;
	if(empty($optinforms_form3_fields_font)) {
		$optinforms_form3_fields_font = "Arial, Helvetica, sans-serif";
	}
	return $optinforms_form3_fields_font;
}

// FORM3: email fields font options
function optinforms_get_form3_fields_font_options() {
	global $optinforms_form3_fields_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form3_fields_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM3: email fields font size
function optinforms_form3_default_fields_size() {
	global $optinforms_form3_fields_size;
	if(empty($optinforms_form3_fields_size)) {
		$optinforms_form3_fields_size = "12px";
	}
	return $optinforms_form3_fields_size;
}

// FORM3: email fields font size options
function optinforms_get_form3_fields_size_options() {
	global $optinforms_form3_fields_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form3_fields_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM3: default fields color
function optinforms_form3_default_fields_color() {
	global $optinforms_form3_fields_color;
	if(empty($optinforms_form3_fields_color)) {
		$optinforms_form3_fields_color = "#666666";
	}
	return $optinforms_form3_fields_color;
}

// FORM3: default button text
function optinforms_form3_default_button_text() {
	global $optinforms_form3_button_text;
	if(empty($optinforms_form3_button_text)) {
		$optinforms_form3_button_text = __('Sign Up Today!', 'optin-forms');
	}
	return $optinforms_form3_button_text;
}

// FORM3: default button text font
function optinforms_form3_default_button_text_font() {
	global $optinforms_form3_button_text_font;
	if(empty($optinforms_form3_button_text_font)) {
		$optinforms_form3_button_text_font = "Arial, Helvetica, sans-serif";
	}
	return $optinforms_form3_button_text_font;
}

// FORM3: button text font options
function optinforms_get_form3_button_text_font_options() {
	global $optinforms_form3_button_text_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form3_button_text_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM3: button text font size
function optinforms_form3_default_button_text_size() {
	global $optinforms_form3_button_text_size;
	if(empty($optinforms_form3_button_text_size)) {
		$optinforms_form3_button_text_size = "18px";
	}
	return $optinforms_form3_button_text_size;
}

// FORM3: button text font size options
function optinforms_get_form3_button_text_size_options() {
	global $optinforms_form3_button_text_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form3_button_text_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM3: default button text color
function optinforms_form3_default_button_text_color() {
	global $optinforms_form3_button_text_color;
	if(empty($optinforms_form3_button_text_color)) {
		$optinforms_form3_button_text_color = "#FFFFFF";
	}
	return $optinforms_form3_button_text_color;
}

// FORM3: default button background color
function optinforms_form3_default_button_background() {
	global $optinforms_form3_button_background;
	if(empty($optinforms_form3_button_background)) {
		$optinforms_form3_button_background = "#49A3FE";
	}
	return $optinforms_form3_button_background;
}

// FORM3: default width
function optinforms_form3_default_width() {
	global $optinforms_form3_width;
	if(empty($optinforms_form3_width)) {
		$optinforms_form3_width = 0;
	}
}

// FORM3: 100% width checked
function optinforms_form3_checked_width_100() {
	global $optinforms_form3_width;
	if($optinforms_form3_width == 0) {
		echo "checked=\"checked\"";
	}
}

// FORM3: fixed width checked
function optinforms_form3_checked_width_fixed() {
	global $optinforms_form3_width;
	if($optinforms_form3_width == 1) {
		echo "checked=\"checked\"";
	}
}

// FORM3: fixed width disabled if width is 100%
function optinforms_form3_disabled_width_pixels() {
	global $optinforms_form3_width;
	if($optinforms_form3_width == 0) {
		echo "disabled=\"disabled\"";
	}
}

// FORM3: default width fixed
function optinforms_form3_default_width_pixels() {
	global $optinforms_form3_width_pixels;
	if(empty($optinforms_form3_width_pixels)) {
		$optinforms_form3_width_pixels = "700";
	}
	return $optinforms_form3_width_pixels;
}

// FORM3: default width fixed
function optinforms_form3_get_width() {
	global $optinforms_form3_width;
	if($optinforms_form3_width == 0) {
		// do nothing
	}
	elseif($optinforms_form3_width == 1) {
		return "style=\"width:" . optinforms_form3_default_width_pixels() . "px\"";
	}
}

// FORM3: hide the title
function optinforms_form3_hide_title() {
	global $optinforms_form3_hide_title;
	return $optinforms_form3_hide_title;
}

// FORM1: hide the title - convert to CSS
function optinforms_form3_hide_title_css() {
	global $optinforms_form3_hide_title;
	if($optinforms_form3_hide_title == 1) {
		return "#optinforms-form3-title{display:none;}";
	}
}

// FORM3: hide the subtitle
function optinforms_form3_hide_subtitle() {
	global $optinforms_form3_hide_subtitle;
	return $optinforms_form3_hide_subtitle;
}

// FORM3: hide the subtitle - convert to CSS
function optinforms_form3_hide_subtitle_css() {
	global $optinforms_form3_hide_subtitle;
	if($optinforms_form3_hide_subtitle == 1) {
		return "#optinforms-form3-subtitle{display:none;}";
	}
}

// FORM3: if both title and subtitle are hidden, hide the left container
function optinforms_form3_hide_title_subtitle_css() {
	global $optinforms_form3_hide_title, $optinforms_form3_hide_subtitle;
	if(($optinforms_form3_hide_title == 1) && ($optinforms_form3_hide_subtitle == 1)) {
		return "#optinforms-form3-container-left{display:none;}#optinforms-form3-container-right{margin:10px 0 0 0;width:100%;}";
	}
}

// FORM3: hide the name field
function optinforms_form3_hide_name_field() {
	global $optinforms_form3_hide_name_field;
	return $optinforms_form3_hide_name_field;
}

// FORM3: hide the name field - convert to CSS
function optinforms_form3_hide_name_field_css() {
	global $optinforms_form3_hide_name_field;
	if($optinforms_form3_hide_name_field == 1) {
		return "#optinforms-form3-name-field{display:none;}";
	}
}

// FORM3: get our custom CSS
function optinforms_form3_css() {
	global $optinforms_form3_css;
	return $optinforms_form3_css;
}

// FORM3: advanced styling options
function optinforms_form3_add_custom_css() {
	global $optinforms_form3_css;
	return "<style type='text/css'>" . optinforms_form3_hide_title_css() . optinforms_form3_hide_subtitle_css() . optinforms_form3_hide_title_subtitle_css() . optinforms_form3_hide_name_field_css() . $optinforms_form3_css . "</style>";
}

?>