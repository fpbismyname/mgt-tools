<?php

namespace App\View\Components\projects;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class useCaseVsFeat extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $useCase, public $projectId, public $solutionDomain)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.projects.use-case-vs-feat');
    }
}
