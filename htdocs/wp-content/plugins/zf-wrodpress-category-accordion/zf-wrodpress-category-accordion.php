<?php
/*
Plugin Name: ZF WordPress Category Accordion (Shared by JOJOThemes.com)
Plugin URI: http://codecanyon.net/item/zf-wordpress-category-accordion/8849504
Description: ZF WordPress Category Accordion allows you to display categories/pages as multilevel accordion category.
Version: 1.9
Author: ZuFusion
Author URI: http://zufusion.com
*/

// require
require_once(plugin_dir_path(__FILE__) . 'define.php');
require_once(plugin_dir_path(__FILE__) . 'inc/category.php');
require_once(plugin_dir_path(__FILE__) . 'inc/page.php');
require_once(plugin_dir_path(__FILE__) . 'inc/functions.php');
require_once(plugin_dir_path(__FILE__) . 'inc/core.php');

$instance = ZF_Wordpress_Category_Accordion::get_instance();
$instance->run();
$GLOBALS['zfwca'] = $instance;
