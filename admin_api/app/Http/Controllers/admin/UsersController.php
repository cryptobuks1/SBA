<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\admin\users;
use Illuminate\Support\Facades\Input;
use Excel;
use Response;

class UsersController extends Controller{
	
	public function users(Request $request){
		if (Auth::check()) {
		// The user is logged in...
			if(isset($request->search)){
				$search = $request->search;
				$users = Users::where('is_deleted', 0)->where('is_admin',0)
				->Where(function ($query) use ($search) {
						$query->where('username','like','%' .$search. '%')
						->orWhere('email','like','%' .$search. '%')
						->orWhere('phone','like','%' .$search. '%');
				})
				->orderby('username','ASC')->paginate(10,['*'], 'users');
			}else{
				$users = Users::where('is_deleted', 0)->where('is_admin',0)->orderby('username','ASC')->paginate(10,['*'], 'users');
			}
			return view('admin.users.list', ['users' => $users]);
		}
		return redirect('admin/login');	
	}
	
	public function edit_user($id=null){
		if(Auth::check() && $id!=null){
			$user = Users::where('id',$id)->first();
			return view('admin.users.edit', ['user' => $user]);	
		}else{
			if(Auth::check()){
				return redirect('admin/users');
			}
			return redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	public function update_user(Request $request){
		if($request->id==null){
			return redirect('admin/users');
		}
		
		$id = $request->id;
		$this->validate($request, [
			'email'    => 'required|email|unique:users,email,'.$id, // make sure the email is an actual email
			'phone'    => 'required|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/', // password required
			'username' => 'required', // password required
			'password' => 'nullable|between:6,12|alpha_dash', // password required
		]);
		if($request->password != null){
			$user_data = [
				'email'=>$request->email,
				'phone'=>$request->phone,
				'username'=>$request->username,
				'token_key'=> str_random(16),
				'password'=>Hash::make($request->password)
			];
		}else{
			$user_data = [
				'email'=>$request->email,
				'phone'=>$request->phone,
				'username'=>$request->username,
				'token_key'=> str_random(16)
			];
		}
		$update = Users::where('id',$id)->update($user_data);
		if($update){
			$request->session()->flash('alert-success', 'User was successful updated!');
			return redirect('admin/edit_users/'.$id);
		}	
	}
	
	public function add_user(Request $request){
		if(Auth::check()==false){
			return redirect('admin/login');
		}
		
		$this->validate($request, [
			'email'    => 'required|email|unique:users', // make sure the email is an actual email
			'phone'    => 'required|regex:/^(\+\d{1,3}[- ]?)?\d{10}$/', // password required
			'username' => 'required', // password required
			'password' => 'required|between:6,12|alpha_dash', // password required
		]);
		$token_key = str_random(16); //token key for session purpose
		$referral_code = str_random(8); // referral code auto generated

		$user = new Users;
		$user->username = $request->username;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->password = Hash::make($request->password);
		$user->referral_code = $referral_code;
		$user->token_key = $token_key;
		$saved = $user->save();

		if($saved){
			$request->session()->flash('alert-success', 'User Created Successfully!');
			return redirect('admin/users/');
		}
	}
	
	public function block_user($id=null){
		if(Auth::check() && $id!=null){
			$user = Users::where('id',$id)->update(array('is_active'=>0));
			return redirect()->back();
		}else{
			return redirect()->back();
		}
	}
	
	public function unblock_user($id=null){
		if(Auth::check() && $id!=null){
			$user = Users::where('id',$id)->update(array('is_active'=>1));
			return redirect()->back();
		}else{
			return redirect()->back();
		}
	}
	
	public function delete_user($id=null){
		if(Auth::check() && $id!=null){
			$user = Users::where('id',$id)->update(array('is_deleted'=>1));
			return redirect()->back();
		}else{
			return redirect()->back();
		}
	}
	
	public function import_users(Request $request){
		$rules = array('file_users' => 'required|mimes:csv,txt');
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return redirect()->back()
				->withErrors($validator); // send back all errors to the login form
				return redirect()->back()->flash('error','File is not Uploaded.');
		}else{
				$path = $request->file('file_users')->getRealPath();
				$data = \ Excel::load($path, function($reader) {
				})->get();
				if(!empty($data) && $data->count()){
					foreach ($data as $key => $value) {
						$token_key = str_random(16); //token key for session purpose
						$referral_code = str_random(8); // referral code auto generated
						
						if (strlen($value->password) >= 20){// encrypting password if not
							$password = $value->password;
						}else{
							$password =  Hash::make($value->password);
						}
						$exist_email = Users::where('email', '=', $value->email )->first();
						if (empty($exist_email))  { // check if Email exist
							$insert[] = [
											'username' => $value->username, 
											'email' => $value->email, 
											'phone' => $value->phone, 
											'password' => $password,
											'referral_code' => $referral_code, 
											'token_key' => $token_key
										];
						}
					}
					if(!empty($insert)){
						Users::insert($insert);
						$request->session()->flash('alert-success', 'Users Inserted Successfully!');
					}
				}else{
					$request->session()->flash('alert-error', 'Users not Inserted!');
				}
			return redirect()->back();
		}
	}
	
	public function sample_users(){
		$file = public_path()."/users_sample.csv";
        $headers = array('Content-Type: application/csv',);
        return Response::download($file, 'Users Sample.csv',$headers);
	}
	
	public function export_users(){
		$users_table = Users::selectRaw('username,email,phone,password')->where('is_admin',FALSE)->where('is_deleted',FALSE)->get();
		$columns = array('username', 'email', 'Phone', 'Password');
		$file = fopen('users.csv', 'w');
		fputcsv($file, $columns);// insert header row in csv file
		foreach ($users_table as $row) {
			fputcsv($file, $row->toArray());
		}
		fclose($file);
		$file = public_path()."/users.csv";
        $headers = array('Content-Type: application/csv',);
        return Response::download($file, 'Users.csv',$headers);
	}	
}