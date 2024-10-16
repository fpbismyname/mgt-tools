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
    public $view;
    public $menu;
    public $project;
    public function __construct($project, $menu)
    {
        $this->project = $project;
        $this->view = Str::lower(Str::slug($menu));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $project = $this->project;
        if (view()->exists("components.projects.$this->view")) {
            return view("components.projects.$this->view", compact('project'));
        }
        abort(404);
    }
}
