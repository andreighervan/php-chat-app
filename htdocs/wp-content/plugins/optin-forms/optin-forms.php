<?php
/*
Plugin Name: Optin Forms
Plugin URI: http://fancythemes.com/plugins/optin-forms/
Description: Create beautiful optin forms with ease. Choose a form design, customize it, and add your form to your blog with a simple mouse-click.
Author: FancyThemes
Version: 1.2.7
Author URI: http://www.fancythemes.com
Text Domain: optin-forms
Domain Path:   /languages/
License:
  Copyright 2016 FancyThemes.com

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

 // Include our registration settings
include( plugin_dir_path( __FILE__ ) . 'includes/register-settings.php');
// Include our regular functions
include( plugin_dir_path( __FILE__ ) . 'includes/functions.php');
// Include our form functions
include( plugin_dir_path( __FILE__ ) . 'includes/functions-form-1.php');
include( plugin_dir_path( __FILE__ ) . 'includes/functions-form-2.php');
include( plugin_dir_path( __FILE__ ) . 'includes/functions-form-3.php');
include( plugin_dir_path( __FILE__ ) . 'includes/functions-form-4.php');
include( plugin_dir_path( __FILE__ ) . 'includes/functions-form-5.php');
include( plugin_dir_path( __FILE__ ) . 'includes/functions-forms.php');

class Optin_Forms {

	/**
	 * Constructor function
	 *
	 * @since 1.2.5
	 * @access public
	 */
	public function __construct() {
		add_action( 'plugins_loaded',        array( $this, 'optinforms_init' ) );
		add_action( 'admin_menu',            array( $this, 'optinforms_menu' ) );
		add_action( 'wp_enqueue_scripts',    array( $this, 'optinforms_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'optinforms_load_additional_scripts' ) );


	}

	/**
	 * Adds translation to plugin
	 */
	public function optinforms_init() {
		$plugin_dir = basename(dirname(__FILE__));
		load_plugin_textdomain( 'optin-forms', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Adds Optin Forms to WordPress dashboard menu
	 */
	public function optinforms_menu() {
		// Since 1.1.2 added a menu position decimal fix to prevent conflict with other themes using 31, such as Thesis Theme
		// @http://gabrielharper.com/blog/2012/08/wordpress-admin-menu-positioning-conflicts/
		$submenu = add_menu_page(__('Optin Forms','optin-forms'), __('Optin Forms','optin-forms'), 'manage_options', 'optinforms', array( $this, 'optinforms_main_page' ), plugin_dir_url( __FILE__ ) . '/images/icon.png', '30.1');

		// We want our JS and CSS loaded on our admin pages only, so let's just load them for now
		add_action( 'load-' . $submenu, array( $this, 'optinforms_load_admin_scripts' ) );
	}

	/**
	 * Enqueue our CSS and JS on Optin Forms admin pages only
	 */
	public function optinforms_load_admin_scripts() {
		add_action( 'admin_enqueue_scripts', array( $this, 'optinforms_admin_scripts' ) );
	}

	/**
	 * Adds CSS and JS to admin head, but just for our admin pages (see optinforms_load_admin_scripts above!)
	 */
	public function optinforms_admin_scripts() {
		wp_enqueue_style('optinforms-admin-stylesheet', plugins_url('/css/optinforms-admin.css', __FILE__ ), array('optinforms-googleFont'));
		wp_enqueue_script('tabcontent', plugins_url('/js/tabcontent.js', __FILE__ ));
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('optinforms-color', plugins_url('/js/optinforms-color.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		wp_enqueue_script('placeholder', plugins_url('/js/placeholder.js', __FILE__ ));
		wp_enqueue_script('toggle', plugins_url('/js/custom.js', __FILE__ ));
		wp_enqueue_script('jquery-ui-slider');
		wp_register_style('optinforms-googleFont', '//fonts.googleapis.com/css?family=Share+Tech|Droid+Sans|Lobster|Fenix|Unkempt|Flavors|Viga|Damion|Oleo+Script|Racing+Sans+One|Nixie+One|Fredoka+One|Open+Sans|Overlock+SC|Bubbler+One|Contrail+One|Gochi+Hand|Roboto+Condensed|Russo+One|Cinzel+Decorative|News+Cycle|Marcellus+SC|Chewy|Quicksand|Sanchez|Signika+Negative|Gloria+Hallelujah|Grand+Hotel|Droid+Serif|Englebert|Oswald|Pacifico|Titan+One|Shadows+Into+Light|Dancing+Script|Luckiest+Guy|Parisienne|Coming+Soon|Baumans|Belgrano');

		global $optinforms_forms;

		// Have any custom form designs been registered?
		if ( is_array( $optinforms_forms ) ) {

			// Loops through registered form designs.
			foreach ( $optinforms_forms as $class_name => $design ) {

				// Does the form have an stylesheet URL specified?
				if ( !empty( $design->optinform['stylesheet_url'] ) ) {
					wp_enqueue_style( $class_name, $design->optinform['stylesheet_url'] );
				}
			}
		}
	}

	/**
	 * Adds our CSS and JS to wp_head
	 */
	public function optinforms_scripts() {
		wp_enqueue_script('jquery');
		wp_enqueue_style('optinforms-stylesheet', plugins_url('/css/optinforms.css', __FILE__ ), array('optinforms-googleFont'));
		wp_enqueue_script('placeholder', plugins_url('/js/placeholder.js', __FILE__ ));
		wp_register_style('optinforms-googleFont', optinforms_used_fonts());

		global $optinforms_forms;

		// Have any custom form designs been registered?
		if ( is_array( $optinforms_forms ) ) {

			// Loops through registered form designs.
			foreach ( $optinforms_forms as $class_name => $design ) {

				// Does the form have an stylesheet URL specified?
				if ( !empty( $design->optinform['stylesheet_url'] ) ) {
					wp_enqueue_style( $class_name, $design->optinform['stylesheet_url'] );
				}
			}
		}
	}

	/**
	 * Add additional scripts to admin head on all admin pages (so supportbox slider will work on all pages!)
	 */
	public function optinforms_load_additional_scripts(){
		wp_enqueue_style('optinforms-admin-slider-stylesheet', plugins_url('/css/optinforms-admin-slider.css', __FILE__ ));
		wp_enqueue_script('jquery-ui-slider');
	}


	/**
	 * Displays Optin Forms admin page.
	 */
	public function optinforms_main_page() {
		global $optinforms_forms;

		{ ?>
		<div class="wrap">
			<h2><?php echo __('Optin Forms', 'optin-forms'); ?></h2>
			<div id="icon-optinforms" class="icon32">
			</div><!--icon-32-->
			<h3 class="title"><?php echo optinforms_menu_tabs(); ?></h3>
		</div><!--wrap-->

			<?php echo optinforms_configuration(); ?>

			<?php if( isset($_GET['settings-updated']) ) { ?>
				<div id="message" class="updated">
					<p><strong><?php _e('Settings updated') ?></strong></p>
				</div>
			<?php } ?>

		<div id="optinforms">
			<form method="post" action="options.php" id="frm1">
			<?php settings_fields( 'optinforms-settings-group' ); ?>

			<div id="optinforms-email-solution-tab" class="tabcontent">
				<div class="optinforms-container-left">
					<?php include( plugin_dir_path( __FILE__ ) . 'includes/options-email-solution.php'); ?>
				</div><!--optinforms-container-left-->
				<div class="optinforms-container-right">
					<?php include( plugin_dir_path( __FILE__ ) . 'includes/sidebar.php'); ?>
				</div><!--optinforms-container-right-->
				<div class="clear"></div>
			</div><!--optinforms-email-solution-tab-->

			<div id="optinforms-posts-tab" class="tabcontent">
				<div class="optinforms-container-left">
					<div class="optiongroup">
						<p><?php echo __('Add a beautiful optin form to your posts, custom post types and pages. Include the form on your website with a simple mouse-click, or use the shortcode to add it to specific posts and pages.', 'optin-forms'); ?></p>
						<div class="optionleft">
							<label for="optinforms_form_design" class="nopointer"><?php echo __('Form design', 'optin-forms'); ?></label>
						</div><!--optionleft-->
						<div class="optionmiddle">
							<select name="optinforms_form_design" id="optinforms_form_design">
								<option value="optinforms_form_design_option1" <?php if (get_option('optinforms_form_design')== 'optinforms_form_design_option1') { echo 'selected="selected"'; } ?>>01</option>
								<option value="optinforms_form_design_option2" <?php if (get_option('optinforms_form_design')== 'optinforms_form_design_option2') { echo 'selected="selected"'; } ?>>02</option>
								<option value="optinforms_form_design_option3" <?php if (get_option('optinforms_form_design')== 'optinforms_form_design_option3') { echo 'selected="selected"'; } ?>>03</option>
								<option value="optinforms_form_design_option4" <?php if (get_option('optinforms_form_design')== 'optinforms_form_design_option4') { echo 'selected="selected"'; } ?>>04</option>
								<option value="optinforms_form_design_option5" <?php if (get_option('optinforms_form_design')== 'optinforms_form_design_option5') { echo 'selected="selected"'; } ?>>05</option>
								<?php

									// Have any custom form designs been registered?
									if ( is_array( $optinforms_forms ) ) {

										// Gets the saved form design ID.
										$saved_design = get_option( 'optinforms_form_design' );

										// Loops through registered form designs.
										foreach ( $optinforms_forms as $class_name => $design ) {

											// Does the form have an ID and a title?
											if ( !empty( $design->optinform['id'] ) && !empty( $design->optinform['title'] ) ) {
												echo '<option value="' . $design->optinform['id'] . '" ' . selected( $saved_design, $design->optinform['id'], false ) . '>' . $design->optinform['title'] . '</option>';

											}
										}
									}
								?>
							</select>
							<script type="text/javascript">
								// document.getElementById('optinforms_form_design').onchange = function() {
									// var i = 1;
									// var myDiv = document.getElementById("optinforms_form_design_option" + i);
									// while(myDiv) {
									// 	myDiv.style.display = 'none';
									// 	myDiv = document.getElementById("optinforms_form_design_option" + ++i);
									// }
									// document.getElementById(this.value).style.display = 'block';
								// };
							</script>
						</div><!--optionmiddle-->
						<div class="optionlast">

						</div><!--optionlast-->
						<div class="clear"></div>

					</div><!--optiongroup-->

					<div id="optinforms-design-backend-wrap" class="optiongroup">
						<div id="optinforms_form_design_option1" <?php if (get_option('optinforms_form_design')== '' || get_option('optinforms_form_design')== 'optinforms_form_design_option1') { echo 'style="display:block;"'; } ?>>

							<?php include( plugin_dir_path( __FILE__ ) . 'includes/preview-form-1.php'); ?>
							<?php include( plugin_dir_path( __FILE__ ) . 'includes/options-form-1.php'); ?>

						</div><!--optinforms_form_design_option1-->
						<div id="optinforms_form_design_option2" <?php if (get_option('optinforms_form_design')== 'optinforms_form_design_option2') { echo 'style="display:block;"'; } ?>>

							<?php include( plugin_dir_path( __FILE__ ) . 'includes/preview-form-2.php'); ?>
							<?php include( plugin_dir_path( __FILE__ ) . 'includes/options-form-2.php'); ?>

						</div><!--optinforms_form_design_option2-->
						<div id="optinforms_form_design_option3" <?php if (get_option('optinforms_form_design')== 'optinforms_form_design_option3') { echo 'style="display:block;"'; } ?>>

							<?php include( plugin_dir_path( __FILE__ ) . 'includes/preview-form-3.php'); ?>
							<?php include( plugin_dir_path( __FILE__ ) . 'includes/options-form-3.php'); ?>

						</div><!--optinforms_form_design_option3-->
						<div id="optinforms_form_design_option4" <?php if (get_option('optinforms_form_design')== 'optinforms_form_design_option4') { echo 'style="display:block;"'; } ?>>

							<?php include( plugin_dir_path( __FILE__ ) . 'includes/preview-form-4.php'); ?>
							<?php include( plugin_dir_path( __FILE__ ) . 'includes/options-form-4.php'); ?>

						</div><!--optinforms_form_design_option4-->
						<div id="optinforms_form_design_option5" <?php if (get_option('optinforms_form_design')== 'optinforms_form_design_option5') { echo 'style="display:block;"'; } ?>>

							<?php include( plugin_dir_path( __FILE__ ) . 'includes/preview-form-5.php'); ?>
							<?php include( plugin_dir_path( __FILE__ ) . 'includes/options-form-5.php'); ?>

						</div><!--optinforms_form_design_option5-->
						<?php

							// Have any custom form designs been registered?
							if ( is_array( $optinforms_forms ) ) {

								// Loops through registered form designs.
								foreach ( $optinforms_forms as $class_name => $design ) {

									// Does the form have an ID and a title?
									if ( !empty( $design->optinform['id'] ) && !empty( $design->optinform['title'] ) ) {
										$display = $saved_design == $design->optinform['id'] ? 'style="display:block;"' : 'style="display:none;"';
										echo '<div id="' . $design->optinform['id'] . '" ' . $display . '>';

										// Displays the form preview if available.
										if ( method_exists( $design, 'get_optin_form' ) ) {
											echo $design->get_optin_form();
										}

										// Displays the form options if available.
										if ( file_exists( $design->optinform['options_url'] ) ) {
											include( $design->optinform['options_url'] );
										}

										echo '</div>';


									}
								}
							}
						?>
					</div><!--optiongroup-->

					<?php include( plugin_dir_path( __FILE__ ) . 'includes/options-form-functionality.php'); ?>
					<?php include( plugin_dir_path( __FILE__ ) . 'includes/options-form-placement.php'); ?>

				</div><!--optinforms-container-left-->
				<div class="optinforms-container-right">
					<?php include( plugin_dir_path( __FILE__ ) . 'includes/sidebar.php'); ?>
				</div><!--optinforms-container-right-->
				<div class="clear"></div>
			</div><!--optinforms-posts-tab-->

			<script type="text/javascript">
				var wpthumbs=new ddtabcontent("optinforms-menu-tabs") //enter ID of Tab Container
				wpthumbs.setpersist(true) //toogle persistence of the tabs' state
				wpthumbs.setselectedClassTarget("link") //"link" or "linkparent"
				wpthumbs.init()
			</script>

			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
			</form>

		</div><!--optinforms-->

		<?php }
	}
}
$optin_forms = new Optin_Forms();


if ( !function_exists( 'register_optin_form') ) {
	/**
	 * Registers optin forms
	 *
	 * Adds new forms to the $optinforms_forms array.
	 *
	 * @param $class_name string Name of the form class being registered.
	 */
	function register_optin_form( $class_name ) {
		global $optinforms_forms;

		// Adds form to global forms array.
		$optinforms_forms[$class_name] = new $class_name;
	}
}


if ( !function_exists( 'optinforms_get_setting') ) {
	/**
	 * Gets saved form setting
	 *
	 * Falls back on default form setting if there is no saved value.
	 *
	 * @param  string $setting_id   The ID of the setting to retrieve.
	 * @param  string $design_class The class name of the design class that holds the default setting.
	 * @return string $setting      The saved setting (or the default, if no setting is saved).
	 */
	function optinforms_get_setting( $setting_id, $design_class = '' ) {

		// Gets the saved setting from the database.
		$setting = get_option( $setting_id );

		// Is there no saved setting, and was a design class name provided?
		if ( empty( $setting ) && !empty( $design_class ) ) {
			$setting = optinforms_get_default_setting( $setting_id, $design_class );
		}

		return $setting;
	}
}


if ( !function_exists( 'optinforms_get_default_setting') ) {
	/**
	 * Gets default form setting
	 *
	 * @param  string $setting_id   The ID of the setting to retrieve.
	 * @param  string $design_class The class name of the design class that holds the default setting.
	 * @return string $setting      The saved setting (or the default, if no setting is saved).
	 */
	function optinforms_get_default_setting( $setting_id, $design_class = '' ) {

		global $optinforms_forms;
		$setting = '';

		// Is there a default setting stored in the design class?
		if ( !empty( $optinforms_forms[$design_class]->defaults[$setting_id] ) ) {
			$setting = $optinforms_forms[$design_class]->defaults[$setting_id];
		}

		return $setting;
	}
}

// Allows for translation of plugin description
$plugin_header_translate = array(
	__( 'Create beautiful optin forms with ease. Choose a form design, customize it, and add your form to your blog with a simple mouse-click.', 'optin-forms' ),
);
