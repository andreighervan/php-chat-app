<?php ?>
			<div id="optinforms-form3-container">
                            <div id="optinforms-form3">
                                <div id="optinforms-form3-inside" style="background: <?php echo optinforms_form3_default_background(); ?>;">
                                    <div id="optinforms-form3-container-left" <?php if (get_option('optinforms_form3_hide_title')== '1' && get_option('optinforms_form3_hide_subtitle')== '1') { echo 'style="display:none;"'; } ?>>
                                        <div id="optinforms-form3-title"  style="font-family:<?php echo optinforms_form3_default_title_font(); ?>; font-size:<?php echo optinforms_form3_default_title_size(); ?>; line-height:<?php echo optinforms_form3_default_title_size(); ?>; color:<?php echo optinforms_form3_default_title_color(); ?>; <?php if (get_option('optinforms_form3_hide_title')== '1') { echo 'display:none;'; } ?>"><?php echo optinforms_form3_default_title(); ?></div><!--optinforms-form3-title-->
                                        <div id="optinforms-form3-subtitle" style="font-family:<?php echo optinforms_form3_default_subtitle_font(); ?>; font-size:<?php echo optinforms_form3_default_subtitle_size(); ?>; color:<?php echo optinforms_form3_default_subtitle_color(); ?>; <?php if (get_option('optinforms_form3_hide_subtitle')== '1') { echo 'display:none;'; } ?>"><?php echo optinforms_form3_default_subtitle(); ?></div><!--optinforms-form3-subtitle-->
                                    </div><!--optinforms-form3-container-left-->
                                    <div id="optinforms-form3-container-right" <?php if (get_option('optinforms_form3_hide_title')== '1' && get_option('optinforms_form3_hide_subtitle')== '1') { echo 'style="margin:10px 0 0 0;width:100%;"'; } ?>>
                                        <input type="text" id="optinforms-form3-name-field" placeholder="<?php echo optinforms_form3_default_name_field(); ?>" style="font-family:<?php echo optinforms_form3_default_fields_font(); ?>; font-size:<?php echo optinforms_form3_default_fields_size(); ?>; color:<?php echo optinforms_form3_default_fields_color(); ?>; <?php if (get_option('optinforms_form3_hide_name_field')== '1') { echo 'display:none;'; } ?>" />
                                        <input type="text" id="optinforms-form3-email-field" placeholder="<?php echo optinforms_form3_default_email_field(); ?>" style="font-family:<?php echo optinforms_form3_default_fields_font(); ?>; font-size:<?php echo optinforms_form3_default_fields_size(); ?>; color:<?php echo optinforms_form3_default_fields_color(); ?>" />
                                        <input type="button" id="optinforms-form3-button" value="<?php echo optinforms_form3_default_button_text(); ?>" style="font-family:<?php echo optinforms_form3_default_button_text_font(); ?>; font-size:<?php echo optinforms_form3_default_button_text_size(); ?>; color:<?php echo optinforms_form3_default_button_text_color(); ?>; background-color:<?php echo optinforms_form3_default_button_background(); ?>" />
                                    </div><!--optinforms-form3-container-right-->
                                    <div class="clear"></div>
                                </div><!--optinforms-form3-inside-->
                            </div><!--optinforms-form3-->
                        </div><!--optinforms-form3-container-->
                        <div class="clear"></div>

<?php ?>