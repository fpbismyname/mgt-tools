<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $allProjects = Projects::all();
        return view('dashboard.welcome', compact("allProjects"));
    }
    public function newProject()
    {
        return view('dashboard.newProject');
    }
    public function addProject(Request $request)
    {

        if (
            !$request->filled("project_name") ||
            !$request->filled("project_desc") ||
            !$request->hasFile("business_process_model") ||
            !$request->hasFile("problem_root_cause")
        ) {
            return back()->withInput()->with('alertMessage', ['title'=>'Add Project Failed', 'desc'=>"Please fill all fields !", 'type'=>"error"]);
        }

        //Get Req File
        $bpmImage = $request->file("business_process_model");
        $prcImage = $request->file("problem_root_cause");
        //Store Req File to Storage
        $bpmPath = $bpmImage->store('images');
        $prcPath = $prcImage->store('images');
        //Store Req File to Database
        Projects::create([
            'project_name' => $request->project_name,
            'project_desc' => $request->project_desc,
            'business_process_model' => $bpmPath,
            'problem_root_cause' => $prcPath,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route("dashboard")->with('alertMessage', ['title'=>'Add Project Success', 'desc'=>"New request apps successfully added ! ", 'type'=>"success"]);
    }
}
