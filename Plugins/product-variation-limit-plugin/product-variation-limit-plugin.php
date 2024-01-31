<?php
/**
 * Plugin Name: Product variation limit plugin
 * Description: This plugin is used for increase the product variation limit.
 * Plugin URI: https://www.skylinemicrosites.co.uk/
 * Author: Gururaj	
 * Version: 0.0.1
 * Author URI: https://www.pccsuk.com/
 * Text Domain: product-variation-limit-plugin
 * Domain Path: /languages
 *
 */

if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly


function wpse_rest_batch_items_limit( $limit ) {
    $limit = 200;

    return $limit;
}
add_filter( 'woocommerce_rest_batch_items_limit', 'wpse_rest_batch_items_limit' );