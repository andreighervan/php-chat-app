<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/*
    Plugin Name: Child Theme Configurator
    Plugin URI: http://www.childthemeconfigurator.com
    Description: When using the Customizer is not enough - Create child themes and customize styles, templates, functions and more.
    Version: 2.2.1
    Author: Lilaea Media
    Author URI: http://www.lilaeamedia.com
    Text Domain: child-theme-configurator
    Domain Path: /lang
    License: GPLv2
    Copyright (C) 2014-2016 Lilaea Media
*/
// define CTC constants
defined( 'LF' ) or define( 'LF', "\n" );
defined( 'CHLD_THM_CFG_DIR' ) or define( 'CHLD_THM_CFG_DIR', dirname( __FILE__ ) );
defined( 'CHLD_THM_CFG_URL' ) or define( 'CHLD_THM_CFG_URL', plugin_dir_url( __FILE__ ) );
defined( 'CHLD_THM_CFG_OPTIONS' ) or define( 'CHLD_THM_CFG_OPTIONS', 'chld_thm_cfg_options' );
    
// activate autoloader
spl_autoload_register( 'chld_thm_cfg_autoload' );

function chld_thm_cfg_autoload( $class ) {
    $base = str_replace( 'ChildThemeConfigurator', '', $class );
    $file = dirname( __FILE__ ) . '/includes/classes/' . ( '' == $base ? 'Core' : $base ) . '.php';
    if ( file_exists( $file ) )
        include_once( $file );
}     

// load CTC Core for admin calls
if ( is_admin() ) 
    add_action( 'plugins_loaded', 'ChildThemeConfigurator::init', 5 );

// handle CTC Preview
if ( isset( $_GET['preview_ctc'] ) ):
    // replace core preview function with CTCP function for quick preview
    remove_action( 'setup_theme', 'preview_theme' );
    new ChildThemeConfiguratorPreview();
endif; 

// append timestamp to linked stylesheets to force cache refresh
add_filter( 'style_loader_src', 'chld_thm_cfg_version', 10, 2 );

function chld_thm_cfg_version( $src, $handle ) {
    if ( strstr( $src, get_stylesheet() ) ):
        $src = preg_replace( "/ver=(.*?)(\&|$)/", 'ver=' . wp_get_theme()->Version . "$2", $src );
    endif;
    return $src;
}

// remove configuration data on uninstall
register_uninstall_hook( __FILE__, 'chld_thm_cfg_uninstall' );

function chld_thm_cfg_uninstall() {
    delete_site_option( CHLD_THM_CFG_OPTIONS );
    delete_site_option( CHLD_THM_CFG_OPTIONS . '_configvars' );
    delete_site_option( CHLD_THM_CFG_OPTIONS . '_dict_qs' );
    delete_site_option( CHLD_THM_CFG_OPTIONS . '_dict_sel' );
    delete_site_option( CHLD_THM_CFG_OPTIONS . '_dict_query' );
    delete_site_option( CHLD_THM_CFG_OPTIONS . '_dict_rule' );
    delete_site_option( CHLD_THM_CFG_OPTIONS . '_dict_val' );
    delete_site_option( CHLD_THM_CFG_OPTIONS . '_dict_seq' );
    delete_site_option( CHLD_THM_CFG_OPTIONS . '_dict_token' );
    delete_site_option( CHLD_THM_CFG_OPTIONS . '_sel_ndx' );
    delete_site_option( CHLD_THM_CFG_OPTIONS . '_val_ndx' );
}
   
