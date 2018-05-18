<?php

// Set global variables
	$optinforms_form2_background = get_option('optinforms_form2_background');
	$optinforms_form2_title = get_option('optinforms_form2_title');
	$optinforms_form2_title_font = get_option('optinforms_form2_title_font');
	$optinforms_form2_title_size = get_option('optinforms_form2_title_size');
	$optinforms_form2_title_color = get_option('optinforms_form2_title_color');
	$optinforms_form2_email_field = get_option('optinforms_form2_email_field');
	$optinforms_form2_fields_font = get_option('optinforms_form2_fields_font');
	$optinforms_form2_fields_size = get_option('optinforms_form2_fields_size');
	$optinforms_form2_fields_color = get_option('optinforms_form2_fields_color');
	$optinforms_form2_button_text = get_option('optinforms_form2_button_text');
	$optinforms_form2_button_text_font = get_option('optinforms_form2_button_text_font');
	$optinforms_form2_button_text_size = get_option('optinforms_form2_button_text_size');
	$optinforms_form2_button_text_color = get_option('optinforms_form2_button_text_color');
	$optinforms_form2_button_background = get_option('optinforms_form2_button_background');
	$optinforms_form2_disclaimer = get_option('optinforms_form2_disclaimer');
	$optinforms_form2_disclaimer_font = get_option('optinforms_form2_disclaimer_font');
	$optinforms_form2_disclaimer_size = get_option('optinforms_form2_disclaimer_size');
	$optinforms_form2_disclaimer_color = get_option('optinforms_form2_disclaimer_color');
	$optinforms_form2_width = get_option('optinforms_form2_width');
	$optinforms_form2_width_pixels = get_option('optinforms_form2_width_pixels');
	$optinforms_form2_hide_title = get_option('optinforms_form2_hide_title');
	$optinforms_form2_hide_disclaimer = get_option('optinforms_form2_hide_disclaimer');
	$optinforms_form2_css = get_option('optinforms_form2_css');


// FORM2: default background color
function optinforms_form2_default_background() {
	global $optinforms_form2_background;
	if(empty($optinforms_form2_background)) {
		$optinforms_form2_background = "#266d7c";
	}
	return $optinforms_form2_background;
}

// FORM2: default title
function optinforms_form2_default_title() {
	global $optinforms_form2_title;
	if(empty($optinforms_form2_title)) {
		$optinforms_form2_title = __('Receive Updates', 'optin-forms');
	}
	return $optinforms_form2_title;
}

// FORM2: default title font
function optinforms_form2_default_title_font() {
	global $optinforms_form2_title_font;
	if(empty($optinforms_form2_title_font)) {
		$optinforms_form2_title_font = "Pacifico";
	}
	return $optinforms_form2_title_font;
}

// FORM2: title font options
function optinforms_get_form2_title_font_options() {
	global $optinforms_form2_title_font;
	global $optinforms_included_fonts;
	foreach ($optinforms_included_fonts as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form2_title_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM2: default title font size
function optinforms_form2_default_title_size() {
	global $optinforms_form2_title_size;
	if(empty($optinforms_form2_title_size)) {
		$optinforms_form2_title_size = "28px";
	}
	return $optinforms_form2_title_size;
}

// FORM2: title font size options
function optinforms_get_form2_title_size_options() {
	global $optinforms_form2_title_size;
	foreach (range(10, 72) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form2_title_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM2: default title color
function optinforms_form2_default_title_color() {
	global $optinforms_form2_title_color;
	if(empty($optinforms_form2_title_color)) {
		$optinforms_form2_title_color = "#ffffff";
	}
	return $optinforms_form2_title_color;
}

// FORM2: default email field
function optinforms_form2_default_email_field() {
	global $optinforms_form2_email_field;
	if(empty($optinforms_form2_email_field)) {
		$optinforms_form2_email_field = __('Enter Your Email Address', 'optin-forms');
	}
	return $optinforms_form2_email_field;
}

// FORM2: default email fields font
function optinforms_form2_default_fields_font() {
	global $optinforms_form2_fields_font;
	if(empty($optinforms_form2_fields_font)) {
		$optinforms_form2_fields_font = "Arial, Helvetica, sans-serif";
	}
	return $optinforms_form2_fields_font;
}

// FORM2: email fields font options
function optinforms_get_form2_fields_font_options() {
	global $optinforms_form2_fields_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form2_fields_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM2: email fields font size
function optinforms_form2_default_fields_size() {
	global $optinforms_form2_fields_size;
	if(empty($optinforms_form2_fields_size)) {
		$optinforms_form2_fields_size = "12px";
	}
	return $optinforms_form2_fields_size;
}

// FORM2: email fields font size options
function optinforms_get_form2_fields_size_options() {
	global $optinforms_form2_fields_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form2_fields_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM2: email fields color
function optinforms_form2_default_fields_color() {
	global $optinforms_form2_fields_color;
	if(empty($optinforms_form2_fields_color)) {
		$optinforms_form2_fields_color = "#000000";
	}
	return $optinforms_form2_fields_color;
}

// FORM2: default button text
function optinforms_form2_default_button_text() {
	global $optinforms_form2_button_text;
	if(empty($optinforms_form2_button_text)) {
		$optinforms_form2_button_text = __('Sign Up', 'optin-forms');
	}
	return $optinforms_form2_button_text;
}

// FORM2: default button text font
function optinforms_form2_default_button_text_font() {
	global $optinforms_form2_button_text_font;
	if(empty($optinforms_form2_button_text_font)) {
		$optinforms_form2_button_text_font = "Arial, Helvetica, sans-serif";
	}
	return $optinforms_form2_button_text_font;
}

// FORM2: button text font options
function optinforms_get_form2_button_text_font_options() {
	global $optinforms_form2_button_text_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form2_button_text_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM2: button text font size
function optinforms_form2_default_button_text_size() {
	global $optinforms_form2_button_text_size;
	if(empty($optinforms_form2_button_text_size)) {
		$optinforms_form2_button_text_size = "14px";
	}
	return $optinforms_form2_button_text_size;
}

// FORM2: button text font size options
function optinforms_get_form2_button_text_size_options() {
	global $optinforms_form2_button_text_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form2_button_text_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM2: default button text color
function optinforms_form2_default_button_text_color() {
	global $optinforms_form2_button_text_color;
	if(empty($optinforms_form2_button_text_color)) {
		$optinforms_form2_button_text_color = "#FFFFFF";
	}
	return $optinforms_form2_button_text_color;
}

// FORM2: default button background color
function optinforms_form2_default_button_background() {
	global $optinforms_form2_button_background;
	if(empty($optinforms_form2_button_background)) {
		$optinforms_form2_button_background = "#49A3FE";
	}
	return $optinforms_form2_button_background;
}

// FORM2: default disclaimer
function optinforms_form2_default_disclaimer() {
	global $optinforms_form2_disclaimer;
	if(empty($optinforms_form2_disclaimer)) {
		$optinforms_form2_disclaimer = __('No spam guarantee.', 'optin-forms');
	}
	return $optinforms_form2_disclaimer;
}

// FORM2: default disclaimer font
function optinforms_form2_default_disclaimer_font() {
	global $optinforms_form2_disclaimer_font;
	if(empty($optinforms_form2_disclaimer_font)) {
		$optinforms_form2_disclaimer_font = "Arial, Helvetica, sans-serif";
	}
	return $optinforms_form2_disclaimer_font;
}

// FORM2: disclaimer font options
function optinforms_get_form2_disclaimer_font_options() {
	global $optinforms_form2_disclaimer_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form2_disclaimer_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM2: disclaimer font size
function optinforms_form2_default_disclaimer_size() {
	global $optinforms_form2_disclaimer_size;
	if(empty($optinforms_form2_disclaimer_size)) {
		$optinforms_form2_disclaimer_size = "11px";
	}
	return $optinforms_form2_disclaimer_size;
}

// FORM2: disclaimer font size options
function optinforms_get_form2_disclaimer_size_options() {
	global $optinforms_form2_disclaimer_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form2_disclaimer_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM2: default disclaimer color
function optinforms_form2_default_disclaimer_color() {
	global $optinforms_form2_disclaimer_color;
	if(empty($optinforms_form2_disclaimer_color)) {
		$optinforms_form2_disclaimer_color = "#ffffff";
	}
	return $optinforms_form2_disclaimer_color;
}

// FORM2: default width
function optinforms_form2_default_width() {
	global $optinforms_form2_width;
	if(empty($optinforms_form2_width)) {
		$optinforms_form2_width = 0;
	}
}

// FORM2: 100% width checked
function optinforms_form2_checked_width_100() {
	global $optinforms_form2_width;
	if($optinforms_form2_width == 0) {
		echo "checked=\"checked\"";
	}
}

// FORM2: fixed width checked
function optinforms_form2_checked_width_fixed() {
	global $optinforms_form2_width;
	if($optinforms_form2_width == 1) {
		echo "checked=\"checked\"";
	}
}

// FORM2: fixed width disabled if width is 100%
function optinforms_form2_disabled_width_pixels() {
	global $optinforms_form2_width;
	if($optinforms_form2_width == 0) {
		echo "disabled=\"disabled\"";
	}
}

// FORM2: default width fixed
function optinforms_form2_default_width_pixels() {
	global $optinforms_form2_width_pixels;
	if(empty($optinforms_form2_width_pixels)) {
		$optinforms_form2_width_pixels = "700";
	}
	return $optinforms_form2_width_pixels;
}

// FORM2: default width fixed
function optinforms_form2_get_width() {
	global $optinforms_form2_width;
	if($optinforms_form2_width == 0) {
		// do nothing
	}
	elseif($optinforms_form2_width == 1) {
		return "style=\"width:" . optinforms_form2_default_width_pixels() . "px\"";
	}
}

// FORM2: hide the title
function optinforms_form2_hide_title() {
	global $optinforms_form2_hide_title;
	return $optinforms_form2_hide_title;
}

// FORM2: hide the title - convert to CSS
function optinforms_form2_hide_title_css() {
	global $optinforms_form2_hide_title;
	if($optinforms_form2_hide_title == 1) {
		return "#optinforms-form2-title-container{display:none;}";
	}
}

// FORM2: hide the disclaimer
function optinforms_form2_hide_disclaimer() {
	global $optinforms_form2_hide_disclaimer;
	return $optinforms_form2_hide_disclaimer;
}

// FORM2: hide the disclaimer - convert to CSS
function optinforms_form2_hide_disclaimer_css() {
	global $optinforms_form2_hide_disclaimer;
	if($optinforms_form2_hide_disclaimer == 1) {
		return "#optinforms-form2-disclaimer-container{display:none;}";
	}
}

// FORM2: if both title and disclaimer are hidden, make our email field wider
function optinforms_form2_hide_title_disclaimer_css() {
	global $optinforms_form2_hide_title, $optinforms_form2_hide_disclaimer;
	if(($optinforms_form2_hide_title == 1) && ($optinforms_form2_hide_disclaimer == 1)) {
		return "#optinforms-form2-email-field-container{width:80%;}";
	}
	else if(($optinforms_form2_hide_title == 1)) {
		return "#optinforms-form2-email-field-container{width:62%;}";
	}
	else if(($optinforms_form2_hide_disclaimer == 1)) {
		return "#optinforms-form2-email-field-container{width:48%;}";
	}
}

// FORM2: get our custom CSS
function optinforms_form2_css() {
	global $optinforms_form2_css;
	return $optinforms_form2_css;
}

// FORM2: advanced styling options
function optinforms_form2_add_custom_css() {
	global $optinforms_form2_css;
	return "<style type='text/css'>" . optinforms_form2_hide_title_css() . optinforms_form2_hide_disclaimer_css() . optinforms_form2_hide_title_disclaimer_css() . $optinforms_form2_css . "</style>";
}

?>