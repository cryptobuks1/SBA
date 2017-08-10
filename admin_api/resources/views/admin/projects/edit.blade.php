@extends('layouts.admin')
@section('title','Editing Project :: '.$project->name)
@section('content')
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="{{url(route('admin_dashboard'))}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="{{url(route('Projects'))}}" title="View all projects" class="tip-bottom"><i class="icon-tasks"></i> Projects</a><a href="javascript:void(0)" title="Editing Project : {{$project->name}}" class="tip-bottom"><i class="icon-list-alt"></i> Editing Project : <strong>{{$project->name}}</strong></a></div>
	
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <!---everything was here once-->
	<div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Projects</h5>
            <span class="label label-info"></span> </div>
          <div class="widget-content ">
			<form action="{{url(route('Update.Project'))}}" method="POST" class="form-horizontal" >
				<input type="hidden" name="id" value="{{$project->id}}">
<!-- UPN -->				
				<div class="control-group">
				<label class="control-label">UPN :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('upn',$project->upn) }}" name="upn" placeholder="UPN" />
				@if ($errors->has('upn'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('upn') }}</label>@endif
				</div>
				</div>
<!-- Project Name -->					
				<div class="control-group">
				<label class="control-label">Project Name :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('name',$project->name) }}" name="name" placeholder="Project Name" />
				@if ($errors->has('name'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</label>@endif
				</div>
				</div>
<!-- Project Number -->					
				<div class="control-group">
				<label class="control-label">Project Number :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('number',$project->number) }}" name="number" placeholder="Project Number" />
				@if ($errors->has('number'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('number') }}</label>@endif
				</div>
				</div>
<!-- Project Type -->					
				<div class="control-group">
				<label class="control-label">Project Type :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('type',$project->type) }}" name="type" placeholder="Project Type" />
				@if ($errors->has('type'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('type') }}</label>@endif
				</div>
				</div>
<!-- Lot -->					
				<div class="control-group">
				<label class="control-label">Lot :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('lot',$project->lot) }}" name="lot" placeholder="Lot" />
				@if ($errors->has('lot'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('lot') }}</label>@endif
				</div>
				</div>
<!-- Project Address -->					
				<div class="control-group">
				<label class="control-label">Project Address :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('address',$project->address) }}" name="address" placeholder="Project Address" />
				@if ($errors->has('address'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('address') }}</label>@endif
				</div>
				</div>
<!-- Project Start Date -->					
				<div class="control-group">
				<label class="control-label">Project Start Date :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('start_date',$project->start_date) }}" name="start_date" placeholder="Project Start Date" />
				@if ($errors->has('start_date'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('start_date') }}</label>@endif
				</div>
				</div>
<!-- Project End Date -->					
				<div class="control-group">
				<label class="control-label">Project End Date :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('end_date',$project->end_date) }}" name="end_date" placeholder="Project End Date" />
				@if ($errors->has('end_date'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('end_date') }}</label>@endif
				</div>
				</div>
<!-- Actual Value -->					
				<div class="control-group">
				<label class="control-label">Actual Value :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('actual_value',$project->actual_value) }}" name="actual_value" placeholder="Actual Value" />
				@if ($errors->has('actual_value'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('actual_value') }}</label>@endif
				</div>
				</div>			
<!-- Description -->					
				<div class="control-group">
				<label class="control-label">Description :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('description',$project->description) }}" name="description" placeholder="Description" />
				@if ($errors->has('description'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('description') }}</label>@endif
				</div>
				</div>					
<!-- conquas score -->					
				<div class="control-group">
				<label class="control-label">Conquas Score :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('conquas_score',$project->conquas_score) }}" name="conquas_score" placeholder="Conquas Score" />
				@if ($errors->has('conquas_score'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('conquas_score') }}</label>@endif
				</div>
				</div>	
<!-- structural score -->					
				<div class="control-group">
				<label class="control-label">Structural Score :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('structural_score',$project->structural_score) }}" name="structural_score" placeholder="Structural Score" />
				@if ($errors->has('structural_score'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('structural_score') }}</label>@endif
				</div>
				</div>	
<!-- architectural score -->					
				<div class="control-group">
				<label class="control-label">Architectural Score :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('architectural_score',$project->architectural_score) }}" name="architectural_score" placeholder="Architectural Score" />
				@if ($errors->has('architectural_score'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('architectural_score') }}</label>@endif
				</div>
				</div>	
<!-- m&e score -->					
				<div class="control-group">
				<label class="control-label">M&E Score :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('me_score',$project->me_score) }}" name="me_score" placeholder="M&E Score" />
				@if ($errors->has('me_score'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('me_score') }}</label>@endif
				</div>
				</div>
<!-- extwork_score -->					
				<div class="control-group">
				<label class="control-label">Extwork Score :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('extwork_score',$project->extwork_score) }}" name="extwork_score" placeholder="Extwork Score" />
				@if ($errors->has('extwork_score'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('extwork_score') }}</label>@endif
				</div>
				</div>
<!-- acdsp date approved -->					
				<div class="control-group">
				<label class="control-label">acdsp Date Approved :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('acdsp_date_approved',$project->acdsp_date_approved) }}" name="acdsp_date_approved" placeholder="acdsp Date Approved" />
				@if ($errors->has('acdsp_date_approved'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('acdsp_date_approved') }}</label>@endif
				</div>
				</div>
<!-- top number -->					
				<div class="control-group">
				<label class="control-label">Top Number :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('top_number',$project->top_number) }}" name="top_number" placeholder="Top Number" />
				@if ($errors->has('top_number'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('top_number') }}</label>@endif
				</div>
				</div>
<!-- top date issued -->					
				<div class="control-group">
				<label class="control-label">Top Date Issued :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('top_date_issued',$project->top_date_issued) }}" name="top_date_issued" placeholder="Top Date Issued" />
				@if ($errors->has('top_date_issued'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('top_date_issued') }}</label>@endif
				</div>
				</div>
<!-- floor area -->					
				<div class="control-group">
				<label class="control-label">Floor Area :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('floor_area',$project->floor_area) }}" name="floor_area" placeholder="Floor Area" />
				@if ($errors->has('floor_area'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('floor_area') }}</label>@endif
				</div>
				</div>
<!-- Top Cost -->					
				<div class="control-group">
				<label class="control-label">Top Cost :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('top_cost',$project->top_cost) }}" name="top_cost" placeholder="Top Cost" />
				@if ($errors->has('top_cost'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('top_cost') }}</label>@endif
				</div>
				</div>
<!-- residential units -->					
				<div class="control-group">
				<label class="control-label">Residential Units :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('residential_units',$project->residential_units) }}" name="residential_units" placeholder="Residential Units" />
				@if ($errors->has('residential_units'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('residential_units') }}</label>@endif
				</div>
				</div>
<!-- csc no -->					
				<div class="control-group">
				<label class="control-label">csc No. :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('csc_no',$project->csc_no) }}" name="csc_no" placeholder="csc No." />
				@if ($errors->has('csc_no'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('csc_no') }}</label>@endif
				</div>
				</div>
<!-- csc date issued -->					
				<div class="control-group">
				<label class="control-label">csc Date Issued :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('csc_date_issued',$project->csc_date_issued) }}" name="csc_date_issued" placeholder="csc Date Issued" />
				@if ($errors->has('csc_date_issued'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('csc_date_issued') }}</label>@endif
				</div>
				</div>
<!-- csc cost -->					
				<div class="control-group">
				<label class="control-label">csc Cost :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('csc_cost',$project->csc_cost) }}" name="csc_cost" placeholder="csc Cost" />
				@if ($errors->has('csc_cost'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('csc_cost') }}</label>@endif
				</div>
				</div>
<!-- bp date approved -->					
				<div class="control-group">
				<label class="control-label">bp Date Approved :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('bp_date_approved',$project->bp_date_approved) }}" name="bp_date_approved" placeholder="bp Date Approved" />
				@if ($errors->has('bp_date_approved'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('bp_date_approved') }}</label>@endif
				</div>
				</div>
<!-- accredited Checker -->					
				<div class="control-group">
				<label class="control-label">Accredited Checker :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('accredited_checker',$project->accredited_checker) }}" name="accredited_checker" placeholder="Accredited Checker" />
				@if ($errors->has('accredited_checker'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('accredited_checker') }}</label>@endif
				</div>
				</div>
<!-- asp_date_approved -->					
				<div class="control-group">
				<label class="control-label">asp Date Approved :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('asp_date_approved',$project->asp_date_approved) }}" name="asp_date_approved" placeholder="asp Date Approved" />
				@if ($errors->has('asp_date_approved'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('asp_date_approved') }}</label>@endif
				</div>
				</div>
<!-- architect_in_charge -->					
				<div class="control-group">
				<label class="control-label">Architect Incharge :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('architect_in_charge',$project->architect_in_charge) }}" name="architect_in_charge" placeholder="Architect Incharge" />
				@if ($errors->has('architect_in_charge'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('architect_in_charge') }}</label>@endif
				</div>
				</div>
<!-- professional_engineer -->					
				<div class="control-group">
				<label class="control-label">Professional Engineer :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('professional_engineer',$project->professional_engineer) }}" name="professional_engineer" placeholder="Professional Engineer" />
				@if ($errors->has('professional_engineer'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('professional_engineer') }}</label>@endif
				</div>
				</div>
<!-- project_stage -->					
				<div class="control-group">
				<label class="control-label">Project Stage :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('project_stage',$project->project_stage) }}" name="project_stage" placeholder="Project Stage" />
				@if ($errors->has('project_stage'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('project_stage') }}</label>@endif
				</div>
				</div>
<!-- project_completion_percent -->					
				<div class="control-group">
				<label class="control-label">Project % Completion :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('project_completion_percent',$project->project_completion_percent) }}" name="project_completion_percent" placeholder="Project % Completion" />
				@if ($errors->has('project_completion_percent'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('project_completion_percent') }}</label>@endif
				</div>
				</div>
<!-- qualified_person -->					
				<div class="control-group">
				<label class="control-label">Qualified Person :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('qualified_person',$project->qualified_person) }}" name="qualified_person" placeholder="Qualified Person" />
				@if ($errors->has('qualified_person'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('qualified_person') }}</label>@endif
				</div>
				</div>
<!-- Permit to commence works -->					
				<div class="control-group">
				<label class="control-label">Permit To Commence Works :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('permit_commence_works',$project->permit_commence_works) }}" name="permit_commence_works" placeholder="Permit To Commence Works" />
				@if ($errors->has('permit_commence_works'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('permit_commence_works') }}</label>@endif
				</div>
				</div>
<!-- provisional_permission_date -->					
				<div class="control-group">
				<label class="control-label">Provisional Permission Date :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('provisional_permission_date',$project->provisional_permission_date) }}" name="provisional_permission_date" placeholder="Provisional Permission Date" />
				@if ($errors->has('provisional_permission_date'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('provisional_permission_date') }}</label>@endif
				</div>
				</div>
<!-- written_permission_date -->					
				<div class="control-group">
				<label class="control-label">Written Permission Date :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('written_permission_date',$project->written_permission_date) }}" name="written_permission_date" placeholder="Written Permission Date" />
				@if ($errors->has('written_permission_date'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('written_permission_date') }}</label>@endif
				</div>
				</div>
<!-- estimated_value -->					
				<div class="control-group">
				<label class="control-label">Estimated Value :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('estimated_value',$project->estimated_value) }}" name="estimated_value" placeholder="Estimated Value" />
				@if ($errors->has('estimated_value'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('estimated_value') }}</label>@endif
				</div>
				</div>
<!-- building_components -->					
				<div class="control-group">
				<label class="control-label">Building Components :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('building_components',$project->building_components) }}" name="building_components" placeholder="Building Components" />
				@if ($errors->has('building_components'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('building_components') }}</label>@endif
				</div>
				</div>
<!-- subcontracting_components -->					
				<div class="control-group">
				<label class="control-label">Subcontracting Components :</label>
				<div class="controls">
				<input type="text" class="span8" value="{{ old('subcontracting_components',$project->subcontracting_components) }}" name="subcontracting_components" placeholder="Subcontracting Components" />
				@if ($errors->has('subcontracting_components'))<label style="color:indianred" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('subcontracting_components') }}</label>@endif
				</div>
				</div>
				<div class="form-actions">
				<button type="submit" class="btn btn-success">Update</button>
				</div>
			</form>
          </div>
        </div>
  </div>
</div>
<!--end-main-container-part-->
@endsection