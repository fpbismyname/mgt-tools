<?php

namespace App\View\Components\projects;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class Project extends Component
{
    /**
     * Create a new component instance.
     */
    public $project;
    public $menu;
    public function __construct($project, $menu)
    {
        $this->project = $project;
        $this->menu = $menu;
    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $project = $this->project;
        return view("components.projects.project", compact('project'));
    }
}
