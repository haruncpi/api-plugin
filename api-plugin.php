<?php
/**
 * Plugin Name: API Plugin
 * Description: A RestFull API example with WP-API package.
 * Version: 1.0.0
 * Author: Harun<harun.cox@gmail.com>
 * Author URI: https://github.com/haruncpi/wp-api
 * Text Domain: api-plugin
 *
 * @package Harucpi\ApiPlugin
 */

use Haruncpi\WpApi\ApiConfig;

require_once 'vendor/autoload.php';

ApiConfig::set_route_file( __DIR__ . '/src/Api/routes.php' )->init();
