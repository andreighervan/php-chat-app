<?php

class Ga_Autoloader {

	/**
	 * Registers clas loader.
	 */
	public static function register() {
		spl_autoload_register( "Ga_Autoloader::loader" );
	}

	/**
	 * Class loader.
	 *
	 * @param $class_name
	 */
	private static function loader( $class_name ) {
		$file_name = GA_PLUGIN_DIR . '/class/' . $class_name . '.php';
		if ( file_exists( $file_name ) ) {
			require $file_name;
		}

		if ( preg_match( '/Ga_Lib/', $class_name ) ) {
			$file_name = GA_PLUGIN_DIR . '/lib/' . $class_name . '.php';
			if ( file_exists( $file_name ) ) {
				require $file_name;
			}
		}
	}
}