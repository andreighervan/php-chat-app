<?php  if ( ! defined('ETHEME_FW')) exit('No direct script access allowed');

// **********************************************************************//
// ! Follow icons
// **********************************************************************//
if(!function_exists('etheme_follow_shortcode')) {
    function etheme_follow_shortcode($atts) {
        extract(shortcode_atts(array(
        'title'  => '',
        'size' => 'normal',
        'align' => 'center',
        'target' => '_blank',
        'facebook' => '',
        'twitter' => '',
        'instagram' => '',
        'google' => '',
        'pinterest' => '',
        'linkedin' => '',
        'tumblr' => '',
        'youtube' => '',
        'vimeo' => '',
        'rss' => '',
        'vk' => '',
        'colorfull' => '',
        'filled' => '',
        ), $atts));

        $class = '';
        $class .= 'buttons-size-'.$size;
        $class .= ' align-'.$align;

        if( $colorfull ) {
            $class .= ' icons-colorfull';
        }

        if( $filled ) {
            $class .= ' icons-filled';
        }

        $target = 'target="' . $target . '"';

        $output = '<div class="et-follow-buttons '.$class.'">';

        if( $facebook ) {
            $output .= '<a href="'. esc_url( $facebook ) .'" class="follow-facebook" '.$target.'><i class="fa fa-facebook"></i></a>';
        }

        if( $twitter ) {
            $output .= '<a href="'. esc_url( $twitter ) .'" class="follow-twitter" '.$target.'><i class="fa fa-twitter"></i></a>';
        }

        if( $instagram ) {
            $output .= '<a href="'. esc_url( $instagram ) .'" class="follow-instagram" '.$target.'><i class="fa fa-instagram"></i></a>';
        }

        if( $google ) {
            $output .= '<a href="'. esc_url( $google ) .'" class="follow-google" '.$target.'><i class="fa fa-google"></i></a>';
        }

        if( $pinterest ) {
            $output .= '<a href="'. esc_url( $pinterest ) .'" class="follow-pinterest" '.$target.'><i class="fa fa-pinterest"></i></a>';
        }

        if( $linkedin ) {
            $output .= '<a href="'. esc_url( $linkedin ) .'" class="follow-linkedin" '.$target.'><i class="fa fa-linkedin"></i></a>';
        }

        if( $tumblr ) {
            $output .= '<a href="'. esc_url( $tumblr ) .'" class="follow-tumblr" '.$target.'><i class="fa fa-tumblr"></i></a>';
        }

        if( $youtube ) {
            $output .= '<a href="'. esc_url( $youtube ) .'" class="follow-youtube" '.$target.'><i class="fa fa-youtube"></i></a>';
        }

        if( $vimeo ) {
            $output .= '<a href="'. esc_url( $vimeo ) .'" class="follow-vimeo" '.$target.'><i class="fa fa-vimeo"></i></a>';
        }

        if( $rss ) {
            $output .= '<a href="'. esc_url( $rss ) .'" class="follow-rss" '.$target.'><i class="fa fa-rss"></i></a>';
        }

        if( $vk ) {
            $output .= '<a href="'. esc_url( $vk ) .'" class="follow-vk" '.$target.'><i class="fa fa-vk"></i></a>';
        }

        $output .= '</div>';

        return $output;

    }
}


// **********************************************************************//
// ! Register New Element: Social links
// **********************************************************************//
add_action( 'init', 'etheme_register_follow');
if(!function_exists('etheme_register_follow')) {
    function etheme_register_follow() {
        if(!function_exists('vc_map')) return;


        $params = array(
            array(
                "type" => "textfield",
                "heading" => esc_html__("Facebook link", 'xstore'),
                "param_name" => "facebook"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Twitter link", 'xstore'),
                "param_name" => "twitter"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Instagram link", 'xstore'),
                "param_name" => "instagram"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Google + link", 'xstore'),
                "param_name" => "google"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Pinterest link", 'xstore'),
                "param_name" => "pinterest"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("LinkedIn link", 'xstore'),
                "param_name" => "linkedin"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Tumblr link", 'xstore'),
                "param_name" => "tumblr"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("YouTube link", 'xstore'),
                "param_name" => "youtube"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Vimeo link", 'xstore'),
                "param_name" => "vimeo"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("RSS link", 'xstore'),
                "param_name" => "rss"
            ),
            array(
                "type" => "textfield",
                "heading" => esc_html__("Vk link", 'xstore'),
                "param_name" => "vk"
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Size", 'xstore'),
                "param_name" => "size",
                "value" => array(
                    esc_html__("Normal", 'xstore') => "normal",
                    esc_html__("Small", 'xstore') => "small",
                    esc_html__("Large", 'xstore') => "large"
                )
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Align", 'xstore'),
                "param_name" => "align",
                "value" => array(
                    esc_html__("Center", 'xstore') => "center",
                    esc_html__("Left", 'xstore') => "left",
                    esc_html__("Right", 'xstore') => "right"
                )
            ),
            array(
                "type" => "checkbox",
                "heading" => esc_html__("Colorfull icons", 'xstore'),
                "param_name" => "colorfull"
            ),
            array(
                "type" => "checkbox",
                "heading" => esc_html__("Filled icons", 'xstore'),
                "param_name" => "filled"
            ),
            array(
                "type" => "dropdown",
                "heading" => esc_html__("Links target", 'xstore'),
                "param_name" => "target",
                "value" => array(
                    esc_html__("Current window", 'xstore') => "_self",
                    esc_html__("Blank", 'xstore') => "_blank",
                )
            ),
        );

        $banner_params = array(
            'name' => '[8THEME] Social links',
            'base' => 'follow',
            'icon' => ETHEME_CODE_IMAGES . 'vc/el-follow.png',
            'category' => 'Eight Theme',
            'params' => $params
        );

        vc_map($banner_params);
    }
}