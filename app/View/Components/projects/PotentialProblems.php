<?php

namespace App\View\Components\projects;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PotentialProblems extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $projectId, public $solutionDomain, public $potentialProblem, public $solutionType)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.projects.potential-problem');
    }
}
