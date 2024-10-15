<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeaderProject extends Component
{
    /**
     * Create a new component instance.
     */

     public $projectMenu;
     public $projectApp;
    public function __construct($projectApp, $projectMenu)
    {
        $this->projectApp = $projectApp;
        $this->projectMenu = $projectMenu;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header-project');
    }
}
