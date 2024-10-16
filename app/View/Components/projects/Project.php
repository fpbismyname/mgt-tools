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
    public $view = "project-description";
    public $menu;
    public $project;
    public function __construct($project, $menu)
    {
        $this->project = $project;
        $this->menu = $menu;
        $this->view = $menu ? Str::lower(Str::slug($menu)) : $this->view;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $project = $this->project;
        $menu = $this->menu;
        if (view()->exists("components.projects.$this->view")){
            return view("components.projects.$this->view", compact('project', 'menu'));
        }
        abort(404);
    }
}
