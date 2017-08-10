<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

	Route::get('breweries', ['middleware' => 'cors', function(){
		return \Response::json(\App\Brewery::with('beers', 'geocode')->paginate(10), 200);
	}]);
	
	Route::get('/', function () { 
			return view('welcome'); 
	});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
|
*/

    Route::group(['middleware' => ['cors']], function () {
		Route::post('test', array('uses' => 'HomeController@test'))->name('test');
		Route::post('registeruser', array('uses' => 'HomeController@register'))->name('Register');
		Route::post('loginuser', array('uses' => 'HomeController@login'))->name('Login');
		Route::post('reset_password', array('uses' => 'HomeController@forgot_password'))->name('Reset.Password');
		Route::post('change_password', array('uses' => 'HomeController@change_password'))->name('Change.Password');
		Route::post('contact', array('uses' => 'HomeController@contact_us'))->name('Contact.Us');
		Route::post('create_projects', array('uses' => 'HomeController@create_projects'))->name('Create.Project');
	});
	
	
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
|
*/

	Route::get('admin/login', function () {
		if (Auth::check()) {
			// The user is logged in...
				return redirect('admin/dashboard');
		}
		return view('admin/login');
	});

	Route::group(['prefix' => 'admin', 'namespace'=>'admin'], function() {
		Route::post('login', array('uses' => 'AdminController@loginvalidate'))->name('login_admin');
		//login
		Route::get('',function(){
		if(Auth::check()) {
			return redirect('admin/dashboard');
		}
		return redirect('admin/login');
		});
		//logout
		Route::get('logout', function () {
			Auth::logout();
			return redirect()->route('login_admin');
		})->name('Admin.Logout');
		//dashboard
		Route::get('dashboard', array('uses'=>'DashboardController@view_dashboard'))->name('admin_dashboard');
		//users
		Route::get('users', array('uses' => 'UsersController@users'))->name('users');
		Route::get('edit_users/{id}', array('uses' => 'UsersController@edit_user'))->name('Edit.User');
		Route::post('update_user', array('uses' => 'UsersController@update_user'))->name('Update.User');
		Route::get('add_user',function(){return view('admin.users.add');})->name('Add.User');
		Route::post('add_user',array('uses'=>'UsersController@add_user'));
		Route::get('block_user/{id}',array('uses'=>'UsersController@block_user'))->name('Block.User');
		Route::get('unblock_user/{id}',array('uses'=>'UsersController@unblock_user'))->name('Unblock.User');
		Route::get('delete_user/{id}', array('uses' => 'UsersController@delete_user'))->name('Delete.User');
		Route::post('import_users',array('uses'=>'UsersController@import_users'))->name('Import.User');
		Route::get('export_users',array('uses'=>'UsersController@export_users'))->name('Export.User');
		Route::get('sample_users',array('uses'=>'UsersController@sample_users'))->name('Sample.User');
		//projects
		Route::get('projects', array('uses' => 'ProjectsController@projects'))->name('Projects');
		Route::get('edit_project/{id}', array('uses' => 'ProjectsController@edit_project'))->name('Edit.Project');
		Route::post('update_project', array('uses' => 'ProjectsController@update_project'))->name('Update.Project');	
		Route::get('block_project/{id}',array('uses'=>'ProjectsController@block_project'))->name('Block.Project');
		Route::get('unblock_project/{id}',array('uses'=>'ProjectsController@unblock_project'))->name('Unblock.Project');
		Route::get('delete_project/{id}', array('uses' => 'ProjectsController@delete_project'))->name('Delete.Project');
	});
