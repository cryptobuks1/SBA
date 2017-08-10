@extends('layouts.admin')
@section('title','Projects')
@section('content')
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url(route('admin_dashboard'))}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{url(route('Projects'))}}" title="View all Projects" class="tip-bottom"><i class="icon-tasks"></i> Projects</a></div>
	
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <!---everything was here once-->
	<div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Projects</h5>
            <span class="label label-info"></span>
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
			  <th>Project&nbsp;Name</th>
			  <th>Number</th>
			  <th>Type</th>
			  <th>Started&nbsp;Date</th>
			  <th>End&nbsp;Date</th>
			  <th>Status</th>
			  <th>Action</th>
			</tr>
		  </thead>
		  <tbody>
			@foreach($projects as $project)
				<tr>
					<td>{{ucfirst($project->name)}}</td>
					<td>{{$project->number}}</td>
					<td>{{$project->type}}</td>
					<td><?php echo $project->start_date == null?"Never":date('Y-m-d',strtotime($project->start_date));?></td>
					<td><?php echo $project->end_date == null?"Never":date('Y-m-d',strtotime($project->end_date));?></td>
					<td>
						@if($project->is_active == 1)
							<span class="label label-success">Active</span>
						@else
							<span class="label label-important">Inactive</span>
						@endif
					</td>
					<td><a href="{{route('Edit.Project',[$project->id])}}" title="Edit Project" class="tip-top btn btn-info btn-xs"><i class="icon-edit" ></i></a>
					@if($project->is_active == 1)
						<a href="{{route('Block.Project',[$project->id])}}" title="Deactivate Project" onclick="return confirm('Deactivate this Project, Are you sure ?')" class="btn btn-warning tip-top"><i class="icon-lock"></i></a>
					@else
						<a href="{{route('Unblock.Project',[$project->id])}}" title="Activate Project" class="tip-top btn btn-danger"><i class="icon-unlock"></i></a>
					@endif
					<a href="{{route('Delete.Project',[$project->id])}}" onclick="return confirm('Delete this Project, are you sure ?')" title="Delete Project" class="tip-top btn btn-danger btn-xs"><i class="icon-trash"></i></a>
					</td>
				</tr>
			@endforeach
		  </tbody>
		</table>
		<div class="pagination ">{{$projects->appends($_REQUEST)->render()}} </div>
	  </div>
	</div>
  </div>
</div>
<!--end-main-container-part-->
@endsection