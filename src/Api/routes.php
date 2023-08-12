<?php
/**
 * JSON API route list.
 *
 * @package Harucpi\ApiPlugin
 * @subpackage Api
 * @author Harun <harun.cox@gmail.com>
 * @since 1.0.0
 */

use Haruncpi\ApiPlugin\Api\ApiAuth;
use Haruncpi\ApiPlugin\Api\ApiController;
use Haruncpi\WpApi\ApiRoute;

/**
 * Public API route example.
 *
 * You can access this api's without any authentication.
 */
ApiRoute::prefix(
	'api-plugin/v1',
	function( ApiRoute $route ) {
		$route->get( 'me', array( ApiController::class, 'me' ) );
	}
);

/**
 * Secure API route example.
 *
 * To access secure API,
 *   You have to pass bearer token by Authorization header.
 *   Or access from same origin by senting `X-WP-Nonce` header.
 *   Note: From JS you will get nonce by wpApiSettings.nonce.
 *
 * In secure route, using ApiAuth::class
 * the controller method will receive a WP_User object that can be access by $request->user.
 */
ApiRoute::prefix(
	'api-plugin/v1',
	function( ApiRoute $route ) {
		$route->get( 'categories', array( ApiController::class, 'categories' ) );
		$route->get( 'posts', array( ApiController::class, 'posts' ) );
	}
)->auth( array( ApiAuth::class, 'check' ) );
