@extends('layouts.admin')
@section('title','Users')
@section('content')
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url(route('admin_dashboard'))}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{url(route('users'))}}" title="View all users" class="tip-bottom"><i class="icon-group"></i> Users</a></div>
	
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <!---everything was here once-->
	<div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Users</h5>
            <span class="label label-info"></span>
		  </div>
		 <div class="widget-content nopadding">
			  <form action="{{url(route('Import.User'))}}" method="POST" class="form-horizontal" enctype="multipart/form-data" >
				  <div style="padding:10px;">
				   <label class="btn btn-default">
					Browse <input type="file" name="file_users" required  style="display: none;" accept=".csv">
				</label>&nbsp; &nbsp;<input class="btn btn-success" type="submit" value="submit" title="Upload file">
				<a href="{{url(route('Sample.User'))}}"> <input class="btn btn-info" type="button" value="Sample Data" title="Follow this Format to Upload the Data"> </a>
				<a href="{{url(route('Export.User'))}}" style="float:right;"> <input class="btn btn-primary" type="button" value="Export Data" title="Export All User's Data"> </a>
				</div>
				@if ($errors->has('file_users'))<label style="padding:10px;color:red;">{{ $errors->first('file_users') }}</label>
				@endif
			  </form>
        </div>
        
			
		<div id="searchs" style="position: absolute;z-index: 25;top: 6px;right: 10px;">
		<form>
		  <input placeholder="Search here..." type="text" style="padding: 4px 10px 5px;border: 0;width: 100px;" name="search" value="@if(isset($_GET['search'])){{$_GET['search']}}@endif">
		  <button type="submit" class="tip-bottom" style="border: 0;margin-left: -3px;margin-top: -11px;padding: 5px 10px 4px;background-color: #28B779;"><i class="icon-search icon-white"></i></button>
		</form>
		</div>
	  <div class="widget-content ">
		<table class="table table-bordered table-striped with-check">
		  <thead>
			<tr>
			  <th>User&nbsp;Name</th>
			  <th>Email</th>
			  <th>Phone</th>
			  <th>Joined&nbsp;On</th>
			  <th>Last&nbsp;Logged&nbsp;In</th>
			  <th>Status</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
			@foreach($users as $user)
				<tr>
					<td>{{ucfirst($user->username)}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->phone}}</td>
					<td><?php echo date('Y-m-d',strtotime($user->created_at));?></td>
					<td><?php echo $user->last_login == null?"Never":date('Y-m-d',strtotime($user->last_login));?></td>
					<td>
						@if($user->is_active == 1)
							<span class="label label-success">Active</span>
						@else
							<span class="label label-important">Inactive</span>
						@endif
					</td>
					<td><a href="{{route('Edit.User',[$user->id])}}" title="Edit User" class="tip-top btn btn-info btn-xs"><i class="icon-edit" ></i></a>
					@if($user->is_active == 1)
						<a href="{{route('Block.User',[$user->id])}}" title="Block User" onclick="return confirm('Block this user, Are you sure ?')" class="btn btn-warning tip-top"><i class="icon-lock"></i></a>
					@else
						<a href="{{route('Unblock.User',[$user->id])}}" title="Un-Block User" class="tip-top btn btn-danger"><i class="icon-unlock"></i></a>
					@endif
					<a href="{{route('Delete.User',[$user->id])}}" onclick="return confirm('Delete this user, are you sure ?')" title="Delete User" class="tip-top btn btn-danger btn-xs"><i class="icon-trash"></i></a>
					</td>
				</tr>
			@endforeach
		  </tbody>
		</table>
		<div class="pagination ">{{$users->appends($_REQUEST)->render()}} </div>
	  </div>
	</div>
  </div>
</div>
<!--end-main-container-part-->
@endsection