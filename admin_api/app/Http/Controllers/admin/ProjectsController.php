<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Projects;
use Illuminate\Support\Facades\Input;
use Excel;
use Response;


class ProjectsController extends Controller{
	
   	public function projects(Request $request){
		if (Auth::check()) {
		// The user is logged in...
			if(isset($request->search)){ // search option
				$search = $request->search;
				$projects = Projects::where('is_deleted', 0)
				->Where(function ($query) use ($search) {
						$query->where('name','like','%' .$search. '%')
						->orWhere('number','like','%' .$search. '%');
				})
				->orderby('name','ASC')->paginate(10,['*'], 'projects');
			}else{
				$projects = Projects::where('is_deleted', 0)->orderby('name','ASC')->paginate(10,['*'], 'projects');
			}
			return view('admin.projects.list', ['projects' => $projects]);
		}
		return redirect('admin/login');
	}
	
	public function block_project($id=null){
		if(Auth::check() && $id!=null){
			$projects = Projects::where('id',$id)->update(array('is_active'=>0));
			return redirect()->back();
		}else{
			return redirect()->back();
		}
	}
	
	public function unblock_project($id=null){
		if(Auth::check() && $id!=null){
			$project = Projects::where('id',$id)->update(array('is_active'=>1));
			return redirect()->back();
		}else{
			return redirect()->back();
		}
	}
	
	public function delete_project($id=null){
		if(Auth::check() && $id!=null){
			$project = Projects::where('id',$id)->update(array('is_deleted'=>1));
			return redirect()->back();
		}else{
			return redirect()->back();
		}
	}
	
	public function edit_project($id=null){
		if(Auth::check() && $id!=null){
			$project = Projects::where('id',$id)->first();
			return view('admin.projects.edit', ['project' => $project]);	
		}else{
			if(Auth::check()){
				return redirect('admin/projects');
			}
			return redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	public function update_project(Request $request){
		if($request->id==null){
			return redirect('admin/users');
		}

		$id = $request->id;
		$this->validate($request, [
			'upn'    => 'required|max:40',
			'name'    => 'required|max:200',
			'number'    => 'required|max:40',
			'type'    => 'required|max:800',
			'lot'    => 'required|max:200',
			'address'    => 'required|max:250',
			'start_date'    => 'required',
			'end_date'    => 'required',
			'actual_value'    => 'required|digits:15',
			'description'    => 'required|max:600',
			'conquas_score'    => 'required|max:40',
			'structural_score'    => 'required|max:40',
			'architectural_score'    => 'required|max:40',
			'me_score'    => 'required|max:40',
			'extwork_score'    => 'required|max:40',
			'acdsp_date_approved'    => 'required',
			'top_number'    => 'required|digits:15',
			'top_date_issued'    => 'required|digits:15',
			'floor_area'    => 'required|max:15',
			'top_cost'    => 'required|max:15',
			'residential_units'    => 'required|max:15',
			'csc_no'    => 'required|digits:15',
			'csc_date_issued'    => 'required',
			'csc_cost'    => 'required|max:15',
			'bp_date_approved'    => 'required',
			'accredited_checker'    => 'required|max:200',
			'asp_date_approved'    => 'required|digits:15',
			'architect_in_charge'    => 'required|max:200',
			'professional_engineer'    => 'required|max:200',
			'project_stage'    => 'required|max:80',
			'project_completion_percent'    => 'required|max:8',
			'qualified_person'    => 'required|max:200',
			'permit_commence_works'    => 'required|digits:8',
			'provisional_permission_date'    => 'required|digits:8',
			'written_permission_date'    => 'required|digits:8',
			'estimated_value'    => 'required|max:80',
			'building_components'    => 'required|max:600',
			'subcontracting_components'    => 'required|max:40',
		]);
		
		$project_data = [
			'upn'=>$request->upn,
			'name'=>$request->name,
			'number'=>$request->number,
			'type'=>$request->type,
			'lot'=>$request->lot,
			'address'=>$request->address,
			'start_date'=>$request->start_date,
			'end_date'=>$request->end_date,
			'actual_value'=>$request->actual_value,
			'description'=>$request->description,
			'conquas_score'=>$request->conquas_score,
			'structural_score'=>$request->structural_score,
			'architectural_score'=>$request->architectural_score,
			'me_score'=>$request->me_score,
			'extwork_score'=>$request->extwork_score,
			'acdsp_date_approved'=>$request->acdsp_date_approved,
			'top_number'=>$request->top_number,
			'top_date_issued'=>$request->top_date_issued,
			'floor_area'=>$request->floor_area,
			'top_cost'=>$request->top_cost,
			'residential_units'=>$request->residential_units,
			'csc_no'=>$request->csc_no,
			'csc_date_issued'=>$request->csc_date_issued,
			'csc_cost'=>$request->csc_cost,
			'bp_date_approved'=>$request->bp_date_approved,
			'accredited_checker'=>$request->accredited_checker,
			'asp_date_approved'=>$request->asp_date_approved,
			'architect_in_charge'=>$request->architect_in_charge,
			'professional_engineer'=>$request->professional_engineer,
			'project_stage'=>$request->project_stage,
			'project_completion_percent'=>$request->project_completion_percent,
			'qualified_person'=>$request->qualified_person,
			'permit_commence_works'=>$request->permit_commence_works,
			'provisional_permission_date'=>$request->provisional_permission_date,
			'written_permission_date'=>$request->written_permission_date,
			'estimated_value'=>$request->estimated_value,
			'building_components'=>$request->building_components,
			'subcontracting_components'=>$request->subcontracting_components,
		];
		
		$update = Projects::where('id',$id)->update($project_data);
		if($update){
			$request->session()->flash('alert-success', 'Project was successful updated!');
			return redirect()->back();
		}	
	}
}
