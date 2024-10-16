<?php

namespace App\View\Components\projects;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class projectHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public $projectMenu;
    public $projectApp;
    public $selectedMenu;
    public function __construct($projectApp, $projectMenu, $selectedMenu)
    {
        $this->projectApp = $projectApp;
        $this->projectMenu = $projectMenu;
        $this->selectedMenu = $selectedMenu;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.projects.project-header');
    }
}
