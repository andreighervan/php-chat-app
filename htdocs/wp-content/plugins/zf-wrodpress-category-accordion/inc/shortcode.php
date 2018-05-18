<?php
/**
 * @version    $Id$
 * @package    ZF WordPress Category Accordion
 * @author     ZuFusion
 * @copyright  Copyright (C) 2014 ZuFusion All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */
function zf_catetegory_accordion_shortcode( $atts, $content = null )
{
    global $zfwca;

    extract( shortcode_atts( array(
        'title'              => '',
        'speed'              => 'slow',
        'event_type'         => 'click',
        'arrow_alignment'    => 'right',
        'color_scheme'       => 'dark',
        'category_type'      => 'category',
        'order_by'           => 'name',
        'order'              => 'asc',
        'exclude'            => '',
        'include'            => '',
        'open_default'       => '',
        'limit'              => '',
        'show_count'         => 'false',
        'hide_empty'         => false,
        'allow_parent_links' => 'true',
        'ripple_effect'      => 'true',
        'toggle'             => 'false',

    ), $atts ) );

    $shortcode_id = 'zfwac_shortcode_' . rand(1, 10000);




    $show_count         = ($show_count == 'true') ? '1' : '0';
    $speed = (is_numeric($speed)) ? (int)$speed : '"' . $speed . '"';

    $configs = array(
        'show_count' => $show_count,
        'hide_empty' => $hide_empty,
        'exclude'    => $exclude,
        'include'    => $include,
        'orderby'    => $order_by,
        'order'      => $order,
        'number'     => $limit,
        'taxonomy'   => $category_type
    );

    $title = empty($title) ? '' : apply_filters('zfwca_title', $title);

    $current_cats = '';
    $open_ids = '';

    if ($open_default != '') {
        $open_default  = wp_parse_id_list($open_default);

        if (!empty($open_default)) {
            $open_default = array_unique($open_default);
            $open_ids  = implode(',', $open_default);
        }
    }
    $current_arr = zfwca_get_current_terms($category_type);
    if (!empty($current_arr)) {
        $current_arr = array_unique($current_arr);
        $current_cats  = implode(',', $current_arr);
    }

    $html = '';

    $content  = zfwca_get_theme_content($color_scheme);

    if (!empty($content)) {
        $html = '<style id="style-' . $shortcode_id . '">';
        $html .= str_replace('.zfc-accordion', '#' . $shortcode_id, $content);
        $html .= '</style>';
    }


    if (!empty($title)) {
        $html .=  '<h3>'.$title.'</h3>';
    }

    if ($configs['taxonomy'] !='page') {

        if (!taxonomy_exists($configs['taxonomy'])) {
            echo __('Category type does not exist or it has not actived yet, you need to check it again');
            return;
        }
    }

    $html .= '<div id="' . $shortcode_id . '" class="zfc-accordion">';
    $html .= '<ul class="zfc-' . $arrow_alignment.'">';
    if ($configs['taxonomy'] != 'page') {
        $html .= zfwca_list_categories($configs);
    } else {
        $html .= zfwca_list_pages($configs);
    }
    $html .= '</ul>';
    $html .= '</div>';

    ob_start();
    ?>
    <script type="text/javascript">
        /* <![CDATA[ */
        (function ($) {

            $('#<?php echo $shortcode_id;?>').ZFCAccordion({
                eventType: '<?php echo $event_type;?>',
                speed: <?php echo $speed;?>,
                allowParentLinks: <?php echo $allow_parent_links ;?>,
                rippleEffect: <?php echo $ripple_effect ;?>,
                toggle: <?php echo $toggle;?>,
                openIDs: '<?php echo $open_ids;?>',
                currentCats: '<?php echo $current_cats;?>'

            });

        })(jQuery);

        /* ]]> */
    </script>

    <?php

    $js = ob_get_clean();
    $zfwca->add_footer_extra($js);


    return $html;
}

add_shortcode('zfwca', 'zf_catetegory_accordion_shortcode');


/**
 * Create a shortcode button for tinymce
 *
 * @return [type] [description]
 */
function zfwca_button()
{
    if (current_user_can('edit_posts') && current_user_can('edit_pages')) {
        add_filter('mce_external_plugins', 'zfwca_add_buttons');
        add_filter('mce_buttons', 'zfwca_register_buttons');
    }
}

/**
 * Add new button to tinymce
 *
 * @param  Array $buttons - Array of buttons
 *
 * @return Array
 */
function zfwca_register_buttons($buttons)
{
    array_push($buttons, '|', 'zf_wp_category_accordion');

    return $buttons;
}

/**
 * Add new Javascript to the plugin scrippt array
 *
 * @param  Array $plugin_array - Array of scripts
 *
 * @return Array
 */
function zfwca_add_buttons($plugin_array)
{
    if ( version_compare( get_bloginfo('version'), '3.9', '>=' ) ) {
        $plugin_array['zf_wp_category_accordion'] = ZF_WORDPRESS_CATEGORY_ACCORDION_PLUGIN_URL . 'inc/tinymce/js/button9.js';
    } else {
        $plugin_array['zf_wp_category_accordion'] = ZF_WORDPRESS_CATEGORY_ACCORDION_PLUGIN_URL . 'inc/tinymce/js/button.js';
    }


    return $plugin_array;
}

add_action('admin_init', 'zfwca_button');