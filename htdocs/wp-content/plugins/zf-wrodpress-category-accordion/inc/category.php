<?php

/**
 * @version    $Id$
 * @package    ZF WordPress Category Accordion
 * @author     ZuFusion
 * @copyright  Copyright (C) 2014 ZuFusion All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */
class ZFWCA_Post_Category_Walker extends Walker
{


    var $tree_type = 'category';

    var $db_fields = array('parent' => 'parent', 'id' => 'term_id');

    /**
     * Starts the list before the elements are added.
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of the item.
     * @param array  $args   An array of additional arguments.
     */

    function start_lvl(&$output, $depth = 0, $args = array())
    {

        $indent = str_repeat("\t", $depth);
        $output .= "$indent<ul class='children'>\n";
    }

    /**
     * Ends the list of after the elements are added.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of the item.
     * @param array  $args   An array of additional arguments.
     */

    function end_lvl(&$output, $depth = 0, $args = array())
    {

        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * Start the element output.
     * @param string $output            Passed by reference. Used to append additional content.
     * @param object $object            The data object.
     * @param int    $depth             Depth of the item.
     * @param array  $args              An array of additional arguments.
     * @param int    $current_object_id ID of the current item.
     */

    function start_el(&$output, $category, $depth = 0, $args = array(), $id = 0)
    {


        extract($args);

        $cat_name = esc_attr($category->name);

        $cat_name = apply_filters('list_cats', $cat_name, $category);

        $link = '<a href="' . esc_url(get_term_link($category)) . '" ';
        if ($use_desc_for_title == 0 || empty($category->description)) {
            $link .= 'title="' . esc_attr(sprintf(__('View all posts filed under %s', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG), $cat_name)) . '"';
        } else {
            $link .= 'title="' . esc_attr(strip_tags(apply_filters('category_description', $category->description, $category))) . '"';
        }
        $link .= ' class="item-link"';
        $link .= '>';
        $link .= $cat_name;

        if ($show_count)
            $link .= ' <span class="count">(' . number_format_i18n($category->count) . ')</span>';

        $link .= '</a>';

        $output .= "\t<li";

        $class = 'cat-item cat-item-' . $category->term_id . ' level-'. $depth;

        if ($has_children) {
            $class .= ' has-sub';
        }

        if (!empty($current_category)) {
            $_current_category = get_term($current_category, $category->taxonomy);
            if ($category->term_id == $current_category) {
                $class .= ' current-cat';
            }
            elseif ($category->term_id == $_current_category->parent) {
                $class .= ' current-cat-parent';
            }
        }
        $output .= ' class="' . $class . '"';
        $output .= ">$link\n";

    }

    /**
     * Ends the element output, if needed.
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $object The data object.
     * @param int    $depth  Depth of the item.
     * @param array  $args   An array of additional arguments.
     */

    function end_el(&$output, $page, $depth = 0, $args = array())
    {

        $output .= "</li>\n";
    }

}