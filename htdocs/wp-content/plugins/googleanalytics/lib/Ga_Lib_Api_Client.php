<?php

class Ga_Lib_Api_Client {

	const OAUTH2_REVOKE_ENDPOINT = 'https://accounts.google.com/o/oauth2/revoke';

	const OAUTH2_TOKEN_ENDPOINT = 'https://accounts.google.com/o/oauth2/token';

	const OAUTH2_AUTH_ENDPOINT = 'https://accounts.google.com/o/oauth2/auth';

	const OAUTH2_FEDERATED_SIGNON_CERTS_ENDPOINT = 'https://www.googleapis.com/oauth2/v1/certs';

	const GA_ACCOUNT_SUMMARIES_ENDPOINT = 'https://www.googleapis.com/analytics/v3/management/accountSummaries';

	const GA_DATA_ENDPOINT = 'https://analyticsreporting.googleapis.com/v4/reports:batchGet';

	const OAUTH2_CALLBACK_URI = 'urn:ietf:wg:oauth:2.0:oob';

	/**
	 * Pre-defined API credentials.
	 *
	 * @var array
	 */
	private $config = array(
		'access_type'      => 'offline',
		'application_name' => 'Google Analytics',
		'client_id'        => '207216681371-433ldmujuv4l0743c1j7g8sci57cb51r.apps.googleusercontent.com',
		'client_secret'    => 'y0B-K-ODB1KZOam50aMEDhyc',
		'scopes'           => array( 'https://www.googleapis.com/auth/analytics.readonly' ),
		'approval_prompt'  => 'force'
	);

	/**
	 * Keeps Access Token information.
	 *
	 * @var array
	 */
	private $token;

	/**
	 * Keeps error messages.
	 * @var array
	 */
	private $errors = array();

	/**
	 * Returns API client instance.
	 *
	 * @return Ga_Lib_Api_Client|null
	 */
	public static function get_instance() {
		static $instance = null;
		if ( $instance === null ) {
			$instance = new Ga_Lib_Api_Client();
		}

		return $instance;
	}

	/**
	 * Returns errors array.
	 * @return array
	 */
	public function get_errors() {
		return $this->errors;
	}

	/**
	 * Calls api methods.
	 *
	 * @param string $callback
	 * @param mixed $args
	 *
	 * @return mixed
	 */
	public function call( $callback, $args = null ) {
		try {
			$callback = array( get_class( $this ), $callback );
			if ( is_callable( $callback ) ) {
				if ( ! empty( $args ) ) {
					if ( is_array( $args ) ) {
						return call_user_func_array( $callback, $args );
					} else {
						return call_user_func_array( $callback, array( $args ) );
					}
				} else {
					return call_user_func( $callback );
				}
			} else {
				throw new Ga_Lib_Api_Client_Exception( 'Unknown method: ' . $callback );
			}
		} catch ( Ga_Lib_Api_Client_Exception $e ) {
			$this->add_error( $e );

			return new Ga_Lib_Api_Response( Ga_Lib_Api_Response::$empty_response );
		} catch ( Ga_Lib_Api_Request_Exception $e ) {
			$this->add_error( $e );

			return new Ga_Lib_Api_Response( Ga_Lib_Api_Response::$empty_response );
		} catch ( Exception $e ) {
			$this->add_error( $e );

			return new Ga_Lib_Api_Response( Ga_Lib_Api_Response::$empty_response );
		}
	}

	/**
	 * Prepares error data.
	 *
	 * @param Exception $e
	 *
	 */
	private function add_error( Exception $e ) {
		$this->errors[ $e->getCode() ] = array( 'class' => get_class( $e ), 'message' => $e->getMessage() );
	}

	/**
	 * Sets access token.
	 *
	 * @param $token
	 */
	public function set_access_token( $token ) {
		$this->token = $token;
	}

	/**
	 * Returns Google Oauth2 redirect URL.
	 *
	 * @return string
	 */
	private function get_redirect_uri() {
		return self::OAUTH2_CALLBACK_URI;
	}

	/**
	 * Creates Google Oauth2 authorization URL.
	 *
	 * @return string
	 */
	public function create_auth_url() {
		$params = array(
			'response_type'   => 'code',
			'redirect_uri'    => $this->get_redirect_uri(),
			'client_id'       => urlencode( $this->config['client_id'] ),
			'scope'           => implode( " ", $this->config['scopes'] ),
			'access_type'     => urlencode( $this->config['access_type'] ),
			'approval_prompt' => urlencode( $this->config['approval_prompt'] )
		);

		return self::OAUTH2_AUTH_ENDPOINT . "?" . http_build_query( $params );
	}

	/**
	 * Sends request for Access Token during Oauth2 process.
	 *
	 * @param $access_code
	 *
	 * @return Ga_Lib_Api_Response Returns response object
	 */
	private function ga_auth_get_access_token( $access_code ) {
		$request = array(
			'code'          => $access_code,
			'grant_type'    => 'authorization_code',
			'redirect_uri'  => $this->get_redirect_uri(),
			'client_id'     => $this->config['client_id'],
			'client_secret' => $this->config['client_secret']
		);

		$response = Ga_Lib_Api_Request::get_instance()->make_request( self::OAUTH2_TOKEN_ENDPOINT, $request );

		return new Ga_Lib_Api_Response( $response );
	}

	private function ga_auth_refresh_access_token( $refresh_token ) {
		$request = array(
			'refresh_token' => $refresh_token,
			'grant_type'    => 'refresh_token',
			'client_id'     => $this->config['client_id'],
			'client_secret' => $this->config['client_secret']
		);

		$response = Ga_Lib_Api_Request::get_instance()->make_request( self::OAUTH2_TOKEN_ENDPOINT, $request );

		return new Ga_Lib_Api_Response( $response );
	}

	/**
	 * Get list of the analytics accounts.
	 *
	 * @return Ga_Lib_Api_Response Returns response object
	 */
	private function ga_api_account_summaries() {
		$request  = Ga_Lib_Api_Request::get_instance();
		$request  = $this->sign( $request );
		$response = $request->make_request( self::GA_ACCOUNT_SUMMARIES_ENDPOINT );

		return new Ga_Lib_Api_Response( $response );
	}

	/**
	 * Sends request for Google Analytics data using given query parameters.
	 *
	 * @param $query_params
	 *
	 * @return Ga_Lib_Api_Response Returns response object
	 */
	private function ga_api_data( $query_params ) {
		$request  = Ga_Lib_Api_Request::get_instance();
		$request  = $this->sign( $request );
		$response = $request->make_request( self::GA_DATA_ENDPOINT, wp_json_encode( $query_params ), true );

		return new Ga_Lib_Api_Response( $response );
	}

	/**
	 * Sign request with Access Token.
	 * Adds Access Token to the request's headers.
	 *
	 * @param Ga_Lib_Api_Request $request
	 *
	 * @return Ga_Lib_Api_Request Returns response object
	 * @throws Ga_Lib_Api_Client_Exception
	 */
	private function sign( Ga_Lib_Api_Request $request ) {
		if ( empty( $this->token ) ) {
			throw new Ga_Lib_Api_Client_Exception( 'Access Token is not available. Please reauthenticate' );
		}

		// Check if the token is set to expire in the next 30 seconds
		// (or has already expired).
		$this->check_access_token();

		// Add the OAuth2 header to the request
		$request->set_request_headers( array( 'Authorization: Bearer ' . $this->token['access_token'] ) );

		return $request;
	}

	/**
	 * Refresh and save refreshed Access Token.
	 *
	 * @param $refresh_token
	 */
	public function refresh_access_token( $refresh_token ) {
		// Request for a new Access Token
		$response = $this->call( 'ga_auth_refresh_access_token', array( $refresh_token ) );

		Ga_Admin::save_access_token( $response, $refresh_token );

		// Set new access token
		$token = Ga_Helper::get_option( Ga_Admin::GA_OAUTH_AUTH_TOKEN_OPTION_NAME );
		$this->set_access_token( json_decode( $token, true ) );
	}

	/**
	 * Checks if Access Token is valid.
	 *
	 * @return bool
	 */
	public function is_authorized() {
		if ( ! empty( $this->token ) ) {
			try {
				$this->check_access_token();
			} catch ( Ga_Lib_Api_Client_Exception $e ) {
				$this->add_error( $e );
			} catch ( Exception $e ) {
				$this->add_error( $e );
			}
		}

		return ! empty( $this->token ) && ! $this->is_access_token_expired();
	}

	/**
	 * Returns if the access_token is expired.
	 * @return bool Returns True if the access_token is expired.
	 */
	public function is_access_token_expired() {
		if ( null == $this->token ) {
			return true;
		}
		if ( ! empty( $this->token['error'] ) ) {
			return true;
		}
		// Check if the token is expired in the next 30 seconds.
		$expired = ( $this->token['created'] + ( $this->token['expires_in'] - 30 ) ) < time();

		return $expired;
	}

	private function check_access_token() {
		if ( $this->is_access_token_expired() ) {
			if ( empty( $this->token['refresh_token'] ) ) {
				throw new Ga_Lib_Api_Client_Exception( 'Refresh token is not available. Please re-authenticate.' );
			} else {
				$this->refresh_access_token( $this->token['refresh_token'] );
			}
		}
	}
}

class Ga_Lib_Api_Client_Exception extends Exception {
}