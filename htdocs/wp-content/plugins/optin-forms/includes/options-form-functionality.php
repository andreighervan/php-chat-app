<?php ?>
                        <div class="toggle-wrap">
                            <span class="trigger">
                    		<a><?php echo __('Form Functionality', 'optin-forms'); ?></a>
                            </span>

                            <div class="toggle-container" style="display: none;">

                                <div class="optiongroup">
                                    <div class="optionleft">

                                    </div><!--optionleft-->
                                    <div class="optionmiddle">
                                        <input type="checkbox" name="optinforms_form_target" value="1" id="optinforms_form_target" <?php if (get_option('optinforms_form_target')== '1') { echo 'checked="checked"'; } ?> /> <label for="optinforms_form_target" class="nopointer"><?php echo __('Open form submission in a new window', 'optin-forms'); ?></label>
                                    </div><!--optionmiddle-->
                                    <div class="optionlast">

                                    </div><!--optionlast-->
                                    <div class="clear"></div>
                                </div><!--optiongroup-->

                            </div><!--toggle-container-->

                	</div><!--toggle-wrap-->

<?php ?>