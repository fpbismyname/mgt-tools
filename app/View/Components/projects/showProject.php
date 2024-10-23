<?php

namespace App\View\Components\projects;

use App\Models\EliminatedSolutionRank;
use App\Models\PotentialProblem;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\ProblemDomain;
use App\Models\ProjectMenu;
use App\Models\Projects;
use App\Models\SolutionClassification;
use App\Models\SolutionDomains;
use App\Models\SolutionFeasibility;
use App\Models\SolutionPriority;
use App\Models\SolutionRisk;
use App\Models\TypeSolution;
use App\Models\UseCase;
use App\Models\UseCaseActor;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        $solutionDomain = SolutionDomains::all()->where('project_id', $id);
        $solutionType = TypeSolution::all();
        //Potential Problem
        $potentialProblem = PotentialProblem::all();
        //Potential Problem
        $solutionClasification = SolutionClassification::all();
        //Feasibility
        $solutionFeasibility = SolutionFeasibility::all();
        $solutionRisk = SolutionRisk::all();
        $solutionPriority = SolutionPriority::all();
        //Eliminated Solution Rank
        $solutionRank = EliminatedSolutionRank::all();
        //UseCase
        $useCase = UseCase::all();
        $useCaseActor = UseCaseActor::all()->where('project_id', $id);

        if (!$project) {
            return abort(404);
        }

        return view('components.projects.show-project', compact('project', 'projectMenu', 'selectedMenu', 'problemDomain', 'solutionDomain', 'solutionType', 'potentialProblem', 'solutionClasification', 'solutionFeasibility', 'solutionRisk', 'solutionPriority', 'solutionRank', 'useCase', 'useCaseActor'));
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

        return redirect()->back()->with('alertMessage', ['Edit Project Success', "Project apps successfully edited ! ", "success", true]);
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
        return redirect()->back()->with('alertMessage', ["Add Solution Success", "Add solution description successfully !", "success", true]);
    }
    public function editSolutionDomain(Request $request, $id)
    {
        // dd("updated");
        if ($request->solution_desc && $request->solution_desc == "") {
            return redirect()->back()->with('alertMessage', ["Edit Solution Failed", "Please fill in the field !", "error"]);
        }
        //Get Project
        $solutionDomain = SolutionDomains::findOrFail($id);

        //Check Revision
        if ($request->solution_desc) {
            if ($solutionDomain->solution_desc !== $request->solution_desc) {
                //editProblemDomain
                $solutionDomain->update([
                    'solution_revision' => $request->solution_desc,
                    'type_solution' => $request->type_solution
                ]);
            } else {
                $solutionDomain->update([
                    'solution_revision' => $request->solution_desc,
                    'type_solution' => $request->type_solution
                ]);
            }
        } else {
            $solutionDomain->update($request->all());
        }

        return redirect()->back()->with('alertMessage', ["Edit Request Success", "Edit Request data successfully !", "success"]);
    }
    public function deleteSolutionDomain($id)
    {
        //Get Project
        $solutionDomain = SolutionDomains::findOrFail($id);

        if (!$solutionDomain->delete()) return redirect()->back()->with('alertMessage', ["Delete Request Failed", "There is something wrong with !", "error"]);

        return redirect()->back()->with('alertMessage', ["Delete Request Success", "Delete request successfully !", "success"]);
    }

    /**
     * MARK:UseCase
     */
    public function addUseCase(Request $request, $id)
    {
        //Rules of input
        $rules = [
            'case_name' => 'required',
            'case_desc' => 'required',
        ];
        //Validation Input Value
        $checkInput = Validator::make($request->all(), $rules);
        if ($checkInput->fails()) return redirect()->back()->with('alertMessage', ["Add Use Case Failed", "Please fill in all the fields !", "error"]);
        //Set Foregin Key & add data
        $projects = Projects::findOrFail($id);
        $useCase = new UseCase($request->all());
        $projects->Projects_UseCase_id()->save($useCase);
        //Return if Success
        return redirect()->back()->with('alertMessage', ["Add Use Case Success", "Add use case successfully !", "success", true]);
    }
    public function editUseCase(Request $request, $id)
    {
        if ($request->case_name && $request->case_desc && $request->case_desc == "" && $request->case_desc == "") {
            return redirect()->back()->with('alertMessage', ["Edit Use Case Failed", "Please fill in the fields !", "error"]);
        }

        $data = $request->input('case_actor', []);
        $data = Arr::join($data, ',');
        $datas = [
            $request->case_name?['case_name' => $request->case_name]:null,
            $request->case_desc?['case_desc' => $request->case_desc]:null,
            'case_actor' => $data,
            'case_for_solution' => $request->case_for_solution
        ];
        //Get Project
        $useCase = UseCase::findOrFail($id);
        $useCase->update($datas);
        return redirect()->back()->with('alertMessage', ["Edit Use Case Success", "Edit use case successfully !", "success"]);
    }
    public function deleteUseCase($id)
    {
        //Get Project
        $useCase = UseCase::findOrFail($id);

        if (!$useCase->delete()) return redirect()->back()->with('alertMessage', ["Delete Use Case Failed", "There is something wrong with !", "error"]);

        return redirect()->back()->with('alertMessage', ["Delete Use Case Success", "Delete use case successfully !", "success"]);
    }


    /**
     * MARK:UseCaseActor
     */
    public function addUseCaseActor(Request $request, $id)
    {
        //Set Foregin Key & add data
        $projects = Projects::findOrFail($id);
        $useCaseActor = new UseCaseActor($request->all());
        $projects->Projects_UseCase_id()->save($useCaseActor);
        //Return if Success
        return redirect()->back()->with('alertMessage', ["Add Actor Success", "Add use case actor successfully !", "success", true]);
    }
    public function editUseCaseActor(Request $request, $id) 
    {
        if (!$request->actor_name) {
            return redirect()->back()->with('alertMessage', ["Edit Actor Failed", "Please fill in the fields !", "error"]);
        } else {
            //Get Project
            $useCaseActor = UseCaseActor::findOrFail($id);
            $useCaseActor->update($request->all());
        }
        return redirect()->back()->with('alertMessage', ["Edit Actor Success", "Edit use case successfully !", "success"]);
    }
    public function deleteUseCaseActor($id)
    {
        //Get Project
        $useCaseActor = UseCaseActor::findOrFail($id);

        if (!$useCaseActor->delete()) return redirect()->back()->with('alertMessage', ["Delete Actor Failed", "There is something wrong with !", "error"]);

        return redirect()->back()->with('alertMessage', ["Delete Actor Success", "Delete Actor successfully !", "success"]);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.projects.show-project');
    }
}
