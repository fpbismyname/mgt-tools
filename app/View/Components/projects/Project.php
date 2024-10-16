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
    protected $view = "project-description";
    public $project;
    public function __construct($project, $menu)
    {
        $this->project = $project;
        $this->view = $menu ? Str::lower(Str::slug($menu)) : $this->view;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $project = $this->project;
        if (view()->exists("components.projects.$this->view")){
            return view("components.projects.project-description", compact('project'));
        }
        abort(404);
    }
}
