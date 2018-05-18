<?php
/**
 * @version    $Id$
 * @package    ZF WordPress Category Accordion
 * @author     ZuFusion
 * @copyright  Copyright (C) 2014 ZuFusion All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Display a list categories
 * @param array $args
 * @return bool
 */
function zfwca_list_categories($args = array())
{

    $defaults = array(
        'show_option_all'    => '',
        'orderby'            => 'name', 'order' => 'ASC',
        'show_count'         => 0, 'hide_empty' => 1,
        'use_desc_for_title' => 1, 'child_of' => 0,
        'exclude'            => '',
        'include'            => '',
        'exclude_tree'       => '',
        'current_category'   => 0,
        'taxonomy'           => 'category'
    );

    $r = wp_parse_args($args, $defaults);

    $r['walker'] = new ZFWCA_Post_Category_Walker();

    if (!isset($r['class']))
        $r['class'] = ('category' == $r['taxonomy']) ? 'categories' : $r['taxonomy'];

    extract($r);

    if (!taxonomy_exists($taxonomy))
        return false;

    $categories = get_categories($r);
    $output     = '';

    if (empty($categories)) {

        $output .= 'No categories';

    } else {

        if (empty($r['current_category']) && (is_category() || is_tax() || is_tag())) {
            $current_term_object = get_queried_object();
            if ($current_term_object && $r['taxonomy'] === $current_term_object->taxonomy)
                $r['current_category'] = get_queried_object_id();
        }

        $output .= walk_category_tree($categories, 0, $r);
    }

    $output = apply_filters('zfwca_wp_list_categories', $output, $args);

    return $output;

}

/**
 * Display a list pages
 * @param array $args
 * @return bool
 */
function zfwca_list_pages($args = array())
{

    $defaults = array(
        'title_li'    => '',
        'child_of'    => '0',
        'echo'        => 0,
        'sort_column' => 'post_title',
        'sort_order'  => 'ASC',
        'exclude'     => '',
        'include'     => '',
    );

    $r = wp_parse_args($args, $defaults);
    $r['sort_column'] = $r['orderby'];
    $r['sort_order'] = $r['order'];
    $r['walker'] = new ZFWCA_Page_Walker();
    $output = wp_list_pages($r);
    $output = apply_filters('zfwca_wp_list_pages', $output, $r);

    return $output;

}
/**
 * Get all theme styles from assets/css/themes/
 * @return array
 */
function zfwca_get_themes()
{


    // allow custom theme folder
    $dir = ZF_WORDPRESS_CATEGORY_ACCORDION_THEMES;

    $themes = zfwca_get_themes_from_path($dir);

    // custom themes
    $addition_dir = zfwca_get_theme_dir();
    if ($addition_dir != $dir) {
        $custom_themes = zfwca_get_themes_from_path($addition_dir);
        if (!empty($custom_themes)) {
            $themes = array_merge($themes, $custom_themes);
        }

    }

    return $themes;
}

function zfwca_get_themes_from_path($dir) {

    $themes = array();

    if (is_dir($dir)) {
        if ($theme_dir = opendir($dir)) {
            while (($theme_file = readdir($theme_dir)) !== false) {
                $ext = pathinfo($theme_file, PATHINFO_EXTENSION);
                if ($ext == 'css') {
                    $key = str_replace('.css', '', $theme_file);
                    $themes[strtolower($key)] = $theme_file;
                }
            }
        }
    }

    return $themes;
}

/**
 * Get theme content
 * @param $theme
 * @return string
 */
function zfwca_get_theme_content($theme) {

    $file_dir = zfwca_get_theme_dir() . '/' . $theme . '.css';
    $content  = '';

    if (file_exists($file_dir)) {
        $content = file_get_contents($file_dir);
    } else {
        // check in default path
        $file_default_path = ZF_WORDPRESS_CATEGORY_ACCORDION_THEMES . '/' . $theme . '.css';

        if (file_exists($file_default_path)) {
            $content = file_get_contents($file_default_path);
        }

    }

    return $content;

}

/**
 * get theme dir
 * @return mixed|void
 */
function zfwca_get_theme_dir() {
    return apply_filters('zfwca_theme_dir', ZF_WORDPRESS_CATEGORY_ACCORDION_THEMES);
}

/**
 * get current terms
 * @param $cat_type
 * @return array ids
 */
function zfwca_get_current_terms($cat_type) {

    $term_list = array();

    if (is_singular()) {
        if ($cat_type != 'page') {
            global $post;
            $term_list = wp_get_post_terms($post->ID, $cat_type, array("fields" => "ids"));
        }
    }

    return $term_list;
}