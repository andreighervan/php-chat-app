<?php

// Set global variables
	$optinforms_form4_background = get_option('optinforms_form4_background');
	$optinforms_form4_border = get_option('optinforms_form4_border');
	$optinforms_form4_title = get_option('optinforms_form4_title');
	$optinforms_form4_title_font = get_option('optinforms_form4_title_font');
	$optinforms_form4_title_size = get_option('optinforms_form4_title_size');
	$optinforms_form4_title_color = get_option('optinforms_form4_title_color');
	$optinforms_form4_subtitle = get_option('optinforms_form4_subtitle');
	$optinforms_form4_subtitle_font = get_option('optinforms_form4_subtitle_font');
	$optinforms_form4_subtitle_size = get_option('optinforms_form4_subtitle_size');
	$optinforms_form4_subtitle_color = get_option('optinforms_form4_subtitle_color');
	$optinforms_form4_email_field = get_option('optinforms_form4_email_field');
	$optinforms_form4_fields_font = get_option('optinforms_form4_fields_font');
	$optinforms_form4_fields_size = get_option('optinforms_form4_fields_size');
	$optinforms_form4_fields_color = get_option('optinforms_form4_fields_color');
	$optinforms_form4_button_text = get_option('optinforms_form4_button_text');
	$optinforms_form4_button_text_font = get_option('optinforms_form4_button_text_font');
	$optinforms_form4_button_text_size = get_option('optinforms_form4_button_text_size');
	$optinforms_form4_button_text_color = get_option('optinforms_form4_button_text_color');
	$optinforms_form4_button_background = get_option('optinforms_form4_button_background');
	$optinforms_form4_disclaimer = get_option('optinforms_form4_disclaimer');
	$optinforms_form4_disclaimer_font = get_option('optinforms_form4_disclaimer_font');
	$optinforms_form4_disclaimer_size = get_option('optinforms_form4_disclaimer_size');
	$optinforms_form4_disclaimer_color = get_option('optinforms_form4_disclaimer_color');
	$optinforms_form4_width = get_option('optinforms_form4_width');
	$optinforms_form4_width_pixels = get_option('optinforms_form4_width_pixels');
	$optinforms_form4_hide_title = get_option('optinforms_form4_hide_title');
	$optinforms_form4_hide_subtitle = get_option('optinforms_form4_hide_subtitle');
	$optinforms_form4_hide_disclaimer = get_option('optinforms_form4_hide_disclaimer');
	$optinforms_form4_css = get_option('optinforms_form4_css');


// FORM4: default background color
function optinforms_form4_default_background() {
	global $optinforms_form4_background;
	if(empty($optinforms_form4_background)) {
		$optinforms_form4_background = "#FCFCFC";
	}
	return $optinforms_form4_background;
}

// FORM4: default border color
function optinforms_form4_default_border() {
	global $optinforms_form4_border;
	if(empty($optinforms_form4_border)) {
		$optinforms_form4_border = "#ECEAED";
	}
	return $optinforms_form4_border;
}

// FORM4: default title
function optinforms_form4_default_title() {
	global $optinforms_form4_title;
	if(empty($optinforms_form4_title)) {
		$optinforms_form4_title = __('Get the FREE eBook...', 'optin-forms');
	}
	return $optinforms_form4_title;
}

// FORM4: default title font
function optinforms_form4_default_title_font() {
	global $optinforms_form4_title_font;
	if(empty($optinforms_form4_title_font)) {
		$optinforms_form4_title_font = "Arial";
	}
	return $optinforms_form4_title_font;
}

// FORM4: title font options
function optinforms_get_form4_title_font_options() {
	global $optinforms_form4_title_font;
	global $optinforms_included_fonts;
	foreach ($optinforms_included_fonts as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form4_title_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM4: default title font size
function optinforms_form4_default_title_size() {
	global $optinforms_form4_title_size;
	if(empty($optinforms_form4_title_size)) {
		$optinforms_form4_title_size = "24px";
	}
	return $optinforms_form4_title_size;
}

// FORM4: title font size options
function optinforms_get_form4_title_size_options() {
	global $optinforms_form4_title_size;
	foreach (range(10, 72) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form4_title_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM4: default title color
function optinforms_form4_default_title_color() {
	global $optinforms_form4_title_color;
	if(empty($optinforms_form4_title_color)) {
		$optinforms_form4_title_color = "#505050";
	}
	return $optinforms_form4_title_color;
}

// FORM4: default subtitle
function optinforms_form4_default_subtitle() {
	global $optinforms_form4_subtitle;
	if(empty($optinforms_form4_subtitle)) {
		$optinforms_form4_subtitle = __('Enter your email address and click on the Get Instant Access button.', 'optin-forms');
	}
	return $optinforms_form4_subtitle;
}

// FORM4: default subtitle font
function optinforms_form4_default_subtitle_font() {
	global $optinforms_form4_subtitle_font;
	if(empty($optinforms_form4_subtitle_font)) {
		$optinforms_form4_subtitle_font = "Arial";
	}
	return $optinforms_form4_subtitle_font;
}

// FORM4: subtitle font options
function optinforms_get_form4_subtitle_font_options() {
	global $optinforms_form4_subtitle_font;
	global $optinforms_included_fonts;
	foreach ($optinforms_included_fonts as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form4_subtitle_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM4: default subtitle font size
function optinforms_form4_default_subtitle_size() {
	global $optinforms_form4_subtitle_size;
	if(empty($optinforms_form4_subtitle_size)) {
		$optinforms_form4_subtitle_size = "16px";
	}
	return $optinforms_form4_subtitle_size;
}

// FORM4: subtitle font size options
function optinforms_get_form4_subtitle_size_options() {
	global $optinforms_form4_subtitle_size;
	foreach (range(10, 72) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form4_subtitle_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM4: default subtitle color
function optinforms_form4_default_subtitle_color() {
	global $optinforms_form4_subtitle_color;
	if(empty($optinforms_form4_subtitle_color)) {
		$optinforms_form4_subtitle_color = "#505050";
	}
	return $optinforms_form4_subtitle_color;
}

// FORM4: default email field
function optinforms_form4_default_email_field() {
	global $optinforms_form4_email_field;
	if(empty($optinforms_form4_email_field)) {
		$optinforms_form4_email_field = __('Email Address', 'optin-forms');
	}
	return $optinforms_form4_email_field;
}

// FORM4: default email fields font
function optinforms_form4_default_fields_font() {
	global $optinforms_form4_fields_font;
	if(empty($optinforms_form4_fields_font)) {
		$optinforms_form4_fields_font = "Arial, Helvetica, sans-serif";
	}
	return $optinforms_form4_fields_font;
}

// FORM4: email fields font options
function optinforms_get_form4_fields_font_options() {
	global $optinforms_form4_fields_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form4_fields_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM4: email fields font size
function optinforms_form4_default_fields_size() {
	global $optinforms_form4_fields_size;
	if(empty($optinforms_form4_fields_size)) {
		$optinforms_form4_fields_size = "16px";
	}
	return $optinforms_form4_fields_size;
}

// FORM4: email fields font size options
function optinforms_get_form4_fields_size_options() {
	global $optinforms_form4_fields_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form4_fields_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM4: default fields color
function optinforms_form4_default_fields_color() {
	global $optinforms_form4_fields_color;
	if(empty($optinforms_form4_fields_color)) {
		$optinforms_form4_fields_color = "#666666";
	}
	return $optinforms_form4_fields_color;
}

// FORM4: default button text
function optinforms_form4_default_button_text() {
	global $optinforms_form4_button_text;
	if(empty($optinforms_form4_button_text)) {
		$optinforms_form4_button_text = __('Get Instant Access', 'optin-forms');
	}
	return $optinforms_form4_button_text;
}

// FORM4: default button text font
function optinforms_form4_default_button_text_font() {
	global $optinforms_form4_button_text_font;
	if(empty($optinforms_form4_button_text_font)) {
		$optinforms_form4_button_text_font = "Arial, Helvetica, sans-serif";
	}
	return $optinforms_form4_button_text_font;
}

// FORM4: button text font options
function optinforms_get_form4_button_text_font_options() {
	global $optinforms_form4_button_text_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form4_button_text_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM4: button text font size
function optinforms_form4_default_button_text_size() {
	global $optinforms_form4_button_text_size;
	if(empty($optinforms_form4_button_text_size)) {
		$optinforms_form4_button_text_size = "20px";
	}
	return $optinforms_form4_button_text_size;
}

// FORM4: button text font size options
function optinforms_get_form4_button_text_size_options() {
	global $optinforms_form4_button_text_size;
	foreach (range(10, 30) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form4_button_text_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM4: default button text color
function optinforms_form4_default_button_text_color() {
	global $optinforms_form4_button_text_color;
	if(empty($optinforms_form4_button_text_color)) {
		$optinforms_form4_button_text_color = "#1d629b";
	}
	return $optinforms_form4_button_text_color;
}

// FORM4: default button background color
function optinforms_form4_default_button_background() {
	global $optinforms_form4_button_background;
	if(empty($optinforms_form4_button_background)) {
		$optinforms_form4_button_background = "#faff5b";
	}
	return $optinforms_form4_button_background;
}

// FORM4: default disclaimer
function optinforms_form4_default_disclaimer() {
	global $optinforms_form4_disclaimer;
	if(empty($optinforms_form4_disclaimer)) {
		$optinforms_form4_disclaimer = __('We respect your privacy', 'optin-forms');
	}
	return $optinforms_form4_disclaimer;
}

// FORM4: default disclaimer font
function optinforms_form4_default_disclaimer_font() {
	global $optinforms_form4_disclaimer_font;
	if(empty($optinforms_form4_disclaimer_font)) {
		$optinforms_form4_disclaimer_font = "Arial, Helvetica, sans-serif";
	}
	return $optinforms_form4_disclaimer_font;
}

// FORM4: disclaimer font options
function optinforms_get_form4_disclaimer_font_options() {
	global $optinforms_form4_disclaimer_font;
	global $optinforms_included_fonts_simple;
	foreach ($optinforms_included_fonts_simple as $key) {
		echo "<option value=\"" . $key . "\"";
		if($optinforms_form4_disclaimer_font == $key){
			echo "selected=selected";
		}
		echo ">" . $key . "</option>";
	}
}

// FORM4: disclaimer font size
function optinforms_form4_default_disclaimer_size() {
	global $optinforms_form4_disclaimer_size;
	if(empty($optinforms_form4_disclaimer_size)) {
		$optinforms_form4_disclaimer_size = "12px";
	}
	return $optinforms_form4_disclaimer_size;
}

// FORM4: disclaimer font size options
function optinforms_get_form4_disclaimer_size_options() {
	global $optinforms_form4_disclaimer_size;
	foreach (range(10, 20) as $number) {
		echo "<option value=\"" . $number . "px\"";
		if($optinforms_form4_disclaimer_size == $number . "px") {
			echo "selected=selected";
		}
		echo">" . $number . "px</option>";
	}
}

// FORM4: default disclaimer color
function optinforms_form4_default_disclaimer_color() {
	global $optinforms_form4_disclaimer_color;
	if(empty($optinforms_form4_disclaimer_color)) {
		$optinforms_form4_disclaimer_color = "#999999";
	}
	return $optinforms_form4_disclaimer_color;
}

// FORM4: default width
function optinforms_form4_default_width() {
	global $optinforms_form4_width;
	if(empty($optinforms_form4_width)) {
		$optinforms_form4_width = 0;
	}
}

// FORM4: 100% width checked
function optinforms_form4_checked_width_100() {
	global $optinforms_form4_width;
	if($optinforms_form4_width == 0) {
		echo "checked=\"checked\"";
	}
}

// FORM4: fixed width checked
function optinforms_form4_checked_width_fixed() {
	global $optinforms_form4_width;
	if($optinforms_form4_width == 1) {
		echo "checked=\"checked\"";
	}
}

// FORM4: fixed width disabled if width is 100%
function optinforms_form4_disabled_width_pixels() {
	global $optinforms_form4_width;
	if($optinforms_form4_width == 0) {
		echo "disabled=\"disabled\"";
	}
}

// FORM4: default width fixed
function optinforms_form4_default_width_pixels() {
	global $optinforms_form4_width_pixels;
	if(empty($optinforms_form4_width_pixels)) {
		$optinforms_form4_width_pixels = "700";
	}
	return $optinforms_form4_width_pixels;
}

// FORM4: default width fixed
function optinforms_form4_get_width() {
	global $optinforms_form4_width;
	if($optinforms_form4_width == 0) {
		// do nothing
	}
	elseif($optinforms_form4_width == 1) {
		return "style=\"width:" . optinforms_form4_default_width_pixels() . "px\"";
	}
}

// FORM4: hide the title
function optinforms_form4_hide_title() {
	global $optinforms_form4_hide_title;
	return $optinforms_form4_hide_title;
}

// FORM4: hide the title - convert to CSS
function optinforms_form4_hide_title_css() {
	global $optinforms_form4_hide_title;
	if($optinforms_form4_hide_title == 1) {
		return "#optinforms-form4-title{display:none;}";
	}
}

// FORM4: hide the subtitle
function optinforms_form4_hide_subtitle() {
	global $optinforms_form4_hide_subtitle;
	return $optinforms_form4_hide_subtitle;
}

// FORM4: hide the subtitle - convert to CSS
function optinforms_form4_hide_subtitle_css() {
	global $optinforms_form4_hide_subtitle;
	if($optinforms_form4_hide_subtitle == 1) {
		return "#optinforms-form4-subtitle{display:none;}";
	}
}

// FORM3: hide the disclaimer
function optinforms_form4_hide_disclaimer() {
	global $optinforms_form3_hide_disclaimer;
	return $optinforms_form3_hide_disclaimer;
}

// FORM4: hide the name field - convert to CSS
function optinforms_form4_hide_disclaimer_css() {
	global $optinforms_form4_hide_disclaimer;
	if($optinforms_form4_hide_disclaimer == 1) {
		return "#optinforms-form4-disclaimer{display:none;}";
	}
}

// FORM4: get our custom CSS
function optinforms_form4_css() {
	global $optinforms_form4_css;
	return $optinforms_form4_css;
}

// FORM4: advanced styling options
function optinforms_form4_add_custom_css() {
	global $optinforms_form4_css;
	return "<style type='text/css'>" . optinforms_form4_hide_title_css() . optinforms_form4_hide_subtitle_css() . optinforms_form4_hide_disclaimer_css() . $optinforms_form4_css . "</style>";
}	

?>