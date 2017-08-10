<?php

namespace App\Http\Controllers\admin;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use App\users;
use Auth;
use Cookie;



class AdminController extends Controller{
	
	public function loginvalidate(Request $request){
		if (Auth::check()) {
		// The user is logged in...
			return redirect('admin/dashboard');
		}
		$this->validate($request, [
			'email'    => 'required|email', // make sure the email is an actual email
			'password' => 'required', // password required
		]);
			$userdata = array(
				'email'     => $request->get('email'),
				'password'  => $request->get('password'),
				'is_admin'  => TRUE
			);
		// attempt to do the login
		if (Auth::attempt($userdata)) {
			//validation successful!
			$id = Auth::id();
			return redirect('admin/dashboard');
		} else {
			 //validation not successful, send back to form 
			$request->session()->flash('error', 'Invalid email or password.');
			return redirect()->back();
		}
	}
	
	public function loginvalidate2(Request $request){
		$rules = [
				'email'    => 'required|email', // make sure the email is an actual email
				'password' => 'required', // password required
			];
		// run the validation rules on the inputs from the form
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator) // send back all errors to the login form
				->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
			// create our user data for the authentication
			$userdata = array(
				'email'     => $request->get('email'),
				'password'  => $request->get('password'),
				'is_admin'  => TRUE
				//,'status'	=> TRUE
			);
			// attempt to do the login
			if (Auth::attempt($userdata)) {
				//validation successful!
				return redirect('admin/dashboard');
			} else {
				 //validation not successful, send back to form 
				$request->session()->flash('error', 'Invalid email or password.');
				return redirect()->back();
			}
		}
	}
}