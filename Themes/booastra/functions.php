<?php
function register_my_session() {

	if ( ! session_id() ) {
        session_start();
    }
} 
add_action('init', 'register_my_session');
 
	 add_action( 'wp_enqueue_scripts', 'booastra_enqueue_styles' );
	 function booastra_enqueue_styles() {
		$parenthandle = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
		$theme = wp_get_theme();
		wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    ); 
 		wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
		if ( is_page('1102')){
			//wp_register_style( 'combined_inner_sliders-css', '/bamboo-mobile/wp-content/uploads/elementor/combined_inner_sliders.css', false, '', 'all' );
			//wp_enqueue_style( 'combined_inner_sliders-css' );
		}
		if ( is_page([19789,18731])){
		wp_register_style( 'select2css', '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css', false, '', 'all' );
		wp_register_script( 'alasql', '//cdn.jsdelivr.net/alasql/0.3/alasql.min.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'select2css' );
		wp_enqueue_script( 'select2' );
		wp_enqueue_script( 'alasql' );
			}
		if ( is_page([58212,1102])){	
			wp_register_style( 'slick-style', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', false, '', 'all' );
			wp_register_style( 'bootstrap-styles', '//cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css', false, '', 'all' );
			wp_register_script( 'slick-script', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array( 'jquery' ), '', true );
			wp_register_script( 'bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js', array( 'jquery' ), '', true );
			wp_enqueue_style( 'slick-style' );
			wp_enqueue_style( 'bootstrap-styles' );
			wp_enqueue_script( 'bootstrap' );
			wp_enqueue_script( 'slick-script' );
			}
	}
	add_action( 'wp_print_scripts', 'my_deregister_javascript', 100 );
 
		function my_deregister_javascript() {
			if ( !is_page('39') ) {
			wp_deregister_script( 'ttt_pnwc_micromodal-js' );
			wp_deregister_script( 'ttt-pnwc-js-extra' );
		}
	}

/* blog page categories styling */

 function estar_child_output_frontend() {
	If ( ! is_single() ) {
		return;
	}
	$categories = get_the_category();
	if (in_category('news')) {
	
	echo '<style>
		.elementor-post-info__terms-list {
			background: #A3D147;
		}
		.ue-grid-item-category a{
			background: #A3D147;
		}
	</style>';
	
} elseif (in_category('how-to-with-boo')) {
	
	echo '<style>
		.elementor-post-info__terms-list {
			background: #59DDC1;
		}
		.ue-grid-item-category a{
			background: #59DDC1;
		}
	</style>';
	
} else {
	
	echo '<style>
		.elementor-post-info__terms-list {
			background: #FCC44C;
		}
		.ue-grid-item-category a{
			background: #FCC44C;
		}
	</style>';
	
}
}
add_action( 'wp_head', 'estar_child_output_frontend' );

/* Creation of another user role */

add_role( 'site-manager', __('Site Manager' ), array( ) );

/* remove negative price display*/
add_filter( 'woocommerce_get_price_html', 'change_variable_products_price_display', 10, 2 );
function change_variable_products_price_display( $price, $product ) {

    // Only for variable products type
    if( ! $product->is_type('variable') ) return $price;

    $prices = $product->get_variation_prices( true );

    if ( empty( $prices['price'] ) )
        return apply_filters( 'woocommerce_variable_empty_price_html', '', $product );

    $min_price = current( $prices['price'] );
    $max_price = end( $prices['price'] );
    $prefix_html = '<span class="price-prefix">' . __('Up to ') . '</span>';

    $prefix = $min_price !== $max_price ? $prefix_html : ''; // HERE the prefix

    return apply_filters( 'woocommerce_variable_price_html', $prefix . wc_price( $max_price ) . $product->get_price_suffix(), $product );
}

/* limit the cart value to 2 */

// Checking and validating when products are added to cart
add_filter( 'woocommerce_add_to_cart_validation', 'only_two_items_allowed_add_to_cart', 10, 3 );

function only_two_items_allowed_add_to_cart( $passed, $product_id, $quantity ) {

    $cart_items_count = WC()->cart->get_cart_contents_count();
    $total_count = $cart_items_count + $quantity;

    if( $cart_items_count >= 2 || $total_count > 2 ){
         //Set to false
        $passed = false;
        // Display a message
         wc_add_notice( __( "We are sorry Boo is only able to Process two devices at once, if you wish to sell more devices, please complete this order first and then create a new order.", "woocommerce" ), "error" );
    }
    return $passed;
}
// Checking and validating when updating cart item quantities when products are added to cart
add_filter( 'woocommerce_update_cart_validation', 'only_two_items_allowed_cart_update', 10, 4 );
function only_two_items_allowed_cart_update( $passed, $cart_item_key, $values, $updated_quantity ) {

    $cart_items_count = WC()->cart->get_cart_contents_count();
    $original_quantity = $values['quantity'];
    $total_count = $cart_items_count - $original_quantity + $updated_quantity;

    if( $cart_items_count > 2 || $total_count > 2 ){
        // Set to false
        $passed = false;
        // Display a message
         wc_add_notice( __( "We are sorry Boo is only able to Process two devices at once, if you wish to sell more devices, please complete this order first and then create a new order.", "woocommerce" ), "error" );
    }
    return $passed;
}

// to show a popup on quantity change in basket
add_shortcode( 'cart_fragments', 'misha_add_to_cart_fragment' );
	
function misha_add_to_cart_fragment() {
	ob_start();
	?>
    <input id="mini-cart-count" value="<?php echo WC()->cart->get_cart_contents_count(); ?>">
	<input class="header-cart-count" value="<?php echo WC()->cart->get_cart_contents_count(); ?>">
    <?php
        $cart_fragments = ob_get_clean();
    return $cart_fragments;
 }
add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

function iconic_cart_count_fragments( $fragments ) {
    
    $fragments['input.header-cart-count'] = '<input class="header-cart-count" value="' . WC()->cart->get_cart_contents_count() . '" >';
    
    return $fragments;
    
}
add_action( 'wp_footer', 'bbloomer_cart_refresh_update_qty', 10, 5 );

function bbloomer_cart_refresh_update_qty() {
		
    if (is_cart()) {
		
		  ?>
        <script type="text/javascript">
		jQuery( document ).ready( function() { //wait for the page to load
			setInterval(function(){
			jQuery('.more-devices').on('click', function() { 
				var headerCount = parseInt(jQuery('.header-cart-count').val());
				if ( headerCount <= 1){ 
					window.location.href = 'https://www.skylinemicrosites.co.uk/bamboo-mobile/start-selling/';
				} 
				if ( headerCount > 1){ 
					setTimeout(function(){jQuery( '#warningMessage' ).trigger( 'click' );}, 0); 
				}
			});	
			jQuery('.quantity').on('change', 'input.qty', function(){
				jQuery( '.actions button' ).trigger( 'click' );
				if (jQuery(this).val() == 2){
					
					if (jQuery('#mini-cart-count').val() == 2) {
						setTimeout(function(){jQuery( '#warningMessage' ).trigger( 'click' )}, 0);	
						jQuery('.more-devices').on('click', function() { setTimeout(function(){jQuery( '#warningMessage' ).trigger( 'click' )}, 0); });
					}
					if(jQuery('#mini-cart-count').val() == 1) {
						jQuery('.more-devices').on('click', function() { window.location.href = 'https://www.skylinemicrosites.co.uk/bamboo-mobile/start-selling/'; });
					}
				}
				if (jQuery(this).val() > 2){
					if (jQuery('#mini-cart-count').val() == 2) { 	
					setTimeout(function(){jQuery( '#warningMessage' ).trigger( 'click' )}, 0);
					jQuery('.more-devices').on('click', function() { setTimeout(function(){jQuery( '#warningMessage' ).trigger( 'click' )}, 0); });
					}
					if(jQuery('#mini-cart-count').val() == 1) {
					setTimeout(function(){jQuery( '#warningMessage' ).trigger( 'click' )}, 0);
					jQuery('.more-devices').on('click', function() { setTimeout(function(){jQuery( '#warningMessage' ).trigger( 'click' )}, 0); });	
					}
				}
				});
			jQuery('.page-id-38 .dialog-lightbox-close-button').click(function(){
				jQuery( '.actions button' ).trigger( 'click' );
			});
			}, 3000);
			
		});
        </script>
        <?php
		//}
    }
	
	if ( is_product() ){
		
		?>
        <script type="text/javascript">
		jQuery( document ).ready( function() { //wait for the page to load
			setInterval(function(){
				if (jQuery('#mini-cart-count').val() >= 2) {
					jQuery('.single_add_to_cart_button').on('click', function(e) {
						e.preventDefault();
						setTimeout(function(){jQuery( '#warningMessage' ).trigger( 'click' )}, 0);
					});
				}
			}, 1000);
		});
		</script>
		<?php
	}
}

//Change the 'Billing details' checkout label to 'Your details'
function wc_billing_field_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
	case 'Billing details' :
	$translated_text = __( 'Your details', 'woocommerce' );
	break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'wc_billing_field_strings', 20, 3 );

//Change the WooCommerce Checkout Error Messages
add_action( 'woocommerce_after_checkout_validation', 'quadlayers', 9999, 2);
function quadlayers( $fields, $errors ){
	// in case any validation errors
	if( !empty( $errors->get_error_codes() ) ) {

	// omit all existing error messages
	foreach( $errors->get_error_codes() as $code ) {
	$errors->remove( $code );
	}
	// display custom single error message
	$errors->add( 'validation', 'Uh-oh! One or more fields have an error. Please check and try again.' );
	}
}

// to remove payment method from WooCommerce confirmation notifications using hooks:

add_filter( 'woocommerce_get_order_item_totals', 'remove_paymeny_method_row_from_confirmation', 10, 3 );
function remove_paymeny_method_row_from_confirmation( $total_rows, $order, $tax_display ){
    // On Email notifications only
    if ( ! is_wc_endpoint_url() ) {
        unset($total_rows['payment_method']);
    }
    return $total_rows;
}

// to change 'cart' to 'basket'
add_filter( 'gettext', 'te_change_cart_to_basket' );
add_filter( 'ngettext', 'te_change_cart_to_basket' );

function te_change_cart_to_basket( $string ) {
  $string = str_ireplace( 'cart', 'Basket', $string );
  return $string;
}

/* To Change Place Order Text In WooCommerce Checkout */
add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' ); 

function woo_custom_order_button_text() {
    return __( 'Sell my device', 'woocommerce' ); 
}

/* To change the image size in the AJAX search results. */
function func_is_ajax_image_size( $image ) {
    $image = 'full';
    return $image;
}
add_filter( 'is_ajax_image_size', 'func_is_ajax_image_size' );

// default shipping address enable
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_true');

//checkout price fields
add_shortcode( 'woo_checkout_total', 'checkout_total_price_shortcode' );
function checkout_total_price_shortcode() {
    $my_checkout_total = WC()->cart->get_cart_total();
	return $my_checkout_total;
}

//remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
//add_action('woocommerce_after_checkout_form', 'woocommerce_checkout_coupon_form');

//current session user name print 
add_shortcode( 'latest_session_variables', 'latest_session_variables_print' );

function latest_session_variables_print() {

	$current_token = $_SESSION['token_user'];
	$current_user_name = $_SESSION['user_name'];
	
	return $current_user_name;
}
//current session token print 
add_shortcode( 'latest_token_variables', 'latest_token_variables_print' );

function latest_token_variables_print() {
	ob_start();
	$current_token = $_SESSION['token_user'];
	if ($current_token){
		echo '<p ID="footerToken">' . $current_token . '</P>';
	}
	
	$current_footer_token = ob_get_clean();
	return $current_footer_token;
}

//current session bm account print 
add_shortcode( 'latest_session_bmaccount', 'latest_BMaccount_variables_print' );

function latest_BMaccount_variables_print() {

	$current_bmaccount = $_SESSION['bm_account'];
		
	return $current_bmaccount;
}

//current session user print 
add_shortcode( 'latest_session_useremail', 'latest_session_useremail_print' );

function latest_session_useremail_print() {

	$current_loggedin_user = $_SESSION['current_user'];
	return $current_loggedin_user;
}
// error existed email signup message shortcode

add_shortcode( 'existed_email_signup_message', 'existed_email_signup_error_message_shortcode'); 

function existed_email_signup_error_message_shortcode() {
	
	$retrived_message = $_SESSION['signup_message'];
	return $retrived_message;
}


//current cart values print for checkout page
add_shortcode( 'current_session_cart_values', 'current_session_cart_values_print' );

function current_session_cart_values_print() {
	ob_start();
	global $woocommerce;
    $items = $woocommerce->cart->get_cart();
	$totalPrice = $woocommerce->cart->get_cart_total();
	$jobsAarray = [];
	$i=0;
        foreach($items as $item => $values) { 
			$product_id = $values['product_id'];
			$_product =  wc_get_product( $values['data']->get_id()); 
			$variation_id = $_product->get_id();
			$variation_data = $_product->get_variation_attributes();
			$variation_detail = woocommerce_get_formatted_variation( $variation_data, true );
			$variation_price = get_post_meta($values['variation_id'] , '_price', true);
			$network = $_product->get_attribute( 'pa_network' );
			$memory = $_product->get_attribute( 'pa_memory-size' );
			$condition = $_product->get_attribute( 'pa_condition' );
			$product_brand = get_the_terms( $product_id, 'pwb-brand' );
					
			$jobsAarray[$i]['memoryValue'] = $memory;
			$jobsAarray[$i]['variationsPrice'] = $variation_price;
			$jobsAarray[$i]['current-variation'] = $variation_id;
			$jobsAarray[$i]['current-product'] = $product_id;
			$jobsAarray[$i]['quantityValue'] = $values['quantity'];
			$jobsAarray[$i]['Manufacturer'] = $product_brand[0]->name;
			$jobsAarray[$i]['Model'] = $_product->get_title();
			$jobsAarray[$i]['MobilePhoneNetwork'] = $network;
			$jobsAarray[$i]['CustomerGrade'] = $condition;
			$jobsAarray[$i]['OfferPrice'] = $values['line_subtotal'];
			$i=$i+1;
        }
	$current_user = $_SESSION['current_user'];
	
	
	$modelManufacturer1 = $jobsAarray[0]['Manufacturer'];
	$modleName1 = $jobsAarray[0]['Model'];
	$modelManufacturer2 = $jobsAarray[1]['Manufacturer'];
	$modleName2 = $jobsAarray[1]['Model'];
	if ($modleName1){
	$modelModif1 = ucfirst(strtolower($modelManufacturer1));
	$modelNumber1 = str_replace($modelModif1,"",$modleName1);
	}
	if ($modleName2){
	$modelModif2 = ucfirst(strtolower($modelManufacturer2));
	$modelNumber2 = str_replace($modelModif2,"",$modleName2);
	}
	
	$quantityCheck = $jobsAarray[0]['quantityValue'];

	if ($quantityCheck > 1){
		
		echo "<b id='userName'>" . $current_user ."</b>";
		echo "<b id='deviceName1'>".$modelNumber1."</b>";
		echo "<b id='quantityValue1'>1</b>";
		echo "<b id='subtotal_price1'>".$jobsAarray[0]['variationsPrice']."</b>"; 	
		echo "<b id='current-product1'>".$jobsAarray[0]['current-product'].'</b>';
		echo "<b id='current-variation1'>".$jobsAarray[0]['current-variation'].'</b>';
		echo "<b id='variationsPrice1'>" .$jobsAarray[0]['variationsPrice']."</b>";
		echo "<b id='networkName1'>" .$jobsAarray[0]['MobilePhoneNetwork'] ."</b>";
		echo "<b id='memoryValue1'>" .$jobsAarray[0]['memoryValue'] ."</b>";
		echo "<b id='conditionName1'>" .$jobsAarray[0]['CustomerGrade'] ."</b>";
		echo "<b id='brandName1'>" .$jobsAarray[0]['Manufacturer'] ."</b>";
		echo "<b id='deviceName2'>".$modelNumber1."</b>";
		echo "<b id='quantityValue2'>1</b>";
		echo "<b id='subtotal_price2'>".$jobsAarray[0]['variationsPrice']."</b>"; 	
		echo "<b id='current-product2'>".$jobsAarray[0]['current-product'].'</b>';
		echo "<b id='current-variation2'>".$jobsAarray[0]['current-variation'].'</b>';
		echo "<b id='variationsPrice2'>" .$jobsAarray[0]['variationsPrice']."</b>";
		echo "<b id='networkName2'>" .$jobsAarray[0]['MobilePhoneNetwork'] ."</b>";
		echo "<b id='memoryValue2'>" .$jobsAarray[0]['memoryValue'] ."</b>";
		echo "<b id='conditionName2'>" .$jobsAarray[0]['CustomerGrade'] ."</b>";
		echo "<b id='brandName2'>" .$jobsAarray[0]['Manufacturer'] ."</b>";
		echo "<b id='wooTotal'>" . $totalPrice ."</b>";
	} else {
		echo "<b id='userName'>" . $current_user ."</b>";
		echo "<b id='deviceName1'>".$modelNumber1."</b>";
		echo "<b id='quantityValue1'>".$jobsAarray[0]['quantityValue']."</b>";
		echo "<b id='subtotal_price1'>".$jobsAarray[0]['variationsPrice']."</b>"; 	
		echo "<b id='current-product1'>".$jobsAarray[0]['current-product'].'</b>';
		echo "<b id='current-variation1'>".$jobsAarray[0]['current-variation'].'</b>';
		echo "<b id='variationsPrice1'>" .$jobsAarray[0]['variationsPrice']."</b>";
		echo "<b id='networkName1'>" .$jobsAarray[0]['MobilePhoneNetwork'] ."</b>";
		echo "<b id='memoryValue1'>" .$jobsAarray[0]['memoryValue'] ."</b>";
		echo "<b id='conditionName1'>" .$jobsAarray[0]['CustomerGrade'] ."</b>";
		echo "<b id='brandName1'>" .$jobsAarray[0]['Manufacturer'] ."</b>";
		echo "<b id='deviceName2'>".$modelNumber2."</b>";
		echo "<b id='quantityValue2'>".$jobsAarray[1]['quantityValue']."</b>";
		echo "<b id='subtotal_price2'>".$jobsAarray[1]['variationsPrice']."</b>"; 	
		echo "<b id='current-product2'>".$jobsAarray[1]['current-product'].'</b>';
		echo "<b id='current-variation2'>".$jobsAarray[1]['current-variation'].'</b>';
		echo "<b id='variationsPrice2'>" .$jobsAarray[1]['variationsPrice']."</b>";
		echo "<b id='networkName2'>" .$jobsAarray[1]['MobilePhoneNetwork'] ."</b>";
		echo "<b id='memoryValue2'>" .$jobsAarray[1]['memoryValue'] ."</b>";
		echo "<b id='conditionName2'>" .$jobsAarray[1]['CustomerGrade'] ."</b>";
		echo "<b id='brandName2'>" .$jobsAarray[1]['Manufacturer'] ."</b>";
		echo "<b id='wooTotal'>" . $totalPrice ."</b>";
	}
	
	$current_cart_items = ob_get_clean();
	return $current_cart_items;
}

// checkout page cart session message when cart value is empty
add_shortcode( 'cart_session_message', 'cart_session_message_print' );

function cart_session_message_print() {

	if ( WC()->cart->is_empty() ) {
		$message = "<h3 style='padding:0 50px;text-align:center;'>Your basket is empty please add a device to start selling.</h3><a class='main-selling-btn' href='/bamboo-mobile/start-selling/'>Start Selling</a>";
		return $message;
	}
}

// pulling and display order confirmation ID
add_shortcode( 'new_order_confirmation', 'show_order_confirmation_ID' );

function show_order_confirmation_ID() {
	$new_order_confirmation = $_SESSION['order_id'];
	return $new_order_confirmation;
}

// showing order details through shortcode
add_shortcode( 'custom_details_product', 'custom_order_details_print' );

function custom_order_details_print() {
	ob_start();
		global $product;
		
	if ( $_SESSION['current_user'] != '' ) {	
		$ord_id_1 = sanitize_text_field( $_SESSION['product_cart1'] );
		$ord_id_2 = sanitize_text_field( $_SESSION['product_cart2'] );
		if ($ord_id_1){
		$product = wc_get_product( $ord_id_1 );
		$ord_device_name_one = $product->get_name();
		$thumbnail_one = $product->get_image();
		}
		if ($ord_id_2){
		$prdocut = wc_get_product( $ord_id_2 );
		$ord_device_name_two = $prdocut->get_name();
		$thumbnail_two = $prdocut->get_image();
		}
		$variation_id_1 = sanitize_text_field( $_SESSION['product_variation1'] );
		$variation_id_2 = sanitize_text_field( $_SESSION['product_variation2'] );
		$variation_price_one = get_post_meta( $variation_id_1 , '_price', true );
		$variation_price_two = get_post_meta( $variation_id_2 , '_price', true );
		$total_order_price = sanitize_text_field( $_SESSION['cart_total'] );
		$selected_network_one = sanitize_text_field( $_SESSION['networkName1'] );
		$selected_network_two = sanitize_text_field( $_SESSION['networkName2'] );
		$selected_memory_one = sanitize_text_field( $_SESSION['msizeName1'] );
		$selected_memory_two = sanitize_text_field( $_SESSION['msizeName2'] );
		$selected_condition_one = sanitize_text_field( $_SESSION['gradeName1'] );
		$selected_condition_two = sanitize_text_field( $_SESSION['gradeName2'] );
		$order_quantity_one = sanitize_text_field( $_SESSION['quantityOne'] );
		$order_quantity_two = sanitize_text_field( $_SESSION['quantityTwo'] );
		$device_price_one = sanitize_text_field( $_SESSION['device_priceOne'] );
		$device_price_two = sanitize_text_field( $_SESSION['device_priceTwo'] );
	}	
		
	if ($ord_id_2){ 	
		$doubleDevice_html = '<table><tbody><tr><td class="product-name device-image"><div class="ts-product-image">'. $thumbnail_one .'</div></td><td class="product-name"><h5>'. $ord_device_name_one .'</h5><p>Network : ' . $selected_network_one . '</p><p>Memory : '. $selected_memory_one .'</p><p>Grade : '. $selected_condition_one .'</p></td><td class="product-name quantity"><h5>Quantity</h5><p class="item-quantity">'. $order_quantity_one .'</p></td><td class="product-name price"><h5>Total Price</h5><p class="item-price">£'. $device_price_one .'</p></td></tr><tr><td class="product-name"><div class="ts-product-image">'. $thumbnail_two .'</div></td><td class="product-name"><h5>'. $ord_device_name_two .'</h5><p>Network : ' . $selected_network_two . '</p><p>Memory : '. $selected_memory_two .'</p><p>Grade : '. $selected_condition_two .'</p></td><td class="product-name quantity"><h5>Quantity</h5><p class="item-quantity">'. $order_quantity_two .'</p></td><td class="product-name price"><h5>Total Price</h5><p class="item-price">£'. $device_price_two .'</p></td></tr></tbody><tfoot><tr><td></td><td></td><td><p style="margin-bottom: 0px;text-align:center;">Subtotal</p><p style="margin-bottom: 0px;text-align:center;">'.$total_order_price.'</p></td><td><h5 style="margin-bottom: 0px;text-align:center;">TOTAL</h5><h5 style="margin-bottom: 0px;color:#40B52F;text-align:center;">'.$total_order_price.'</h5></td></tr></tfoot></table>';
		echo $doubleDevice_html;
	} else{
		$singleDevice_html = '<table><tbody><tr><td class="product-name device-image"><div class="ts-product-image">'. $thumbnail_one .'</div></td><td class="product-name"><h5>'. $ord_device_name_one .'</h5><p>Network : ' . $selected_network_one . '</p><p>Memory : '. $selected_memory_one .'</p><p>Grade : '. $selected_condition_one .'</p></td><td class="product-name quantity"><h5>Quantity</h5><p class="item-quantity">'. $order_quantity_one .'</p></td><td class="product-name price"><h5>Total Price</h5><p class="item-price">£'. $device_price_one .'</p></td></tr></tbody><tfoot><tr><td></td><td></td><td><p style="margin-bottom: 0px;text-align:center;">Subtotal</p><p style="margin-bottom: 0px;text-align:center;">'.$total_order_price.'</p></td><td><h5 style="margin-bottom: 0px;text-align:center;">TOTAL</h5><h5 style="margin-bottom: 0px;color:#40B52F;text-align:center;">'.$total_order_price.'</h5></td></tr></tfoot></table>';
		echo $singleDevice_html;
	}
	$order_items = ob_get_clean();
	return $order_items;
}


// Disable the gallery zoom on single products
function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
    remove_theme_support( 'wc-product-gallery-lightbox' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );

add_filter('woocommerce_single_product_image_thumbnail_html','wc_remove_link_on_thumbnails' );
 
function wc_remove_link_on_thumbnails( $html ) {
     return strip_tags( $html,'<img>' );
}

// post feature image as a background div
add_shortcode( 'post_feature_image', 'post_thumbnails_feature_image' );

function post_thumbnails_feature_image( $atts ) {
    ob_start();
	if ( has_post_thumbnail() ) :
		$clgpImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
		<div class="featureImagerow" style="background: url('<?php echo $clgpImg[0]; ?>') no-repeat; background-size: cover; background-position: center center; width: 100%;height: 676px;"></div> 							
       <?php endif; 
		$fImage = ob_get_clean();
		return $fImage;
}


// product search option tag in contact form 7

add_action( 'wpcf7_init', 'custom_add_form_tag_customlist' );

function custom_add_form_tag_customlist() {
    wpcf7_add_form_tag( array( 'customlist', 'customlist*' ), 
'custom_customlist_form_tag_handler', true );
}

function custom_customlist_form_tag_handler( $tag ) {

    $tag = new WPCF7_FormTag( $tag );

    if ( empty( $tag->name ) ) {
        return '';
    }

    $customlist = '';

    $query = new WP_Query(array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby'       => 'title',
        'order'         => 'ASC',
    ));

    while ($query->have_posts()) {
        $query->the_post();
        $post_title = get_the_title();
        $customlist .= sprintf( '<option value="%1$s">%2$s</option>', esc_html( $post_title ), esc_html( $post_title ) );
    }
	wp_reset_postdata(); 
	wp_reset_query();

    $customlist = sprintf('<select class="wc-product-search" name="%1$s" id="%2$s"><option value="-">-</option>%3$s</select>', $tag->name,
    $tag->name . '-options',
        $customlist );

    return $customlist;
}

// comments post API

function add_comment_fields($fields) {
    $fields['pagetype'] = '<p class="comment-form-hiddenfield"><input id="pagetype" name="pagetype" type="hidden" size="30" value="newscomments"/></p>';
	$mypost = get_page_by_title( 'Your post title goes here', '', 'post' );;
	$fields['blogid'] = '<p class="comment-form-hiddenfield"><input id="blogid" name="blogid" type="hidden" size="30" value="' . get_the_id() .'"/></p>';
    return $fields;
}
add_filter('comment_form_default_fields','add_comment_fields');

add_action( 'comment_post', 'send_comment_data_syline' );

function send_comment_data_syline(){
	if (isset($_POST['submit'])) {
		$data =	[
			'Name' => $_POST['author'],
			'BMNewsBlogID' => $_POST['blogid'],
			'Email' => $_POST['email'],
			'Comment' => $_POST['comment'],
			'PageType' => $_POST['pagetype'],
		]; 
			
        $url = '/bamboo_development/RestAPI/BambooMobileViewAPI/';
		
		$data = wp_json_encode( $data );
		
		$args = [
			'headers' => array(
			   'Content-Type' => 'application/json',
			   'Authorization' => 'Basic xxxxxxxxxxxxxxxxx'
			),
			'method' => 'POST',
			'body'   => $data,
		];

		$response = wp_remote_post( $url, $args );
		// error check
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			return "Something went wrong: $error_message";
		}
		
		$result = json_decode( wp_remote_retrieve_body( $response ) ); // decode the JSON feed
		
		$errmsg = $result->RawData->Message;
	}
}

// find out all the handles used by plugins

function wpb_display_pluginhandles() { 
$wp_scripts = wp_scripts(); 
$handlename .= "<ul>"; 
    foreach( $wp_scripts->queue as $handle ) :
      $handlename .=  '<li>' . $handle .'</li>';
    endforeach;
$handlename .= "</ul>";
return $handlename; 
}
add_shortcode( 'pluginhandles', 'wpb_display_pluginhandles'); 

// find a taxonomy in other taxonomy

		function get_taxovalues_in_another_taxo_from_a_product_categories($taxonomy_tofind, $taxonomy_known, $cat_term_slug)
		{
			global $wpdb;
			$results = $wpdb->get_results("
			SELECT DISTINCT
				t1.*
			 FROM    {$wpdb->prefix}terms t1
				INNER JOIN {$wpdb->prefix}term_taxonomy tt1
					ON  t1.term_id = tt1.term_id 
				INNER JOIN {$wpdb->prefix}term_relationships tr1
					ON  tt1.term_taxonomy_id = tr1.term_taxonomy_id
				INNER JOIN {$wpdb->prefix}term_relationships tr2
					ON  tr1.object_id = tr2.object_id
				INNER JOIN {$wpdb->prefix}term_taxonomy tt2
					ON  tr2.term_taxonomy_id = tt2.term_taxonomy_id         
				INNER JOIN {$wpdb->prefix}terms t2
					ON  tt2.term_id = t2.term_id
			WHERE
				tt1.taxonomy = '$taxonomy_tofind'
				AND tt2.taxonomy = '$taxonomy_known'
				AND  t2.slug = '$cat_term_slug'
			ORDER BY t1.name
			");
			
			$return = [];
			if (!empty($results)) {
				$term_names = [];

			foreach ($results as $result) {	
								
					$term_link = get_term_link(get_term($result->term_id, $taxonomy_tofind), $taxonomy_tofind);
					$term_names[] = '<a class="' . $result->slug . '" href="' . $term_link . '">'
						. $result->name . '</a>';
					$term_images[] = array('tab_title'=>  $result->name, 'tab_image' =>	wp_get_attachment_image( get_term_meta( $result->term_id, 'pwb_brand_image', 1 ), $atts['image_size'] ));
				}
				
				$return = $term_images;
			}
			return $return;
		}

// Mobiles brands shortcode

add_shortcode( 'mobile_brands_list', 'mobile_brands_shortcode_list'); 

function mobile_brands_shortcode_list() {
		ob_start();
		
		?>
<div class="step-menu">	
		<h3>step 2: select the make of your device</h3>
	<ul class="nav nav-tabs" id="lb-tabs">
		<?php
		// searching 'pwb-brand' associated to product_cat "tablets"
		$brands = get_taxovalues_in_another_taxo_from_a_product_categories('pwb-brand', 'product_cat', 'mobile-phones');
		//print(implode("", $brands[0]));
		
		//set the current tab to be the first one in the list.... or whatever one you specify
        $current_tab = $brands[0]['tab_title'];
		$current_tab_tittle = $brands[0]['tab_image'];
		
		foreach ($brands as $row):
        //set the class to "active" for the active tab.
        $tab_class = ($row['tab_title']==$current_tab) ? 'active' : '' ;
        echo '<li class="'.$tab_class.'"><a href="#' . urlencode(strtolower($row['tab_title'])) .  '" data-toggle="tab">' .           
        $row['tab_image'] .  ' </a></li>';
		endforeach;
		?>
    </ul><!-- /nav-tabs -->
	<div class="tab-content" id="mobileTab-content">
        <?php foreach ($brands as $row2): 
        $tab = strtolower($row2['tab_title']);
		
		//set the class to "active" for the active content.
        $content_class = ($tab==$current_tab) ? 'active' : '' ;
        ?>
		<div class="tab-pane <?php echo $content_class;?>" id="<?php echo $tab; //--  this right here is from yoru code, but there was no "echo" ?>">
            		<?php $query = new WP_Query(array(
							'post_type' => 'product',
							'post_status' => 'publish',
							'orderby'       => 'title',
							'order'         => 'ASC',
							'tax_query' => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'product_cat',
									'field' => 'slug',
									'terms' => 'mobile-phones'
								),
								array(
									'taxonomy' => 'pwb-brand',
									'field' => 'slug',
									'terms' => $row2['tab_title']
								)
							)
						));?>
					<h3>
                        step 3: select your model
                    </h3>
                    <div class="BMDTSC-SecondTitle">
                        <h6>Not sure what model your device is? Don’t worry, let us know, we’ll be happy to help</h6>
                        <a href="/bamboo-mobile/contact/"><i class="Bicon-Right-arrow"></i></a>
                    </div>	
					<div class="BM-ProductScrollSlider">
					<?php while ($query->have_posts()) {
								$query->the_post();?>
							<div class="BM-ProductScroll">
							   <!-- Notice that both the image and the product title are in the same link. This can massively reduce the number of redundant tabstops on a page with lots of products, creating a better UX for keyboard-only and screen reader users. -->
										<div class="BM-Product-main-link">
											<?php $post_title = get_the_title();?>
											<h2 class="title"><?php echo $post_title; ?></h2>
										   	<div class="image">
												<?php the_post_thumbnail(); ?>
											</div>
											<div class="stab_details">
												<a class="" href="<?php echo the_permalink(); ?>"><button class="BM-CardButton">Sell this Device</button></a>
											</div>
										</div>
							</div>
						<?php } ?>
					</div>
					<?php $brandCategory = '/bamboo-mobile/shop/?pwb-brand='.strtolower($row2['tab_title']).'&product_cat=mobile-phones';?>
					<a class="BMDTSC-SecondTitleBottom" href="<?php echo $brandCategory; ?>">
                        <h5>See more devices</h5>
                        <i class="Bicon-Right-arrow"></i>
                    </a>
					<?php wp_reset_postdata(); 
						  wp_reset_query();
								?>
        </div><!-- /tab-pane  -->
    <?php endforeach; ?>
    </div><!-- /tab-content  -->
	</div>
<?php

		return ob_get_clean();
}


// Tablet brands shortcode

add_shortcode( 'tablets_brands_list', 'tablets_brands_shortcode_list'); 

function tablets_brands_shortcode_list() {
		ob_start();
		
		?>
<div class="step-menu">	
		<h3>step 2: select the make of your device</h3>
	<ul class="nav nav-tabs" id="lb-tabs">
		<?php
		// searching 'pwb-brand' associated to product_cat "tablets"
		$brands = get_taxovalues_in_another_taxo_from_a_product_categories('pwb-brand', 'product_cat', 'tablets');
		//print(implode("", $brands[0]));
		
		$categoryext = "tablets";
		//set the current tab to be the first one in the list.... or whatever one you specify
        $current_tab = $brands[0]['tab_title'];
		$current_tab_tittle = $brands[0]['tab_image'];
		
		foreach ($brands as $row):
        //set the class to "active" for the active tab.
        $tab_class = ($row['tab_title']==$current_tab) ? 'active' : '' ;
        echo '<li class="'.$tab_class.'"><a href="#' . urlencode(strtolower($row['tab_title'].'-'.$categoryext)) .  '" data-toggle="tab">' .           
        $row['tab_image'] .  ' </a></li>';
		endforeach;
		?>
    </ul><!-- /nav-tabs -->
	<div class="tab-content" id="tabletTab-content">
        <?php foreach ($brands as $row2): 
        $tab = strtolower($row2['tab_title'].'-'.$categoryext);
		
		//set the class to "active" for the active content.
        $content_class = ($tab==$current_tab) ? 'active' : '' ;
        ?>
		<div class="tab-pane <?php echo $content_class;?>" id="<?php echo $tab; //--  this right here is from yoru code, but there was no "echo" ?>">
            		<?php $query = new WP_Query(array(
							'post_type' => 'product',
							'post_status' => 'publish',
							'posts_per_page' => -1,
							'orderby'       => 'title',
							'order'         => 'ASC',
							'tax_query' => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'product_cat',
									'field' => 'slug',
									'terms' => 'tablets'
								),
								array(
									'taxonomy' => 'pwb-brand',
									'field' => 'slug',
									'terms' => $row2['tab_title']
								)
							)
						));?>
					<h3>
                        step 3: select your model
                    </h3>
                    <div class="BMDTSC-SecondTitle">
                        <h6>Not sure what model your device is? Don’t worry, let us know, we’ll be happy to help</h6>
                        <a href="/bamboo-mobile/contact/"><i class="Bicon-Right-arrow"></i></a>
                    </div>	
					<div class="BM-ProductScrollSlider">
					<?php while ($query->have_posts()) {
								$query->the_post();?>
							<div class="BM-ProductScroll">
							   <!-- Notice that both the image and the product title are in the same link. This can massively reduce the number of redundant tabstops on a page with lots of products, creating a better UX for keyboard-only and screen reader users. -->
										<div class="BM-Product-main-link">
											<?php $post_title = get_the_title();?>
											<h2 class="title"><?php echo $post_title; ?></h2>
										   	<div class="image">
												<?php the_post_thumbnail(); ?>
											</div>
											<div class="stab_details">
												<a class="" href="<?php echo the_permalink(); ?>"><button class="BM-CardButton">Sell this Device</button></a>
											</div>
										</div>
							</div>
						<?php } ?>
					</div>
					<?php $brandCategory = '/bamboo-mobile/shop/?pwb-brand='.strtolower($row2['tab_title']).'&product_cat=tablets';?>
					<a class="BMDTSC-SecondTitleBottom" href="<?php echo $brandCategory; ?>">
                        <h5>See more devices</h5>
                        <i class="Bicon-Right-arrow"></i>
                    </a>
					<?php wp_reset_postdata(); 
						  wp_reset_query();
								?>
        </div><!-- /tab-pane  -->
    <?php endforeach; ?>
    </div><!-- /tab-content  -->
	</div>
<?php

		return ob_get_clean();
}

// Watches brands shortcode

add_shortcode( 'watch_brands_list', 'watch_brands_shortcode_list'); 

function watch_brands_shortcode_list() {
		ob_start();
		
		?>
<div class="step-menu">	
		<h3>step 2: select the make of your device</h3>
	<ul class="nav nav-tabs" id="lb-tabs">
		<?php
		// searching 'pwb-brand' associated to product_cat "tablets"
		$brands = get_taxovalues_in_another_taxo_from_a_product_categories('pwb-brand', 'product_cat', 'watches');
		//print(implode("", $brands[0]));
		$categoryext = "watches";
		//set the current tab to be the first one in the list.... or whatever one you specify
        $current_tab = $brands[0]['tab_title'];
		$current_tab_tittle = $brands[0]['tab_image'];
		
		foreach ($brands as $row):
        //set the class to "active" for the active tab.
        $tab_class = ($row['tab_title']==$current_tab) ? 'active' : '' ;
        echo '<li class="'.$tab_class.'"><a href="#' . urlencode(strtolower($row['tab_title'].'-'.$categoryext)) .  '" data-toggle="tab">' .           
        $row['tab_image'] .  ' </a></li>';
		endforeach;
		?>
    </ul><!-- /nav-tabs -->
	<div class="tab-content" id="watchTab-content">
        <?php foreach ($brands as $row2): 
        $tab = strtolower($row2['tab_title'].'-'.$categoryext);
		
		//set the class to "active" for the active content.
        $content_class = ($tab==$current_tab) ? 'active' : '' ;
        ?>
		<div class="tab-pane <?php echo $content_class;?>" id="<?php echo $tab; //--  this right here is from yoru code, but there was no "echo" ?>">
            		<?php $query = new WP_Query(array(
							'post_type' => 'product',
							'post_status' => 'publish',
							'orderby'       => 'title',
							'order'         => 'ASC',
							'tax_query' => array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'product_cat',
									'field' => 'slug',
									'terms' => 'watches'
								),
								array(
									'taxonomy' => 'pwb-brand',
									'field' => 'slug',
									'terms' => $row2['tab_title']
								)
							)
						));?>
					<h3>
                        step 3: select your model
                    </h3>
                    <div class="BMDTSC-SecondTitle">
                        <h6>Not sure what model your device is? Don’t worry, let us know, we’ll be happy to help</h6>
                        <a href="/bamboo-mobile/contact/"><i class="Bicon-Right-arrow"></i></a>
                    </div>	
					<div class="BM-ProductScrollSlider">
					<?php while ($query->have_posts()) {
								$query->the_post();?>
							<div class="BM-ProductScroll">
							   <!-- Notice that both the image and the product title are in the same link. This can massively reduce the number of redundant tabstops on a page with lots of products, creating a better UX for keyboard-only and screen reader users. -->
										<div class="BM-Product-main-link">
											<?php $post_title = get_the_title();?>
											<h2 class="title"><?php echo $post_title; ?></h2>
										   	<div class="image">
												<?php the_post_thumbnail(); ?>
											</div>
											<div class="stab_details">
												<a class="" href="<?php echo the_permalink(); ?>"><button class="BM-CardButton">Sell this Device</button></a>
											</div>
										</div>
							</div>
						<?php } ?>
					</div>
					<?php $brandCategory = '/bamboo-mobile/shop/?pwb-brand='.strtolower($row2['tab_title']).'&product_cat=watches';?>
					<a class="BMDTSC-SecondTitleBottom" href="<?php echo $brandCategory; ?>">
                        <h5>See more devices</h5>
                        <i class="Bicon-Right-arrow"></i>
                    </a>
					<?php wp_reset_postdata(); 
						  wp_reset_query();
								?>
        </div><!-- /tab-pane  -->
    <?php endforeach; ?>
    </div><!-- /tab-content  -->
	</div>
<?php

		return ob_get_clean();
}

// all mobile brands list shortcode

add_shortcode( 'all_mobile_brands_list', 'all_mobile_brands_shortcode_list'); 

function all_mobile_brands_shortcode_list( $atts ) {
	ob_start();
		
		?>
<div class="megamenu-list">	
	<ul class="brands-list">
		<?php
		// searching 'pwb-brand' associated to product_cat "tablets"
		$brands = get_taxovalues_in_another_taxo_from_a_product_categories('pwb-brand', 'product_cat', 'mobile-phones');
				
		//set the current brand name or image
        $current_brand = $brands[0]['tab_title'];
		$current_image = $brands[0]['tab_image'];
		
		foreach ($brands as $row):
		$titles = strtolower($row['tab_title']);
        echo '<li class="list '.strtolower($row['tab_title']).'"><a href="/bamboo-mobile/shop/?pwb-brand='.strtolower($row['tab_title']).'&product_cat=mobile-phones"><span class="list-text">Sell all '.           
        ucfirst($titles).' Phones</span><span class="list-icon"><i aria-hidden="true" class="iconbamboo icon-bambooright-arrow"></i></span></a></li>';
		endforeach;
		?>
    </ul><!-- /brands-list -->
	</div>
	<?php
		return ob_get_clean();
}

// all tablet brands list shortcode

add_shortcode( 'all_tablet_brands_list', 'all_tablet_brands_shortcode_list'); 

function all_tablet_brands_shortcode_list( $atts ) {
	ob_start();
		
		?>
<div class="megamenu-list">	
	<ul class="brands-list">
		<?php
		// searching 'pwb-brand' associated to product_cat "tablets"
		$brands = get_taxovalues_in_another_taxo_from_a_product_categories('pwb-brand', 'product_cat', 'tablets');
				
		//set the current brand name or image
        $current_brand = $brands[0]['tab_title'];
		$current_image = $brands[0]['tab_image'];
		
		foreach ($brands as $row):
		$titles = strtolower($row['tab_title']);
        echo '<li class="list '.strtolower($row['tab_title']).'"><a href="/bamboo-mobile/shop/?pwb-brand='.strtolower($row['tab_title']).'&product_cat=tablets"><span class="list-text">Sell all '.           
        ucfirst($titles).' Tablets</span><span class="list-icon"><i aria-hidden="true" class="iconbamboo icon-bambooright-arrow"></i></span></a></li>';
		endforeach;
		?>
    </ul><!-- /brands-list -->
	</div>
	<?php
		return ob_get_clean();
}

// all watch brands list shortcode

add_shortcode( 'all_watch_brands_list', 'all_watch_brands_shortcode_list'); 

function all_watch_brands_shortcode_list( $atts ) {
	ob_start();
		
		?>
<div class="megamenu-list">	
	<ul class="brands-list">
		<?php
		// searching 'pwb-brand' associated to product_cat "tablets"
		$brands = get_taxovalues_in_another_taxo_from_a_product_categories('pwb-brand', 'product_cat', 'watches');
				
		//set the current brand name or image
        $current_brand = $brands[0]['tab_title'];
		$current_image = $brands[0]['tab_image'];
		
		foreach ($brands as $row):
		$titles = strtolower($row['tab_title']);
        echo '<li class="list '.strtolower($row['tab_title']).'"><a href="/bamboo-mobile/shop/?pwb-brand='.strtolower($row['tab_title']).'&product_cat=watches"><span class="list-text">Sell all '.           
        ucfirst($titles).' watches</span><span class="list-icon"><i aria-hidden="true" class="iconbamboo icon-bambooright-arrow"></i></span></a></li>';
		endforeach;
		?>
    </ul><!-- /brands-list -->
	</div>
	<?php
		return ob_get_clean();
}

// sales status button shortcode

add_shortcode( 'sales_status', 'bamboo_sales_status_shortcode'); 

function bamboo_sales_status_shortcode() {
	ob_start();
	$booking_id = $_SESSION['job_id'];
	$order_id = $_SESSION['order_id']; 
	$tokenKey = $_SESSION['token_user'];
	
	if ($booking_id){
		echo '<a href="/bamboo_development/BambooMobile/getUserTokenusedData/?TokenisedKey='.$tokenKey.'&OrderID='.$order_id.'&BookingID='.$booking_id.'" class="sales-status">Check Sales Status</a>';
	} else {
		echo '<a href="/bamboo_development/BambooMobile/getUserTokenusedData/?TokenisedKey='.$tokenKey.'&accountOverview=MySales" class="sales-status">Check Sales Status</a>';
	}
	
	$current_job_status = ob_get_clean();
	return $current_job_status;
}

// Delivery Note Print shortcode

add_shortcode( 'delivery_note_print', 'bamboo_sales_delivery_note_print_shortcode'); 

function bamboo_sales_delivery_note_print_shortcode() {
	ob_start();
	$booking_id = $_SESSION['job_id'];
	$order_id = $_SESSION['order_id']; 
	$tokenKey = $_SESSION['token_user'];
	$embed_order = base64_encode( $order_id );
	$encoded_value = str_replace('==','||', $embed_order);
	
	if ($order_id){
		echo '<a href="/bamboo_development/BambooMobile/reprintTradePack/'. $encoded_value .'" id="delivery_Note" target="_blank"><i aria-hidden="true" class="iconbamboo icon-bambootick-circle"></i></a>';
	} else{
		echo '<a href="" id="delivery_Note"><i aria-hidden="true" class="iconbamboo icon-bambootick-circle"></i></a>';
	}
	
	$job_delivery_note = ob_get_clean();
	return $job_delivery_note;
}
// get remove button URL href to a variable and save it on session

add_action('wp_footer','custom_jquery_add_to_cart_script');
function custom_jquery_add_to_cart_script(){
    if ( is_page( 'cart' ) || is_cart() ) : // Only for cart pages
        ?>
            <script type="text/javascript">
                // Ready state
                jQuery( document ).ready( function($) {

                    $( document.body ).on( 'added_to_cart', function(){
                        var sample_href = $('a.remove').attr('href');
							
                    });

                }); // "jQuery" Working with WP (added the $ alias as argument)
            </script>
        <?php
    endif;
}


// send cart details to skyline

add_action( 'woocommerce_add_to_cart', 'send_cart_data_syline' );

function send_cart_data_syline(){
	
	if (isset($_POST['submit'])) {
		
		$_SESSION['guest_user'] = $_POST['email_singleproduct'];
		
		// find the cart item key and wp_nonce URL
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		$product_added = $cart_item["key"];
		$cart_item_remove_url = wc_get_cart_remove_url( $product_added );
		}
		
		$_POST['item-key'] = $product_added;
		$_POST['nonce-key'] = $cart_item_remove_url;
		
		// find the cart session
		$session_id = null;
		$values = null;

		  foreach( $_COOKIE as $key => $value ) {

			if( stripos( $key, 'wp_cocart_session_' ) === false ) {
			  continue;
			}

			$values = explode( '||', $value );

		  }

		$session_id = $values[0];
		$_POST['session-key'] = $session_id;
		
		// add the data to API call	
		$data =	[
			'ProductID' => $_POST['product_id'],
			'VariationID' => $_POST['variation_id'],
			'Network' => $_POST['attribute_pa_network'],
			'MemoreSize' => $_POST['attribute_pa_memory-size'],
			'Condition' => $_POST['attribute_pa_condition'],
			'UserEmailID' => $_POST['email_singleproduct'],
			'PageType' => $_POST['add-cart'],
			'SessionKey' => $_POST['session-key'],
			'CartItemKey' => $_POST['item-key'],
			'NonceKey' => $_POST['nonce-key'], 
		];

		$url = '/bamboo_development/RestAPI/BambooMobileViewAPI/';
		
		$data = wp_json_encode( $data );
				
		$args = [
			'headers' => array(
			   'Content-Type' => 'application/json',
			   'Authorization' => 'Basic xxxxxxxxxxxxxxxxxx'
			),
			'method' => 'POST',
			'body'   => $data,
		];

		$response = wp_remote_post( $url, $args );
		// error check
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			return "Something went wrong: $error_message";
		}
		
		$result = json_decode( wp_remote_retrieve_body( $response ) ); // decode the JSON feed
		}
	
}	

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
$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"/bamboo-mobile/cart/?remove_item=24aa110f8bb336ccb07b20578837fc4a&_wpnonce=655165dafb");
		curl_exec($ch);
		curl_close($ch);
	//	
}