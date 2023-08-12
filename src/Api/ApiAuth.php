<?php
/**
 * API authentication
 *
 * @package Harucpi\ApiPlugin
 * @subpackage Api
 * @author Harun <harun.cox@gmail.com>
 * @since 1.0.0
 */

namespace Haruncpi\ApiPlugin\Api;

use Haruncpi\WpApi\Traits\ApiResponse;
use WP_REST_Request;

/**
 * Class Auth
 */
class ApiAuth {
	use ApiResponse;

	/**
	 * User meta to store api key.
	 *
	 * @var string
	 */
	private $meta_api_key = '__api_key';

	/**
	 * Authentication check.
	 *
	 * @param WP_REST_Request $request request.
	 *
	 * @return bool
	 */
	public function check( WP_REST_Request $request ) {
		if ( is_user_logged_in() ) {
			$request->user = get_user_by( 'ID', get_current_user_id() );
			return true;
		}

		$fail_msg = __( 'Access denined', 'api-plugin' );
		$token    = $request->get_header( 'authorization' );

		if ( empty( $token ) ) {
			$this->api_fail( $fail_msg, 401 );
		}

		$token = substr( $token, 7 );

		global $wpdb;
		$record = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT user_id, meta_key, meta_value
			FROM {$wpdb->usermeta} WHERE meta_key=%s AND meta_value=%s",
				$this->meta_api_key,
				$token
			)
		);

		if ( ! $record ) {
			$this->api_fail( $fail_msg, 401 );
		}

		$request->user = get_user_by( 'ID', $record->user_id );
		return true;
	}
}
