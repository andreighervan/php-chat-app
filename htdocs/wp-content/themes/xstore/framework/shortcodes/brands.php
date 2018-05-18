<?php  if ( ! defined('ETHEME_FW')) exit('No direct script access allowed');

// **********************************************************************//
// ! Brands
// **********************************************************************//

function etheme_brands_shortcode($atts) {
    extract( shortcode_atts( array(
        'number'     => null,
        'orderby'    => 'name',
        'order'      => 'ASC',
        'hide_empty' => 1,
        'columns' => 3,
        'parent'     => '',
        'large' => 4,
        'notebook' => 3,
        'tablet_land' => 2,
        'tablet_portrait' => 2,
        'mobile' => 1,
        'slider_autoplay' => false,
        'slider_speed' => 10000,
        'hide_pagination' => false,
        'hide_buttons' => false,
        'class'      => ''
    ), $atts ) );

    // get terms and workaround WP bug with parents/pad counts
    $args = array(
        'orderby'    => $orderby,
        'order'      => $order,
        'pad_counts' => true,
    );

    $product_brands = get_terms( 'brand', $args );

    $box_id = rand(1000,10000);

    ob_start();

    $class .= ' owl-carousel carousel-area';

    echo '<div class="brands-carousel '.$class.' slider-'.$box_id.'">';

    foreach ( $product_brands as $brand ) {
        $thumbnail_id 	= absint( get_woocommerce_term_meta( $brand->term_id, 'thumbnail_id', true ) );
        ?>
            <div class="slide-item brand-slide">
                <div class="categories-mask">
                    <?php if( $thumbnail_id ) : ?>
                        <?php
                            $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
                            $src = $image[0];
                        ?>
                        <a href="<?php echo esc_url( get_term_link( $brand ) ); ?>" title="<?php sprintf(__('View all products from %s', 'xstore'), $brand->name); ?>"><img src="<?php echo esc_url($src); ?>" title="<?php echo esc_attr( $brand->name ); ?>"/></a>
                    <?php else: ?>
                        <h3><a href="<?php echo esc_url( get_term_link( $brand ) ); ?>" title="<?php sprintf(__('View all products from %s', 'xstore'), $brand->name); ?>"><?php echo $brand->name; ?></a></h3>
                    <?php endif; ?>
                </div>
            </div>
        <?php
    }

    echo '</div>';

    echo '
        <script type="text/javascript">
            (function() {
                var options = {
                    items:5,
                    autoPlay: ' . (($slider_autoplay == "yes") ? $slider_speed : "false" ). ',
                    pagination: ' . (($hide_pagination == "yes") ? "false" : "true") . ',
                    navigation: ' . (($hide_buttons == "yes") ? "false" : "true" ). ',
                    navigationText:false,
                    rewindNav: ' . (($slider_autoplay == "yes") ? "true" : "false" ). ',
                    itemsCustom: [[0, ' . esc_js($mobile) . '], [479, ' . esc_js($tablet_portrait) . '], [619, ' . esc_js($tablet_portrait) . '], [768, ' . esc_js($tablet_land) . '],  [1200, ' . esc_js($notebook) . '], [1600, ' . esc_js($large) . ']]
                };

                jQuery(".slider-'.$box_id.'").owlCarousel(options);

                var owl = jQuery(".slider-'.$box_id.'").data("owlCarousel");

                jQuery( window ).bind( "vc_js", function() {
                    owl.reinit(options);
                } );
            })();
        </script>
    ';

    return ob_get_clean();
}

// **********************************************************************//
// ! Register New Element: scslug
// **********************************************************************//
add_action( 'init', 'etheme_register_brands_categories');
if(!function_exists('etheme_register_brands_categories')) {
    function etheme_register_brands_categories() {
        if(!function_exists('vc_map')) return;
        $params = array(
            'name' => '[8theme] Brands carousel',
            'base' => 'etheme_brands',
            'icon' => 'icon-wpb-etheme',
            'icon' => ETHEME_CODE_IMAGES . 'vc/el-categories.png',
            'category' => 'Eight Theme',
            'params' => array_merge(array(
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Number of brands", 'xstore'),
                    "param_name" => "number"
                ),
                array(
                    "type" => "textfield",
                    "heading" => esc_html__("Extra Class", 'xstore'),
                    "param_name" => "class"
                )
            ), etheme_get_slider_params())
        );

        vc_map($params);
    }
}
