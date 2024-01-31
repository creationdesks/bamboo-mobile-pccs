<?php
/**

* Plugin name: WC custom API
* Plugin URI: https://creationdesks.com
* Description: bamboo cart custom requests
* Version: 1.0
* Author: Gururaj Acharya
* Author URI: https://creationdesks.com

*/
defined( 'ABSPATH' ) or die( 'Unauthorized access!' );

add_action (
	'rest_api_init',
	function(){
		register_rest_route(
			'wp/v2',
			'bamboo',
			array(
				'methods' => WP_REST_SERVER::CREATABLE,
				'callback' => 'removedcart',
				'args' => array(),
				'permission_callback' => function () {
				  return true;
				}	
			)
		);
	}
);	

function removedcart( WP_REST_Request $request ) {
		
			$request_params = $request->get_params();
			return new WP_REST_Response($request_params['product_ID'], 200);
			$item_key       = ! isset( $request_params['item_key'] ) ? '0' : wc_clean( wp_unslash( sanitize_text_field( $request_params['item_key'] ) ) );
			$cart = WC()->cart->get_cart();
			
			$product_id = $request_params->product_ID;
			foreach( WC()->cart->get_cart() as $key=>$item){
				if($item['product_id']==$product_id){
					WC()->cart->remove_cart_item( $key );                   
				}

			}
    		
		
	} // END remove_item()
