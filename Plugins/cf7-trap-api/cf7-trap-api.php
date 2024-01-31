<?php
/**
 * Plugin Name: CF7 Form Trap
 * Plugin URI: http://creationdesks.com
 * Author: Gururaj Acharya
 * Author URI: http://creationdesks.com
 * Description: Get CF7 Data and send to API
 * Version: 0.1.0
 * License: GPL2
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * text-domain: cf7-trap-api
*/

defined( 'ABSPATH' ) or die( 'Unauthorized access!' );

add_action( 'cfdb7_before_save', 'bamboo_user_signin_cf7_data' );

function bamboo_user_signin_cf7_data( $form_data ) {
	
	$wpcf7 = WPCF7_ContactForm::get_current();

    $form_id = $wpcf7->id();
	
	/* HEADER LOGIN FORM API - REDIRECTS TO ACCOUNT OVERVIEW */
   
	if ($form_id === 18717){
		 
		 
		$email = sanitize_text_field($form_data['useremail']);
		$password = sanitize_text_field($form_data['password-user']);
		$pagetype = sanitize_text_field($form_data['formname']);
		
		$data = [
		   'EmailAdderess' => $email,
		   'Password' => $password,
		   'PageType' => $pagetype,
		];
	   
		$email = sanitize_text_field($data['email']);
			
		$url = '/bamboo_development/RestAPI/BambooMobileViewAPI/';
		
		$data = wp_json_encode( $data );
		
		$args = [
			'headers' => array(
			  'Content-Type' => 'application/json',
			   'Authorization' => 'Basic xxxxxxxxxxxxxx',
			),
			'method' => 'POST',
			'body'   => $data,
		];

		$response = wp_remote_post( $url, $args );
		
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			return "Something went wrong: $error_message";
		}
		
		$result = json_decode( wp_remote_retrieve_body( $response ) ); // decode the JSON feed
		echo '<pre>';
		print_r($result);
		echo '</pre>';
		$errmsg = $result->RawData->Status;
		
		
		if ( $result->RawData->Status == 'Ok'){
				$_SESSION['current_user'] = $form_data['useremail'];
				$_SESSION['token_user'] = $result->RawData->TokenisedKey;
				$_SESSION['error_user'] = $result->RawData->Status;
				$_SESSION['user_name'] = $result->RawData->Name;
				$tokenKey = $result->RawData->TokenisedKey;
				print_r($tokenKey);
				header("Location: /bamboo_development/BambooMobile/getUserTokenusedData/$tokenKey/");
				exit();
				} else {
				header("Location: /bamboo-mobile/?account=access-fail");
				exit();
				}
	}
	
	/* YOUR ORDER MENU LINK API - REDIRECTS TO MY SALES */
	
	if ($form_id === 50634){
	 
		$email = sanitize_text_field($form_data['useremail']);
		$password = sanitize_text_field($form_data['password-user']);
		$pagetype = sanitize_text_field($form_data['formname']);
		
		$data = [
		   'EmailAdderess' => $email,
		   'Password' => $password,
		   'PageType' => $pagetype,
		];
	   
		$email = sanitize_text_field($data['email']);
			
		$url = '/bamboo_development/RestAPI/BambooMobileViewAPI/';
		
		$data = wp_json_encode( $data );
		
		$args = [
			'headers' => array(
			   'Content-Type' => 'application/json',
			   'Authorization' => 'Basic xxxxxxxxxxxxxx',
			),
			'method' => 'POST',
			'body'   => $data,
		];

		$response = wp_remote_post( $url, $args );
		
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			return "Something went wrong: $error_message";
		}
		
		$result = json_decode( wp_remote_retrieve_body( $response ) ); // decode the JSON feed
		$errmsg = $result->RawData->Message;
		
		if ( $result->RawData->Status == 'Ok'){
				$_SESSION['current_user'] = $form_data['useremail'];
				$_SESSION['token_user'] = $result->RawData->TokenisedKey;
				$_SESSION['error_user'] = $result->RawData->Status;
				$_SESSION['user_name'] = $result->RawData->Name;
				$tokenKey = $result->RawData->TokenisedKey;
				header("Location: /bamboo_development/BambooMobile/getUserTokenusedData/$tokenKey/mysales/#");
				exit();
				} else {
				header("Location: /bamboo-mobile/?accSales=access-fail");
				exit();	
				}
	}
	
	/* YOUR DETAILS RETURNING CUSTOMER LOGIN LINK API - REDIRECTS TO YOUR DETAILS */
	
	if ($form_id === 51375){
	  
		$email = sanitize_text_field($form_data['useremail']);
		$password = sanitize_text_field($form_data['password-user']);
		$pagetype = sanitize_text_field($form_data['formname']);
		
		$data = [
		   'EmailAdderess' => $email,
		   'Password' => $password,
		   'PageType' => $pagetype,
		];
	   
		$email = sanitize_text_field($data['email']);
			
		$url = '/bamboo_development/RestAPI/BambooMobileViewAPI/';
		
		$data = wp_json_encode( $data );
		
		$args = [
			'headers' => array(
			   'Content-Type' => 'application/json',
			   'Authorization' => 'Basic xxxxxxxxxxxxx',
			),
			'method' => 'POST',
			'body'   => $data,
		];

		$response = wp_remote_post( $url, $args );
		
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			return "Something went wrong: $error_message";
		}
		
		$result = json_decode( wp_remote_retrieve_body( $response ) ); // decode the JSON feed
		$errmsg = $result->RawData->Message;
		
		if ( $result->RawData->Status == 'Ok'){
				$_SESSION['current_user'] = $form_data['useremail'];
				$_SESSION['token_user'] = $result->RawData->TokenisedKey;
				$_SESSION['error_user'] = $result->RawData->Status;
				$_SESSION['user_name'] = $result->RawData->Name;
				$tokenKey = $result->RawData->TokenisedKey;
				header("Location: /bamboo_development/BambooMobile/getUserTokenusedData/$tokenKey/yourdetails/");
				exit();
				} else {
				header("Location: /bamboo-mobile/your-details/?yrdetails=login-fail");
				exit();	
				}
	}
	
	/* NEWS LETTER SUBSCRIPTION API */
	
	if ($form_id === 48508){
	
		$submission = WPCF7_Submission::get_instance();
		$wpcf7 = WPCF7_ContactForm::get_current();
		$properties = $wpcf7->get_properties();
		
		$data = [
			'FirstName' => $form_data['first-name'],
			'LastName' => $form_data['last-name'],
			'AgeRange' => $form_data['menu-35'][0],
			'EmailAddress' => $form_data['your-email'],
			'PageType' => $form_data['form-name'],
		];
		
		$url = '/bamboo_development/RestAPI/BambooMobileViewAPI/';

		$data = wp_json_encode( $data );
		
		$args = [
			'headers' => array(
				'Content-Type' => 'application/json',
				'Authorization' => 'Basic xxxxxxxxxxxx',
			),
			'method' => 'POST',
			'body'   => $data,
		];

		$response = wp_remote_post( $url, $args );
		
		if ( is_wp_error( $response ) ) {
			$submission->set_response($response->get_error_message());
			$error_message = $response->get_error_message();
			return "Something went wrong: $error_message";
		}
		
		$result = json_decode( wp_remote_retrieve_body( $response ) ); // decode the JSON feed
		$errmsg = $result->RawData->Message;
			
		if ( $result->RawData->Status == 'Ok'){
				$properties['messages']['mail_sent_ok'] = $errmsg;
			} else {
				$properties['messages']['mail_sent_ok'] = $errmsg;
			}
			
			$wpcf7->set_properties($properties);
	}
	
	/* REGISTER PAGE FORM API */

	if ($form_id === 18743){
		
		$submission = WPCF7_Submission::get_instance();
		$wpcf7 = WPCF7_ContactForm::get_current();
		$postedData = $submission->get_posted_data();
		$properties = $wpcf7->get_properties();
    
        $data =	[
			'fname' => $form_data['first-name'],
			'lname' => $form_data['last-name'],
			'Day' => $form_data['menu-710'][0],
			'Month' => $form_data['menu-187'][0],
			'Year' => $form_data['menu-217'][0],
			'cnumber' => $form_data['telephone'],
			'eaddress' => $form_data['your-email'],
			'Password' => $form_data['password-signup'],
			'DeliveryAddress' => $form_data['q'],
			'BillingAddressLine1' => $form_data['dropdown-b1'],
			'BillingAddressTown' => $form_data['dropdown-b3'],
			'BillingAddressCounty' => $form_data['dropdown-b4'],
			'BillingPostcode' => $form_data['dropdown-b5'],
			'BillingAddressCountry' => $form_data['dropdown-b6'],
			'ModelCodeID' => $form_data['uacf7_product_dropdown-561'],
			'OperatingSystemID' => $form_data['phone-software'][0],
			'NewsletterSubscription'=> $form_data['subscription-newsletter'][0],
			'PageType' => $form_data['form-name'],
			]; 
			
        $url = '/bamboo_development/RestAPI/BambooMobileViewAPI/';
		
		$data = wp_json_encode( $data );

        $args = [
		'headers' => array(
           'Content-Type' => 'application/json',
		   'Authorization' => 'Basic xxxxxxxxxxxxxxx',
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
		 
		if ( $result->RawData->Status == 'Ok'){
			$_SESSION['current_user'] = $form_data['your-email'];
			$_SESSION['bm_account']= $result->RawData->BMAccountID;
			$_SESSION['token_user'] = $result->RawData->TokenisedKey;
			$_SESSION['email_hash'] = $result->RawData->EmailHash;
			$_SESSION['new_user'] = $result->RawData->BMAccountID;
			$_SESSION['user_name'] = $result->RawData->uname;
			$errmsg = "Welcome to Bamboo Mobile, " . $result->RawData->uname;
			$properties['messages']['mail_sent_ok'] = $errmsg;
		} else {
			$properties['messages']['mail_sent_ok'] = "API fail";
		}
		
		$wpcf7->set_properties($properties);	
	}
	
	/* NEW CUSTOMER SIGNUP FORM API AT YOUR DETAILS PAGE */
	
	if ($form_id == 19849){
		
		$submission = WPCF7_Submission::get_instance();
		$wpcf7 = WPCF7_ContactForm::get_current();
		$properties = $wpcf7->get_properties();
    
        $data =	[
			'fname' => $form_data['first-name'],
			'lname' => $form_data['last-name'],
			'Day' => $form_data['menu-710'][0],
			'Month' => $form_data['menu-187'][0],
			'Year' => $form_data['menu-217'][0],
			'eaddress' => $form_data['username'],
			'Password' => $form_data['password-ckout'],
			'ModelCodeID' => $form_data['uacf7_product_dropdown-561'],
			'OperatingSystemID' => $form_data['phone-software'][0],
			'PageType' => $form_data['form-name'],
		]; 
			
        $url = '/bamboo_development/RestAPI/BambooMobileViewAPI/';
		
		$data = wp_json_encode( $data );
		
		$args = [
			'headers' => array(
			   'Content-Type' => 'application/json',
			   'Authorization' => 'Basic xxxxxxxxxxxxx'
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
		
		if ( $result->RawData->Status == 'Ok'){
			$_SESSION['current_user'] = $form_data['username'];
			$_SESSION['bm_account']= $result->RawData->BMAccountID;
			$_SESSION['token_user'] = $result->RawData->TokenisedKey;
			$_SESSION['email_hash'] = $result->RawData->EmailHash;
			$_SESSION['new_user'] = $result->RawData->BMAccountID;
			$_SESSION['user_name'] = $form_data['first-name'] . ' ' . $form_data['last-name'];
			$_SESSION['error_user'] = $result->RawData->BMAccountID;
			$tokenKey = $result->RawData->TokenisedKey;
			header("Location: /bamboo_development/BambooMobile/getUserTokenusedData/$tokenKey/yourdetails");
			exit();
		} 
		if ( $result->ErrorCode == 'EmailExist'){
			$_SESSION['error_user'] = $result->ErrorCode;
			$_SESSION['signup_message'] = $result->ErrorDescription;
			}
		
			$wpcf7->set_properties($properties);
	}
	
	/* CUSTOMER CHECKOUT FORM API AT YOUR DETAILS PAGE */
	
	if ($form_id === 51380){
		
		$submission = WPCF7_Submission::get_instance();
		$wpcf7 = WPCF7_ContactForm::get_current();
		$properties = $wpcf7->get_properties();
		
		$job_1_data = [
			'Manufacturer' => $form_data['manufacturer-name1'],
			'Customer' => $form_data['customer-name'],
			'Model' => $form_data['model-name1'],
			'MobilePhoneNetwork' => $form_data['network-one'],
			'CustomerGrade' => $form_data['grade-name1'],
			'SendType' => $form_data['send-type'],
			'OfferPrice' => $form_data['offer-price1'],
			'TradePackType' => $form_data['trade-packtype'],
			'PageType' => $form_data['page-type'],
		];
		$job_2_data = [
			'Manufacturer' => $form_data['manufacturer-name2'],
			'Customer' => $form_data['customer-name'],
			'Model' => $form_data['model-name2'],
			'MobilePhoneNetwork' => $form_data['network-two'],
			'CustomerGrade' => $form_data['grade-name2'],
			'SendType' => $form_data['send-type'],
			'OfferPrice' => $form_data['offer-price2'],
			'TradePackType' => $form_data['trade-packtype'],
			'PageType' => $form_data['page-type'],
		];
		$account_data = [
			'Customer' => $form_data['customer-name'],
			'AddressLine1' => $form_data['dropdown-b1'],
			'AddressLine2' => '',
			'AddressTown' => $form_data['dropdown-b3'],
			'AddressCounty' => $form_data['dropdown-b4'],
			'AddressPostcode' => $form_data['dropdown-b5'],
			'AddressCountry' => $form_data['dropdown-b6'],
			'ContactNumber' => $form_data['contact-number'],
			'PaypalName' => $form_data['paypal_name'],
			'PaypalEmail' => $form_data['paypal_email'],
			'AccountHolderName' => $form_data['account_holder_name'],
			'AccountNumber' => $form_data['account_number'],
			'SortCode' => $form_data['sort_code'],
			'AccountName' => $form_data['payit_name'],
			'AccountPhoneNumber' => $form_data['payit_number'],
			'AdditionalDisclaimer' => $form_data['additional_disclaimer'],
			'UserConsent' => $form_data['user_second_consent'],
		];
		
		if ( $form_data['model-name2'] == '' ) {
			$data[Device1] = $job_1_data;
			$data[Account_details] = $account_data;
		} else{
			$data[Device1] = $job_1_data;
			$data[Device2] = $job_2_data;
			$data[Account_details] = $account_data;
		}
		
		$url = '/bamboo_development/RestAPI/BambooMobileViewAPI/';
		
		$data = wp_json_encode( $data );

		$args = [
			'headers' => array(
			   'Content-Type' => 'application/json',
			   'Authorization' => 'Basic xxxxxxxxxxxxx',
			   'Access-Control-Allow-Origin' => '*',
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
				
		if ( $result->RawData->Status == 'Ok'){
			$properties['messages']['mail_sent_ok'] = "api success";
			$orderID = $result->RawData->OrderID;
			$_SESSION['order_id'] = $result->RawData->OrderID;
			$_SESSION['product_cart1'] = $form_data['cartp-id1'];
			$_SESSION['product_variation1'] = $form_data['cartv-id1'];
			$_SESSION['cart_total'] = $form_data['cartTotal'];
			$_SESSION['networkName1'] = $form_data['network-one'];
			$_SESSION['gradeName1'] = $form_data['grade-name1'];
			$_SESSION['msizeName1'] = $form_data['memory-size1'];
			$_SESSION['quantityOne'] = $form_data['qty-value1'];
			$_SESSION['device_priceOne'] = $form_data['device-value1'];
			$_SESSION['product_cart2'] = $form_data['cartp-id2'];
			$_SESSION['product_variation2'] = $form_data['cartv-id2'];
			$_SESSION['networkName2'] = $form_data['network-two'];
			$_SESSION['gradeName2'] = $form_data['grade-name2'];
			$_SESSION['msizeName2'] = $form_data['memory-size2'];
			$_SESSION['quantityTwo'] = $form_data['qty-value2'];
			$_SESSION['device_priceTwo'] = $form_data['device-value2'];
			$_SESSION['tradepackType'] = $form_data['send-type'];
			$_SESSION['bm_account']= $result->RawData->BMAccountID;
			$_SESSION['job_id'] = $result->RawData->JobID;
			//exit();	
		} else {
			$properties['messages']['mail_sent_ok'] = "api failed";
		}
		
		$wpcf7->set_properties($properties);	
	}
	
	if ($form_id === 18988){
		$submission = WPCF7_Submission::get_instance();
		$wpcf7 = WPCF7_ContactForm::get_current();
		$properties = $wpcf7->get_properties();
		
		$email = sanitize_text_field($form_data['useremail']);
		$pagetype = sanitize_text_field($form_data['form-name']);
    
        $data =	[
			'EmailAddress' => $email,
			'PageType' => $pagetype,
		];
					
		$url = '/bamboo_development/RestAPI/BambooMobileViewAPI/';
		
		$data = wp_json_encode( $data );
		
		$args = [
			'headers' => array(
			  'Content-Type' => 'application/json',
			   'Authorization' => 'Basic xxxxxxxxxxx',
			),
			'method' => 'POST',
			'body'   => $data,
		];

		$response = wp_remote_post( $url, $args );
		
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			return "Something went wrong: $error_message";
		}
		
		$result = json_decode( wp_remote_retrieve_body( $response ) ); // decode the JSON feed
		$errmsg = $result->RawData->Message;
		if ( $result->RawData->Status == 'Ok'){
			
			$properties['messages']['mail_sent_ok'] = $errmsg;
			
		} else {
			
			$properties['messages']['mail_sent_ok'] = $errmsg;
				
		}
		
			$wpcf7->set_properties($properties);	
	}
	
	if ($form_id === 59548){
		$submission = WPCF7_Submission::get_instance();
		$wpcf7 = WPCF7_ContactForm::get_current();
		$properties = $wpcf7->get_properties();
		
		$email = sanitize_text_field($form_data['useremail']);
		$new_password = sanitize_text_field($form_data['new-password']);
		$confirm_password = sanitize_text_field($form_data['confirm-password']);
		$pagetype = sanitize_text_field($form_data['form-name']);
    
        $data =	[
			'EmailAddress' => $email,
			'NewPassword' => $new_password,
			'ConfirmPassword' => $confirm_password,
			'PageType' => $pagetype,
		];
					
		$url = '/bamboo_development/RestAPI/BambooMobileViewAPI/';
		
		$data = wp_json_encode( $data );
		
		$args = [
			'headers' => array(
			  'Content-Type' => 'application/json',
			   'Authorization' => 'Basic xxxxxxxxxxxxxxxx',
			),
			'method' => 'POST',
			'body'   => $data,
		];

		$response = wp_remote_post( $url, $args );
		
		if ( is_wp_error( $response ) ) {
			$error_message = $response->get_error_message();
			return "Something went wrong: $error_message";
		}
		
		$result = json_decode( wp_remote_retrieve_body( $response ) ); // decode the JSON feed
		$errmsg = $result->RawData->Message;
		if ( $result->RawData->Status == 'Ok'){
			
			$properties['messages']['mail_sent_ok'] = $errmsg;
			
		} else {
			
			$properties['messages']['mail_sent_ok'] = $errmsg;
				
		}
		
			$wpcf7->set_properties($properties);	
	}
}


