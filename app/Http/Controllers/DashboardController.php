<?php

namespace App\Http\Controllers;

use App\Models\ProjectMenu;
use App\Models\Projects;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $allProjects = Projects::all();
        return view('dashboard.welcome', compact("allProjects"));
    }
    public function addProject(Request $request)
    {
        if (
            !$request->filled("project_name") ||
            !$request->filled("project_desc") ||
            !$request->hasFile("business_process_model") ||
            !$request->hasFile("problem_root_cause")
        ) {
            return back()->withInput()->with('alertMessage', ['Add Project Failed', "Please fill all the fields !", "error"]);
        }

        //Get Req File
        $bpmImage = $request->file("business_process_model");
        $prcImage = $request->file("problem_root_cause");
        //Store Req File to Storage
        $bpmPath = $bpmImage->store("images");
        $prcPath = $prcImage->store("images");
        //Store Req File to Database
        Projects::create([
            'project_name' => $request->project_name,
            'project_desc' => $request->project_desc,
            'business_process_model' => basename($bpmPath),
            'problem_root_cause' => basename($prcPath),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route("dashboard")->with('alertMessage', ['Add Project Success', "New request apps successfully added ! ", "success"]);
    }
}
