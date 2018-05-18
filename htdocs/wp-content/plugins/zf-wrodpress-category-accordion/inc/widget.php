<?php

/**
 * @version    $Id$
 * @package    ZF WordPress Category Accordion
 * @author     ZuFusion
 * @copyright  Copyright (C) 2014 ZuFusion All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */
class ZF_Wordpress_Category_Accordion_Widget extends WP_Widget
{
    var $style = '';

    function __construct()
    {
        $widget_ops = array(
            'description' => __('Display categories/pages as multilevel accordion category', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG),
            'name'        => __('ZF WordPress Category Accordion', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG)
        );
        parent::__construct('zfwca_widget', __('ZF WordPress Category Accordion', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG), $widget_ops);
    }

    public function form($instance)
    {
        $instance = wp_parse_args($instance,
            array(
                'speed'           => 'slow',
                'title'           => '',
                'exclude'         => '',
                'include'         => '',
                'open_default'    => '',
                'event_type'      => 'click',
                'arrow_alignment' => 'right',
                'orderby'         => 'name',
                'order'           => 'asc',
                'number'          => '',
                'cat_type'        => 'category',
                'theme'           => '',
            )
        );

        $title              = esc_attr($instance['title']);
        $show_count         = isset($instance['show_count']) ? (bool)$instance['show_count'] : false;
        $hide_empty         = isset($instance['hide_empty']) ? (bool)$instance['hide_empty'] : false;
        $toggle     = isset($instance['toggle']) ? (bool)$instance['toggle'] : false;
        $allow_parent_links = isset($instance['allow_parent_links']) ? (bool)$instance['allow_parent_links'] : false;
        $ripple_effect = isset($instance['ripple_effect']) ? (bool)$instance['ripple_effect'] : true;
        $exclude            = esc_attr($instance['exclude']);
        $include            = esc_attr($instance['include']);
        $open_default       = esc_attr($instance['open_default']);
        $number             = $instance['number'];
        $themes             = zfwca_get_themes();

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG);?> : </label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>


        <p>
            <label for="<?php echo $this->get_field_id('speed'); ?>"><?php _e('Speed', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG);?>:</label>
            <input class="widefat" id="<?php echo $this->get_field_id('speed'); ?>"
                   name="<?php echo $this->get_field_name('speed'); ?>" type="text"
                   value="<?php echo $instance['speed']; ?>"/>
            <br/>
            <small><?php _e('The duration of the sliding animation. (slow, fast, or milliseconds).'); ?></small>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('event_type'); ?>"><?php _e('Event Type', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG);?>:</label>
            <select name="<?php echo $this->get_field_name('event_type'); ?>"
                    id="<?php echo $this->get_field_id('event_type'); ?>" class="widefat">
                <option value="click"<?php selected($instance['event_type'], 'click'); ?>><?php _e('Click', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
                <option value="hover"<?php selected($instance['event_type'], 'hover'); ?>><?php _e('Hover', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
            </select>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('arrow_alignment'); ?>"><?php _e('Arrow alignment', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG);?>:</label>
            <select name="<?php echo $this->get_field_name('arrow_alignment'); ?>"
                    id="<?php echo $this->get_field_id('arrow_alignment'); ?>" class="widefat">
                <option value="left"<?php selected($instance['arrow_alignment'], 'left'); ?>><?php _e('Left', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
                <option value="right"<?php selected($instance['arrow_alignment'], 'right'); ?>><?php _e('Right', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('theme'); ?>"><?php _e('Color Scheme', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?>:</label>
            <select name="<?php echo $this->get_field_name('theme'); ?>"
                    id="<?php echo $this->get_field_id('theme'); ?>" class="widefat">
                <?php
                if (!empty($themes)) {

                    foreach ($themes as $key => $theme) {
                        ?>
                        <option
                            value="<?php echo $key; ?>"<?php selected($instance['theme'], $key); ?>><?php echo $key; ?></option>
                    <?php
                    }
                } else { ?>
                    <option disabled><?php _e('Not found', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG);?></option>
                <?php }
                ?>
            </select>
        </p>


        <p>
            <label for="<?php echo $this->get_field_id('cat_type'); ?>"><?php _e('Category type', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?>:</label>
            <select name="<?php echo $this->get_field_name('cat_type'); ?>"
                    id="<?php echo $this->get_field_id('cat_type'); ?>" class="widefat">
                <option
                    value="category"<?php selected($instance['cat_type'], 'category'); ?>><?php _e('Post', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
                <option
                    value="page"<?php selected($instance['cat_type'], 'page'); ?>><?php _e('Page', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
                <option
                    value="product_cat"<?php selected($instance['cat_type'], 'product_cat'); ?>><?php _e('WooCommerce or Jigoshop', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
                <option
                    value="wpsc_product_category"<?php selected($instance['cat_type'], 'wpsc_product_category'); ?>><?php _e('WP eCommerce', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
                <option
                    value="download_category"<?php selected($instance['cat_type'], 'download_category'); ?>><?php _e('Easy Digital Downloads', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
                <option
                    value="product_category"<?php selected($instance['cat_type'], 'product_category'); ?>><?php _e('MarketPress Lite', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('orderby'); ?>"><?php _e('Order by', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?>:</label>
            <select name="<?php echo $this->get_field_name('orderby'); ?>"
                    id="<?php echo $this->get_field_id('orderby'); ?>" class="widefat">

                <optgroup label="<?php _e('Category type is not page'); ?>">
                    <option value=""<?php selected($instance['orderby'], ''); ?>><?php _e('ID', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
                    <option value="name"<?php selected($instance['orderby'], 'name'); ?>><?php _e('Name', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
                    <option value="count"<?php selected($instance['orderby'], 'count'); ?>><?php _e('Count', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
                </optgroup>

                <optgroup label="<?php _e('Category type is page'); ?>">
                    <option value="post_title"<?php selected($instance['orderby'], 'post_title'); ?>><?php _e('Default'); ?></option>
                    <option value="ID"<?php selected($instance['orderby'], 'ID'); ?>><?php _e('ID'); ?></option>
                    <option value="rand"<?php selected($instance['orderby'], 'rand'); ?>><?php _e('Rand'); ?></option>
                    <option value="post_name"<?php selected($instance['orderby'], 'post_name'); ?>><?php _e('Name'); ?></option>
                    <option value="menu_order"<?php selected($instance['orderby'], 'menu_order'); ?>><?php _e('Menu Order'); ?></option>
                    <option value="comment_count"<?php selected($instance['orderby'], 'comment_count'); ?>><?php _e('Comment Count'); ?></option>
                    <option value="post_author"<?php selected($instance['orderby'], 'post_author'); ?>><?php _e('Author'); ?></option>
                    <option value="post_date"<?php selected($instance['orderby'], 'post_date'); ?>><?php _e('Date'); ?></option>
                    <option value="post_modified"<?php selected($instance['orderby'], 'post_modified'); ?>><?php _e('Modified'); ?></option>
                </optgroup>

            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('order'); ?>"><?php _e('Order:'); ?></label>
            <select name="<?php echo $this->get_field_name('order'); ?>"
                    id="<?php echo $this->get_field_id('order'); ?>" class="widefat">
                <option value="asc"<?php selected($instance['order'], 'asc'); ?>><?php _e('Asc', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
                <option value="desc"<?php selected($instance['order'], 'desc'); ?>><?php _e('Desc', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('exclude'); ?>"><?php _e('Exclude', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?>:</label>
            <a href="#" class="zfa_choose_ids" data-action="exclude" data-id="<?php echo $this->get_field_id('exclude'); ?>" data-cattype="<?php echo $this->get_field_id('cat_type'); ?>"><?php _e('Choose IDs', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></a> <input
                type="text" value="<?php echo $exclude; ?>" name="<?php echo $this->get_field_name('exclude'); ?>"
                id="<?php echo $this->get_field_id('exclude'); ?>" class="widefat"/>
            <br/>
            <small><?php _e('Category/Page IDs, separated by commas.'); ?></small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('include'); ?>"><?php _e('Include', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?>:</label>
            <a href="#" class="zfa_choose_ids" data-action="include" data-id="<?php echo $this->get_field_id('include'); ?>" data-cattype="<?php echo $this->get_field_id('cat_type'); ?>"><?php _e('Choose IDs', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?></a> <input
                type="text" value="<?php echo $include; ?>" name="<?php echo $this->get_field_name('include'); ?>"
                id="<?php echo $this->get_field_id('include'); ?>" class="widefat"/>
            <br/>
            <small><?php _e('Only include certain Category/Page IDs, separated by commas.'); ?></small>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('open_default'); ?>"><?php _e('Open default', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?>:</label> <input
                type="text" value="<?php echo $open_default; ?>" name="<?php echo $this->get_field_name('open_default'); ?>"
                id="<?php echo $this->get_field_id('open_default'); ?>" class="widefat"/>
            <br/>
            <small><?php _e('Expand default parent category with Category/Page IDs, separated by commas.'); ?></small>
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Limit number of items', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?>:</label>
            <input type="text" value="<?php echo $number; ?>" name="<?php echo $this->get_field_name('number'); ?>"
                   id="<?php echo $this->get_field_id('number'); ?>" class="widefat"/>
        </p>

        <p>
            <input type="checkbox" class="checkbox" <?php checked($show_count); ?>
                   id="<?php echo $this->get_field_id('show_count'); ?>"
                   name="<?php echo $this->get_field_name('show_count'); ?>"/>
            <label for="<?php echo $this->get_field_id('show_count'); ?>"><?php _e('Show Count', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?>?</label>
        </p>
        <p>
            <input type="checkbox" class="checkbox" <?php checked($hide_empty); ?>
                   id="<?php echo $this->get_field_id('hide_empty'); ?>"
                   name="<?php echo $this->get_field_name('hide_empty'); ?>"/>
            <label for="<?php echo $this->get_field_id('hide_empty'); ?>"><?php _e('Hide Empty', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?>?</label>
        </p>

        <p>
            <input type="checkbox" class="checkbox" <?php checked($allow_parent_links); ?>
                   id="<?php echo $this->get_field_id('allow_parent_links'); ?>"
                   name="<?php echo $this->get_field_name('allow_parent_links'); ?>"/>
            <label
                for="<?php echo $this->get_field_id('allow_parent_links'); ?>"><?php _e('Allow parent links', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?> ?</label>
        </p>
        <p>
            <input type="checkbox" class="checkbox" <?php checked($ripple_effect); ?>
                   id="<?php echo $this->get_field_id('ripple_effect'); ?>"
                   name="<?php echo $this->get_field_name('ripple_effect'); ?>"/>
            <label
                for="<?php echo $this->get_field_id('ripple_effect'); ?>"><?php _e('Ripple Effect', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?> ?</label>
        </p>
        <p>
            <input type="checkbox" class="checkbox" <?php checked($toggle); ?>
                   id="<?php echo $this->get_field_id('toggle'); ?>"
                   name="<?php echo $this->get_field_name('toggle'); ?>"/>
            <label
                for="<?php echo $this->get_field_id('toggle'); ?>"><?php _e('Toggle Accordion', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG); ?> ?</label>
        </p>

    <?php

    }

    function update($new_instance, $old_instance)
    {

        $instance                       = $old_instance;
        $instance['title']              = strip_tags($new_instance['title']);
        $instance['speed']              = strip_tags($new_instance['speed']);
        $instance['event_type']         = $new_instance['event_type'];
        $instance['arrow_alignment']    = $new_instance['arrow_alignment'];
        $instance['theme']              = $new_instance['theme'];
        $instance['number']             = $new_instance['number'];
        $instance['show_count']         = !empty($new_instance['show_count']) ? 1 : 0;
        $instance['hide_empty']         = !empty($new_instance['hide_empty']) ? true : false;
        $instance['toggle']     = !empty($new_instance['toggle']) ? 1 : 0;
        $instance['allow_parent_links'] = !empty($new_instance['allow_parent_links']) ? 1 : 0;
        $instance['ripple_effect'] = !empty($new_instance['ripple_effect']) ? 1 : 0;

        $instance['orderby'] = $new_instance['orderby'];
        $instance['order'] = $new_instance['order'];

        if (in_array($new_instance['cat_type'], array('category', 'page', 'product_cat', 'download_category', 'wpsc_product_category', 'product_category'))) {
            $instance['cat_type'] = $new_instance['cat_type'];
        } else {
            $instance['cat_type'] = 'category';
        }

        $instance['exclude'] = $new_instance['exclude'];
        $instance['include'] = $new_instance['include'];
        $instance['open_default'] = $new_instance['open_default'];

        return $instance;
    }

    public function widget($args, $instance)
    {
        global $zfwca;

        extract($args, EXTR_SKIP);
        $speed = $instance['speed'];

        $speed = (is_numeric($speed)) ? (int)$speed : '"' . $speed . '"';
        $show_count         = !empty($instance['show_count']) ? '1' : '0';
        $hide_empty         = !empty($instance['hide_empty']) ? true : false;
        $allow_parent_links = !empty($instance['allow_parent_links']) ? 'true' : 'false';
        $ripple_effect = !empty($instance['ripple_effect']) ? 'true' : 'false';
        $toggle      = !empty($instance['toggle']) ? 'true' : 'false';

        $orderby          = empty($instance['orderby']) ? 'name' : $instance['orderby'];
        $order            = empty($instance['order']) ? 'asc' : $instance['order'];
        $exclude          = empty($instance['exclude']) ? '' : $instance['exclude'];
        $include          = empty($instance['include']) ? '' : $instance['include'];
        $limit_categories = empty($instance['number']) ? '' : $instance['number'];
        $cat_type         = empty($instance['cat_type']) ? 'category' : $instance['cat_type'];
        $theme            = empty($instance['theme']) ? '' : $instance['theme'];
        $event_type       = empty($instance['event_type']) ? 'click' : $instance['event_type'];
        $arrow_alignment  = empty($instance['arrow_alignment']) ? 'right' : $instance['arrow_alignment'];
        $open_default     = empty($instance['open_default']) ? '' : $instance['open_default'];

        $current_cats = '';
        $open_ids = '';

        if ($open_default != '') {
            $open_default  = wp_parse_id_list($open_default);

            if (!empty($open_default)) {
                $open_default = array_unique($open_default);
                $open_ids  = implode(',', $open_default);
            }
        }
        $current_arr = zfwca_get_current_terms($cat_type);
        if (!empty($current_arr)) {
            $current_arr = array_unique($current_arr);
            $current_cats  = implode(',', $current_arr);
        }

        $content  = zfwca_get_theme_content($theme);

        if (!empty($content)) {

            $style = '<style id="style-zfc-accordion-' . $this->id . '">';
            $style .= str_replace('.zfc-accordion', '#zfc-accordion-' . $this->id, $content);
            $style .= '</style>';

            echo $style;
        }


        $configs = array(
            'show_count' => $show_count,
            'hide_empty' => $hide_empty,
            'exclude'    => $exclude,
            'include'    => $include,
            'orderby'    => $orderby,
            'order'      => $order,
            'number'     => $limit_categories,
            'taxonomy'   => $cat_type
        );


        echo $before_widget;

        $title = empty($instance['title']) ? '' : apply_filters('widget_title', $instance['title']);

        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        }

        if ($configs['taxonomy'] !='page') {

            if (!taxonomy_exists($configs['taxonomy'])) {
                echo __('Category type does not exist or it has not actived yet, you need to check it again');
                return;
            }
        }

        ?>
        <div id="zfc-accordion-<?php echo $this->id; ?>" class="zfc-accordion">
            <ul class="<?php echo 'zfc-' . $arrow_alignment;?>">
                <?php
                if ($configs['taxonomy'] != 'page') {
                    echo zfwca_list_categories($configs);
                } else {
                    echo zfwca_list_pages($configs);
                }
                ?>
            </ul>
        </div>
        <?php
        ob_start();

        ?>
        <script type="text/javascript">
            /* <![CDATA[ */
            (function ($) {

                $('#zfc-accordion-<?php echo $this->id;?>').ZFCAccordion({
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
        echo $after_widget;
    }


}