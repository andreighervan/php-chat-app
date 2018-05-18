<?php
 /**
 * @version    $Version$
 * @package    ZF WordPress Category Accordion
 * @author     ZuFusion
 * @copyright  Copyright (C) 2014 ZuFusion All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */
/**
 * Create HTML list of pages.
 * @uses Walker
 */
class ZFWCA_Page_Walker extends Walker {

    public $tree_type = 'page';


    public $db_fields = array ('parent' => 'post_parent', 'id' => 'ID');

    /**
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     * @param array $args
     */
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class='children'>\n";
    }

    /**
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     * @param array $args
     */
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    /**
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $page Page data object.
     * @param int $depth Depth of page. Used for padding.
     * @param int $current_page Page ID.
     * @param array $args
     */
    public function start_el( &$output, $page, $depth = 0, $args = array(), $current_page = 0 ) {
        if ( $depth ) {
            $indent = str_repeat( "\t", $depth );
        } else {
            $indent = '';
        }

        $css_class = array( 'cat-item', 'page-item', 'page-item-' . $page->ID , 'level-' . $depth);

        if ( isset( $args['pages_with_children'][ $page->ID ] ) ) {
            $css_class[] = 'has-sub';
        }

        if ( ! empty( $current_page ) ) {
            $_current_page = get_post( $current_page );
            if ( in_array( $page->ID, $_current_page->ancestors ) ) {
                $css_class[] = 'current-page-ancestor';
            }
            if ( $page->ID == $current_page ) {
                $css_class[] = 'current-cat current-page-item';
            } elseif ( $_current_page && $page->ID == $_current_page->post_parent ) {
                $css_class[] = 'current-cat-parent current-page-parent';
            }
        } elseif ( $page->ID == get_option('page_for_posts') ) {
            $css_class[] = 'current-cat-parent current-page-parent';
        }

        $css_classes = implode( ' ', apply_filters( 'zfwca_page_css_class', $css_class, $page, $depth, $args, $current_page ) );

        if ( '' === $page->post_title ) {
            $page->post_title = sprintf( __( '#%d (no title)' ), $page->ID );
        }

        $args['link_before'] = empty( $args['link_before'] ) ? '' : $args['link_before'];
        $args['link_after'] = empty( $args['link_after'] ) ? '' : $args['link_after'];

        $output .= $indent . sprintf(
                '<li class="%s"><a href="%s" class="item-link">%s%s%s</a>',
                $css_classes,
                get_permalink( $page->ID ),
                $args['link_before'],
                apply_filters( 'the_title', $page->post_title, $page->ID ),
                $args['link_after']
            );

    }

    /**
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $page Page data object. Not used.
     * @param int $depth Depth of page. Not Used.
     * @param array $args
     */
    public function end_el( &$output, $page, $depth = 0, $args = array() ) {
        $output .= "</li>\n";
    }

}