<?php
/**
 * API Controller
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
 * Class ApiController
 */
class ApiController {

	use ApiResponse;

	/**
	 * About me.
	 *
	 * @param WP_REST_Request $request request.
	 *
	 * @return void JSON response.
	 */
	public function me( WP_REST_Request $request ) {
		$this->api_data(
			array(
				'name'    => 'Harun',
				'country' => 'Bangladesh',
			)
		);
	}

	/**
	 * All categories.
	 *
	 * @param WP_REST_Request $request request.
	 *
	 * @return void JSON response.
	 */
	public function categories( WP_REST_Request $request ) {
		/**
		 * Authenticated user.
		 *
		 * @var \WP_User
		 */
		$user = $request->user;

		/**
		 * TODO with this user, you can do more check.
		 */
		$this->api_data( get_categories() );
	}

	/**
	 * All posts.
	 *
	 * @param WP_REST_Request $request request.
	 *
	 * @return void JSON response.
	 */
	public function posts( WP_REST_Request $request ) {
		/**
		 * Authenticated user.
		 *
		 * @var \WP_User
		 */
		$user = $request->user;

		$this->api_data( get_posts() );
	}
}
