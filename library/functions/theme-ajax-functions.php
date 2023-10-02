<?php
add_filter('show_admin_bar', '__return_false');

add_action('wp_ajax_get_country_code', 'get_country_code');
add_action('wp_ajax_nopriv_get_country_code', 'get_country_code');
function get_country_code(){
		global $json_api;
		$country_id = $_REQUEST['country_id'];		
			if($country_id != ''){
				$country_code = get_tax_meta($country_id,'_country_code');
				if($country_code != ''){
					$response = array('country_code' => $country_code, 'msg' => 'Country Code found. Updating Country Code');
				} else {
					$response = array('country_code' => '', 'msg' => 'Country Code not found. Please retry again.');
				}			
		 	}		 
		 header( "Content-Type: application/json" );
		echo json_encode($response);
		exit();		
}
// Register User //
add_action('wp_ajax_register_account', 'register_account');
add_action('wp_ajax_nopriv_register_account', 'register_account');
function register_account(){
	$data = json_decode(stripslashes($_REQUEST['data_content']), true);
		$email = sanitize_email($data['reg-email']);
		$password = $data['reg-password'];
		$key = $email."-".$password;
		$key = md5($key);
		$posted_by = $data['reg-posted-by'];
		$first_name = $data['reg-first-name'];
		$last_name = $data['reg-last-name'];
		$gender =  $data['reg-gender'];
		$day = $data['reg-dob-day'];
		$month = $data['reg-dob-month'];
		$year = $data['reg-dob-year'];
		$country = $data['reg-countries'];
		$country_code = $data['reg-country-code'];
		$country_code = str_replace(' ', '', $country_code);
		$phone_number = $data['reg-phone-number'];
		$mobile = "+".$country_code."".$phone_number;
		$nonce = $data['_wpnonce'];
		
		$user_data = array(
			'user_login' => $email,
			'user_email' => $email,
			'user_pass' => $password,
			'first_name' => $first_name,
			'last_name' => $last_name
		);
		$user_meta = array(
			'_posted_by' => $posted_by,
			'_gender' => $gender,
			'_day' => $day,
			'_month' => $month,
			'_year' => $year,
			'_country' => $country,
			'_mobile' => $mobile,
			'_activation_key' => $key
		);
	
	if (! isset( $nonce ) || ! wp_verify_nonce( $nonce, 'register_security')) {
   	$response = 'Sorry, your nonce did not verify.';   
	} else {
   	
   	if( null == username_exists($email) && null == email_exists($email)) {		
  		$user_id = wp_create_user($email, $password, $email);
  		// Set the nickname
  		wp_update_user(
    		array(
      		'ID'          =>    $user_id,
      		'nickname'    =>    $email
    		)
  		);
  		
  		$clean_user_details =  array($user_meta);
		// Add Phone number
		update_user_meta($user_id, 'additional_details', $clean_user_details);
		
  		// Set the role
  		$user = new WP_User( $user_id );
  		$user->set_role( 'author' );
  		
  		if(function_exists('pmpro_changeMembershipLevel')){
  			pmpro_changeMembershipLevel(1, $user_id);
  		}
		send_confirmation($data, $key);
  		// Email the user
  		/*wp_mail( $email_address, 'Welcome!', 'Your Password: ' . $password );*/

		}
		
	
	}// Nonce verified and created account condition completed	
}

add_action('wp_ajax_send_confirmation', 'send_confirmation');
add_action('wp_ajax_nopriv_send_confirmation', 'send_confirmation');
function send_confirmation($data, $key){
	$data = $data;
		$key = $key;
		header( "Content-Type: application/json" );
		echo json_encode(array('data' => $data, 'key' => $key));
		exit();
}


add_action('wp_ajax_login_user', 'login_user');
add_action('wp_ajax_nopriv_login_user', 'login_user');
function login_user(){
	$response = '';
	$data = json_decode(stripslashes($_REQUEST['data_content']), true);
	$email  = $data['email'];
	$password = $data['password'];
	$redirect = $data['redirect'];
	$user_return = get_user_by('email', $email);
	$info = array();
	$info['user_login'] = $user_return->user_login;
	$info['user_password'] = $password;
	$info['remember'] = $data['remember'];
	$nonce = $data['_wpnonce'];
	
	if (! isset( $nonce ) || ! wp_verify_nonce( $nonce, 'login_security')) {
   	$response = 'Sorry, your nonce did not verify.';   
	} else {	
    $user_signon = wp_signon( $info, false );
    	if ( is_wp_error($user_signon) ){
        	$response = array('loggedin'=>false, 'message'=>__('Wrong username or password.'), 'redirect' => '');
    	} else {
        	$response =  array('loggedin'=>true, 'message'=>__('Login successful, redirecting...'), 'redirect' => $redirect);
    	}    
	}
	echo json_encode($response);
	exit();
}
/*
add_action('wp_ajax_generate_wives', 'generate_wives');
add_action('wp_ajax_nopriv_generate_wives', 'generate_wives');
function generate_wives(){
	$wives_array = array('0', '1', '2', '3', '4');
		$response = "";
		$response .= '<select tabindex="7" class="form-control" id="reg-dob-day" name="reg-dob-day"  data-fv-notempty="true" data-fv-message="Day is required."><option selected="selected" label="Day" value="">Day</option>';
    	foreach($wives_array as $wife){
			$response .= '<option value="'.$wife.'">'.$wife.'</option>';
		}
		$response .= '</select>';
		
		echo json_encode($response);
		exit();
}*/

?>