<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<?php astra_content_bottom(); ?>
	</div> <!-- ast-container -->
	</div><!-- #content -->
	
<?php 
	astra_content_after();
		
	astra_footer_before();
		
	astra_footer();
		
	astra_footer_after(); 
?>
	</div><!-- #page -->
	
<?php 
	astra_body_bottom();    
	wp_footer();
?>
<?php 
if ( is_page('19789') ){
?>
<script>
  jQuery(document).ready(function ($) {
	setInterval(function(){  
	  $('#signupSubmit').click(function (){
		  setTimeout( function(){ location.reload(); }, 1000);
			});
	}, 1000 );
  });
</script>
<?php if ( $_SESSION['error_user'] == "EmailExist" ) { ?>
<script>
 jQuery(document).ready(function ($) {
    		window.wppopups.showPopup(58177); 
});
</script>
<?php 
}}	  
//STYLES AND SCRIPT FOR START SELLING PAGE

if ( is_page('1102') ){ ?>
<script>
jQuery(document).ready(function(e){e("#mobileSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").click(function(){e("#mobileStep2 .elementor-tabs-content-wrapper").css({display:"none"}),e("#mobileStep2 .elementor-tabs-content-wrapper").attr("id","mobileTab-content"),e("#mobileStep2").css({display:"block"}),e("#tabletStep2").css({display:"none"}),e("#watchStep2").css({display:"none"}),e("#mobileSelected .elementor-widget-container .device").addClass("selected"),e("#tabletSelected .elementor-widget-container .device").removeClass("selected"),e("#watchSelected .elementor-widget-container .device").removeClass("selected"),e("#mobileSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text((e("#mobileSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text(),"Selected")).fadeIn(),e("#tabletSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text((e("#tabletSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text(),"Start Selling")).fadeIn(),e("#watchSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text((e("#watchSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text(),"Start Selling")).fadeIn(),e("#mobileSelected .elementor-widget-container .device .device-container .container-inner .device-overlay").css({display: 'none'}),e("#tabletSelected .elementor-widget-container .device .device-container .container-inner .device-overlay").css({display: 'block'}),e("#watchSelected .elementor-widget-container .device .device-container .container-inner .device-overlay").css({display: 'block'}),e("#tabletTab-content .tab-pane").removeClass('active'),e("#watchTab-content .tab-pane").removeClass('active'),e("#tabletStep2 .nav-tabs li").removeClass('active'),e("#watchStep2 .nav-tabs li").removeClass('active')}),e("#tabletSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").click(function(){e("#tabletStep2 .elementor-tabs-content-wrapper").css({display:"none"}),e("#tabletStep2 .elementor-tabs-content-wrapper").attr("id","tabletTab-content"),e("#tabletStep2").css({display:"block"}),e("#mobileStep2").css({display:"none"}),e("#watchStep2").css({display:"none"}),e("#mobileSelected .elementor-widget-container .device").removeClass("selected"),e("#tabletSelected .elementor-widget-container .device").addClass("selected"),e("#watchSelected .elementor-widget-container .device").removeClass("selected"),e("#mobileSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text((e("#mobileSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text(),"Start Selling")).fadeIn(),e("#tabletSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text((e("#tabletSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text(),"Selected")).fadeIn(),e("#watchSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text((e("#watchSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text(),"Start Selling")).fadeIn(),e("#tabletSelected .elementor-widget-container .device .device-container .container-inner .device-overlay").css({display: 'none'}),e("#mobileSelected .elementor-widget-container .device .device-container .container-inner .device-overlay").css({display: 'block'}),e("#watchSelected .elementor-widget-container .device .device-container .container-inner .device-overlay").css({display: 'block'}),e("#mobileTab-content .tab-pane").removeClass('active'),e("#watchTab-content .tab-pane").removeClass('active'),e("#mobileStep2 .nav-tabs li").removeClass('active'),e("#watchStep2 .nav-tabs li").removeClass('active')}),e("#watchSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").click(function(){e("#watchStep2 .elementor-tabs-content-wrapper").css({display:"none"}),e("#watchStep2 .elementor-tabs-content-wrapper").attr("id","watchTab-content"),e("#watchStep2").css({display:"block"}),e("#mobileStep2").css({display:"none"}),e("#tabletStep2").css({display:"none"}),e("#mobileSelected .elementor-widget-container .device").removeClass("selected"),e("#tabletSelected .elementor-widget-container .device").removeClass("selected"),e("#watchSelected .elementor-widget-container .device").addClass("selected"),e("#mobileSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text((e("#mobileSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text(),"Start Selling")).fadeIn(),e("#tabletSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text((e("#tabletSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text(),"Start Selling")).fadeIn(),e("#watchSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text((e("#watchSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").text(),"Selected")).fadeIn(),e("#watchSelected .elementor-widget-container .device .device-container .container-inner .device-overlay").css({display: 'none'}),e("#mobileSelected .elementor-widget-container .device .device-container .container-inner .device-overlay").css({display: 'block'}),e("#tabletSelected .elementor-widget-container .device .device-container .container-inner .device-overlay").css({display: 'block'}),e("#mobileTab-content .tab-pane").removeClass('active'),e("#tabletTab-content .tab-pane").removeClass('active'),e("#mobileStep2 .nav-tabs li").removeClass('active'),e("#tabletStep2 .nav-tabs li").removeClass('active')}),e("#mobileStep2 .nav-tabs li a").click(function(){e("html, body").animate({scrollTop:e("#mobileTab-content").offset().top},1e3)}),e("#tabletStep2 .nav-tabs li a").click(function(){e("html, body").animate({scrollTop:e("#tabletTab-content").offset().top},1e3)}),e("#watchStep2 .nav-tabs li a").click(function(){e("html, body").animate({scrollTop:e("#watchTab-content").offset().top},1e3)})});
</script>
<style>
#tabletStep2,#watchStep2{display:none}#mobileSelected,#tabletSelected,#watchSelected{cursor:pointer}#mobileStep2,.elementor-tabs-content-wrapper{display:none}#tabletStep2,.elementor-tabs-content-wrapper{display:none}#watchStep2,.elementor-tabs-content-wrapper{display:none}
</style>
<style>
/*start selling page header login pouup */
#signinForm label, #orderForm label{
	display:block !important;
}
#signinForm p, #orderForm p{
	margin-bottom: 1.75em !important;
}
#signinForm input:not([type=submit]):not([type=checkbox]):not([type=radio]), #orderForm input:not([type=submit]):not([type=checkbox]):not([type=radio]){
	font-size:1.5rem !important;
}

.elementor-widget-tabs .elementor-tab-desktop-title{
    padding:10px 10px !important;
    min-width: 200px;
    text-align: center;    
}
.elementor-widget-tabs.elementor-tabs-alignment-center .elementor-tabs-wrapper, .elementor-widget-tabs.elementor-tabs-alignment-end .elementor-tabs-wrapper, .elementor-widget-tabs.elementor-tabs-alignment-stretch .elementor-tabs-wrapper{
    flex-wrap: wrap;
    flex-direction: row;
    gap: 8px;
    margin: 0 auto;
}
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title.elementor-active{
    border:2px solid #A375BC;
    border-radius: 8px;
}
.elementor-widget-tabs.elementor-tabs-view-horizontal .elementor-tab-desktop-title.elementor-active {
    border-bottom-style: solid !important;
}
@media (min-width:900px){
.elementor-widget-tabs.elementor-tabs-alignment-center .elementor-tabs-wrapper, .elementor-widget-tabs.elementor-tabs-alignment-end .elementor-tabs-wrapper, .elementor-widget-tabs.elementor-tabs-alignment-stretch .elementor-tabs-wrapper{
    width: 900px;
}}

.elementor-widget-tabs.elementor-tabs-alignment-center .elementor-tabs-wrapper{
    justify-content: start !important;
    padding: 0px 20px
}

.elementor-tabs-content-wrapper{
    padding-top: 150px !important;
}
.elementor-tabs-wrapper{
    margin-bottom: 50px !important;
}
</style>
<?php } 
 if ( is_page('18731')){	
?>
<script>
jQuery(document).ready(function($) {
		
	function getPasswordStrength(password){
	  let s = 0;
	  if(password.length > 6){
		s++;
	  }
	  if(password.length > 7){
		s++;
	  }
	  if(/[A-Z]/.test(password)){
		s++;
	  }
	  if(/[0-9]/.test(password)){
		s++;
	  }
	  if(/[^A-Za-z0-9]/.test(password)){
		s++;
	  }
	  return s;
	}
	document.querySelector("#password-signup").addEventListener("focus",function(){
	  document.querySelector(".pw-strength").style.display = "block";
	});
	document.querySelector("#password-signup").addEventListener("keyup",function(e){
	  let password = e.target.value;
	  let strength = getPasswordStrength(password);
	  let passwordStrengthSpans = document.querySelectorAll(".pw-strength span");
	  strength = Math.max(strength,1);
	  passwordStrengthSpans[1].style.width = strength*20 + "%";
	  if(strength < 2){
		passwordStrengthSpans[0].innerText = "Unsecure";
		passwordStrengthSpans[0].style.color = "#f00";
		passwordStrengthSpans[1].style.background = "#24AAF7";
	  } else if(strength >= 2 && strength <= 4){
		passwordStrengthSpans[0].innerText = "Fair";
		passwordStrengthSpans[0].style.color = "#000";
		passwordStrengthSpans[1].style.background = "#24AAF7";
	  } else {
		passwordStrengthSpans[0].innerText = "Strong";
		passwordStrengthSpans[0].style.color = "#00a91d";
		passwordStrengthSpans[1].style.background = "#24AAF7";
	  }
	});
	
	$('.spu-close-popup').on('click', function() {		
		window.location.href = 'https://www.skylinemicrosites.co.uk/bamboo-mobile/';
			});	
	$('#buttonEye-password-signup').click(function (){
		$('#buttonEye-password-signup').css({'margin-top': '-25px'});
	});		
});
</script>
<?php } 
if ( is_page('19789') ){	
?>
<script>
jQuery(document).ready(function($) {
		
	function getPasswordStrength(password){
	  let s = 0;
	  if(password.length > 6){
		s++;
	  }
	  if(password.length > 7){
		s++;
	  }
	  if(/[A-Z]/.test(password)){
		s++;
	  }
	  if(/[0-9]/.test(password)){
		s++;
	  }
	  if(/[^A-Za-z0-9]/.test(password)){
		s++;
	  }
	  return s;
	}
	document.querySelector("#password-ckout").addEventListener("focus",function(){
	  document.querySelector(".pw-strength").style.display = "block";
	});
	document.querySelector("#password-ckout").addEventListener("keyup",function(e){
	  let password = e.target.value;
	  let strength = getPasswordStrength(password);
	  let passwordStrengthSpans = document.querySelectorAll(".pw-strength span");
	  strength = Math.max(strength,1);
	  passwordStrengthSpans[1].style.width = strength*20 + "%";
	  if(strength < 2){
		passwordStrengthSpans[0].innerText = "Unsecure";
		passwordStrengthSpans[0].style.color = "#f00";
		passwordStrengthSpans[1].style.background = "#24AAF7";
	  } else if(strength >= 2 && strength <= 4){
		passwordStrengthSpans[0].innerText = "Unsecure";
		passwordStrengthSpans[0].style.color = "#f00";
		passwordStrengthSpans[1].style.background = "#24AAF7";
	  } else {
		passwordStrengthSpans[0].innerText = "Strong";
		passwordStrengthSpans[0].style.color = "#00a91d";
		passwordStrengthSpans[1].style.background = "#24AAF7";
	  } 
	});
});
</script>
<script>
jQuery(document).ready(function($) {
	setInterval(function(){
	jQuery('input#password-ckout').change(function(){
		var pwstrength = jQuery('.pw-strength span').text();	
		if ( pwstrength == "Strong" ){
		jQuery('#signupSubmit').removeClass('disabled');
		}
		if ( pwstrength == "Unsecure" ){
		jQuery('#signupSubmit').addClass('disabled');
		}
	}); 	
	},  0);
});
</script>
<script>
jQuery(document).ready(function($) {
    setInterval(function(){
   if($('input.wpcf7-email').hasClass('valid')){
       
        $('#username-validation .icon-bambooright-tick').css({'display':'block'});
    } 
    if($('input.wpcf7-email').hasClass('error')){
        $('#username-validation .icon-bambooright-tick').css({'display':'none'});
    }
    if($('input.wpcf7-password').hasClass('valid')){
       
        $('#password-validation .icon-bambooright-tick').css({'display':'block'});
    } 
    if($('input.wpcf7-password').hasClass('error')){
        $('#password-validation .icon-bambooright-tick').css({'display':'none'});
    }
    
    },  1000);
});
</script>
<style>
    #sellmyDevice{
        display: none;
    }
</style>
<script>
    jQuery(document).ready(function($) {
        setTimeout(function(){
       $('#place_order').click(function (){
          $('#checkoutSubmit #sellmyDevice').trigger('click');  
        });
        }, 0);
    });
</script>
<script type="text/javascript">
jQuery( document ).ready( function() {
		 var mbrand1 = jQuery('#brandName1').text();
		 jQuery('#manufacturer-name1').val( mbrand1 );
		 var mbrand2 = jQuery('#brandName2').text();
		 jQuery('#manufacturer-name2').val( mbrand2 );
		 var device1 = jQuery('#deviceName1').text();
		 jQuery('#model-name1').val( device1 );
		 var device2 = jQuery('#deviceName2').text();
		 jQuery('#model-name2').val( device2 );
		 var vprice1 = jQuery('#variationsPrice1').text();
		 jQuery('#offer-price1').val( vprice1 );
		 var vprice2 = jQuery('#variationsPrice2').text();
		 jQuery('#offer-price2').val( vprice2 );
		 var vnetworkone = jQuery('#networkName1').text();
		 jQuery('#network-one').val( vnetworkone );
		 var vnetworktwo = jQuery('#networkName2').text();
		 jQuery('#network-two').val( vnetworktwo );
		 var vcondition1 = jQuery('#conditionName1').text();
		 jQuery('#grade-name1').val( vcondition1 );
		 var vcondition2 = jQuery('#conditionName2').text();
		 jQuery('#grade-name2').val( vcondition2 );
		 var uname = jQuery('#userName').text();
		 jQuery('#customer-name').val( uname );
		 var pdid1 = jQuery('#current-product1').text();
		 jQuery('#cartp-id1').val( pdid1 );
		 var pdid2 = jQuery('#current-product2').text();
		 jQuery('#cartp-id2').val( pdid2 );
		  var vrid1 = jQuery('#current-variation1').text();
		 jQuery('#cartv-id1').val( vrid1 );
		 var vrid2 = jQuery('#current-variation2').text();
		 jQuery('#cartv-id2').val( vrid2 );
		 var tprice = jQuery('#wooTotal').text();
		 jQuery('#cartTotal').val( tprice );
		 var vmemory1 = jQuery('#memoryValue1').text();
		 jQuery('#memory-size1').val( vmemory1 );
		 var vmemory2 = jQuery('#memoryValue2').text();
		 jQuery('#memory-size2').val( vmemory2 );
		 var qtyval1 = jQuery('#quantityValue1').text();
		 jQuery('#qty-value1').val( qtyval1 );
		 var qtyval2 = jQuery('#quantityValue2').text();
		 jQuery('#qty-value2').val( qtyval2 );
		 var devprice1 = jQuery('#subtotal_price1').text();
		 jQuery('#device-value1').val( devprice1 );
		 var devprice2 = jQuery('#subtotal_price2').text();
		 jQuery('#device-value2').val( devprice2 );
		 
		jQuery('#brandName1').hide();
		jQuery('#deviceName1').hide();
		jQuery('#variationsPrice1').hide();
		jQuery('#networkName1').hide();
		jQuery('#conditionName1').hide();
		jQuery('#userName').hide();
		jQuery('#current-product1').hide();
		jQuery('#current-variation1').hide();
		jQuery('#wooTotal').hide();
		jQuery('#memoryValue1').hide();
		jQuery('#quantityValue1').hide();
		jQuery('#subtotal_price1').hide();
		jQuery('#brandName2').hide();
		jQuery('#deviceName2').hide();
		jQuery('#variationsPrice2').hide();
		jQuery('#networkName2').hide();
		jQuery('#conditionName2').hide();
		jQuery('#current-product2').hide();
		jQuery('#current-variation2').hide();
		jQuery('#memoryValue2').hide();
		jQuery('#quantityValue2').hide();
		jQuery('#subtotal_price2').hide();
		
	jQuery("#tradePack").click(function (){
		jQuery("#dropdown-line1").addClass("required");
		jQuery("#dropdown-town").addClass("required");
		jQuery("#dropdown-postcode").addClass("required");
		jQuery(".digits").addClass("required");
	});
	jQuery("#printLabel").click(function (){ 
		jQuery("#dropdown-line1").removeClass("required");
		jQuery("#dropdown-town").removeClass("required");
		jQuery("#dropdown-postcode").removeClass("required");
		jQuery(".digits").removeClass("required");
	});
});
</script>
<?php } 
 if ( is_page('715') ){	
?>
<script>
jQuery(document).ready(function($) {
	if (window.location.hash == '#sitemapPhone') {
       $("#ourPhone").slideDown();
	   //$("#ourContact").hide();
    }
	if (window.location.hash == '#sitemapContact') {
       $("#ourContact").slideDown();
	 //  $("#ourPhone").hide();
    }
});
</script>
 <?php } 
 if ( is_page('1102') ){
 ?>	
 <script>
 jQuery(document).ready(function($) {
	var queryString = window.location.search,
	urlParams = new URLSearchParams(queryString);
  
  if (urlParams.has('mobiles') === true) {
  	$("#mobileSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").trigger('click');
  }
  if (urlParams.has('tablets') === true) {
  	$("#tabletSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").trigger('click');
  }
  if (urlParams.has('watches') === true) {
  	$("#watchSelected .elementor-widget-container .device .device-container .container-inner .stab_details .stab_btn").trigger('click');
  }
});
</script>
<?php } 
if ( is_page('18731')){
?>
<script>
jQuery(document).ready(function () {
	jQuery('#autocompleteAddress').on('keyup',function(event){
		
		var selElement = jQuery(this);
		jQuery(".typeahead__result").html("").fadeOut("Slow");
		if(selElement.val().length >= 1){
			jQuery.ajax({
				url:"https://api.addressian.co.uk/v2/autocomplete/"+selElement.val(),
				type:"GET",
				headers: {"x-api-key": "Y8L7N4WBr361XT8gHT5bc2g5ycw1ECPao3EWrs6a"},
				success: function(data) {
					if(typeof data[0] !== 'undefined'){
						addHtml =""
						var numaddArr = new Array();
						var strAdd = new Array();
						var addressArr = new Array();
						jQuery.each(data,function(i,item){
							if(!isNaN(parseInt(item['address'][0])))
							{
								numaddArr.push(item);
								//numaddArr[parseInt(item['address'][0].replace(/[a-zA-Z-_]/,""))] = item;
								
							}
							else{
								strAdd.push(item);
							}
						});
						
						if(numaddArr.length > 0){
							//console.log(numaddArr);							
							numaddArrNew = numaddArr.sort((a,b) => (parseInt(b['address'][0].replace(/[a-zA-Z-_]/,"")) > parseInt(a['address'][0].replace(/[a-zA-Z-_]/,""))) ? -1 : ((parseInt(a['address'][0].replace(/[a-zA-Z-_]/,"")) > parseInt(b['address'][0].replace(/[a-zA-Z-_]/,""))) ? 1 : 0));
							//console.log(numaddArrNew);
							numaddArr = numaddArrNew.sort();
							//console.log(numaddArr);
							jQuery.each(numaddArr,function(i,item){
								if(typeof numaddArr[i] !== 'undefined' && numaddArr[i] != null){
									addressArr.push(item);
									
								}
							});
						}
						
						jQuery.merge(addressArr,strAdd);
						
						/*console.log(data);
						console.log(numaddArr);
						console.log(strAdd);
						console.log(addressArr);*/
						
						//data = addressArr;
						
						jQuery.each(addressArr,function(i,item){					
						   addHtml +="<li itemIndex='"+i+"'>"+item.address+", "+(typeof item.company !== 'undefined'?item.company+",  ":"")+item.city+",  "+item.county+"<em>"+item.postcode+"</em></li>";
						});
						jQuery(".typeahead__result").html(addHtml).fadeIn("Slow");
						jQuery(".typeahead__result").css({display:'block'});
						jQuery(".typeahead__result li").on("click",function(){
							//console.log(data[jQuery(this).attr('itemIndex')]);
							//console.log(jQuery(this),jQuery(this).text());
							var itemData = addressArr[jQuery(this).attr('itemIndex')];
							//console.log(itemData);
							
							 jQuery("#autocompleteAddress").html(
								itemData.address.join(", ")  +
								(itemData.company != null ? itemData.company : "") +
								(itemData.city != null ? itemData.city : "") +
								(itemData.county != null ? itemData.county : "") + itemData.postcode
							);
							jQuery(".typeahead__result").fadeOut("slow");
							selElement.val(itemData.address.join(", ")  +
								(itemData.company != null ? ", " + itemData.company : " ") +
								(itemData.city != null ? ", " + itemData.city : "") +
								(itemData.county != null ? ", " + itemData.county : "") + ", " +
								itemData.postcode);
						});
					}			
				}        
			});
		}
	});
});
</script>
<script>
jQuery(document).ready(function ($) {
	jQuery(".manuallyAddress").click(function () {
		jQuery('.clearfields').val('');
		jQuery('.billng-address-group').show();
		jQuery('.manuallyAddress').hide();
		jQuery('.postcodeAddress').show();
		jQuery('#autocompleteAddress').hide();
		jQuery("#dropdown-line1").addClass("required");
		jQuery("#dropdown-town").addClass("required");
		jQuery("#dropdown-postcode").addClass("required");
		});
	jQuery(".postcodeAddress").click(function () {
	  jQuery("#autocompleteAddress").show();
	  jQuery('.manuallyAddress').show();
	  jQuery('.clearfields').val('');
	  jQuery('.billng-address-group').hide();
	  jQuery('.postcodeAddress').hide();
	  jQuery("#dropdown-line1").removeClass("required");
	  jQuery("#dropdown-town").removeClass("required");
	  jQuery("#dropdown-postcode").removeClass("required");
	  });
 
	$("select[name=uacf7_product_dropdown-561] option:first").text("Your Curent Phone");
});
</script>
<?php } 
if($_REQUEST['account']==='access-fail'){
?>
<script>
jQuery(document).ready(function () {
	setTimeout( function(){
		jQuery('#accLogin a').trigger('click');
		jQuery('.wpcf7-response-output').html('The email address or password you entered is invalid, Please try again');
		jQuery('#signinForm.init .wpcf7-response-output').css({display:'block'});
	}, 1000);
});
</script>
<?php } 
if($_REQUEST['accSales']==='access-fail'){
?>
<script>
jQuery(document).ready(function () {
	setTimeout( function(){
		jQuery('.sessionOut .elementor-widget-container ul li a').trigger('click');
		jQuery('#elementor-popup-modal-18702').hide();
		jQuery('.wpcf7-response-output').html('The email address or password you entered is invalid, Please try again');
		jQuery('#orderForm.init .wpcf7-response-output').css({display:'block'});
	}, 1000);
});
</script>
<?php } 
if($_REQUEST['yrdetails']==='login-fail'){
?>
<script>
jQuery(document).ready(function () {
	setTimeout( function(){
		jQuery('#yrdetails-login a').trigger('click');
		jQuery('.wpcf7-response-output').html('The email address or password you entered is invalid, Please try again');
		jQuery('#yourdetailsForm.init .wpcf7-response-output').css({display:'block'});
	}, 1000);
});
</script>
<?php } 
if ( is_page('3232')){
?>
<script>
 jQuery(document).ready(function($) {
$('#faqPoint1').click(function(){
       $('#faq1 .question').trigger('click');
       });
$('#faqPoint2').click(function(){
       $('#faq2 .question').trigger('click');
       });
$('#faqPoint3').click(function(){
       $('#faq3 .question').trigger('click');
       });
$('#faqPoint4').click(function(){
       $('#faq4 .question').trigger('click');
       });
$('#faqPoint5').click(function(){
       $('#faq5 .question').trigger('click');
       });
$('#faqPoint6').click(function(){
       $('#faq6 .question').trigger('click');
       });
$('#faqPoint7').click(function(){
       $('#faq7 .question').trigger('click');
       });
$('#faqPoint8').click(function(){
       $('#faq8 .question').trigger('click');
       });
$('#faqPoint9').click(function(){
       $('#faq9 .question').trigger('click');
       });
$('#faqPoint10').click(function(){
       $('#faq10 .question').trigger('click');
       });
$('#faqPoint11').click(function(){
       $('#faq11 .question').trigger('click');
       });
$('#faqPoint12').click(function(){
       $('#faq12 .question').trigger('click');
       });
$('#faqPoint13').click(function(){
       $('#faq13 .question').trigger('click');
       });       
   }); 
    
</script>
<?php } ?>
<style>
    .mobiMenu-content, .mobiMenu-close {display: none;}
     @media (max-width:500px){
        .elementor-1102 .elementor-element.elementor-element-ecb8fc6{
            margin-top: 20px;
        }
    }
    
</style>
<script>
    jQuery(document).ready(function ($) {
    jQuery("#findMy_device").click(function () {
	jQuery("#findMy_device .elementor-widget-container").toggleClass("highlight");	
    $('#mobile-searchbox').toggle();
 var element = document.getElementById("mobile-searchbox");

element.scrollIntoView();
element.scrollIntoView(false);
element.scrollIntoView({block: "end"});
element.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"}); 
        });    
    });
</script>
<script>
jQuery(document).ready(function($) {
   $('.mobiMenu-open').click(function(){
        $('.mobiMenu-content').toggle();
        $('.mobiMenu-open').css({display:'none'});
        $('.mobiMenu-close').css({display:'block'});
		$('#overlay').fadeTo(200, 1);
		$('#overlay').css({'display':'block','top':'5.0%!important'});
    });
});
</script>
<script>
jQuery(document).ready(function($) {
  $('.mobiMenu-close').click(function(){
      $('.mobiMenu-content').toggle();
	  $('.mobiMenu-close').css({display:'none'});
	  $('.mobiMenu-open').css({display:'block'});
	  $('#overlay').fadeTo(200, 0);
	  $('#overlay').css({display:'none'});
  });
  $('#content').on('click', function(){   
	  $('.mobiMenu-content').css({display:'none'});
	  $('.mobiMenu-close').css({display:'none'});
	  $('.mobiMenu-open').css({display:'block'});
	  $('#overlay').fadeTo(200, 0);
	  $('#overlay').css({display:'none'});
  });  
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
jQuery(function($){
$('.clicktoshow1').each(function(i){
$(this).click(function(){ $('.contactUs').eq(i).toggle();
var element = document.getElementById("ourContact");

element.scrollIntoView();
element.scrollIntoView(false);
element.scrollIntoView({block: "end"});
element.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
$('.liveChat').eq(i).hide();
$('.phoneNumber').eq(i).hide();
$('.whatsApp').eq(i).hide();
}); });
}); });
</script>
<style>
.clicktoshow1{
cursor: pointer;
}
.contactUs{
display: none;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
jQuery(function($){
$('.clicktoshow2').each(function(i){
$(this).click(function(){ $('.liveChat').eq(i).toggle();
var element = document.getElementById("ourChat");

element.scrollIntoView();
element.scrollIntoView(false);
element.scrollIntoView({block: "end"});
element.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
$('.contactUs').eq(i).hide();
$('.phoneNumber').eq(i).hide();
$('.whatsApp').eq(i).hide();
}); });
}); });
</script>
<style>
.clicktoshow2{
cursor: pointer;
}
.liveChat{
display: none;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
jQuery(function($){
$('.clicktoshow3').each(function(i){
$(this).click(function(){ $('.phoneNumber').eq(i).toggle();
var element = document.getElementById("ourPhone");

element.scrollIntoView();
element.scrollIntoView(false);
element.scrollIntoView({block: "end"});
element.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
$('.contactUs').eq(i).hide();
$('.liveChat').eq(i).hide();
$('.whatsApp').eq(i).hide();
}); });
}); });
</script>
<style>
.clicktoshow3{
cursor: pointer;
}
.phoneNumber{
display: none;
}
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
jQuery(function($){
$('.clicktoshow4').each(function(i){
$(this).click(function(){ $('.whatsApp').eq(i).toggle();
var element = document.getElementById("ourWhatsapp");

element.scrollIntoView();
element.scrollIntoView(false);
element.scrollIntoView({block: "end"});
element.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
$('.contactUs').eq(i).hide();
$('.liveChat').eq(i).hide();
$('.phoneNumber').eq(i).hide();
}); });
}); });
</script>
<style>
.clicktoshow4{
cursor: pointer;
}
.whatsApp{
display: none;
}
</style>
<?php if ( is_page([19789,18731])){?>
<script>
jQuery(document).ready(function($) {
	$('.wc-product-search').select2();
	$('#myproduct-dropdown').select2();
	
    // other than this array we will give "other" option
	var ajax_search_array = []
$("#uacf7_product_dropdown-561-options").select2({
   //placeholder: "Choose your something",
   //data: dataItemsList, //your dataItemsList for dynamic option
   //...
   //...
   tags: true,
   createTag: function (tag) {
        // here we add %search% to search like in mysql
        var name_search  = "%"+tag.term.toString().toLowerCase()+"%";
	   if (ajax_search_array.length === 0) {
			const ulElement = document.getElementById("select2-uacf7_product_dropdown-561-options-results");
			const liElements = ulElement.getElementsByTagName('li');
			for (let i = 0; i < liElements.length; i++) {
				ajax_search_array.push(liElements[i].innerText);	
			}
	   }
        // alasql search
        var result = alasql('SELECT COLUMN * FROM [?] WHERE [0] LIKE ?',[ajax_search_array, name_search]);

        // if no result found then show "other"
        // and prevent other to appear when type "other"
        if(result.length === 0 && tag.term !== "other"){
            return {
               id: "other",
               text: "Other"
            };
        }
}
});
	
	});
</script>
<?php } 
if (is_singular('post')){?>
<script>
jQuery(document).ready(function($) {
	// comments form validation
$(document.body).on('click', '#ast-commentform #submit', function(){
    $("#ast-commentform").validate({
        rules: {
            author: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            comment: {
                required: true,
                minlength: 1,
				maxlength: 250
            }
        },
        messages: {
            author: "Please enter your name",
            email: "Please enter a valid email address.",
            comment: "Please enter your comment"
        },
        errorElement: "div",
        errorPlacement: function(error, element) {
            element.after(error);
        }
   });
});
	
    });
</script>
<?php }
if ( is_page('16816')){?>
<script>
jQuery(document).ready(function($) {
	$('#appleset').click( function(){
		$('#androidset .elementor-tab-content').css({display:'none'});
		$('#androidset .elementor-tab-title').removeClass('elementor-active');
	});
	$('#androidset').click( function(){
		$('#appleset .elementor-tab-content').css({display:'none'});
		$('#appleset .elementor-tab-title').removeClass('elementor-active');
	});
	 });
</script>
<?php } 
if($_REQUEST['login']=='email'){
?>
<script>
jQuery(document).ready(function () {
	setTimeout( function(){
		//console.log("Hi123");
		jQuery('#accLogin a').trigger('click');
	}, 3000 );  	
});
</script>
<?php } 
if ( is_page([58212,1102])){
?>
<script>
jQuery(document).ready(function($){
             $('.BM-ProductScrollSlider').slick({
                    dots: false,
                    arrows: true,
                    slidesToShow: 3,
                    infinite: false,
					responsive: [
                      {
                        breakpoint: 1024,
                        settings: {
                          slidesToShow: 3
                        }
                      },
                      {
                        breakpoint: 821,
                        settings: {
                          slidesToShow: 2
                        }
                      },
                      {
                        breakpoint: 600,
                        settings: {
                          slidesToShow: 1
                        }
                      }
                    ]
                });
		});
</script>
<?php } ?>
<?php if( $_REQUEST['cartv-id1'] != '' ){ WC()->cart->empty_cart();	} ?>
 	</body>
</html>
