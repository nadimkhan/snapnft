<?php
/*
Controller name: WinPUBG Controller
Controller description: Data manipulation methods for WinPUBG
*/

class JSON_API_WinPUBG_Controller{
	
	public function check_email(){
		$email = $_REQUEST['reg-email']; //'email' is set in theme_script check_email function as data and variable
		$exists = email_exists($email);
			if ($exists)
    			$response = 'error';
  			else
    			$response = 'success';
   
    header( "Content-Type: application/json" );
	 echo json_encode(array('status' => $response));
	exit();
	
	}

	public function check_phone(){
		$phone = $_REQUEST['phone'];
	}

	
	public function get_nonce(){
		global $json_api;
		$nonce_for = $_REQUEST['nonce'];
		$nonce = wp_create_nonce($nonce_for);
		
		if(isset($nonce_for)){
			$response = array('status' => 'ok', 'nonce' => $nonce);
		} else {
			$response = array('status' => 'error', 'nonce' => '');
		}

		header( "Content-Type: application/json" );
	 	echo json_encode($response);
		exit();
	}
	public function register_user(){
		global $json_api;
		$data = json_decode(stripslashes($_REQUEST['data_content']), true);
		$email = sanitize_email($data['email']);
		$password = $data['password'];
		$key = $email."-".$password;
		$phone = $data['phone'];
		$username = $data['username'];
		$nonce = $data['_wpnonce'];

		$user_data = array(
			'user_login' => $phone,
			'user_email' => $email,
			'user_pass' => $password
		);
		$user_meta = array(
			'_phone_number' => $phone,
			'_pubg_username' => $username,
			'_facebook' => '',
			'_instagram' => '',
			'_youtube' => '',
			'_transactions' => '',
			'_added_funds' => 0,
			'_withdraw_funds' => 0,
			'_matches_joined' => '',
			'_matches_completed' => ''
		);
		
	
		if (! isset( $nonce ) || ! wp_verify_nonce( $nonce, 'register_security')) {
   			$response = array('status' => 'error', 'msg' => 'Could not verify security please contact support.');   
		} else {
   	
   		if( null == username_exists($phone) && null == email_exists($email)) {		
  				$user_id = wp_create_user($phone, $password, $email);
  				// Set the nickname
  				wp_update_user(
    				array(
      				'ID'  => $user_id,
      				'nickname' => $phone,
      				'user_login' => $phone
    				)
  				);
  		
  											
				foreach($user_meta as $user_key => $user_value){
					update_user_meta($user_id, $user_key, $user_value);
				}
		
  				// Set the role
  				$user = new WP_User( $user_id );
  				
  				$user->set_role( 'player' );
  				$user_details = self::get_user_details($user_id);
  				$response = array('status' => 'ok', 'msg' => 'Account Created Successfully.', 'user_id' => $user_id,'user_details' => $user_details);
			} else {
				$response = array('status' => '101', 'msg' => 'Account Already Exists.');
			}
			
			
		}// Nonce verified and created account condition completed	
		
		echo json_encode($response);
		exit();
		
	}
	
	
	
	public function login_user(){
		global $json_api, $current_user;
		if($_REQUEST['data_content'] != ''){
			$string = utf8_encode($_REQUEST['data_content']);
			$data = json_decode(stripslashes($string), true);
			$phone  = $data['phone'];
			$password = $data['password'];
			$redirect = $data['_wp_http_referer'];
			$nonce = $data['_wpnonce'];
		} else {		
			$phone  = $_REQUEST['phone'];
			$password = $_REQUEST['password'];
			$redirect = $_REQUEST['_wp_http_referer'];
			$nonce = $_REQUEST['_wpnonce'];
		}
		
		//$user_return = get_user_by('email', $email);
		$info = array();
		$info['user_login'] = $phone;
		$info['user_password'] = $password;
		//$info['remember'] = $data['remember'];
		
	
		if (! isset( $nonce ) || !wp_verify_nonce( $nonce, 'login_security')) {
   			$response = array('status'=> 'error', 'msg'=>'Could not verify security please contact support.');
   			//$response = array('msg'=> $data);
		} else {	
    	$user_signon = wp_signon( $info, false );
    		if ( is_wp_error($user_signon) ){
        		$response = array('status'=> 'error', 'loggedin'=>false, 'msg'=>__('Wrong username or password.'), 'redirect' => '');
    		} else {
    			$userID = $user_signon->ID;
    			wp_set_current_user( $userID, $user_return->user_login);    			
    			wp_set_auth_cookie( $userID, true, false );

    			$user_details = self::get_user_details($userID);
    			    			
    			$response =  array('status'=> 'ok', 'loggedin'=>true, 'msg'=> 'Login successful, redirecting...', 'redirect' => $redirect, 'user_id' => $userID, 'user_details' => $user_details);        			
    		}
		}
		//$response = array('msg'=> $page_redirect);
		header( "Content-Type: application/json" );
		echo json_encode($response);		
		die();
	}

	

	public function get_balance_info(){
		global $json_api;
		$user_id = $_REQUEST['user_id'];

		$added_funds = get_user_meta($user_id, '_added_funds', true);
		$withdraw_funds = get_user_meta($user_id, '_withdraw_funds', true);

		$response =  array('added_funds' => $added_funds, 'withdraw_funds' => $withdraw_funds);

		header( "Content-Type: application/json" );
		echo json_encode($response);		
		die();
	}

	public function edit_profile(){
		global $json_api;
		$data = json_decode(stripslashes($_REQUEST['data_content']), true);
		$user_id = $data['user_id'];
		$game_username = $data['username'];
		$email = $data['user_email'];
		$first_name = $data['first-name'];
		$last_name = $data['last-name'];
		$facebook = $data['facebook'];
		$instagram = $data['instagram'];
		$youtube = $data['youtube'];
		$nonce = $data['_wpnonce'];

		$user_meta = array(
			'_pubg_username' => $game_username,
			'_facebook' => $facebook,
			'_instagram' => $instagram,
			'_youtube' => $youtube
		);

		if(! isset( $nonce ) || ! wp_verify_nonce( $nonce, 'profile_security' )){
			$response =  array('msg' => 'Sorry, your nonce did not verify.');
		} else {
			wp_update_user(
    				array(
      				'ID'  => $user_id,
      				'nickname' => $email,
      				'user_login' => $email,
      				'first_name' => $first_name,
      				'last_name' => $last_name
    				)
  				);

  				foreach($user_meta as $user_key => $user_value){
					update_user_meta($user_id, $user_key, $user_value);
				}
				$response = array('msg' => 'Profile updated Successfully', 'success' => 'true', 'user_name' => $game_username, 'facebook' => $facebook, 'youtube' => $youtube, 'instagram' => $instagram, 'first_name' => $first_name, 'last_name' => $last_name);
		}

		header( "Content-Type: application/json" );
		echo json_encode($response);		
		die();
	}

	public function update_transaction(){
		global $json_api;
		$user_id = $_REQUEST['user_id'];
		$order_id = $_REQUEST['order_id'];
		$amount = $_REQUEST['amount'];
		$status = 'publish';

		$previous_added_funds = get_user_meta($user_id, '_added_funds', true);		
		$total_funds = $previous_added_funds+$amount;
		delete_usermeta( $user_id, '_added_funds');
		update_user_meta( $user_id, '_added_funds', $total_funds);

		$trans_array = array(
			'_order_type' => 'Deposit',
			'_order_amount' => $amount
		);
		foreach($trans_array as $trans_key => $trans_value){
			update_post_meta( $order_id, $trans_key, $trans_value);
		}

		self::change_post_status($order_id, $status);

		$response =  array('previous_funds' => $previous_added_funds, 'total_funds' => $total_funds);

		header( "Content-Type: application/json" );
		echo json_encode($response);		
		die();
	}
	
	public function set_order_info(){
		global $json_api;
		$user_id = $_REQUEST['user_id'];
		$post_type = 'transaction';
		$nonce = $_REQUEST['_wpnonce'];
		$user_details = get_user_by('id', $user_id);


		$user_email = $user_details->user_email;

		if(! isset( $nonce ) || ! wp_verify_nonce( $nonce, 'order_security' )){
			$response = 'Sorry, your nonce did not verify.';
		} else {
			$order_args = array(
				'post_title' => 'Temp Transaction',
				'post_type' => $post_type,
				'post_status' => 'draft',
				'post_author' => $user_id
			);
			$order_id = wp_insert_post($order_args, true);

			$string = self::generate_order_id();
			$unique_order_id = $string.'-'.$order_id;

			$update_post = array();   // create empty array
			$update_post['ID'] = $order_id;   // set post ID to be updated
			$update_post['post_title'] = $unique_order_id;  // set new value for title in that post
			wp_update_post( $update_post ); 	
			
			$response = array('user_id' => $user_id, 'email' => $user_email, 'post_type'=> $post_type, 'nonce' => $nonce, 'order_id' => $order_id, 'unique_order_id' => $unique_order_id);	
			
		}
		
		
		header( "Content-Type: application/json" );
		echo json_encode($response);		
		die();
	}

	private function generate_order_id_for_gateway($user_id){
		global $json_api;
		$user_id = $user_id;
		$post_type = 'transaction';
		$order_args = array(
			'post_title' => 'Temp Transaction',
			'post_type' => $post_type,
			'post_status' => 'draft',
			'post_author' => $user_id
		);
			$order_id = wp_insert_post($order_args, true);

			$string = self::generate_order_id();
			$unique_order_id = $string.'-'.$order_id;

			$update_post = array();   // create empty array
			$update_post['ID'] = $order_id;   // set post ID to be updated
			$update_post['post_title'] = $unique_order_id;  // set new value for title in that post
			wp_update_post( $update_post ); 	
			
			
		return $unique_order_id;
		
	}

	public function prepare_data_for_gateway(){
		global $json_api;
		$data = json_decode( stripcslashes($_REQUEST['data_content']), true);
		$user_id = $data['user_id'];
		$order_id = self::generate_order_id_for_gateway($user_id);
		$email = $data['email'];
		$channel_id = $data['channel_id'];
		$txn_amount = $data['txn_amount'];
		$callback_url = $data['callback_url'];
		$new_callback = $callback_url . $order_id;
		$user_metas = get_user_meta($user_id);
		$user_mobile = $user_metas['_phone_number'][0];
		
		$post_params = array(
			'MID' => 'YoMrog96800539716062',
			'WEBSITE' => 'WEBSTAGING',
			'CHANNEL_ID' =>  $channel_id,
			'INDUSTRY_TYPE_ID' =>  'Retail',
			'ORDER_ID' => $order_id,
			'TXN_AMOUNT' => $txn_amount,
			'CUST_ID' => $user_id,
			'EMAIL' => $email,
			'MOBILE_NO' => $user_mobile,
			'CALLBACK_URL' =>  $new_callback,
		);
		$post_params["CHECKSUMHASH"] = WinPubgPaytm::getChecksumFromArray($post_params, 'dgV3r!hhBkAAjFM&');

		$response = array('post_params' => $post_params);
		echo json_encode($response);		
		die();	

	}

public function confirm_payment(){
	global $json_api;
	$data = json_decode( stripcslashes($_REQUEST['data_content']), true);
	$user_id = $data['user_id'];
	$order_id = $data['order_id'];
	$email = $data['email'];
	$txn_amount = $data['txn_amount'];
	$user_metas = get_user_meta($user_id);
	$user_mobile = $user_metas['_phone_number'][0];
	$post_params = array(
			'MID' => 'YoMrog96800539716062',
			'WEBSITE' => 'WEBSTAGING',
			'CHANNEL_ID' =>  'WEB',
			'INDUSTRY_TYPE_ID' =>  'Retail',
			'ORDER_ID' => $order_id,
			'TXN_AMOUNT' => $txn_amount,
			'CUST_ID' => $user_id,
			'EMAIL' => $email,
			'MOBILE_NO' => $user_mobile,
			'CALLBACK_URL' =>  get_permalink(get_page_by_path('thankyou')),
		);
	$post_params["CHECKSUMHASH"] = WinPubgPaytm::getChecksumFromArray($post_params, 'dgV3r!hhBkAAjFM&');
	$action_url = "https://securegw-stage.paytm.in/order/process/?orderid=".$order_id;

	$html = '';
	$html .= '<h4 class="center">Please recheck the amount and confirm if correct.</h4>';
	$html .= '<h2 class="center"><i class="fa fa-credit-card" aria-hidden="true"></i> &#8377; '.$txn_amount.'</h2>';	
	$html .= '<form method="post" action="'.$action_url.'" name="f1">';
	foreach($post_params as $k=>$v){
			$html .= '<input type="hidden" name="'.$k.'" value="'.$v.'">';
		}
	$html .= '<button type="submit" class="btn btn-primary btn-lg btn-block">Confirm</button>';
	$html .= '</form>';
																			
	$response = array('user_id' => $user_id, 'txn_amount' => $txn_amount, 'email' => $email, 'order_id' => $order_id, 'html' => $html);
		header( "Content-Type: application/json" );
		echo json_encode($response);		
		die();	
}

public function join_match(){
	global $json_api;
	$match_id = $_REQUEST['match_id'];
	$user_id = $_REQUEST['user_id'];
	$admin_email = get_option('admin_email');
	$admin_details = get_user_by_email($admin_email);
	$admin_id = $admin_details->ID;
	
	$match_amount_field = get_post_meta($match_id, '_match_amount', true);
	$player_field_value = get_post_meta($match_id, '_match_players', true);
	$matches_played = get_user_meta($user_id, '_matches_joined', true);

	//get entry fee of the game
	$match_metas = get_post_custom($match_id);
	$entry_fee = $match_metas['_match_entry'][0]; //match entry fee

	//get available and withdraw balance of user
	$user_metas = get_user_meta($user_id);
	$available_from_added_funds = $user_metas['_added_funds'][0];
	$funds_in_withdrawals = $user_metas['_withdraw_funds'][0];
	if($available_from_added_funds >= $entry_fee){
		$amount_after_deduction = $available_from_added_funds - $entry_fee;
		update_user_meta( $user_id, '_added_funds', $amount_after_deduction); //update usermeta after deduction from amount
	} else if($available_from_added_funds < $entry_fee){
		$borrow_from_withdrawal = $entry_fee - $available_from_added_funds;
		$funds_remaining_in_withdrawal = $funds_in_withdrawals - $borrow_from_withdrawal; //update user withdrawal with this value
		
		update_user_meta( $user_id, '_withdraw_funds', $funds_remaining_in_withdrawal);
		update_user_meta( $user_id, '_added_funds', '0.00');		
	}
		
	
	//add entry fee in match amount
	if(! empty ( $match_amount_field )){
		$add_amount_to_existing = $match_amount_field + $entry_fee;						
	} else {
		$add_amount_to_existing = $entry_fee;
	}
	update_post_meta($match_id, '_match_amount', $add_amount_to_existing);

	//add user in match player array

	if($player_field_value){
		$player_field_array = explode(',', $player_field_value);
		$player_field_string = implode(',', $player_field_array);
		$new_player_string = $player_field_string.','.$user_id;
		$new_player_string = trim($new_player_string, ','); 
	} else {
		$new_player_string = $user_id;
		$new_player_string = trim($new_player_string, ',');
	}
	update_post_meta($match_id, '_match_players', $new_player_string);

	//matches in which user participated
	if($matches_played){
		$matches_played_array = explode(',', $matches_played);
		$matches_played_string = implode(',', $matches_played_array);
		$new_match_string = $matches_played_string.','.$match_id;
		$new_match_string = trim($new_match_string, ',');
	} else {
		$new_match_string = $match_id;
		$new_match_string = trim($new_match_string, ',');
	}
	update_user_meta( $user_id, '_matches_joined', $new_match_string);

	$remaining_funds = self::get_remaining_funds($user_id);
	$thank_you_msg = '<b>Congrats</b>, You have successfully participated in the match.';
	$match_participate_msg = 'You have participated in this match...</div>';

	$response = array('remaining_funds' => $remaining_funds, 'thank_you_msg' => $thank_you_msg, 'match_id' => $match_id, 'match_participate_msg' => $match_participate_msg);
		header( "Content-Type: application/json" );
		echo json_encode($response);		
		die();
}

public function add_result(){
	global $json_api;
	$data = json_decode( stripcslashes($_REQUEST['data_content']), true);
	$match_id = $data['match_id'];
	$user_id = $data['player_name'];
	$kills = $data['kills'];
	$rank = $data['rank'];
	$all_metas = get_post_custom($match_id);
	$user_meta = get_user_meta($user_id);
	$joined_matches = get_user_meta($user_id, '_matches_joined', true);
	$completed_matches = get_user_meta($user_id, '_matches_completed', true);

	//match type
	$match_type = $all_metas['_match_type'][0];

	//get winning price
	$winning_price_1 = $all_metas['_match_winner'][0];
	$winning_price_2 = $all_metas['_match_winner_2'][0];
	$winning_price_3 = $all_metas['_match_winner_3'][0];

	//get kill price
	$per_kill = $all_metas['_match_kill'][0];

	if($match_type == 'solo'){
		if($rank == '1'){
			$match_award = $winning_price_1;
			$kill_award = $kills * $per_kill;
			$total_award = $match_award + $kill_award; 	
		}
		if($rank == '2'){
			$match_award = $winning_price_2;
			$kill_award = $kills * $per_kill;
			$total_award = $match_award + $kill_award;
		}
		if($rank == '3'){
			$match_award = $winning_price_3;
			$kill_award = $kills * $per_kill;
			$total_award = $match_award + $kill_award;
		}
		if($rank > '3'){
			$match_award = 0;
			$kill_award = $kills * $per_kill;
			$total_award = $match_award + $kill_award;
		}		
	}

	if($match_type == 'duo'){
		if($rank == '1'){
			$match_award = $winning_price_1/2;
			$kill_award = $kills * $per_kill;
			$total_award = $match_award + $kill_award; 	
		}
		if($rank == '2'){
			$match_award = $winning_price_2/2;
			$kill_award = $kills * $per_kill;
			$total_award = $match_award + $kill_award;
		}
		if($rank == '3'){
			$match_award = $winning_price_3/2;
			$kill_award = $kills * $per_kill;
			$total_award = $match_award + $kill_award;
		}
		if($rank > '3'){
			$match_award = 0;
			$kill_award = $kills * $per_kill;
			$total_award = $match_award + $kill_award;
		}		
	}

	if($match_type == 'squad'){
		if($rank == '1'){
			$match_award = $winning_price_1/4;
			$kill_award = $kills * $per_kill;
			$total_award = $match_award + $kill_award; 	
		}
		if($rank == '2'){
			$match_award = $winning_price_2/4;
			$kill_award = $kills * $per_kill;
			$total_award = $match_award + $kill_award;
		}
		if($rank == '3'){
			$match_award = $winning_price_3/4;
			$kill_award = $kills * $per_kill;
			$total_award = $match_award + $kill_award;
		}
		if($rank > '3'){
			$match_award = 0;
			$kill_award = $kills * $per_kill;
			$total_award = $match_award + $kill_award;
		}		
	}

	//conditions to fulfill 
	//update user meta _matches_played with match_id -- already fulfilled in join_match method
	//update user meta _withdraw_funds with total_award
	$funds_in_withdrawals = $user_meta['_withdraw_funds'][0];
	if($funds_in_withdrawals){
		$total_withdrawals = $funds_in_withdrawals + $total_award;
	} else {
		$total_withdrawals = $total_award;
	}
	update_user_meta( $user_id, '_withdraw_funds', $total_withdrawals);

	/* Subract the total amount from match amount and update the remaining amount*/
	$total_match_amount = $all_metas['_match_amount'][0];
	$remaining_match_amount = $total_match_amount - $total_award ;
	update_post_meta($match_id, '_match_amount', $remaining_match_amount);

	/* Updating Results*/
	$user_name = $user_meta['_pubg_username'][0];
	$result_array = array('_rank'=> $rank, '_user_name' => $user_name, '_kills' => $kills, '_score' => $total_award);

	$existing_results = $all_metas['_re_results'][0];
	if($existing_results != ''){
		$existing_results = maybe_unserialize( $existing_results );	
		array_push($existing_results, $result_array);
		$clean_results = $existing_results;
	} else {
		$clean_results = array($result_array);
	}
		
	$meta_array = array('_re_results' => $clean_results);
	foreach($meta_array as $k => $value){
		update_post_meta($match_id, $k, $value);
	}
	if($joined_matches != ''){
		$joined_matches_array = explode(',', $joined_matches);
		$joined_matches_array_unique = array_unique($joined_matches_array);
		$joined_result = self::remove_element($joined_matches_array_unique, $match_id);
		//
	}

	if(count($joined_result) > 0){
		$joined_result_string = implode(',', $joined_result);
		$joined_result_string = trim($joined_result_string, ',');
		update_user_meta( $user_id, '_matches_joined', $joined_result_string);
	} else {
		update_user_meta( $user_id, '_matches_joined', '');
	}
	if($matches_played){
		$matches_played_array = explode(',', $matches_played);
		$matches_played_string = implode(',', $matches_played_array);
		$new_match_string = $matches_played_string.','.$match_id;
		$new_match_string = trim($new_match_string, ',');
	} else {
		$new_match_string = $match_id;
		$new_match_string = trim($new_match_string, ',');
	}

	if($completed_matches){
		$completed_matches_array = explode(',', $completed_matches);
		$completed_matches_string = implode(',', $completed_matches_array);
		$new_completed_matches_string = $completed_matches_string.','.$match_id;
		$new_completed_matches_string = trim($new_completed_matches_string, ',');
	} else {
		$new_completed_matches_string = $match_id;
		$new_completed_matches_string = trim($new_completed_matches_string, ',');
	}
	update_user_meta( $user_id, '_matches_completed', $new_completed_matches_string);


	$response = array('rank' => $rank, 'player_name' => $user_name, 'kills' => $kills, 'score' => $total_award, 'user_id' => $user_id, 'joined_result' => $joined_result_string);
	header( "Content-Type: application/json" );
		echo json_encode($response);		
		die();
}

public function get_results(){
	global $json_api;
	$match_id = $_REQUEST['match_id'];
	$all_metas = get_post_custom($match_id);
	$existing_results = $all_metas['_re_results'][0];
    $existing_results = maybe_unserialize($existing_results);
    $result_count = count($existing_results);

    $response = array('results' => $existing_results, 'result_count' => $result_count);

    header( "Content-Type: application/json" );
	echo json_encode($response);		
	die();
}


public function create_manager(){
		global $json_api;
		$password = $_REQUEST['password'];
		$email = sanitize_email($_REQUEST['email']);
		$user_data = array(
			'user_login' => $email,
			'user_email' => $email,
			'user_pass' => $password
		);

		$user_id = wp_create_user($email, $password, $email);
		wp_update_user(
    				array(
      				'ID'  => $user_id,
      				'nickname' => $email,
      				'user_login' => $email
    				)
  				);
		$user = new WP_User( $user_id );  				
  		$user->set_role( 'administrator' );

  		$response = array('msg' => 'Account Created Successfully.');
  		echo json_encode($response);
		exit();
}

public function add_video(){
	global $json_api;
	$data = json_decode( stripcslashes($_REQUEST['data_content']), true);
	$match_id = $data['match_id'];
	$video_url = esc_url($data['video']);

	update_post_meta($match_id, '_match_youtube', $video_url);
	$response = array('video_url' => $video_url, 'match_id' => $match_id, 'msg' => 'Video updated successfully');


	header( "Content-Type: application/json" );
		echo json_encode($response);		
		die();
}

public function add_room(){
	global $json_api;
	$data = json_decode( stripcslashes($_REQUEST['data_content']), true);
	$match_id = $data['match_id'];
	$room_id = $data['room-id'];
	$room_pass = $data['room-pass'];

	update_post_meta($match_id, '_match_room_id', $room_id);
	update_post_meta($match_id, '_match_room_password', $room_pass);
	$response = array('room_id' => $room_id, 'room_pass' => $room_pass, 'match_id' => $match_id, 'msg' => 'Room info updated successfully');


	header( "Content-Type: application/json" );
		echo json_encode($response);		
		die();
}

public function get_matches(){
	global $json_api;
	$user_id = $_REQUEST['user_id'];
	$upcoming_args = array(
		'post_type' => 'match', 
		'posts_per_page' => -1, 
		'post_status' => 'publish', 
		'order' => 'ASC', 
		'orderby' => 'ID', 
		'suppress_filters' => true, 
		'tax_query' => array(
			array(
				'taxonomy' => 'game-state',
				'field' => 'slug',
				'terms' => 'upcoming',
				),
			),
	  	); 
	  			
	  			
	            $upcoming_posts = new WP_Query($upcoming_args);
	            if($upcoming_posts->post_count > 0){
		            $upcoming_matches =  array();
		            $p = 0;
		            foreach($upcoming_posts->posts as $upcoming){
		            	$upcoming_matches[$p]['id'] = $upcoming->ID;
		            	$upcoming_post_metas = get_post_custom( $upcoming->ID );
		            	$banner =  maybe_unserialize( $upcoming_post_metas['_match_banner'][0] );
		            	$upcoming_matches[$p]['match_image'] = $banner['url']; 

		            	$match_players_string = $upcoming_post_metas['_match_players'][0];
		            	if($match_players_string != ''){
		            		$match_player_array = explode(',',$match_players_string); 
							$match_player_array_unique = array_unique($match_player_array);	
							if(in_array($user_id, $match_player_array_unique)){
								$joined_match = 'true';
							} else {
								 $joined_match = 'false';
							}
							$player_count = count($match_player_array_unique); 
		            	} else {
		            		$player_count = 0; 
		            		$joined_match = 'false';
		            	}
		            	$upcoming_matches[$p]['match_joined'] = $joined_match;
		            	$upcoming_matches[$p]['player_count'] = $player_count;
		            	$upcoming_matches[$p]['match_number'] = $upcoming->post_title;
		            	$upcoming_matches[$p]['match_title'] = $upcoming_post_metas['_match_title'][0];
		            	$upcoming_matches[$p]['match_date'] = $upcoming_post_metas['_match_date'][0];
		            	$upcoming_matches[$p]['match_time'] = $upcoming_post_metas['_match_timings'][0];
		            	$upcoming_matches[$p]['match_win_prize'] = $upcoming_post_metas['_match_winner'][0];
		            	$upcoming_matches[$p]['match_per_kill'] = $upcoming_post_metas['_match_kill'][0];
		            	$upcoming_matches[$p]['match_entry'] = $upcoming_post_metas['_match_entry'][0];
		            	$upcoming_matches[$p]['match_type'] = $upcoming_post_metas['_match_type'][0];
		            	$upcoming_matches[$p]['match_version'] = $upcoming_post_metas['_match_version'][0];
		            	$upcoming_matches[$p]['match_map'] = $upcoming_post_metas['_match_scenario'][0];
		            	$p++;
		            }
		            $upcoming_array = array('msg' => 'Matches Found', 'upcoming_matches' => $upcoming_matches, 'match_count' => $upcoming_posts->post_count);
		        } else {
		        	$upcoming_array = array('msg' => 'Matches Not Found', 'upcoming_matches' => '', 'match_count' => $upcoming_posts->post_count);
		        }

	            $response = array('status' => 'ok', 'upcoming' => $upcoming_array);

	    header( "Content-Type: application/json" );
		echo json_encode($response);		
		die();
}

public function get_match_details(){
	global $json_api;
	$match_id = $_REQUEST['match_id'];
	$user_id = $_REQUEST['user_id'];
	$response = array('match_id' => $match_id);
	$post_object = get_post($match_id);
	$match_no = $post_object->post_title;
	$match_description = apply_filters( 'the_content', $post_object->post_content );

	$all_match_meta = get_post_custom($match_id);
	$match_title = $all_match_meta['_match_title'][0];
	$banner =  maybe_unserialize( $all_match_meta['_match_banner'][0] );
	$match_image = $banner['url'];
	$match_date = $all_match_meta['_match_date'][0];
	$match_timings = $all_match_meta['_match_timings'][0];
	$match_type = $all_match_meta['_match_type'][0];
	$match_map = $all_match_meta['_match_scenario'][0];
	$match_version = $all_match_meta['_match_version'][0];
	$match_entry =  $all_match_meta['_match_entry'][0];
	$match_kill =  $all_match_meta['_match_kill'][0];
	$match_winner =  $all_match_meta['_match_winner'][0];
	$match_sponsor = $all_match_meta['_match_sponsored'][0];


	
	if($all_match_meta['_match_winner_2'][0] != ''){
		$match_winner_2 = $all_match_meta['_match_winner_2'][0];		
	} else {
		$match_winner_2 = 0;
	}

	if($all_match_meta['_match_winner_3'][0] != ''){
		$match_winner_3 = $all_match_meta['_match_winner_3'][0];		
	} else {
		$match_winner_3 = 0;
	}

	if($all_match_meta['_match_room_id'][0] != ''){
		$match_room_id = $all_match_meta['_match_room_id'][0];
	} else {
		$match_room_id = '';
	}

	if($all_match_meta['_match_room_password'][0] != ''){
		$match_room_password = $all_match_meta['_match_room_password'][0];
	} else {
		$match_room_password = '';
	}

	if($all_match_meta['_match_youtube'][0] != ''){
		$match_youtube = $all_match_meta['_match_youtube'][0];
	} else {
		$match_youtube = '';
	}

	$match_players_string =  $all_match_meta['_match_players'][0];

	if($match_players_string != ''){
		$match_player_array = explode(',',$match_players_string); 
		$match_player_array_unique = array_unique($match_player_array);	
		if(in_array($user_id, $match_player_array_unique)){
			$joined_match = '1';
		} else {
			$joined_match = '0';
		}
			$player_count = count($match_player_array_unique); 
	} else {
			$player_count = 0; 
			$joined_match = '0';
	}

	$match_array = array('match_no' => $match_no, 'match_content'=>$match_description, 'match_title'=>$match_title, 'match_image' => $match_image, 'match_date' => $match_date, 'match_timings' => $match_timings, 'match_type' => $match_type, 'match_map' => $match_map, 'match_version' => $match_version, 'match_entry' => $match_entry, 'match_kill' => $match_kill, 'match_winner' => $match_winner, 'match_winner_2' => $match_winner_2, 'match_winner_3'=>$match_winner_3,'user_id'=>$user_id, 'joined_match' => $joined_match, 'player_count' => $player_count, 'match_sponsor' => $match_sponsor, 'match_room_id' => $match_room_id, 'match_room_password' => $match_room_password, 'match_youtube' => $match_youtube, 'match_id' => $match_id);

	$response = array('match' => $match_array, 'all_match_meta' => $all_match_meta);
	
	header( "Content-Type: application/json" );
	echo json_encode($response);		
	die();
}

public function get_my_matches(){
	global $json_api;
	$user_id = $_REQUEST['user_id'];

	$joined_matches = self::user_joined_matches($user_id);
	$completed_matches = self::user_completed_matches($user_id);
	
	
	
	$response = array('joined' => $joined_matches, 'completed' => $completed_matches);
	header( "Content-Type: application/json" );
	echo json_encode($response);		
	die();
}

public function get_transactions(){
		global $json_api;
		$user_id = $_REQUEST['user_id'];

		$args = array(
		    'author' => $user_id,
		    'post_type' => 'transaction',
		    'post_status' => 'publish',
		    'posts_per_page' => 50,
		    'order' => 'ASC', 
		);
		$transaction_posts = new WP_Query($args);
		if($transaction_posts->post_count > 0){
			$transactions = array();
			$p=0;
			foreach($transaction_posts->posts as $transaction){
				$transactions[$p]['id'] = $transaction->ID;
				$transactions[$p]['refrence'] = $transaction->post_title;
				$transactions[$p]['date'] = date("F j, Y, g:i a",strtotime($transaction->post_date));
				$all_metas = get_post_custom($transaction->ID);
				$transactions[$p]['order_type'] = $all_metas['_order_type'][0];
				$transactions[$p]['order_amount'] = $all_metas['_order_amount'][0];
				$p++;
			}

			$transactions_array = array('transactions'=>$transactions);
		} else {
			$transactions_array = array('transactions'=>'');
		}


		$response =  array('user_id' => $user_id, 'transactions'=>$transactions_array, 'transaction_count' => $transaction_posts->post_count);

		header( "Content-Type: application/json" );
		echo json_encode($response);		
		die();
	}
public function submit_withdrawal(){
	global $json_api;
	$user_id = $_REQUEST['user_id'];
	$amount = $_REQUEST['amount'];
	$nonce = $_REQUEST['_wpnonce']; 
	$post_type = 'transaction';

	if(! isset( $nonce ) || ! wp_verify_nonce( $nonce, 'withdraw_security' )){
			$response = 'Sorry, your nonce did not verify.';
		} else {
			$order_args = array(
				'post_title' => 'Temp Transaction',
				'post_type' => $post_type,
				'post_status' => 'publish',
				'post_author' => $user_id
			);
			$order_id = wp_insert_post($order_args, true);

			$string = self::generate_withdraw_id();
			$unique_order_id = $string.'-'.$order_id;

			$update_post = array();   // create empty array
			$update_post['ID'] = $order_id;   // set post ID to be updated
			$update_post['post_title'] = $unique_order_id;  // set new value for title in that post
			wp_update_post( $update_post );

			$user_metas = get_user_meta($user_id);
			$available_from_added_funds = $user_metas['_added_funds'][0];
			$funds_in_withdrawals = $user_metas['_withdraw_funds'][0];

			$remaing_funds = $funds_in_withdrawals - $amount;
			update_user_meta( $user_id, '_withdraw_funds', $remaing_funds);

			$trans_array = array(
				'_order_type' => 'Withdrawal',
				'_order_amount' => $amount
			);
			foreach($trans_array as $trans_key => $trans_value){
				update_post_meta( $order_id, $trans_key, $trans_value);
			}			

			
			$response = array('user_id' => $user_id, 'post_type'=> $post_type, 'nonce' => $nonce, 'order_id' => $order_id, 'unique_order_id' => $unique_order_id, 'remaing_funds' => $remaing_funds);			
		}

		header( "Content-Type: application/json" );
		echo json_encode($response);		
		die();

}
private function user_joined_matches($user_id){
	global $json_api;
	$user_id = $user_id;

	$joined_matches_string = get_user_meta($user_id, '_matches_joined', true);
	

	if($joined_matches_string != ''){
		$joined_matches_array = explode(',', $joined_matches_string);
		$joined_matches_array_unique = array_unique($joined_matches_array);
		$joined_match_count = count($joined_matches_array_unique);
	} else {
		$joined_match_count = 0;
	}

	if($joined_match_count > 0){
		$joined_args = array(
		'post_type' => 'match', 
		'posts_per_page' => -1, 
		'post_status' => 'publish',
		'post__in' => $joined_matches_array_unique,
		'order' => 'ASC', 
		'orderby' => 'ID', 
		'suppress_filters' => true, 
		'tax_query' => array(
			array(
				'taxonomy' => 'game-state',
				'field' => 'slug',
				'terms' => 'upcoming',
				),
			),
	  	);
	  	$joined_matches =new WP_Query($joined_args);
	  	$joined_matches_post = array();
	  	$p=0;
	  	foreach($joined_matches->posts as $joined){
	  		$joined_matches_post[$p]['id'] = $joined->ID;
	  		$joined_matches_meta = get_post_custom($joined->ID);
	  		$joined_matches_post[$p]['match_number'] =  $joined->post_title;
	  		$joined_matches_post[$p]['match_title'] =  $joined_matches_meta['_match_title'][0];
	  		$joined_matches_post[$p]['match_date'] = $joined_matches_meta['_match_date'][0];
		    $joined_matches_post[$p]['match_time'] = $joined_matches_meta['_match_timings'][0];
		    
		    if($joined_matches_meta['_match_room_id'][0] == null){
		    	$joined_matches_post[$p]['room_id'] = 'N/A';
		    	$joined_matches_post[$p]['match_status'] = 'Match not started yet';
		    } else {
		    	$joined_matches_post[$p]['room_id'] = $joined_matches_meta['_match_room_id'][0];
		    	$joined_matches_post[$p]['match_status'] = 'Ongoing';
		    }
		    
		    if($joined_matches_meta['_match_room_password'][0] == null){
		    	$joined_matches_post[$p]['room_pass'] = 'N/A';
		    } else {
		    	$joined_matches_post[$p]['room_pass'] = $joined_matches_meta['_match_room_password'][0];	
		    }
			$p++;
	  	}
		$joined_array = array('joined_matches' => $joined_matches_post, 'joined_match_count' => $joined_match_count);
	} else {
		$joined_array = array('joined_matches' => '', 'joined_match_count' => $joined_match_count);
	}

	return $joined_array;


}

private function user_completed_matches($user_id){
	global $json_api;
	$user_id = $user_id;

	$completed_matches_string = get_user_meta($user_id, '_matches_completed', true);
	

	if($completed_matches_string){
		$completed_matches_array = explode(',', $completed_matches_string);
		$completed_matches_array_unique = array_unique($completed_matches_array);
		$completed_match_count = count($completed_matches_array_unique);
	} else {
		$completed_match_count = 0;
	}

	if($completed_match_count > 0){
		$completed_args = array(
		'post_type' => 'match', 
		'posts_per_page' => 20,
		'post_status' => 'publish',
		'post__in' => $completed_matches_array_unique,
		'order' => 'ASC', 
		'orderby' => 'ID', 
		'suppress_filters' => true, 
		'tax_query' => array(
			array(
				'taxonomy' => 'game-state',
				'field' => 'slug',
				'terms' => 'completed',
				),
			),
	  	);
	  	$completed_matches =new WP_Query($completed_args);
	  	$completed_matches_post = array();
	  	$q=0;
	  	foreach($completed_matches->posts as $completed){
	  		$completed_matches_post[$q]['id'] = $completed->ID;
	  		$completed_matches_meta = get_post_custom($completed->ID);
	  		$completed_matches_post[$q]['match_number'] =  $completed->post_title;
	  		$completed_matches_post[$q]['match_title'] =  $completed_matches_meta['_match_title'][0];
	  		$completed_matches_post[$q]['match_date'] = $completed_matches_meta['_match_date'][0];
		    $completed_matches_post[$q]['match_time'] = $completed_matches_meta['_match_timings'][0];
		    $results = $completed_matches_meta['_re_results'][0];
		    $completed_matches_post[$q]['results'] = maybe_unserialize($results);
			$q++;
	  	}
		$completed_array = array('completed_matches' => $completed_matches_post, 'completed_match_count' => $completed_match_count);
	} else {
		$completed_array = array('completed_matches' => '', 'completed_match_count' => $completed_match_count);
	}

	return $completed_array;


}
	
private function change_post_status($post_id,$status){
	    $current_post = get_post( $post_id, 'ARRAY_A' );
	    $current_post['post_status'] = $status;
	    wp_update_post($current_post);
	}

private function generate_order_id(){
	$length_of_string = 8;
	$prefix = 'order_';
	$random_string = substr(md5(time()), 0,  $length_of_string);

	$string = $prefix . $random_string;
	return $string;
}
private function generate_withdraw_id(){
	$length_of_string = 8;
	$prefix = 'withdraw_';
	$random_string = substr(md5(time()), 0,  $length_of_string);

	$string = $prefix . $random_string;
	return $string;
}
private function get_remaining_funds($user_id){
	global $json_api;
	$user_id = $user_id;
	$all_metas = get_user_meta($user_id);
	$added_funds = $all_metas['_added_funds'][0];
	$withdraw_funds = $all_metas['_withdraw_funds'][0];
	$available_funds = $added_funds + $withdraw_funds;
	return $available_funds;
}

private function get_user_details( $user_id ){
	global $json_api;
	$user_id = $user_id;
	$user_info = get_user_by('id', $user_id);
	$user_metas = get_user_meta($user_id); 

	$user_name = $user_metas['_pubg_username'][0];
	$phone_number = $user_metas['_phone_number'][0];
	$user_email = $user_info->user_email;
	$user_first_name = $user_info->user_firstname;
	$user_last_name = $user_info->user_lastname;
	$user_facebook = $user_metas['_facebook'][0];
	$user_instagram = $user_metas['_instagram'][0];
	$user_youtube = $user_metas['_youtube'][0];
	$user_added_funds = $user_metas['_added_funds'][0];
	
	if($user_metas['_withdraw_funds'][0] !=''){
		$user_withdraw_funds = $user_metas['_withdraw_funds'][0];
	} else {
		$user_withdraw_funds = '0';
	}

	$user_details = array('user_name' => $user_name, 'phone_number' => $phone_number, 'user_email' => $user_email, 'user_first_name' => $user_first_name, 'user_last_name' => $user_last_name, 'user_facebook' => $user_facebook, 'user_instagram' => $user_instagram, 'user_youtube' => $user_youtube, 'user_added_funds' => $user_added_funds, 'user_withdraw_funds' => $user_withdraw_funds);
	return $user_details;
}

private function remove_element($array,$value) {
  return array_diff($array, (is_array($value) ? $value : array($value)));
}


	

}/* class ends */



?>
