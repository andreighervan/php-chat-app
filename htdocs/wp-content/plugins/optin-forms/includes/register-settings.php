<?php

add_action( 'admin_init', 'optinforms_register_settings' );

// Register Optin Forms settings
function optinforms_register_settings()
{
	global $optinforms_forms;

	// Are there any custom optin form designs registered?
	if ( is_array( $optinforms_forms ) ) {

		// Loop through registered optin form designs.
		foreach ( $optinforms_forms as $id => $design ) {

			// Are the default settings provided?
			if ( is_array( $design->defaults ) ) {

				// Loop through each default setting.
				foreach ( $design->defaults as $setting_id => $setting_default ) {

					// Register a WordPress setting to store the setting value.
					register_setting( 'optinforms-settings-group', $setting_id );
				}
			}
		}
	}

	register_setting( 'optinforms-settings-group', 'optinforms_email_solution' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_action' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_action_mailchimp' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_action_madmimi' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_action_interspire' );

	register_setting( 'optinforms-settings-group', 'optinforms_form_list_name_aweber' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_redirect_aweber' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_listid_icontact' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_specialid_icontact' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_clientid_icontact' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_redirect_icontact' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_error_icontact' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_webformid_getresponse' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_name_field_interspire' );
        register_setting( 'optinforms-settings-group', 'optinforms_form_id_convertkit' );
        register_setting( 'optinforms-settings-group', 'optinforms_form_success_convertkit' );
        register_setting( 'optinforms-settings-group', 'optinforms_form_error_convertkit' );

	register_setting( 'optinforms-settings-group', 'optinforms_form_design' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_placement_post' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_placement_page' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_placement_popup' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_placement_box' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_placement_bar' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_exclude_posts' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_exclude_pages' );
	register_setting( 'optinforms-settings-group', 'optinforms_powered_by' );
	register_setting( 'optinforms-settings-group', 'optinforms_form_target' );

	register_setting( 'optinforms-settings-group', 'optinforms_form1_background' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_border' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_title' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_title_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_title_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_title_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_subtitle' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_subtitle_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_subtitle_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_subtitle_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_name_field' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_email_field' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_fields_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_fields_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_fields_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_button_text' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_button_text_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_button_text_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_button_text_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_button_background' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_disclaimer' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_disclaimer_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_disclaimer_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_disclaimer_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_width' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_width_pixels' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_hide_title' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_hide_subtitle' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_hide_name_field' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_hide_disclaimer' );
	register_setting( 'optinforms-settings-group', 'optinforms_form1_css' );

	register_setting( 'optinforms-settings-group', 'optinforms_form2_background' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_title' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_title_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_title_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_title_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_email_field' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_fields_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_fields_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_fields_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_button_text' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_button_text_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_button_text_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_button_text_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_button_background' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_disclaimer' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_disclaimer_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_disclaimer_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_disclaimer_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_width' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_width_pixels' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_hide_title' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_hide_disclaimer' );
	register_setting( 'optinforms-settings-group', 'optinforms_form2_css' );

	register_setting( 'optinforms-settings-group', 'optinforms_form3_background' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_title' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_title_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_title_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_title_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_subtitle' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_subtitle_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_subtitle_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_subtitle_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_name_field' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_email_field' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_fields_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_fields_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_fields_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_button_text' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_button_text_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_button_text_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_button_text_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_button_background' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_width' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_width_pixels' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_hide_title' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_hide_subtitle' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_hide_name_field' );
	register_setting( 'optinforms-settings-group', 'optinforms_form3_css' );

	register_setting( 'optinforms-settings-group', 'optinforms_form4_background' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_border' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_title' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_title_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_title_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_title_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_subtitle' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_subtitle_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_subtitle_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_subtitle_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_email_field' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_fields_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_fields_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_fields_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_button_text' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_button_text_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_button_text_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_button_text_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_button_background' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_disclaimer' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_disclaimer_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_disclaimer_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_disclaimer_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_width' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_width_pixels' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_hide_title' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_hide_subtitle' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_hide_disclaimer' );
	register_setting( 'optinforms-settings-group', 'optinforms_form4_css' );

	register_setting( 'optinforms-settings-group', 'optinforms_form5_background' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_title' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_title_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_title_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_title_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_subtitle' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_subtitle_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_subtitle_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_subtitle_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_name_field' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_email_field' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_fields_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_fields_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_fields_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_button_text' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_button_text_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_button_text_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_button_text_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_button_background' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_disclaimer' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_disclaimer_font' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_disclaimer_size' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_disclaimer_color' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_width' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_width_pixels' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_hide_title' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_hide_subtitle' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_hide_name_field' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_hide_disclaimer' );
	register_setting( 'optinforms-settings-group', 'optinforms_form5_css' );

}
?>