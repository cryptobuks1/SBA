<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\users;
use App\Contact;
use App\Balance;
use App\Settings;
use App\Projects;
use App\Suggested_porjects;
use Auth;
use Cookie;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
	
	public function __construct()
	{	//
		//Response
		//
		//Success
        $this->success = array('status_code'=>200,'ack'=>'success');
		//Request Error
		$this->bad_request = array('status_code'=>400,'ack'=>'Bad Request');
		$this->server_error = array('status_code'=>500,'ack'=>'Internal Server Error');
		//Fields Errors
        $this->name = array('status_code'=>601,'ack'=>'Name Field is Empty');
        $this->email = array('status_code'=>602,'ack'=>'Email Field is Empty');
        $this->email_exist = array('status_code'=>603,'ack'=>'Email already exist');
        $this->phone = array('status_code'=>604,'ack'=>'Phone Number Field is Empty');
        $this->phone_exist = array('status_code'=>605,'ack'=>'Phone Number Field is Empty');
        $this->password = array('status_code'=>606,'ack'=>'Password Field is Empty');
		$this->new_password = array('status_code'=>607,'ack'=>'New Password Field is Empty');
        $this->confirm_password = array('status_code'=>608,'ack'=>'Confirm Password Field is Empty');
        $this->confirm_password_not_match = array('status_code'=>609,'ack'=>'Confirm Password does not matching');
        $this->password_not_match = array('status_code'=>610,'ack'=>'Old Password does not Matching');
        $this->login_invalid = array('status_code'=>611,'ack'=>'Invalid Email or Password');
        $this->no_user_exist = array('status_code'=>612,'ack'=>'No User Exist');
        $this->description = array('status_code'=>613,'ack'=>'Description Field is Empty');
        $this->address = array('status_code'=>614,'ack'=>'Address Field is Empty');
	}
	
	
	public function test(Request $request) {
		$response  = 	array('success'=>0,'message'=>$request->test);
		echo json_encode($response); die;
	}
	
	public function register(Request $request) {
		// validate the info, create rules for the inputs
		if($request->username != ""){ // Validate Parameter username
			$username = $request->username;
		}else{
			$response  = 	$this->name;
			echo json_encode($response); die;
		}
		if($request->email != ""){ // Validate Parameter email
			$email = $request->email;
			$exist_email = Users::where('email', '=', $email )->first();
				if (!empty($exist_email))  { // check if Email exist
					$response  = 	 $this->email_exist;
					echo json_encode($response); die;
				}
		}else{
			$response  = $this->email;
			echo json_encode($response); die;
		}
		if($request->phone != ""){// Validate Parameter Phone
			$phone = $request->phone;	
		}else{
				$response  = 	 $this->phone;
			echo json_encode($response); die;
		}
		if($request->password != ""){// Validate Parameter Password
			$password = $request->password;
		}else{
			$response  = 	$this->password;
			echo json_encode($response); die;
		}
		if($request->confirm_password != ""){// Validate Parameter Confirm Password
			$confirm_password = $request->confirm_password;
		}else{
			$response  = 	$this->confirm_password;
			echo json_encode($response); die;
		}
		if($request->password != $request->confirm_password){
			$response  = 	$this->confirm_password_not_match;
			echo json_encode($response); die;
		}
		$token_key = str_random(16); //token key for session purpose
		do {
			$referral_code = str_random(8); // referral code auto generated
			$unique_code = Users::wherereferral_code($referral_code)->first();
		}
		while(!empty($unique_code));
		$user = new Users;
		$user->username = ucfirst($username);
		$user->email = $email;
		$user->phone = $phone;
		$user->password = Hash::make($password);
		$user->referral_code = $referral_code;
		$user->token_key = $token_key;
		$saved = $user->save();
		if($saved){//user created
			//First time login reward
			$amount = settings::where('type', 'login_reward')->first();
			$user_id = $user->id;
			$balance = new balance;
			$balance->user_id = $user_id;
			$balance->amount = $amount->value;
			$balance->description = 'first time login';
			$saved_balance = $balance->save();
			//setting up mail
			$email_from = settings::where('type', 'email_from')->first();
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <'.$email_from->value.'>' . "\r\n";
			$message = "<h1>Welcome to SMART BUILD ASIA, your account is successfully created</h1><p>If you have any questions or encounter any problems, Please contact the administrator.";
			if(mail($email,'Welcome to SMART BUILD ASIA',$message,$headers)){
				// mail is send
			}
			$response  = 	$this->success;
			$response['response']['detail']  = array('user_id'=>$user_id);
			echo json_encode($response); die;
		}else{
			//user not created
			$response  = 	$this->server_error;
			echo json_encode($response); die;
		}
	}
	
	
	public function login(Request $request) {
		// validate the info, create rules for the inputs
		if($request->login_email != ""){ // Validate Parameter Email 
			$login_email = $request->login_email;
		}else{
			$response  = 	 $this->email;
			echo json_encode($response); die;
		}
		if($request->login_password != ""){// Validate Parameter Password
			$login_password = $request->login_password;
		}else{
			$response  = 	$this->password;
			echo json_encode($response); die;
		}
		// create our user data for the authentication
		$userdata = array(
			'email'     => $login_email,
			'password'  => $login_password,
			'is_admin'	=> FALSE,
			'is_active'	=> TRUE,
			'is_deleted'	=> FALSE
		);
		if (Auth::attempt($userdata)) { // attempt to do the login
			// validation successful!
				$user_id = Auth::user()->id;
				$currentuser = Users::selectRaw('id,username,email,phone,referral_code,token_key')->findorfail($user_id);
				Users::where('id', $user_id)->update(['last_login' => date('Y-m-d h:i:s')]);
				$response  = 	$this->success;
				$response['response']['detail']  = $currentuser;
				echo json_encode($response); die;
		} else {
			// validation unsuccessful!
				$response  = $this->login_invalid;
				echo json_encode($response); die;
		}
	}
	
	public function forgot_password(Request $request) {
		if($request->login_email != ""){ // Validate Parameter Email
			$email = $request->login_email;
			$user = Users::where('email', '=', $email )->first();
		}else{
			$response  = 	$this->email;
			echo json_encode($response); die;
		}
		if ($user == null) {//user not exist
			$response  = $this->no_user_exist;
			echo json_encode($response); die;
		}else{ //user exist
			//setting up Email
			$email_from = settings::where('type', 'email_from')->first();
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <'.$email_from->value.'>' . "\r\n";
		
			$length = 8;
			$characters = '0123456789abcdefghijklmnopqrstuvwxyz';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			$message = "<h1>Your Password Has Been Changed!</h1>This email confirms that your password has been changed.<br>To log in the SMART BUILD ASIA use the following Password. <br> <b>Password: <b> ".$randomString."<br><p>If you have any questions or encounter any problems while logging in, Please contact the administrator.";

			if(mail($user->email,'Password Reset',$message,$headers)){
				// mail is send
				Users::where('id', $user->id)->update([ 'password' => \Hash::make($randomString)]);
				$response  = 	 $this->success;
				echo json_encode($response); die;
			}else{
				// mail not send
				$response  = 	$this->server_error;
				echo json_encode($response); die;
			}
		}
	}
	
	public function change_password(Request $request) {
		if($request->new_password != ""){// Validate Parameter New Password
			$new_password = $request->new_password;
		}else{
			$response  = 	$this->new_password;
			echo json_encode($response); die;
		}
		if($request->confirm_password != ""){// Validate Parameter Confirm Password
			$confirm_password = $request->confirm_password;
		}else{
			$response  = 	$this->confirm_password;
			echo json_encode($response); die;
		}
		if($request->new_password != $request->confirm_password){ // 
			$response  = 	$this->confirm_password_not_match;
			echo json_encode($response); die;
		}
		if($request->old_password != ""){ // Validate Parameter Old password
			$old_password = $request->old_password;
		}else{
			$response  = 	$this->password_not_match;
			echo json_encode($response); die;
		}
		if($request->user_id != ""){ // Check User ID
			$user_id = $request->user_id;
		}else{
			$response  = 	$this->bad_request;
			echo json_encode($response); die;
		}
		$user = Users::findOrFail($user_id);
		if (\Hash::check($old_password,  $user->password)){ //verifing password with old password
			$update = Users::where('id', $user_id)->update([ 'password' => \Hash::make($new_password)]);
			if($update){
				//password updated
				$response  = 	$this->success;
				echo json_encode($response); die;
			}else{
				$response  = 	$this->server_error;
				echo json_encode($response); die;
			}
		}else{
			$response  = 	$this->password_not_match;
			echo json_encode($response); die;
		}
	}

	public function contact_us(Request $request){
		// validate the info, create rules for the inputs
		if($request->name != ""){// Validate Parameter Name
			$name = $request->name;
		}else{
			$response  = $this->name;
			echo json_encode($response); die;
		}
		if($request->email != ""){// Validate Parameter Email ID
			$email = $request->email;
		}else{
			$response  = 	$this->email;
			echo json_encode($response); die;
		}
		if($request->phone != ""){// Validate Parameter Phone
			$phone = $request->phone;
		}else{
			$response  = 	$this->phone;
			echo json_encode($response); die;
		}
		if($request->description != ""){// Validate Parameter Description
			$description = $request->description;
		}else{
			$response  = $this->description;
			echo json_encode($response); die;
		}
			$contact = new Contact;
			$contact->name = $name;
			$contact->email = $email;
			$contact->phone = $phone;
			$contact->description = $description;
			$saved = $contact->save();
		if($saved){
			//Message created
			$response  = 	$this->success;
			echo json_encode($response); die;
		}else{
			//Message not created
			$response  = 	$this->server_error;
			echo json_encode($response); die;
		}
	}
	
	public function create_projects(Request $request){
		// validate the info, create rules for the inputs
		if($request->name != ""){// Validate Parameter Name
			$name = $request->name;
		}else{
			$response  = 	$this->name;
			echo json_encode($response); die;
		}
		if($request->address != ""){// Validate Parameter Address
			$address = $request->address;
		}else{
			$response  = 	$this->address;
			echo json_encode($response); die;
		}
		if($request->description != ""){// Validate Parameter Description
			$description = $request->description;
		}else{
			$response  = 	$this->description;
			echo json_encode($response); die;
		}
		if($request->user_id != ""){ // Check User ID
			$user_id = $request->user_id;
		}else{
			$response  = 	$this->bad_request;
			echo json_encode($response); die;
		}
			$project = new Suggested_projects;
			$project->user_id = $user_id;
			$project->name = $name;
			$project->address = $address;
			$project->description = $description;
			$saved = $project->save();
		if($saved){
			//Project created
			$response  = 	$this->success;
			echo json_encode($response); die;
		}else{
			//Project not created
			$response  = 	$this->server_error;
			echo json_encode($response); die;
		}
	}
}