<?php ?>
                    
                <div class="toggle-wrap">
                    <span class="trigger">
                    	<a><?php echo __('Form Placement', 'optin-forms'); ?></a>
                    </span>
                    <div class="toggle-container" style="display: none;">
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form_placement_post" class="nopointer"><?php echo __('On posts and custom post types', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input name="optinforms_form_placement_post" id="optinforms_form_placement_post_1" type="radio" value="1" class="radiobutton" onclick="document.getElementById('optinforms_form_exclude_posts').disabled=false;" <?php if (get_option('optinforms_form_placement_post')== '1') { echo 'checked="checked"'; } ?> /> <label for="optinforms_form_placement_post_1" class="radiobutton-label"><?php echo __('After the first paragraph', 'optin-forms'); ?></label>
                                <div class="clear"></div>
                                <input name="optinforms_form_placement_post" id="optinforms_form_placement_post_2" type="radio" value="2" class="radiobutton" onclick="document.getElementById('optinforms_form_exclude_posts').disabled=false;" <?php if (get_option('optinforms_form_placement_post')== '2') { echo 'checked="checked"'; } ?> /> <label for="optinforms_form_placement_post_2" class="radiobutton-label"><?php echo __('After the second paragraph', 'optin-forms'); ?></label>
                                <div class="clear"></div>
                                <input name="optinforms_form_placement_post" id="optinforms_form_placement_post_3" type="radio" value="3" class="radiobutton" onclick="document.getElementById('optinforms_form_exclude_posts').disabled=false;" <?php if (get_option('optinforms_form_placement_post')== '') { echo 'checked="checked"'; } if (get_option('optinforms_form_placement_post')== '3') { echo 'checked="checked"'; } ?> /> <label for="optinforms_form_placement_post_3" class="radiobutton-label"><?php echo __('After the post', 'optin-forms'); ?></label>
                                <div class="clear"></div>
                                <input name="optinforms_form_placement_post" id="optinforms_form_placement_post_4" type="radio" value="4" class="radiobutton" onclick="document.getElementById('optinforms_form_exclude_posts').disabled=true;" <?php if (get_option('optinforms_form_placement_post')== '4') { echo 'checked="checked"';}  ?> /> <label for="optinforms_form_placement_post_4" class="radiobutton-label"><?php echo __('Don\'t display on posts and custom post types', 'optin-forms'); ?></label>
                                <div class="clear"></div>
                            </div><!--optionmiddle-->
                            <div class="optionlast">
                                            
                            </div><!--optionlast-->
                            <div class="clear"></div>
                
                        </div><!--optiongroup-->
                        
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form_exclude_posts" class="nopointer"><?php echo __('Exclude on posts', 'optin-forms'); ?></label> <label><a onclick="optinforms_explain_form_exclude_posts()"><span class="explain">?</span></a></label> 
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_exclude_posts" name="optinforms_form_exclude_posts" value="<?php echo optinforms_form_exclude_posts(); ?>" <?php if (get_option('optinforms_form_placement_post')== '4') { echo 'disabled="disabled"'; } ?> />
                            </div><!--optionmiddle-->
                            <div class="optionlast">
                                            
                            </div><!--optionlast-->
                            <div class="clear"></div>
                
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_form_exclude_posts() {
                            // Get the DOM reference
                            var contentId = document.getElementById("optinforms_explain_form_exclude_posts");
                            // Toggle 
                            contentId.style.display == "block" ? contentId.style.display = "none" : 
                            contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms_explain_form_exclude_posts" style="display:none;">
                            <div class="optinforms-help">
                                <p><?php echo __('To exclude the form on certain posts, enter a comma separated list of post ID\'s, e.g. 6, 27, 41', 'optin-forms'); ?></p>
                            </div><!--optinforms-help-->
                        </div><!--optinforms_explain_form_exclude_posts-->
                        
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form_placement_page" class="nopointer"><?php echo __('On pages', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input name="optinforms_form_placement_page" id="optinforms_form_placement_page_1" type="radio" value="1" class="radiobutton" onclick="document.getElementById('optinforms_form_exclude_pages').disabled=false;" <?php if (get_option('optinforms_form_placement_page')== '1') { echo 'checked="checked"'; } ?> /> <label for="optinforms_form_placement_page_1" class="radiobutton-label"><?php echo __('After the first paragraph', 'optin-forms'); ?></label>
                                <div class="clear"></div>
                                <input name="optinforms_form_placement_page" id="optinforms_form_placement_page_2" type="radio" value="2" class="radiobutton" onclick="document.getElementById('optinforms_form_exclude_pages').disabled=false;" <?php if (get_option('optinforms_form_placement_page')== '2') { echo 'checked="checked"'; } ?> /> <label for="optinforms_form_placement_page_2" class="radiobutton-label"><?php echo __('After the second paragraph', 'optin-forms'); ?></label>
                                <div class="clear"></div>
                                <input name="optinforms_form_placement_page" id="optinforms_form_placement_page_3" type="radio" value="3" class="radiobutton" onclick="document.getElementById('optinforms_form_exclude_pages').disabled=false;" <?php if (get_option('optinforms_form_placement_page')== '') { echo 'checked="checked"'; } if (get_option('optinforms_form_placement_page')== '3') { echo 'checked="checked"'; } ?> /> <label for="optinforms_form_placement_page_3" class="radiobutton-label"><?php echo __('After the page', 'optin-forms'); ?></label>
                                <div class="clear"></div>
                                <input name="optinforms_form_placement_page" id="optinforms_form_placement_page_4" type="radio" value="4" class="radiobutton" onclick="document.getElementById('optinforms_form_exclude_pages').disabled=true;" <?php if (get_option('optinforms_form_placement_page')== '4') { echo 'checked="checked"'; } ?> /> <label for="optinforms_form_placement_page_4" class="radiobutton-label"><?php echo __('Don\'t display on pages', 'optin-forms'); ?></label>
                                <div class="clear"></div>
                            </div><!--optionmiddle-->
                            <div class="optionlast">
                                            
                            </div><!--optionlast-->
                            <div class="clear"></div>
                
                        </div><!--optiongroup-->
                        
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form_exclude_pages" class="nopointer"><?php echo __('Exclude on pages', 'optin-forms'); ?></label> <label><a onclick="optinforms_explain_form_exclude_pages()"><span class="explain">?</span></a></label> 
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_exclude_pages" name="optinforms_form_exclude_pages" value="<?php echo optinforms_form_exclude_pages(); ?>" <?php if (get_option('optinforms_form_placement_page')== '4') { echo 'disabled="disabled"'; } ?> />
                            </div><!--optionmiddle-->
                            <div class="optionlast">
                                            
                            </div><!--optionlast-->
                            <div class="clear"></div>
                
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_form_exclude_pages() {
                            // Get the DOM reference
                            var contentId = document.getElementById("optinforms_explain_form_exclude_pages");
                            // Toggle 
                            contentId.style.display == "block" ? contentId.style.display = "none" : 
                            contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms_explain_form_exclude_pages" style="display:none;">
                            <div class="optinforms-help">
                                <p><?php echo __('To exclude the form on certain pages, enter a comma separated list of page ID\'s, e.g. 12, 43, 57', 'optin-forms'); ?></p>
                            </div><!--optinforms-help-->
                        </div><!--optinforms_explain_form_exclude_pages-->
                        
                        <div class="optiongroup">
                            <div class="optionleft">
                                <label for="optinforms_form_shortcode" class="nopointer"><?php echo __('Shortcode', 'optin-forms'); ?></label> <label><a onclick="optinforms_explain_form_shortcode()"><span class="explain">?</span></a></label> 
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input type="text" id="optinforms_form_shortcode" name="optinforms_form_shortcode" value="[optinform]" readonly="readonly" />
                            </div><!--optionmiddle-->
                            <div class="optionlast">
                                            
                            </div><!--optionlast-->
                            <div class="clear"></div>
                
                        </div><!--optiongroup-->
                        
                        <script type="text/javascript">
                            function optinforms_explain_form_shortcode() {
                            // Get the DOM reference
                            var contentId = document.getElementById("optinforms_explain_form_shortcode");
                            // Toggle 
                            contentId.style.display == "block" ? contentId.style.display = "none" : 
                            contentId.style.display = "block"; 
                            }
                        </script>
                        <div id="optinforms_explain_form_shortcode" style="display:none;">
                            <div class="optinforms-help">
                                <p><?php echo __('Use the following shortcode to add your form to any post, page or custom post type. Simply paste the shortcode in your editor and you\'re done. For example, you can disable the automatic inclusion of forms on posts and pages and manually add forms to posts and pages of your choice.', 'optin-forms'); ?></p>
                            </div><!--optinforms-help-->
                        </div><!--optinforms_explain_form_exclude_pages-->
                        
                        <div class="optiongroup">
                            <p><?php echo __('If you enjoy our plugin, please consider including a small "Powered by Optin Forms" link below your form. You would help us find new users, which would in turn result in even better features ;)', 'optin-forms'); ?></p>
                            <div class="optionleft">
                                <label for="optinforms_form_placement_page" class="nopointer"><?php echo __('Powered by Optin Forms link', 'optin-forms'); ?></label>
                            </div><!--optionleft-->
                            <div class="optionmiddle">
                                <input name="optinforms_powered_by" id="optinforms_powered_by_show" type="radio" value="1" class="radiobutton" <?php echo optinforms_powered_by_show(); ?> /> <label for="optinforms_powered_by_show" class="radiobutton-label"><?php echo __('Show', 'optin-forms'); ?></label>
                                        <input name="optinforms_powered_by" id="optinforms_powered_by_hide" type="radio" value="0" class="radiobutton" <?php echo optinforms_powered_by_hide(); ?> /> <label for="optinforms_powered_by_hide" class="radiobutton-label"><?php echo __('Hide', 'optin-forms'); ?></label>
                                <div class="clear"></div>
                            </div><!--optionmiddle-->
                            <div class="optionlast">
                                            
                            </div><!--optionlast-->
                            <div class="clear"></div>
                
                        </div><!--optiongroup-->
               		</div><!--toggle-container-->
                </div><!--toggle-wrap-->

<?php ?>