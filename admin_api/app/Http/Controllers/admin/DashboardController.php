<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\admin\users;

class DashboardController extends Controller{
	
	public function view_dashboard(){
		$users = Users::where('is_deleted', 0)->where('is_admin',0)->get();
		$users_count = $users->count(); // number of users
		// array data to pass to view
		$data['user_count'] = $users_count; 
		$data['users'] = $users;
		return view('admin.dashboard', ['data' => $data]);
	}
}