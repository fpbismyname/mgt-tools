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
    public $projectApp;
    public function __construct($projectApp, $menu)
    {
        $this->projectApp = $projectApp;
        $this->view = Str::lower(Str::slug($menu));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $project = $this->projectApp;
        $view = "components.projects.$this->view";

        dd($view);
        if (view()->exists($view)) {
            return view($view, compact('project'));
        }
        abort(404);
    }
}
