<?php ?>

                    <span class="trigger">
                    	<a><?php echo __('Style Your Form', 'optin-forms'); ?></a>
                    </span>

                    <div class="toggle-container" style="display: none;">
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_background" class="nopointer"><?php echo __('Form background color', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form5_background" name="optinforms_form5_background" class="optinforms-color" value="<?php echo optinforms_form5_default_background(); ?>" data-default-color="#333333" />
                                <script>
                                    jQuery(document).ready(function($){
                                        $('#optinforms_form5_background').wpColorPicker({
                                            color: true,
                                            hide: true,
                                            palettes: true,
                                            change: function(event, ui) {
                                                $("#optinforms-form5").css( 'background-color', ui.color.toString());
                                            }
                                        });
                                    });
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <?php if (get_option('optinforms_form5_hide_title')== '1') { echo '<div class="optionsgroup"><p class="hidden-warning">' . __('You\'ve hidden your title in Form Options', 'optin-forms') . '.</p></div>'; } ?>

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_title" class="nopointer"><?php echo __('Title', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form5_title" name="optinforms_form5_title" value="<?php echo optinforms_form5_default_title(); ?>" onchange='optinforms_change_form5_title()' <?php if (get_option('optinforms_form5_hide_title')== '1') { echo 'disabled="disabled"'; } ?> />
                                <script type="text/javascript">
                                    function optinforms_change_form5_title() {
                                        document.getElementById('optinforms-form5-title').innerHTML = document.getElementById('optinforms_form5_title').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_title_font" class="nopointer"><?php echo __('Title font', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <select name="optinforms_form5_title_font" id="optinforms_form5_title_font" onchange='optinforms_change_form5_title_font()' <?php if (get_option('optinforms_form5_hide_title')== '1') { echo 'disabled="disabled"'; } ?>>
                                    <?php echo optinforms_get_form5_title_font_options(); ?>
                                </select>
                                <script type="text/javascript">
                                    function optinforms_change_form5_title_font() {
                                        document.getElementById("optinforms-form5-title").style.fontFamily = document.getElementById('optinforms_form5_title_font').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_title_size" class="nopointer"><?php echo __('Title size', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <select name="optinforms_form5_title_size" id="optinforms_form5_title_size" onchange='optinforms_change_form5_title_size()' <?php if (get_option('optinforms_form5_hide_title')== '1') { echo 'disabled="disabled"'; } ?>>
                                    <?php echo optinforms_get_form5_title_size_options(); ?>
                                </select>
                                <script type="text/javascript">
                                    function optinforms_change_form5_title_size() {
                                        document.getElementById("optinforms-form5-title").style.fontSize = document.getElementById('optinforms_form5_title_size').value;
                                        document.getElementById("optinforms-form5-title").style.lineHeight = document.getElementById('optinforms_form5_title_size').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_title_color" class="nopointer"><?php echo __('Title color', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form5_title_color" name="optinforms_form5_title_color" class="optinforms-color" value="<?php echo optinforms_form5_default_title_color(); ?>" data-default-color="#fb6a13" <?php if (get_option('optinforms_form5_hide_title')== '1') { echo 'disabled="disabled"'; } ?> />
                                <script>
                                    jQuery(document).ready(function($){
                                        $('#optinforms_form5_title_color').wpColorPicker({
                                            color: true,
                                            hide: true,
                                            palettes: true,
                                            change: function(event, ui) {
                                                $("#optinforms-form5-title").css( 'color', ui.color.toString());
                                            }
                                        });
                                    });
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <?php if (get_option('optinforms_form5_hide_subtitle')== '1') { echo '<div class="optionsgroup"><p class="hidden-warning">' . __('You\'ve hidden your subtitle in Form Options', 'optin-forms') . '.</p></div>'; } ?>

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_subtitle" class="nopointer"><?php echo __('Subtitle', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form5_subtitle" name="optinforms_form5_subtitle" value="<?php echo optinforms_form5_default_subtitle(); ?>" onchange='optinforms_change_form5_subtitle()' <?php if (get_option('optinforms_form5_hide_subtitle')== '1') { echo 'disabled="disabled"'; } ?> />
                                <script type="text/javascript">
                                    function optinforms_change_form5_subtitle() {
                                        document.getElementById('optinforms-form5-subtitle').innerHTML = document.getElementById('optinforms_form5_subtitle').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_subtitle_font" class="nopointer"><?php echo __('Subtitle font', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <select name="optinforms_form5_subtitle_font" id="optinforms_form5_subtitle_font" onchange='optinforms_change_form5_subtitle_font()' <?php if (get_option('optinforms_form5_hide_subtitle')== '1') { echo 'disabled="disabled"'; } ?>>
                                    <?php echo optinforms_get_form5_subtitle_font_options(); ?>
                                </select>
                                <script type="text/javascript">
                                    function optinforms_change_form5_subtitle_font() {
                                        document.getElementById("optinforms-form5-subtitle").style.fontFamily = document.getElementById('optinforms_form5_subtitle_font').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_subtitle_size" class="nopointer"><?php echo __('Subtitle size', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <select name="optinforms_form5_subtitle_size" id="optinforms_form5_subtitle_size" onchange='optinforms_change_form5_subtitle_size()' <?php if (get_option('optinforms_form5_hide_subtitle')== '1') { echo 'disabled="disabled"'; } ?>>
                                    <?php echo optinforms_get_form5_subtitle_size_options(); ?>
                                </select>
                                <script type="text/javascript">
                                    function optinforms_change_form5_subtitle_size() {
                                        document.getElementById("optinforms-form5-subtitle").style.fontSize = document.getElementById('optinforms_form5_subtitle_size').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_subtitle_color" class="nopointer"><?php echo __('Subtitle color', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form5_subtitle_color" name="optinforms_form5_subtitle_color" class="optinforms-color" value="<?php echo optinforms_form5_default_subtitle_color(); ?>" data-default-color="#CCCCCC" <?php if (get_option('optinforms_form5_hide_subtitle')== '1') { echo 'disabled="disabled"'; } ?> />
                                <script>
                                    jQuery(document).ready(function($){
                                        $('#optinforms_form5_subtitle_color').wpColorPicker({
                                            color: true,
                                            hide: true,
                                            palettes: true,
                                            change: function(event, ui) {
                                                $("#optinforms-form5-subtitle").css( 'color', ui.color.toString());
                                            }
                                        });
                                    });
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <?php if (get_option('optinforms_form5_hide_name_field')== '1') { echo '<div class="optionsgroup"><p class="hidden-warning">' . __('You\'ve hidden your name field in Form Options', 'optin-forms') . '.</p></div>'; } ?>

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_name_field" class="nopointer"><?php echo __('Input field: name', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form5_name_field" name="optinforms_form5_name_field" value="<?php echo optinforms_form5_default_name_field(); ?>" onchange='optinforms_change_form5_name_field()' <?php if (get_option('optinforms_form5_hide_name_field')== '1') { echo 'disabled="disabled"'; } ?> />
                                <script type="text/javascript">
                                    function optinforms_change_form5_name_field() {
                                        document.getElementById('optinforms-form5-name-field').value = document.getElementById('optinforms_form5_name_field').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_email_field" class="nopointer"><?php echo __('Input field: email', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form5_email_field" name="optinforms_form5_email_field" value="<?php echo optinforms_form5_default_email_field(); ?>" onchange='optinforms_change_form5_email_field()' />
                                <script type="text/javascript">
                                    function optinforms_change_form5_email_field() {
                                        document.getElementById('optinforms-form5-email-field').value = document.getElementById('optinforms_form5_email_field').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_fields_font" class="nopointer"><?php echo __('Input fields font', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <select name="optinforms_form5_fields_font" id="optinforms_form5_fields_font" onchange='optinforms_change_form5_fields_font()'>
                                    <?php echo optinforms_get_form5_fields_font_options(); ?>
                                </select>
                                <script type="text/javascript">
                                    function optinforms_change_form5_fields_font() {
                                        document.getElementById("optinforms-form5-name-field").style.fontFamily = document.getElementById('optinforms_form5_fields_font').value;
                                        document.getElementById("optinforms-form5-email-field").style.fontFamily = document.getElementById('optinforms_form5_fields_font').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_fields_size" class="nopointer"><?php echo __('Input fields size', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <select name="optinforms_form5_fields_size" id="optinforms_form5_fields_size" onchange='optinforms_change_form5_fields_size()'>
                                    <?php echo optinforms_get_form5_fields_size_options(); ?>
                                </select>
                                <script type="text/javascript">
                                    function optinforms_change_form5_fields_size() {
                                        document.getElementById("optinforms-form5-name-field").style.fontSize = document.getElementById('optinforms_form5_fields_size').value;
                                        document.getElementById("optinforms-form5-email-field").style.fontSize = document.getElementById('optinforms_form5_fields_size').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_fields_color" class="nopointer"><?php echo __('Input fields color', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form5_fields_color" name="optinforms_form5_fields_color" class="optinforms-color" value="<?php echo optinforms_form5_default_fields_color(); ?>" data-default-color="#000000" />
                                <script>
                                    jQuery(document).ready(function($){
                                        $('#optinforms_form5_fields_color').wpColorPicker({
                                            color: true,
                                            hide: true,
                                            palettes: true,
                                            change: function(event, ui) {
                                                $("#optinforms-form5-name-field").css( 'color', ui.color.toString());
                                                $("#optinforms-form5-email-field").css( 'color', ui.color.toString());
                                            }
                                        });
                                    });
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_button_text" class="nopointer"><?php echo __('Button text', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form5_button_text" name="optinforms_form5_button_text" value="<?php echo optinforms_form5_default_button_text(); ?>" onchange='optinforms_change_form5_button_text()' />
                                <script type="text/javascript">
                                    function optinforms_change_form5_button_text() {
                                        document.getElementById('optinforms-form5-button').value = document.getElementById('optinforms_form5_button_text').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_button_text_font" class="nopointer"><?php echo __('Button text font', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <select name="optinforms_form5_button_text_font" id="optinforms_form5_button_text_font" onchange='optinforms_change_form5_button_text_font()'>
                                    <?php echo optinforms_get_form5_button_text_font_options(); ?>
                                </select>
                                <script type="text/javascript">
                                    function optinforms_change_form5_button_text_font() {
                                        document.getElementById("optinforms-form5-button").style.fontFamily = document.getElementById('optinforms_form5_button_text_font').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_button_text_size" class="nopointer"><?php echo __('Button text size', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <select name="optinforms_form5_button_text_size" id="optinforms_form5_button_text_size" onchange='optinforms_change_form5_button_text_size()'>
                                    <?php echo optinforms_get_form5_button_text_size_options(); ?>
                                </select>
                                <script type="text/javascript">
                                    function optinforms_change_form5_button_text_size() {
                                        document.getElementById("optinforms-form5-button").style.fontSize = document.getElementById('optinforms_form5_button_text_size').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_button_text_color" class="nopointer"><?php echo __('Button text color', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form5_button_text_color" name="optinforms_form5_button_text_color" class="optinforms-color" value="<?php echo optinforms_form5_default_button_text_color(); ?>" data-default-color="#FFFFFF" />
                                <script>
                                    jQuery(document).ready(function($){
                                        $('#optinforms_form5_button_text_color').wpColorPicker({
                                            color: true,
                                            hide: true,
                                            palettes: true,
                                            change: function(event, ui) {
                                                $("#optinforms-form5-button").css( 'color', ui.color.toString());
                                            }
                                        });
                                    });
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_button_background" class="nopointer"><?php echo __('Button background color', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form5_button_background" name="optinforms_form5_button_background" class="optinforms-color" value="<?php echo optinforms_form5_default_button_background(); ?>" data-default-color="#fb6a13" />
                                <script>
                                    jQuery(document).ready(function($){
                                        $('#optinforms_form5_button_background').wpColorPicker({
                                            color: true,
                                            hide: true,
                                            palettes: true,
                                            change: function(event, ui) {
                                                $("#optinforms-form5-button").css( 'background-color', ui.color.toString());
                                            }
                                        });
                                    });
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <?php if (get_option('optinforms_form5_hide_disclaimer')== '1') { echo '<div class="optionsgroup"><p class="hidden-warning">' . __('You\'ve hidden your disclaimer in Form Options', 'optin-forms') . '.</p></div>'; } ?>

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_disclaimer" class="nopointer"><?php echo __('Disclaimer text', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form5_disclaimer" name="optinforms_form5_disclaimer" value="<?php echo optinforms_form5_default_disclaimer(); ?>" onchange='optinforms_change_form5_disclaimer()' <?php if (get_option('optinforms_form5_hide_disclaimer')== '1') { echo 'disabled="disabled"'; } ?> />
                                <script type="text/javascript">
                                    function optinforms_change_form5_disclaimer() {
                                        document.getElementById('optinforms-form5-disclaimer').innerHTML = document.getElementById('optinforms_form5_disclaimer').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_disclaimer_font" class="nopointer"><?php echo __('Disclaimer font', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <select name="optinforms_form5_disclaimer_font" id="optinforms_form5_disclaimer_font" onchange='optinforms_change_form5_disclaimer_font()' <?php if (get_option('optinforms_form5_hide_disclaimer')== '1') { echo 'disabled="disabled"'; } ?>>
                                    <?php echo optinforms_get_form5_disclaimer_font_options(); ?>
                                </select>
                                <script type="text/javascript">
                                    function optinforms_change_form5_disclaimer_font() {
                                        document.getElementById("optinforms-form5-disclaimer").style.fontFamily = document.getElementById('optinforms_form5_disclaimer_font').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_disclaimer_size" class="nopointer"><?php echo __('Disclaimer size', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <select name="optinforms_form5_disclaimer_size" id="optinforms_form5_disclaimer_size" onchange='optinforms_change_form5_disclaimer_size()' <?php if (get_option('optinforms_form5_hide_disclaimer')== '1') { echo 'disabled="disabled"'; } ?>>
                                    <?php echo optinforms_get_form5_disclaimer_size_options(); ?>
                                </select>
                                <script type="text/javascript">
                                    function optinforms_change_form5_disclaimer_size() {
                                        document.getElementById("optinforms-form5-disclaimer").style.fontSize = document.getElementById('optinforms_form5_disclaimer_size').value;
                                    }
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_disclaimer_color" class="nopointer"><?php echo __('Disclaimer color', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form5_disclaimer_color" name="optinforms_form5_disclaimer_color" class="optinforms-color" value="<?php echo optinforms_form5_default_disclaimer_color(); ?>" data-default-color="#727272" <?php if (get_option('optinforms_form5_hide_disclaimer')== '1') { echo 'disabled="disabled"'; } ?> />
                                <script>
                                    jQuery(document).ready(function($){
                                        $('#optinforms_form5_disclaimer_color').wpColorPicker({
                                            color: true,
                                            hide: true,
                                            palettes: true,
                                            change: function(event, ui) {
                                                $("#optinforms-form5-disclaimer").css( 'color', ui.color.toString());
                                            }
                                        });
                                    });
                                </script>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form5_width" class="nopointer"><?php echo __('Form width', 'optin-forms'); ?></label> <label><a onclick="optinforms_explain_width_5()"><span class="explain">?</span></a></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <div class="choose-width">
                                    <input name="optinforms_form5_width" id="optinforms_form5_width_100" type="radio" value="0" class="radiobutton" <?php echo optinforms_form5_checked_width_100(); ?> onclick="document.getElementById('optinforms_form5_width_pixels').disabled=true;" /> <label for="optinforms_form5_width_100" class="radiobutton-label"><?php echo __('100%', 'optin-forms'); ?></label>
                                </div><!--choose-width-->
                                <div class="choose-width">
                                    <input name="optinforms_form5_width" id="optinforms_form5_width_fixed" type="radio" value="1" class="radiobutton" <?php echo optinforms_form5_checked_width_fixed(); ?> onclick="document.getElementById('optinforms_form5_width_pixels').disabled=false;" /> <label for="optinforms_form5_width_fixed" class="radiobutton-label"><?php echo __('Fixed:', 'optin-forms'); ?></label>
                                </div><!--choose-width-->
                                <input type="text" id="optinforms_form5_width_pixels" name="optinforms_form5_width_pixels" value="<?php echo optinforms_form5_default_width_pixels(); ?>" class="fixed-width" <?php echo optinforms_form5_disabled_width_pixels(); ?> /> <p class="fixed-width-px"><?php echo __('px', 'optin-forms'); ?></p>
                                <div class="clear"></div>
                            </div><!--optionmiddle-->
                            <div class="optionlast">

                            </div><!--optionlast-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->

                        <script type="text/javascript">
                            function optinforms_explain_width_5() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-width-5");
                                // Toggle
                                contentId.style.display == "block" ? contentId.style.display = "none" :
                                contentId.style.display = "block";
                            }
                        </script>
                        <div id="optinforms-explain-width-5" style="display:none;">
                            <div class="optinforms-help">
                                <p><?php echo __('In most cases, you can leave the form width at 100%. This will ensure your form will align perfectly with any WordPress theme and act responsive when scaled on different devices. Please note that the form preview displayed in your WordPress administration panel will not be affected by changing this value.', 'optin-forms'); ?></p>
                            </div><!--optinforms-help-->
                        </div><!--optinforms-explain-width-5-->

                    </div><!--toggle-container-->
                    <div class="clear"></div>

                    <div class="toggle-wrap">
                    	<span class="trigger">
                            <a><?php echo __('Form Options', 'optin-forms'); ?></a>
                        </span>

                        <div class="toggle-container" style="display: none;">

                        	<div class="optiongroup">
                                <div class="optionleft">

                                </div><!--optionleft-->
                                <div class="optionmiddle">
                                    <input type="checkbox" name="optinforms_form5_hide_title" value="1" id="optinforms_form5_hide_title" <?php if (get_option('optinforms_form5_hide_title')== '1') { echo 'checked="checked"'; } ?> onclick="optinforms_form5_title_visibility(this.checked);" /> <label for="optinforms_form5_hide_title" class="nopointer"><?php echo __('Hide the title', 'optin-forms'); ?></label>
                                    <script type="text/javascript">
                                        function optinforms_form5_title_visibility(optinchecked) {
                                            if(optinchecked) {
                                                document.getElementById("optinforms-form5-title").style.display = "none";
                                            }
                                            else {
                                                document.getElementById("optinforms-form5-title").style.display = "";
                                            }
					}
                                    </script>
                                </div><!--optionmiddle-->
                                <div class="optionlast">

                                </div><!--optionlast-->
                                <div class="clear"></div>
                            </div><!--optiongroup-->

                            <div class="optiongroup">
                                <div class="optionleft">

                                </div><!--optionleft-->
                                <div class="optionmiddle">
                                    <input type="checkbox" name="optinforms_form5_hide_subtitle" value="1" id="optinforms_form5_hide_subtitle" <?php if (get_option('optinforms_form5_hide_subtitle')== '1') { echo 'checked="checked"'; } ?> onclick="optinforms_form5_hide_subtitle_visibility(this.checked);optinforms_form5_hide_subtitle_disclaimer_visibility();" /> <label for="optinforms_form5_hide_subtitle" class="nopointer"><?php echo __('Hide the subtitle', 'optin-forms'); ?></label>
                                    <script type="text/javascript">
                                        function optinforms_form5_hide_subtitle_visibility(optinchecked) {
                                            if(optinchecked) {
                                                document.getElementById("optinforms-form5-subtitle").style.display = "none";
						document.getElementById("optinforms-form5-disclaimer").style.margin = "0 20px";
                                            }
                                            else {
                                                document.getElementById("optinforms-form5-subtitle").style.display = "";
                                                document.getElementById("optinforms-form5-disclaimer").style.margin = "20px 20px 0";
                                            }
					}
                                    </script>
                                </div><!--optionmiddle-->
                                <div class="optionlast">

                                </div><!--optionlast-->
                                <div class="clear"></div>
                            </div><!--optiongroup-->

                            <div class="optiongroup">
                                <div class="optionleft">

                                </div><!--optionleft-->
                                <div class="optionmiddle">
                                    <input type="checkbox" name="optinforms_form5_hide_name_field" value="1" id="optinforms_form5_hide_name_field" <?php if (get_option('optinforms_form5_hide_name_field')== '1') { echo 'checked="checked"'; } ?> onclick="optinforms_form5_name_field_visibility(this.checked);" /> <label for="optinforms_form5_hide_name_field" class="nopointer"><?php echo __('Hide the name field', 'optin-forms'); ?></label>
                                    <script type="text/javascript">
                                        function optinforms_form5_name_field_visibility(optinchecked) {
                                            if(optinchecked) {
                                                document.getElementById("optinforms-form5-name-field").style.display = "none";
                                            }
                                            else {
                                                document.getElementById("optinforms-form5-name-field").style.display = "";
                                            }
					}
                                    </script>
                                </div><!--optionmiddle-->
                                <div class="optionlast">

                                </div><!--optionlast-->
                                <div class="clear"></div>
                            </div><!--optiongroup-->

                            <div class="optiongroup">
                                <div class="optionleft">

                                </div><!--optionleft-->
                                <div class="optionmiddle">
                                    <input type="checkbox" name="optinforms_form5_hide_disclaimer" value="1" id="optinforms_form5_hide_disclaimer" <?php if (get_option('optinforms_form5_hide_disclaimer')== '1') { echo 'checked="checked"'; } ?> onclick="optinforms_form5_disclaimer_visibility(this.checked);optinforms_form5_hide_subtitle_disclaimer_visibility();" /> <label for="optinforms_form5_hide_disclaimer" class="nopointer"><?php echo __('Hide the disclaimer', 'optin-forms'); ?></label>
                                    <script type="text/javascript">
                                        function optinforms_form5_disclaimer_visibility(optinchecked) {
                                            if(optinchecked) {
                                                document.getElementById("optinforms-form5-disclaimer").style.display = "none";
                                            }
                                            else {
                                                document.getElementById("optinforms-form5-disclaimer").style.display = "";
                                            }
                                        }
                                    </script>
                                    <script type="text/javascript">
                                        function optinforms_form5_hide_subtitle_disclaimer_visibility() {
                                            if(document.getElementById("optinforms_form5_hide_subtitle").checked && document.getElementById("optinforms_form5_hide_disclaimer").checked) {
                                                document.getElementById("optinforms-form5-container-right").style.display = "none";
                                                document.getElementById("optinforms-form5-container-left").style.margin = "10px 0";
                                                document.getElementById("optinforms-form5-container-left").style.width = "100%";
                                            }
                                            else if(document.getElementById("optinforms_form5_hide_subtitle").checked) {
                                                document.getElementById("optinforms-form5-container-right").style.display = "inline";
                                                document.getElementById("optinforms-form5-container-left").style.margin = "10px 1% 10px 0";
						document.getElementById("optinforms-form5-container-left").style.width = "39%";
                                            }
                                            else if(document.getElementById("optinforms_form5_hide_disclaimer").checked) {
                                                document.getElementById("optinforms-form5-container-right").style.display = "inline";
                                                document.getElementById("optinforms-form5-container-left").style.margin = "10px 1% 10px 0";
                                                document.getElementById("optinforms-form5-container-left").style.width = "39%";
                                            }
                                        }
                                    </script>
                                </div><!--optionmiddle-->
                                <div class="optionlast">

                                </div><!--optionlast-->
                                <div class="clear"></div>
                            </div><!--optiongroup-->

                        	<div class="optiongroup">
                                <div class="optionleft">
                                    <label for="optinforms_form5_css" class="nopointer"><?php echo __('Custom CSS', 'optin-forms'); ?></label> <label><a onclick="optinforms_explain_css_5()"><span class="explain">?</span></a></label>
                                </div><!--optionleft-->
                                <div class="optionmiddle">
                                    <textarea id="optinforms_form5_css" name="optinforms_form5_css"><?php echo optinforms_form5_css(); ?></textarea>
                                </div><!--optionmiddle-->
                                <div class="optionlast">

                                </div><!--optionlast-->
                                <div class="clear"></div>
                            </div><!--optiongroup-->

                            <script type="text/javascript">
                                function optinforms_explain_css_5() {
                                    // Get the DOM reference
                                    var contentId = document.getElementById("optinforms-explain-css-5");
                                    // Toggle
                                    contentId.style.display == "block" ? contentId.style.display = "none" :
                                    contentId.style.display = "block";
				}
                            </script>
                            <div id="optinforms-explain-css-5" style="display:none;">
                                <div class="optinforms-help">
                                    <p><?php echo __('Override the plugin\'s CSS values by entering your own custom CSS.', 'optin-forms'); ?></p>
                                </div><!--optinforms-help-->
                            </div><!--optinforms-explain-css-5-->

                        </div><!--toggle-container-->
                        <div class="clear"></div>
                    </div><!--toggle-wrap-->

<?php ?>