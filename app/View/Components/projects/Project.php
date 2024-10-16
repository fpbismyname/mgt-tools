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
     protected $view;
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
        return view("components.projects.$this->view", compact('project'));
    }
}
