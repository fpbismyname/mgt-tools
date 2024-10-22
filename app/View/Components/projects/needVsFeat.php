<?php

namespace App\View\Components\projects;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class needVsFeat extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $projectId, public $solutionDomain, public $solutionType, public $problemDomain, public $potentialProblem)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.projects.need-vs-feat');
    }
}
