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

    public function __construct(public $problemDomain, public $projectId)
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.projects.problem-domain');
    }
}
