<?php
/**
 * @version    $Id$
 * @package    ZF WordPress Category Accordion
 * @author     ZuFusion
 * @copyright  Copyright (C) 2014 ZuFusion All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

if (!class_exists('ZF_Wordpress_Category_Accordion')) {

    /**
     * Class ZF_Wordpress_Category_Accordion base
     */
    class ZF_Wordpress_Category_Accordion
    {

        protected static $instance = null;


        private  $footer_extra = '';


        public function run()
        {

            $this->init();
        }

        /**
         * Return an instance of this class.
         */
        public static function get_instance()
        {

            if (null == self::$instance) {
                self::$instance = new self;
            }

            return self::$instance;
        }

        /**
         * Init
         */
        public function init()
        {

            add_action( 'plugins_loaded', array( &$this, 'load_textdomain' ) );

            register_activation_hook(ZF_WORDPRESS_CATEGORY_ACCORDION_PLUGIN_FILE, array(&$this, 'zfwca_install'));
            register_deactivation_hook(ZF_WORDPRESS_CATEGORY_ACCORDION_PLUGIN_FILE, array(&$this, 'zfwca_uninstall'));

            // register widgets
            add_action('widgets_init', array(&$this, 'register_widgets'));

            add_action('wp_enqueue_scripts', array(&$this, 'load_assets'));

            add_action( 'wp_footer', array( $this, 'print_footer_extra' ), 30 );

            // include shortcode
            require('shortcode.php');

            if (is_admin()) {
                add_action('admin_init', array(&$this, 'admin_init'));
                add_action('admin_enqueue_scripts', array($this, 'admin_assets'));
            }

        }

        /**
         * Load Localisation files.
         */
        public function load_textdomain() {

            $domain = ZF_WORDPRESS_CATEGORY_ACCORDION_LANG;
            $locale = apply_filters( 'plugin_locale', get_locale(), $domain );

            if ( $loaded = load_textdomain( $domain, trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' ) ) {
                return $loaded;
            } else {
                load_plugin_textdomain( 'zf-wrodpress-category-accordion', FALSE, basename(ZF_WORDPRESS_CATEGORY_ACCORDION_PLUGIN_PATH) . '/languages/' );
            }

        }

        public function admin_init()
        {
            if (isset($_REQUEST['zfa_choose_ids'])) {
                include('admin/ids.php');
            }
        }

        /**
         * On installation
         */
        function zfwca_install()
        {


        }

        /**
         * On un-installation
         */
        function zfwca_uninstall()
        {

        }

        /**
         * Add extra to the footer.
         * @param $js
         */
        public function add_footer_extra( $js ) {
            $this->footer_extra .= "\n" . $js . "\n";
        }

        /**
         * Print extra to footer
         * @return bool
         */
        public function print_footer_extra( ) {

            if ( $this->footer_extra ) {

                echo $this->footer_extra;

                $this->footer_extra = '';
            }

        }

        /**
         * load assets for plugins
         */
        public function load_assets()
        {

            wp_register_style('zfwca-style', ZF_WORDPRESS_CATEGORY_ACCORDION_PLUGIN_URL . 'assets/core/css/style.css', array(), false, 'all');
            wp_enqueue_style('zfwca-style');

            wp_register_script('zfwca-accordion', ZF_WORDPRESS_CATEGORY_ACCORDION_PLUGIN_URL . 'assets/core/js/zfwca-accordion.min.js', array('jquery', 'hoverIntent'), '1.2', true);
            wp_enqueue_script('zfwca-accordion');

        }

        /**
         * Enqueue Assets
         */
        public function admin_assets()
        {
            // js
            wp_enqueue_script('jquery');

            add_thickbox();

            wp_register_script('zfwca-admin-js', ZF_WORDPRESS_CATEGORY_ACCORDION_PLUGIN_URL . 'inc/admin/assets/js/admin.js', array(), '1.0', true);
            wp_enqueue_script('zfwca-admin-js');
        }

        /**
         * register widgets function.
         *
         * @access public
         * @return void
         */
        function register_widgets()
        {
            global $zfwca_object;
            $zfwca_object = self::get_instance();

            include_once('widget.php');

            register_widget('ZF_Wordpress_Category_Accordion_Widget');
        }

    }
}