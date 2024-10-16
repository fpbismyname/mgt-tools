<?php

namespace App\View\Components\projects;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class projectDescription extends Component
{
    /**
     * Create a new component instance.
     */
    public $project;
    public function __construct($project, $menu)
    {
        $this->project = $project;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.projects.project-description');
    }
}
