<?php ?>
                        <div id="optinforms-form2-container">
                            <div id="optinforms-form2" style="background: <?php echo optinforms_form2_default_background(); ?>;">
                                <div id="optinforms-form2-title-container" <?php if (get_option('optinforms_form2_hide_title')== '1') { echo 'style="display:none;"'; } ?>>
                                    <div id="optinforms-form2-title" style="font-family:<?php echo optinforms_form2_default_title_font(); ?>; font-size:<?php echo optinforms_form2_default_title_size(); ?>; line-height:<?php echo optinforms_form2_default_title_size(); ?>; color:<?php echo optinforms_form2_default_title_color(); ?>"><?php echo optinforms_form2_default_title(); ?></div><!--optinforms-form2-title-->
                                </div><!--optinforms-form2-title-container-->
                                <div id="optinforms-form2-email-field-container" <?php if (get_option('optinforms_form2_hide_title')== '1' && get_option('optinforms_form2_hide_disclaimer')== '1') { echo 'style="width:80%;"'; } elseif (get_option('optinforms_form2_hide_title')== '1') { echo 'style="width:62%;"'; } elseif (get_option('optinforms_form2_hide_disclaimer')== '1') { echo 'style="width:48%;"'; } ?>>
                                    <input type="text" id="optinforms-form2-email-field" placeholder="<?php echo optinforms_form2_default_email_field(); ?>" style="font-family:<?php echo optinforms_form2_default_fields_font(); ?>; font-size:<?php echo optinforms_form2_default_fields_size(); ?>; color:<?php echo optinforms_form2_default_fields_color(); ?>;" />
                                </div><!--optinforms-form2-email-field-container-->
                                <div id="optinforms-form2-button-container">
                                    <input type="button" id="optinforms-form2-button" value="<?php echo optinforms_form2_default_button_text(); ?>" style="font-family:<?php echo optinforms_form2_default_button_text_font(); ?>; font-size:<?php echo optinforms_form2_default_button_text_size(); ?>; color:<?php echo optinforms_form2_default_button_text_color(); ?>; background-color:<?php echo optinforms_form2_default_button_background(); ?>" />
                                </div><!--optinforms-form2-button-container-->
                                <div id="optinforms-form2-disclaimer-container" <?php if (get_option('optinforms_form2_hide_disclaimer')== '1') { echo 'style="display:none;"'; } ?>>
                                    <p id="optinforms-form2-disclaimer" style="font-family:<?php echo optinforms_form2_default_disclaimer_font(); ?>; font-size:<?php echo optinforms_form2_default_disclaimer_size(); ?>; line-height: <?php echo optinforms_form2_default_disclaimer_size(); ?>; color:<?php echo optinforms_form2_default_disclaimer_color(); ?>"><?php echo optinforms_form2_default_disclaimer(); ?></p>
                                </div><!--optinforms-form2-disclaimer-container-->
                                <div class="clear"></div>
                            </div><!--optinforms-form2-->
                        </div><!--optinforms-form2-container-->
                        <div class="clear"></div>			

<?php ?>