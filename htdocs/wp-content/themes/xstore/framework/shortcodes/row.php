<?php  if ( ! defined('ETHEME_FW')) exit('No direct script access allowed');

// **********************************************************************// 
// ! row
// **********************************************************************// 

// **********************************************************************// 
// ! Register New Element: row
// **********************************************************************//
add_action( 'init', 'etheme_register_vc_row');
if(!function_exists('etheme_register_vc_row')) {
	function etheme_register_vc_row() {
		if(!function_exists('vc_map')) return;
	    // **********************************************************************// 
	    // ! Row (add anchor field)
	    // **********************************************************************//
	    vc_add_param('vc_row', array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Anchor for one page navigation', 'xstore' ),
			'param_name' => 'anchor',
	    ));
	}
}
