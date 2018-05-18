<?php ?>
			<div class="optiongroup">
                    <p><?php echo __('Select your email solution and configure the required fields.', 'optin-forms'); ?></p>
                    <div class="optionleft">
                        <label for="optinforms_email_solution" class="nopointer"><?php echo __('My email solution is', 'optin-forms'); ?></label>
                    </div><!--optionleft-->
                    <div class="optionmiddle">
                        <select name="optinforms_email_solution" id="optinforms_email_solution">
                            <option value="optinforms_email_solution_option1" <?php if (get_option('optinforms_email_solution')== 'optinforms_email_solution_option1') { echo 'selected="selected"'; } ?>>AWeber</option>
                            <option value="optinforms_email_solution_option2" <?php if (get_option('optinforms_email_solution')== 'optinforms_email_solution_option2') { echo 'selected="selected"'; } ?>>iContact</option>
                            <option value="optinforms_email_solution_option3" <?php if (get_option('optinforms_email_solution')== 'optinforms_email_solution_option3') { echo 'selected="selected"'; } ?>>MailChimp</option>
                            <option value="optinforms_email_solution_option4" <?php if (get_option('optinforms_email_solution')== 'optinforms_email_solution_option4') { echo 'selected="selected"'; } ?>>GetResponse</option>
                            <option value="optinforms_email_solution_option5" <?php if (get_option('optinforms_email_solution')== 'optinforms_email_solution_option5') { echo 'selected="selected"'; } ?>>Mad Mimi</option>
                            <option value="optinforms_email_solution_option6" <?php if (get_option('optinforms_email_solution')== 'optinforms_email_solution_option6') { echo 'selected="selected"'; } ?>>Interspire Email Marketer</option>
                            <option value="optinforms_email_solution_option7" <?php if (get_option('optinforms_email_solution')== 'optinforms_email_solution_option7') { echo 'selected="selected"'; } ?>>ConvertKit</option>
                        </select>
                        <script type="text/javascript">
                            document.getElementById('optinforms_email_solution').onchange = function() {
                                var i = 1;
                                var myDiv = document.getElementById("optinforms_email_solution_option" + i);
                                while(myDiv) {
                                    myDiv.style.display = 'none';
                                    myDiv = document.getElementById("optinforms_email_solution_option" + ++i);
                                }
                            document.getElementById(this.value).style.display = 'block';
                        };
                        </script>
                    </div><!--optionmiddle-->
                    <div class="clear"></div>
        
                </div><!--optiongroup-->
                
                <div class="optiongroup">
                    <div id="optinforms_email_solution_option1" <?php if (get_option('optinforms_email_solution')== '' || get_option('optinforms_email_solution')== 'optinforms_email_solution_option1') { echo 'style="display:block;"'; } ?>>
                    	<!--<p class="optinforms-integration"><a href="#"></?php echo __('Learn how to integrate aWeber: watch the short video', 'optin-forms'); ?></a></p>-->
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_aweber()"><span class="explain">?</span></a></label> <label for="optinforms_form_list_name_aweber" class="nopointer"><?php echo __('List ID', 'optin-forms'); ?> <span class="required">*</span></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_list_name_aweber" name="optinforms_form_list_name_aweber" value="<?php echo optinforms_form_list_name_aweber(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_aweber() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-aweber");
                                // Toggle 
                                contentId.style.display == "block" ? contentId.style.display = "none" : 
                                contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms-explain-aweber" style="display:none;">
                            <div class="optinforms-step">
                            	<h4><?php echo __('How to find your list ID', 'optin-forms'); ?></h4>
                                <p><span class="step">1</span> <?php echo __('Log in to your AWeber account', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-aweber-001.png" class="step-image" />
                                <p><span class="step">2</span> <?php echo __('Click on List Options in the navigation menu', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-aweber-002.png" class="step-image" />
                                <p><span class="step">3</span> <?php echo __('Click on List Settings from the submenu options', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-aweber-003.png" class="step-image" />
                                <p><span class="step">4</span> <?php echo __('You will find your list ID below the List Name field', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-aweber-004.png" class="step-image" />
                            </div><!--optinforms-step-->
                        </div><!--optinforms-explain-aweber-->
                        
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_redirect_aweber()"><span class="explain">?</span></a></label> <label for="optinforms_form_redirect_aweber" class="nopointer"><?php echo __('Redirect URL', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_redirect_aweber" name="optinforms_form_redirect_aweber" value="<?php echo optinforms_form_redirect_aweber(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_redirect_aweber() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-redirect-aweber");
                                // Toggle 
                                contentId.style.display == "block" ? contentId.style.display = "none" : 
                                contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms-explain-redirect-aweber" style="display:none;">
                            <div class="optinforms-help">
                                <p><?php echo __('Enter the URL of the page where your visitors will be taken to, once they successfully subscribe.', 'optin-forms'); ?> <?php echo __('If you leave this field blank, the default AWeber message will be used.', 'optin-forms'); ?></p>
                            </div><!--optinforms-help-->
                        </div><!--optinforms-explain-redirect-aweber-->
                        
                        
                    </div><!--optinforms_email_solution_option1-->
                    <div id="optinforms_email_solution_option2" <?php if (get_option('optinforms_email_solution')== 'optinforms_email_solution_option2') { echo 'style="display:block;"'; } ?>>
                        <!--<p class="optinforms-integration"></?php echo __('Learn how to integrate iContact: watch the short video', 'optin-forms'); ?></p>-->
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_icontact()"><span class="explain">?</span></a></label> <label for="optinforms_form_listid_icontact" class="nopointer"><?php echo __('List ID', 'optin-forms'); ?> <span class="required">*</span></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_listid_icontact" name="optinforms_form_listid_icontact" value="<?php echo optinforms_form_listid_icontact(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_icontact()"><span class="explain">?</span></a></label> <label for="optinforms_form_specialid_icontact" class="nopointer"><?php echo __('Special ID', 'optin-forms'); ?> <span class="required">*</span></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_specialid_icontact" name="optinforms_form_specialid_icontact" value="<?php echo optinforms_form_specialid_icontact(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_icontact()"><span class="explain">?</span></a></label> <label for="optinforms_form_clientid_icontact" class="nopointer"><?php echo __('Client ID', 'optin-forms'); ?> <span class="required">*</span></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_clientid_icontact" name="optinforms_form_clientid_icontact" value="<?php echo optinforms_form_clientid_icontact(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_icontact() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-icontact");
                                // Toggle 
                                contentId.style.display == "block" ? contentId.style.display = "none" : 
                                contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms-explain-icontact" style="display:none;">
                            <div class="optinforms-step">
                            	<h4><?php echo __('How to find your list ID, special ID and client ID values', 'optin-forms'); ?></h4>
                                <p><span class="step">1</span> <?php echo __('Log in to your iContact account', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-icontact-001.png" class="step-image" />
                                <p><span class="step">2</span> <?php echo __('Click on Contacts in the navigation menu', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-icontact-002.png" class="step-image" />
                                <p><span class="step">3</span> <?php echo __('Click on Sign-up Forms in the submenu', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-icontact-003.png" class="step-image" />
                                <p><span class="step">4</span> <?php echo __('Click on the Create HTML Form button', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-icontact-004.png" class="step-image" />
                                <p><span class="step">5</span> <?php echo __('Click on Next', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-icontact-005.png" class="step-image" />
                                <p><span class="step">6</span> <?php echo __('Name your form, assign it to a list and include the First Name field', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-icontact-006.png" class="step-image" />
                                <p><span class="step">7</span> <?php echo __('Click on Save', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-icontact-007.png" class="step-image" />
                                <p><span class="step">8</span> <?php echo __('Click on the View HTML link', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-icontact-008.png" class="step-image" />
                                <p><span class="step">9</span> <?php echo __('Scroll down to the Manual Sign-up Form and copy the values of listid, specialid and clientid fields', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-icontact-009.png" class="step-image" />
                            </div><!--optinforms-step-->
                        </div><!--optinforms-explain-icontact-->
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_redirect_icontact()"><span class="explain">?</span></a></label> <label for="optinforms_form_redirect_icontact" class="nopointer"><?php echo __('Redirect page URL', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_redirect_icontact" name="optinforms_form_redirect_icontact" value="<?php echo optinforms_form_redirect_icontact(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_redirect_icontact() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-redirect-icontact");
                                // Toggle 
                                contentId.style.display == "block" ? contentId.style.display = "none" : 
                                contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms-explain-redirect-icontact" style="display:none;">
                            <div class="optinforms-help">
                                <p><?php echo __('Enter the URL of the page where your visitors will be taken to, once they successfully subscribe.', 'optin-forms'); ?> <?php echo __('If you leave this field blank, the default iContact message will be used.', 'optin-forms'); ?></p>
                            </div><!--optinforms-help-->
                        </div><!--optinforms-explain-redirect-icontact-->
                        
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_error_icontact()"><span class="explain">?</span></a></label> <label for="optinforms_form_error_icontact" class="nopointer"><?php echo __('Error page URL', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_error_icontact" name="optinforms_form_error_icontact" value="<?php echo optinforms_form_error_icontact(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_error_icontact() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-error-icontact");
                                // Toggle 
                                contentId.style.display == "block" ? contentId.style.display = "none" : 
                                contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms-explain-error-icontact" style="display:none;">
                            <div class="optinforms-help">
                                <p><?php echo __('Enter the URL of the page where your visitors will be taken to, if there are any errors.', 'optin-forms'); ?> <?php echo __('If you leave this field blank, the default iContact error message will be used.', 'optin-forms'); ?></p>
                            </div><!--optinforms-help-->
                        </div><!--optinforms-explain-error-icontact-->
                        
                    </div><!--optinforms_email_solution_option2-->
                    <div id="optinforms_email_solution_option3" <?php if (get_option('optinforms_email_solution')== 'optinforms_email_solution_option3') { echo 'style="display:block;"'; } ?>>
                    	<!--<p class="optinforms-integration"></?php echo __('Learn how to integrate MailChimp: watch the short video', 'optin-forms'); ?></p>-->
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_mailchimp()"><span class="explain">?</span></a></label> <label for="optinforms_form_action_mailchimp" class="nopointer"><?php echo __('Form action URL', 'optin-forms'); ?> <span class="required">*</span></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_action_mailchimp" name="optinforms_form_action_mailchimp" value="<?php echo optinforms_form_action_mailchimp(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_mailchimp() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-mailchimp");
                                // Toggle 
                                contentId.style.display == "block" ? contentId.style.display = "none" : 
                                contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms-explain-mailchimp" style="display:none;">
                            <div class="optinforms-step">
                            	<h4><?php echo __('How to find your form action URL', 'optin-forms'); ?></h4>
                                <p><span class="step">1</span> <?php echo __('Log in to your MailChimp account', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-mailchimp-001.png" class="step-image" />
                                <p><span class="step">2</span> <?php echo __('Click on Lists in the navigation menu', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-mailchimp-002.png" class="step-image" />
                                <p><span class="step">3</span> <?php echo __('Click on the arrow next to the list you wish to use and click on Signup forms', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-mailchimp-003.png" class="step-image" />
                                <p><span class="step">4</span> <?php echo __('Select Embedded forms', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-mailchimp-004.png" class="step-image" />
                                <p><span class="step">5</span> <?php echo __('Select the Naked form', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-mailchimp-005.png" class="step-image" />
                                <p><span class="step">6</span> <?php echo __('You will find the form action URL in the HTML box', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-mailchimp-006.png" class="step-image" />
                            </div><!--optinforms-step-->
                        </div><!--optinforms-explain-mailchimp-->
                    </div><!--optinforms_email_solution_option3-->
                    <div id="optinforms_email_solution_option4" <?php if (get_option('optinforms_email_solution')== 'optinforms_email_solution_option4') { echo 'style="display:block;"'; } ?>>
                    	<!--<p class="optinforms-integration"></?php echo __('Learn how to integrate GetResponse: watch the short video', 'optin-forms'); ?></p>-->
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_getresponse()"><span class="explain">?</span></a></label> <label for="optinforms_form_webformid_getresponse" class="nopointer"><?php echo __('Campaign token', 'optin-forms'); ?> <span class="required">*</span></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_webformid_getresponse" name="optinforms_form_webformid_getresponse" value="<?php echo optinforms_form_webformid_getresponse(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_getresponse() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-getresponse");
                                // Toggle 
                                contentId.style.display == "block" ? contentId.style.display = "none" : 
                                contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms-explain-getresponse" style="display:none;">
                            <div class="optinforms-step">
                            	<h4><?php echo __('How to find your campaign token', 'optin-forms'); ?></h4>
                                <p><span class="step">1</span> <?php echo __('Log in to your GetResponse account', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-getresponse-001.png" class="step-image" />
                                <p><span class="step">2</span> <?php echo __('Click on your current campaign and click on Campaign List', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-getresponse-002.png" class="step-image" />
                                <p><span class="step">3</span> <?php echo __('Copy your campaign token', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-getresponse-003.png" class="step-image" />
                            </div><!--optinforms-step-->
                        </div><!--optinforms-explain-getresponse-->
                    
                    </div><!--optinforms_email_solution_option4-->
                    <div id="optinforms_email_solution_option5" <?php if (get_option('optinforms_email_solution')== 'optinforms_email_solution_option5') { echo 'style="display:block;"'; } ?>>
                    	<!--<p class="optinforms-integration"></?php echo __('Learn how to integrate Mad Mimi: watch the short video', 'optin-forms'); ?></p>-->
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_madmimi()"><span class="explain">?</span></a></label> <label for="optinforms_form_action_madmimi" class="nopointer"><?php echo __('Form action URL', 'optin-forms'); ?> <span class="required">*</span></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_action_madmimi" name="optinforms_form_action_madmimi" value="<?php echo optinforms_form_action_madmimi(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_madmimi() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-madmimi");
                                // Toggle 
                                contentId.style.display == "block" ? contentId.style.display = "none" : 
                                contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms-explain-madmimi" style="display:none;">
                            <div class="optinforms-step">
                            	<h4><?php echo __('How to find your form action URL', 'optin-forms'); ?></h4>
                                <p><span class="step">1</span> <?php echo __('Log in to your Mad Mimi account', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-madmimi-001.png" class="step-image" />
                                <p><span class="step">2</span> <?php echo __('Click on Webform', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-madmimi-002.png" class="step-image" />
                                <p><span class="step">3</span> <?php echo __('Click on the Add a Webform button', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-madmimi-003.png" class="step-image" />
                                <p><span class="step">4</span> <?php echo __('Name your form, assign it to a list and include the Name field', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-madmimi-004.png" class="step-image" />
                                <p><span class="step">5</span> <?php echo __('Click on the Embed button', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-madmimi-005.png" class="step-image" />
                                <p><span class="step">6</span> <?php echo __('Click on the Plain Embed tab', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-madmimi-006.png" class="step-image" />
                                <p><span class="step">7</span> <?php echo __('You will find the form action URL in the HTML box', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-madmimi-007.png" class="step-image" />
                            </div><!--optinforms-step-->
                        </div><!--optinforms-explain-madmimi-->
                    </div><!--optinforms_email_solution_option5-->
                    <div id="optinforms_email_solution_option6" <?php if (get_option('optinforms_email_solution')== 'optinforms_email_solution_option6') { echo 'style="display:block;"'; } ?>>
                    	<!--<p class="optinforms-integration"></?php echo __('Learn how to integrate Interspire Email Marketer: watch the short video', 'optin-forms'); ?></p>-->
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_interspire()"><span class="explain">?</span></a></label> <label for="optinforms_form_action_interspire" class="nopointer"><?php echo __('Form action URL', 'optin-forms'); ?> <span class="required">*</span></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_action_interspire" name="optinforms_form_action_interspire" value="<?php echo optinforms_form_action_interspire(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_interspire() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-interspire");
                                // Toggle 


                                contentId.style.display == "block" ? contentId.style.display = "none" : 
                                contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms-explain-interspire" style="display:none;">
                            <div class="optinforms-step">
                            	<h4><?php echo __('How to find your form action URL', 'optin-forms'); ?></h4>
                                <p><span class="step">1</span> <?php echo __('Log in to your Interspire Email Marketer administration panel', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-interspire-001.png" class="step-image" />
                                <p><span class="step">2</span> <?php echo __('Click on Forms in the navigation menu', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-interspire-002.png" class="step-image" />
                                <p><span class="step">3</span> <?php echo __('Click on Create a Website Form from the submenu options', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-interspire-003.png" class="step-image" />
                                <p><span class="step">4</span> <?php echo __('Make sure to uncheck CAPTCHA form security', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-interspire-004.png" class="step-image" />
                                <p><span class="step">5</span> <?php echo __('Name your form, assign it to a list and include the Name field', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-interspire-005.png" class="step-image" />
                                <p><span class="step">6</span> <?php echo __('Complete all the steps and click on Save', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-interspire-006.png" class="step-image" />
                                <p><span class="step">7</span> <?php echo __('You will find the form action URL in the HTML box', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-interspire-007.png" class="step-image" />
                            </div><!--optinforms-step-->
                        </div><!--optinforms-explain-interspire-->
                        
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_interspire_name()"><span class="explain">?</span></a></label> <label for="optinforms_form_name_field_interspire" class="nopointer"><?php echo __('Name field ID', 'optin-forms'); ?> <span class="required">*</span></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_name_field_interspire" name="optinforms_form_name_field_interspire" value="<?php echo optinforms_form_name_field_interspire(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_interspire_name() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-interspire-name");
                                // Toggle 
                                contentId.style.display == "block" ? contentId.style.display = "none" : 
                                contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms-explain-interspire-name" style="display:none;">
                            <div class="optinforms-step">
                            	<h4><?php echo __('How to find your name field ID', 'optin-forms'); ?></h4>
                                <p><span class="step">1</span> <?php echo __('Log in to your Interspire Email Marketer administration panel', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-interspire-001.png" class="step-image" />
                                <p><span class="step">2</span> <?php echo __('Click on Contact Lists in the navigation menu', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-interspire-008.png" class="step-image" />
                                <p><span class="step">3</span> <?php echo __('Click on View Custom Fields from the submenu options', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-interspire-009.png" class="step-image" />
                                <p><span class="step">4</span> <?php echo __('Find the name field and click on Edit', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-interspire-010.png" class="step-image" />
                                <p><span class="step">5</span> <?php echo __('You will find the name field ID in the address bar', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-interspire-011.png" class="step-image" />
                            </div><!--optinforms-step-->
                        </div><!--optinforms-explain-interspire-->
                        
                    </div><!--optinforms_email_solution_option6-->
                    <div id="optinforms_email_solution_option7" <?php if (get_option('optinforms_email_solution')== 'optinforms_email_solution_option7') { echo 'style="display:block;"'; } ?>>
                    	<!--<p class="optinforms-integration"></?php echo __('Learn how to integrate ConvertKit: watch the short video', 'optin-forms'); ?></p>-->
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_convertkit()"><span class="explain">?</span></a></label> <label for="optinforms_form_id_convertkit" class="nopointer"><?php echo __('Form ID', 'optin-forms'); ?> <span class="required">*</span></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_id_convertkit" name="optinforms_form_id_convertkit" value="<?php echo optinforms_form_id_convertkit(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_convertkit() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-convertkit");
                                // Toggle 
                                contentId.style.display == "block" ? contentId.style.display = "none" : 
                                contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms-explain-convertkit" style="display:none;">
                            <div class="optinforms-step">
                            	<h4><?php echo __('How to find your form ID', 'optin-forms'); ?></h4>
                                <p><span class="step">1</span> <?php echo __('Log in to your ConvertKit account', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-convertkit-001.png" class="step-image" />
                                <p><span class="step">2</span> <?php echo __('Click on the name of your form', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-convertkit-002.png" class="step-image" />
                                <p><span class="step">3</span> <?php echo __('Click on Settings', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-convertkit-003.png" class="step-image" />
                                <p><span class="step">4</span> <?php echo __('Click on Embed', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-convertkit-004.png" class="step-image" />
                                <p><span class="step">5</span> <?php echo __('You will see your form ID in the ID attribute', 'optin-forms'); ?></p>
                                <img src="<?php echo plugins_url(); ?>/optin-forms/images/support-convertkit-005.png" class="step-image" />
                            </div><!--optinforms-step-->
                        </div><!--optinforms-explain-convertkit-->
                        
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_convertkit_success()"><span class="explain">?</span></a></label> <label for="optinforms_form_success_convertkit" class="nopointer"><?php echo __('Success message', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_success_convertkit" name="optinforms_form_success_convertkit" value="<?php echo optinforms_form_get_success_convertkit(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_convertkit_success() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-success-convertkit");
                                // Toggle 
                                contentId.style.display == "block" ? contentId.style.display = "none" : 
                                contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms-explain-success-convertkit" style="display:none;">
                            <div class="optinforms-help">
                                <p><?php echo __('Enter the success message your visitors will see once they subscribe to your mailing list.', 'optin-forms'); ?></p>
                            </div><!--optinforms-help-->
                        </div><!--optinforms-explain-success-convertkit-->
                        
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label><a onclick="optinforms_explain_convertkit_error()"><span class="explain">?</span></a></label> <label for="optinforms_form_error_convertkit" class="nopointer"><?php echo __('Error message', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_error_convertkit" name="optinforms_form_error_convertkit" value="<?php echo optinforms_form_get_error_convertkit(); ?>" />
                            </div><!--optionmiddle-->
                            <div class="clear"></div>
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_convertkit_error() {
                                // Get the DOM reference
                                var contentId = document.getElementById("optinforms-explain-error-convertkit");
                                // Toggle 
                                contentId.style.display == "block" ? contentId.style.display = "none" : 
                                contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms-explain-error-convertkit" style="display:none;">
                            <div class="optinforms-help">
                                <p><?php echo __('Enter the error message your visitors will once when the form submission has been unsuccessful.', 'optin-forms'); ?></p>
                            </div><!--optinforms-help-->
                        </div><!--optinforms-explain-error-convertkit-->
                    
                    </div><!--optinforms_email_solution_option7-->
                </div><!--optiongroup-->
<?php ?>