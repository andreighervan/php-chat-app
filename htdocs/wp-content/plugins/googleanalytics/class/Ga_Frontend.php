<?php

class Ga_Frontend {

	public static function insights_googleanalytics() {
		if ( is_ssl() ) {
			$url = 'https://ws.sharethis.com/button/st_insights.js';
		} else {
			$url = 'http://w.sharethis.com/button/st_insights.js';
		}
		$url = add_query_arg( array(

			'publisher' => '75560ae7-5c5f-483e-936f-e426496af114',
			'product'   => 'GA'
		), $url );
		wp_register_script( GA_NAME . '-sharethis', $url, null, null, false );
		wp_enqueue_script( GA_NAME . '-sharethis' );
	}

	public static function loader_tag_googleanalytics( $tag, $handle ) {
		if ( GA_NAME . '-sharethis' === $handle ) {
			$tag = str_replace( '<script', '<script id=\'st_insights_js\'', $tag );
		}

		return $tag;
	}

	/**
	 * Adds frontend actions hooks.
	 */
	public static function add_actions() {
		if ( Ga_Helper::can_add_ga_code() ) {
			add_action( 'wp_head', 'Ga_Frontend::googleanalytics' );
			if ( get_option( Ga_Admin::GA_SHARETHIS_TERMS_OPTION_NAME ) && Ga_Helper::is_sharethis_included() ) {
				add_action( 'wp_enqueue_scripts', 'Ga_Frontend::insights_googleanalytics' );
				add_filter( 'script_loader_tag', 'Ga_Frontend::loader_tag_googleanalytics', 10, 2 );
			}
		}
	}

	/**
	 * Displays Google Analytics Tracking code.
	 */
	public static function googleanalytics() {
		$web_property_id = self::get_web_property_id();
		if ( Ga_Helper::is_configured( $web_property_id ) ) {
			Ga_View::load( 'ga_code', array(
				'data' => array(
					Ga_Admin::GA_WEB_PROPERTY_ID_OPTION_NAME => $web_property_id
				)
			) );
		}
	}

	/**
	 * Gets and returns Web Property Id.
	 *
	 * @return string Web Property Id
	 */
	private static function get_web_property_id() {
		$web_property_id = get_option( Ga_Admin::GA_WEB_PROPERTY_ID_OPTION_NAME );
		if ( Ga_Helper::is_code_manually_enabled() ) {
			$web_property_id = get_option( Ga_Admin::GA_WEB_PROPERTY_ID_MANUALLY_VALUE_OPTION_NAME );
		}

		return $web_property_id;
	}
}