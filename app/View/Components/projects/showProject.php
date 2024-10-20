<?php

namespace App\View\Components\projects;

use App\Models\PotentialProblem;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\ProblemDomain;
use App\Models\ProjectMenu;
use App\Models\Projects;
use App\Models\SolutionDomains;
use App\Models\TypeSolution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class showProject extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }
    /* 
     * Project Description
    */
    public function index($id)
    {
        //Project
        $project = Projects::where("id_project", $id)->first();
        $projectMenu = ProjectMenu::all();
        $selectedMenu = request()->query('menu');

        //Problem Domain
        $problemDomain = ProblemDomain::all();
        //Solution Domain
        $solutionDomain = SolutionDomains::all();
        $solutionType = TypeSolution::all();
        //Potential Problem
        $potentialProblem = PotentialProblem::all();

        if (!$project) {
            return abort(404);
        }

        return view('components.projects.show-project', compact('project', 'projectMenu', 'selectedMenu', 'problemDomain', 'solutionDomain', 'solutionType', 'potentialProblem'));
    }
    public function editProject(Request $request, $id)
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
            return redirect()->back()->with('alertMessage', ['Edit Project Failed', "Please fill in at least one of all the fields ", "error"]);
        }

        if ($validator->fails()) {
            $errors = $validator->errors();

            if ($errors->has('business_process_model') || $errors->has('business_process_model')) {
                return redirect()->back()->with('alertMessage', ['Edit Project Failed', "The image must be one of the following types: png, jpg, jpeg, gif, webp.", "error"]);
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
                Storage::delete("images/$prevImage");
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
    public function deleteProject($id)
    {
        //Find Project
        $project = Projects::findOrFail($id);
        //Process Delete on database
        if (!$project->delete()) {
            return redirect()->back()->with('alertMessage', ['Delete Project Failed', "Project apps failed to delete !", "error"]);
        }
        //Delete Image on Storage
        Storage::delete("images/$project->business_process_model");
        Storage::delete("images/$project->problem_root_cause");
        //Delete Project on Database
        return redirect()->route('dashboard')->with('alertMessage', ['Delete Project Success', "Project apps deleted !", "success"]);
    }

    /*
    * Problem Domain
    */
    public function addProblemDomain(Request $request, $id)
    {

        //Rules Input
        $rules = [
            'request_desc' => 'required',
        ];

        //Check Input
        $checkInput = Validator::make($request->all(), $rules);

        if ($checkInput->errors()) {
            if ($checkInput->errors()->has('problem_domain')) {
                return redirect()->back()->withInput()->with('alertMessage', ["Add Request Failed", "Please fill the field !", "error"]);
            }
        }
        //Get Project
        $projects = Projects::findOrFail($id);

        //AddProblemDomain
        $problemDomain = new ProblemDomain([
            'problem_name' => $request->request_desc,
        ]);

        //Set Foreignkey
        $projects->Projects_ProblemDomain_id()->save($problemDomain);

        return redirect()->back()->with('alertMessage', ["Add Request Success", "Add request description successfully !", "success"]);
    }
    public function editProblemDomain(Request $request, $id)
    {
        //Rules Input
        $rules = [
            'problem_name' => 'required',
        ];
        //Check Input
        $checkInput = Validator::make($request->all(), $rules);

        if ($checkInput->fails()) {
            if ($checkInput->errors()->has('problem_name')) {
                return redirect()->back()->withInput()->with('alertMessage', ["Add Request Failed", "Please fill the field !", "error"]);
            }
        }
        //Get Project
        $problemDomain = ProblemDomain::findOrFail($id);

        //editProblemDomain
        $problemUpdate = $problemDomain->update($request->all());
        // dd($problemUpdate);
        return redirect()->back()->with('alertMessage', ["Add Request Success", "Add request description successfully !", "success"]);
    }
    public function deleteProblemDomain($id)
    {
        //Get Project
        $problemDomain = ProblemDomain::findOrFail($id);

        if (!$problemDomain->delete()) return redirect()->back()->with('alertMessage', ["Delete Request Failed", "There is something wrong with !", "error"]);

        return redirect()->back()->with('alertMessage', ["Delete Request Success", "Delete request successfully !", "success"]);
    }


    /**
     * //MARK:Solution Domain
     */
    public function addSolutionDomain(Request $request, $id)
    {
        //Rules of input
        $rules = [
            'solution_desc' => 'required',
            'type_solution' => 'required',
        ];
        //Validation Input Value
        $checkInput = Validator::make($request->all(), $rules);
        if ($checkInput->fails()) return redirect()->back()->with('alertMessage', ["Add Solution Failed", "Please fill in all the fields !", "error"]);
        //Set Foregin Key & add data
        $projects = Projects::findOrFail($id);
        $solutionDomain = new SolutionDomains($request->all());
        $projects->Projects_SolutionDomain_id()->save($solutionDomain);
        //Return if Success
        return redirect()->back()->with('alertMessage', ["Add Solution Success", "Add solution description successfully !", "success"]);
    }
    public function editSolutionDomain(Request $request, $id)
    {
        // dd("updated");
        if ($request->solution_desc && $request->solution_desc == ""){
            return redirect()->back()->with('alertMessage', ["Edit Solution Failed", "Please fill in the field !", "error"]);
        }
        //Get Project
        $solutionDomain = SolutionDomains::findOrFail($id);

        //editProblemDomain
        $solutionDomain->update($request->all());

        return redirect()->back()->with('alertMessage', ["Edit Solution Success", "Edit solution successfully !", "success"]);
    }
    public function deleteSolutionDomain($id)
    {
        //Get Project
        $solutionDomain = SolutionDomains::findOrFail($id);

        if (!$solutionDomain->delete()) return redirect()->back()->with('alertMessage', ["Delete Request Failed", "There is something wrong with !", "error"]);

        return redirect()->back()->with('alertMessage', ["Delete Request Success", "Delete request successfully !", "success"]);
    }

    /**
     * Potential problem
     */
    public function editPotentialProblem()
    {
        dd("edit");
    }
    public function deletePotentialProblem()
    {
        dd("delete");
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.projects.show-project');
    }
}
