<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        if (
            !$request->file('business_process_model') &&
            !$request->file('problem_root_cause') &&
            !$request->filled('project_name') &&
            !$request->filled('project_desc')
        ) {
            return redirect()->back()->with('alertMessage', ['title' => 'Edit Project Failed', 'desc' => "Project apps failed to edit ! ", 'type' => "error"]);
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
                Storage::delete($prevImage);
            }
        }

        $updateProject = [
            'project_name' => $request->project_name ?: Projects::findOrFail($id)->project_name,
            'project_desc' => $request->project_desc ?: Projects::findOrFail($id)->project_desc,
            'business_process_model' => $ImagePath['bpmImage'],
            'problem_root_cause' => $ImagePath['prcImage']
        ];

        $proj = Projects::findOrFail($id);
        $proj->update($updateProject);

        return redirect()->back()->with('alertMessage', ['title' => 'Edit Project Success', 'desc' => "Project apps successfully edited ! ", 'type' => "success"]);
    }
}
