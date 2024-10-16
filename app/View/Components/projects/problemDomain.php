<?php

namespace App\View\Components\projects;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use \App\Models\ProblemDomain as PD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class problemDomain extends Component
{
    /**
     * Create a new component instance.
     */
    public $problemDomain;
    public $projectId;

    public function __construct()
    {
        $this->problemDomain = PD::all();
        $this->projectId = 1;
    }
    public function store(Request $request, $id){

        dd("Success", $id);
        // $rules = [
        //     'request_desc' => 'required',
        // ];

        // $checkInput = Validator::make($request->all(), $rules);

        // if ($checkInput->errors()){
        //     return redirect()->back()->withInput()->with('alertMessage', ['Add Request Failed','Please fill the fields !', 'error']);
        // }

        // PD::create([
        //     'problem_name' => $request->request_desc,
        //     'project_id' => $this->projectId
        // ]);

        // return redirect()->back()->with('alertMessage', ['Add Request Success', 'Add request description successfully !','success']);
    }
    public function edit(){

    }
    public function destroy(){

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $problemDomain = $this->problemDomain;
        return view('components.projects.problem-domain');
    }
}
