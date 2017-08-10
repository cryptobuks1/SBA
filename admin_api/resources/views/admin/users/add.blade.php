@extends('layouts.admin')
@section('title','Add User')
@section('content')
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url(route('admin_dashboard'))}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{url(route('users'))}}" title="View all users" class="tip-bottom"><i class="icon-group"></i> Users</a><a href="javascript:void(0)" title="Add User" class="tip-bottom"><i class="icon-user"></i> Add User</strong></a></div>
	
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <!---everything was here once-->
	<div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Users</h5>
            <span class="label label-info"></span> </div>
          <div class="widget-content ">
			<form action="{{url(route('Add.User'))}}" method="POST" class="form-horizontal" >
				<div class="control-group">
				<label class="control-label">Username :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('username') }}" name="username" placeholder="Username" />
				@if ($errors->has('username'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('username') }}</label>@endif
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Email :</label>
				<div class="controls">
				<input type="text" value="{{ old('email') }}" class="span8" name="email" placeholder="Last name" />
				@if ($errors->has('email'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</label>@endif
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Phone :</label>
				<div class="controls">
				<input type="text" class="span8" name="phone" value="{{ old('phone') }}" placeholder="Phone" />
				@if ($errors->has('phone'))<label style="color:indianred" for="inputError" >{{ $errors->first('phone') }}</label>@endif
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Password :</label>
				<div class="controls">
				<input type="password" class="span8" name="password" value="{{ old('password') }}" placeholder="Change Password" />
				
				@if ($errors->has('password'))<label style="color:indianred" for="inputError" >{{ $errors->first('password') }}</label>@endif
				</div>
				</div>
				<div class="form-actions">
				<button type="submit" class="btn btn-success">Save</button>
				</div>
			</form>
          </div>
        </div>
  </div>
</div>
<!--end-main-container-part-->
@endsection