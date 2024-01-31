<?php
/**
 * The header for Astra Theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
<?php 
if ( is_page('16816') ){
	WC()->cart->empty_cart();
}
?>
<script>
jQuery(document).ready(function ($) {
 if ($("#signinForm").hasClass("invalid")){
	   setTimeout( function(){
		jQuery('#accLogin a').trigger('click');
	}, 1500 ); 
  }
});
</script>
<script>
jQuery(document).ready(function ($) {
if ($("#orderForm").hasClass("invalid")){
	   setTimeout( function(){
		jQuery('.sessionOut .elementor-widget-container ul li a').trigger('click');
		jQuery('#elementor-popup-modal-18702').hide();
	}, 1500 ); 
  }
  });
</script>
<script>
jQuery(document).ready(function ($) {
if ($("#yourdetailsForm").hasClass("invalid")){
	   setTimeout( function(){
		jQuery('#yrdetails-login a').trigger('click');
	}, 1500 ); 
  }
});
</script>
<?php 
if ( is_page('19789') ){
?>
<!-- STYLES AND SCRIPT FOR CHECKOUT PAGE -->
<script>
  jQuery(document).ready(function () {
  setTimeout(function(){ 
  jQuery("#dropdown-billing").hide(); 
  jQuery('.postcodeAddress, .anotherAddress').hide();
  jQuery('.billng-address-group').hide();
  }, 10);
  	
  var postcodeData;
  var postcodeAddresses;

  jQuery.ajaxSetup({
    headers: {
      "x-api-key": "xxxxxxxxxxxxxxxxx"
    }
  });

  jQuery("#postcode-run").click(function () {
    jQuery
      .when(
        jQuery.get(
          "https://api.addressian.co.uk/v2/autocomplete/" +
            jQuery("#postcode-billing").val(),
          function (data) {
						var numaddArr = new Array();
						var strAdd = new Array();
						var addressArr = new Array();
						jQuery.each(data,function(i,item){
							if(!isNaN(parseInt(item['address'][0])))
							{
								numaddArr.push(item);
							}
							else{
								strAdd.push(item);
							}
						});
						
						if(numaddArr.length > 0){
							numaddArrNew = numaddArr.sort((a,b) => (parseInt(b['address'][0].replace(/[a-zA-Z-_]/,"")) > parseInt(a['address'][0].replace(/[a-zA-Z-_]/,""))) ? -1 : ((parseInt(a['address'][0].replace(/[a-zA-Z-_]/,"")) > parseInt(b['address'][0].replace(/[a-zA-Z-_]/,""))) ? 1 : 0));
							numaddArr = numaddArrNew.sort();
							jQuery.each(numaddArr,function(i,item){
								if(typeof numaddArr[i] != null){
									addressArr.push(item);
									
								}
							});
						}
						
						postcodeAddresses = jQuery.merge(addressArr,strAdd);
          },
          "json"
        )
      )
      .then(function () {
        var $dropdown = jQuery("#dropdown-billing");
        $dropdown.empty();
		var $option = jQuery("<option />");
		$option.text("Please Select Address");
	    $option.data("addressdetails", "");
		$dropdown.append($option);
        jQuery.each(postcodeAddresses, function () {
          var $option = jQuery("<option />");
          $option.text(this.address.join(", ") + ", " + this.postcode);
          $option.data("addressdetails", this);
          $dropdown.append($option);
        });
        $dropdown.fadeIn("slow");
		jQuery("#postcodeBillinghide").hide();
		jQuery("#postcodeBillinghide").fadeOut("slow");
      });
  });

  jQuery("#dropdown-billing").change(function () {
    var addressDetails = jQuery(this)
      .children("option:selected")
      .data("addressdetails");
	jQuery(".anotherAddress").show();
	jQuery("#dropdown-billing").hide();
	jQuery('.manuallyAddress').hide();
	jQuery("#dropdown-line1").val( addressDetails.address );
	jQuery("#dropdown-town").val( (addressDetails.city != null ? addressDetails.city : "") );
	jQuery("#dropdown-county").val( (addressDetails.county != null ? addressDetails.county : "") );
	jQuery("#dropdown-postcode").val( addressDetails.postcode );
    jQuery("#dropdown-line1").fadeIn("slow");
	jQuery("#dropdown-town").fadeIn("slow");
	jQuery("#dropdown-county").fadeIn("slow");
	jQuery("#dropdown-postcode").fadeIn("slow");
	jQuery('.billng-address-group').show();
  });
  jQuery(".manuallyAddress").click(function () {
	  jQuery("#postcodeBillinghide").hide();
	  jQuery('.clearfields').val('');
	  jQuery('.billng-address-group').show();
	  jQuery('.manuallyAddress').hide();
	  jQuery('.anotherAddress').hide();
	  jQuery('.postcodeAddress').show();
  });
  jQuery(".anotherAddress").click(function () {
	  jQuery("#postcodeBillinghide").show();
	  jQuery('.manuallyAddress').show();
	  jQuery('.clearfields').val('');
	  jQuery('.billng-address-group').hide();
	  jQuery('.anotherAddress').hide();
	});
  jQuery(".postcodeAddress").click(function () {
	  jQuery("#postcodeBillinghide").show();
	  jQuery('.manuallyAddress').show();
	  jQuery('.clearfields').val('');
	  jQuery('.billng-address-group').hide();
	  jQuery('.postcodeAddress').hide();
	  });
  });
</script>
<script>
jQuery(document).ready(function($) {
	setInterval(function(){
	$('.elementor-menu-cart__main .widget_shopping_cart_content .woocommerce-cart-form__contents .cart_item .product-remove .remove_from_cart_button').on('click', function(){
			setTimeout(function() {
				location.reload();
			}, 1000 ); 
		});
	}, 1000);
	var prepopulateEmail = $('.woocommerce-checkout-review-order-table tbody tr:first-child .product-name .variation .variation-Emailaddress .wcpa_cart_val').text();
	jQuery('#username-validation span input').val( prepopulateEmail );
	
	setInterval(function(){
	var selectedOption = $('#select2-uacf7_product_dropdown-561-options-container').text();
	$('#device-selected').val(selectedOption);
	}, 0);
	
});
</script>
<script>
jQuery(document).ready(function() {
	setInterval(function(){
	jQuery('#place_order').click(function () {
			if(jQuery('#place_order').hasClass('sell-device')){
				setTimeout(function(){jQuery('#sell-deviceClick').trigger('click')}, 0); 
			}
		});
	}, 0);
jQuery('.wpcf7-form').submit(function() {
            jQuery(this).find(':input[type=submit]').prop('disabled', true);
			jQuery('#place_order').addClass('sell-device');
            var wpcf7Elm = document.querySelector('.wpcf7');
            wpcf7Elm.addEventListener('wpcf7submit', function(event) {
                jQuery('.wpcf7-submit').prop("disabled", false);
				jQuery('#place_order').removeClass('sell-device');
			}, false);
            wpcf7Elm.addEventListener('wpcf7invalid', function() {
                jQuery('.wpcf7-submit').prop("disabled", false);
				jQuery('#place_order').removeClass('sell-device');
			}, false);
        });
	});	
</script>
<?php } ?>

<!-- STYLES AND SCRIPTS FOR ALL PAGES -->

<script>
jQuery(document).ready(function($) {
	$('#is-ajax-search-result-1646').on('focusout', function() {
           $('#overlay').fadeTo(200, 1);
		   $('#overlay').css({display:'block','top':'10%'});
       });
	$('#menu-item-95').on('click', function() {
           $('#overlay').fadeTo(200, 1);
		   $('#overlay').css({display:'block'});
       });
	$('#menu-item-96').on('click', function() {
           $('#overlay').fadeTo(200, 1);
		   $('#overlay').css({display:'block'});
       });
	$('#menu-item-14703').on('click', function() {
           $('#overlay').fadeTo(200, 1);
		   $('#overlay').css({display:'block'});
       });   
	$('#menu-item-4204').on('click', function(){   
			$('#overlay').fadeTo(200, 0);
			$('#overlay').css({display:'none'});
			
       });	
	$('header').on('click', function(){   
			$('#overlay').fadeTo(200, 0);
			$('#overlay').css({display:'none'});
			
       });
	$('#content').on('click', function(){   
			$('#overlay').fadeTo(200, 0);
			$('#overlay').css({display:'none'});
			
       });	
	$('.elementor-location-footer').on('click', function(){   
			$('#overlay').fadeTo(200, 0);
			$('#overlay').css({display:'none'});
	   });
	setInterval(function(){
		$('.page-id-1102 #is-search-input-1646').on('click', function() {
			var x = window.matchMedia("(max-width:767px)");
			var y = window.matchMedia("(max-width:1024px) and (min-width:768px)");
			var z = window.matchMedia("(max-width:2600px) and (min-width:1025px)");
			setTimeout(function(){
				if ($(x.matches)){
					$('#overlay').fadeTo(200, 1);
					$('#overlay').css({display:'block','top':'6.2%'});
				}
				if ($(y.matches)){
					$('#overlay').fadeTo(200, 1);
					$('#overlay').css({display:'block','top':'7.4%'});
				}
				if ($(z.matches)){
					$('#overlay').fadeTo(200, 1);
					$('#overlay').css({display:'block','top':'10.8%'});
				}
			}, 3000);
		});  
	}, 100);	
}); 
</script>
<script>
jQuery(document).ready(function($) {
	$('.sessionIn').on('click', function() {
			window.location.href = '/bamboo_development/BambooMobile/getUserTokenusedData/logout/';
			});
	});	
</script>
<?php if ( $_SESSION['bm_account'] == '' ) { ?>
<script>
jQuery(document).ready(function($) {
	$('.sessionAccount').on('click', function() {
			window.location.href = "/bamboo_development/BambooMobile/accountOverview/";
			});	
});
</script>
<?php } else{ ?>
<script>
jQuery(document).ready(function($) {
	$('.sessionAccount').on('click', function() {
			var tokenKey = "<?php echo $_SESSION['token_user'];?>";
			window.location.href = "/bamboo_development/BambooMobile/getUserTokenusedData/?TokenisedKey="+tokenKey;
			});	
});  
</script>
<?php
unset($_SESSION['bm_account']); 
} 
if( $_REQUEST['action']=='unsetsession' ){
	unset($_SESSION['current_user']);
	unset($_SESSION['token_user']);
	unset($_SESSION['user_name']);
	unset($_SESSION['error_user']);
	unset($_SESSION['order_id']);
	unset($_SESSION['product_cart1']);
	unset($_SESSION['product_variation1']);
	unset($_SESSION['product_cart2']);
	unset($_SESSION['product_variation2']);
	unset($_SESSION['cart_total']);
	unset($_SESSION['networkName1']);
	unset($_SESSION['gradeName1']);
	unset($_SESSION['msizeName1']);
	unset($_SESSION['quantityOne']);
	unset($_SESSION['device_priceOne']);
	unset($_SESSION['networkName2']);
	unset($_SESSION['gradeName2']);
	unset($_SESSION['msizeName2']);
	unset($_SESSION['quantityTwo']);
	unset($_SESSION['device_priceTwo']);
	unset($_SESSION['tradepackType']);
	unset($_SESSION['bm_account']);
	unset($_SESSION['email_hash']);
	unset($_SESSION['new_user']);
	unset($_SESSION['job_id']);
	unset($_SESSION['error_user']);
	unset($_SESSION['signup_message']);
	session_unset();
	}
?>
<?php if ( $_SESSION['current_user'] == '' ) { ?>
<script>
jQuery(document).ready(function($) {
	$('.sessionIn').css({display:'none'});
	$('.sessionAccount').css({display:'none'});
	$('.sessionOut').css({display:'block'});
	$('.page-id-19789 #createAccount').css({display:'block'});
	$('.page-id-19789 #signinMessage').css({display:'none'});
	$('.checkoutlogincheck').css({display:'block'});
	}); 
</script>
<?php } else{ ?>
<script>
jQuery(document).ready(function($) {
	$('.sessionOut').css({display:'none'});
	$('.sessionIn').css({display:'block'});
	$('.sessionAccount').css({display:'block'});
	$('.page-id-19789 #createAccount').css({display:'none'});
	$('.page-id-19789 #signinMessage').css({display:'block'});
	$('.checkoutlogincheck').css({display:'none'});
	}); 
</script>
<?php } ?>
<?php if ( $_SESSION['new_user'] != '' ) { ?>
<script>
jQuery(document).ready(function($) {
	$('.page-id-19789 #signinMessage #messageText').css({display:'none'});
	$('.page-id-19789 #signinMessage #messageText_new').css({display:'block'});
	}); 
</script>
<?php } else{ ?>
<script>
jQuery(document).ready(function($) {
	$('.page-id-19789 #signinMessage #messageText').css({display:'block'});
	$('.page-id-19789 #signinMessage #messageText_new').css({display:'none'});
	}); 
</script>
<?php } ?>
<?php if ( $_SESSION['tradepackType'] != 'Free Trade Pack' ) { ?>
<script>
jQuery(document).ready(function($) {
	$('.page-id-16816 #whatHappens').css({display:'none'});
	$('.page-id-16816 #whatHappensPrintYourWon').css({display:'block'});
	}); 
</script>
<?php } else{ ?>
<script>
jQuery(document).ready(function($) {
	$('.page-id-16816 #whatHappens').css({display:'block'});
	$('.page-id-16816 #whatHappensPrintYourWon').css({display:'none'});
	}); 
</script>
<?php } ?>
<script>
jQuery(document).ready(function($) {
	$('.product-list.uc-items-wrapper .product-items .product-text a.product-text-name').each(function(){
		$(this).text($(this).text().replace(/Samsung/g, ""));
		$(this).text($(this).text().replace(/Apple/g, ""));
		$(this).text($(this).text().replace(/SAMSUNG/g, ""));
		$(this).text($(this).text().replace(/APPLE/g, ""));
	}); 
});
</script>
<style>
#overlay {
    background:rgba(0, 0, 0, 0.7);
	display:none;
    height:100%;
    left:0;
    position:absolute;
    top:0;
    width:100%;
    z-index:5;
	pointer-events: none;
}
</style>

<!-- STYLES AND SCRIPT FOR PRODUCT PAGE -->

<?php if ( is_product() ){ ?>
<script>
jQuery(document).ready(function($) {
	$( "<a class='conditions-info memory-popup' style='cursor:pointer;margin-bottom:10px;'><i class='fas fa-info-circle fa-info-icon'></i> <span>What is my Memory?</span></a>" ).insertAfter( $( "#pa_memory-size" ) );
	$( "<h2 class='ttt-pnwc-tittle_text'>Uh-oh!</h2>" ).insertAfter( $( "#modal-1-content .error .ttt-pnwc-notice-icon" ) );
	$('.reset_variations').html("Reset filters");
	$("<span>Select </span>").prependTo(".variations label");
	setTimeout(function(){$(".thwvsf-wrapper-ul li:only-child").trigger('click');}, 1000);
	});
</script>
<?php 
if ( $_SESSION['guest_user'] != '' ) {?>
<script>
jQuery(document).ready(function($) {
	var userSigned = "<?php echo $_SESSION['guest_user'];?>";
	$('.email-required_parent input').val( userSigned );
});
</script>
<?php 
}	
if ( $_SESSION['current_user'] != '' ) {
	unset($_SESSION['guest_user']);?>
<script>
jQuery(document).ready(function($) {
	var userSigned = $('.session-email').text();
	$('.email-required_parent input').val( userSigned );
});
</script>
<?php 
}	
}
?>
<?php if (is_singular('post')){?>
<script>
	jQuery(document).ready(function($) {
		$('.comments-title').html("Comments...");
		$('.comment-form-cookies-consent label').html("Save my name and email in this browser for the next time I comment.");
	});
	</script>
<?php	
if ( $_SESSION['current_user'] != '' ) {?>
<script>
jQuery(document).ready(function($) {
	var userSigned = "<?php echo $_SESSION['current_user'];?>";
	var userSignedname = "<?php echo $_SESSION['user_name'];?>";
	$('#email').val(userSigned);
	$('#author').val(userSignedname);
	$('#author').prop("readonly",true);
	$('#email').prop("readonly",true);
});
</script>
<?php 
} else{?>
<script>
jQuery(document).ready(function($) {
	$('#author').val('');
	$('#email').val('');
	$('#author').prop("readonly",false);
	$('#email').prop("readonly",false);
});
</script>
<?php	
}
}
?>
</head>

<body <?php astra_schema_body(); ?> <?php body_class(); ?>>
<?php astra_body_top(); ?>
<?php wp_body_open(); ?>
<?php echo do_shortcode( '[cart_fragments]' );?>
<a
	class="skip-link screen-reader-text"
	href="#content"
	role="link"
	title="<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>">
		<?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?>
</a>

<div
<?php
	echo astra_attr(
		'site',
		array(
			'id'    => 'page',
			'class' => 'hfeed site',
		)
	);
	?>
>
	<?php
	astra_header_before();

	astra_header();

	astra_header_after();

	astra_content_before();
	?>
	<div id="overlay"></div>
	<div id="content" class="site-content">
		<div class="ast-container">
		<?php astra_content_top(); ?>
