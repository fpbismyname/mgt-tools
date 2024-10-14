<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function show($id)
    {
        $project = Projects::where("id_project", $id)->first();
        $projectMenu = DB::table('project_menus')->get();

        if (!$project) {
            return abort(404);
        }

        return view('projects.show', compact('project', 'projectMenu'));
    }
    public function edit(Request $request, $id)
    {
        $rules = [
            'business_process_model' => 'image|mimes:png,jpg,jpeg,gif,webp',
            'problem_root_cause' => 'image|mimes:png,jpg,jpeg,gif,webp',
        ];

        $validator = Validator::make($request->all(), $rules);

        if (
            !$request->filled('project_name') && !$request->filled('project_desc') &&
            !$request->file('business_process_model') && !$request->file('problem_root_cause')
        ) {
            return redirect()->back()->with('alertMessage', ['Edit Project Failed',"Please fill in at least one of all the fields ", "error"]);
        }

        if ($validator->fails()) {
            $errors = $validator->errors();

            if ($errors->has('business_process_model') || $errors->has('business_process_model')) {
                return redirect()->back()->with('alertMessage', ['Edit Project Failed',"The image must be one of the following types: png, jpg, jpeg, gif, webp.","error"]);
            }
        }

        //GetFile
        $ProjectImage = [
            'business_process_model' => $request->file('business_process_model'),
            'problem_root_cause' => $request->file('problem_root_cause'),
        ];

        $ImagePath = [
            'bpmImage' => isset($ProjectImage['business_process_model']) ? $ProjectImage['business_process_model']->store("images") : Projects::findOrFail($id)->business_process_model,
            'prcImage' => isset($ProjectImage['problem_root_cause']) ? $ProjectImage['problem_root_cause']->store("images") : Projects::findOrFail($id)->problem_root_cause
        ];

        $ImagePrevPath = [
            'bpmPrevPath' => isset($ProjectImage['business_process_model']) ? Projects::findOrFail($id)->business_process_model : null,
            'prcPrevPath' => isset($ProjectImage['problem_root_cause']) ? Projects::findOrFail($id)->problem_root_cause : null,
        ];

        foreach ($ImagePrevPath as $prevImage) {
            if ($prevImage != null) {
                Storage::delete("images/".$prevImage);
            }
        }

        $updateProject = [
            'project_name' => $request->project_name ?: Projects::findOrFail($id)->project_name,
            'project_desc' => $request->project_desc ?: Projects::findOrFail($id)->project_desc,
            'business_process_model' => basename($ImagePath['bpmImage']),
            'problem_root_cause' => basename($ImagePath['prcImage'])
        ];

        $proj = Projects::findOrFail($id);
        $proj->update($updateProject);

        return redirect()->back()->with('alertMessage', ['Edit Project Success', "Project apps successfully edited ! ", "success"]);
    }
    public function delete($id)
    {
        //Find Project
        $project = Projects::findOrFail($id);
        //Process Delete on database
        if (!$project->delete()) {
            return redirect()->back()->with('alertMessage', ['Delete Project Failed', "Project apps failed to delete !", "error"]);
        }
        //Delete Image on Storage
        Storage::delete($project->business_process_model);
        Storage::delete($project->problem_root_cause);
        //Delete Project on Database
        return redirect()->route('dashboard')->with('alertMessage', ['Delete Project Success',"Project apps deleted !","success"]);
    }
}
