<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalPopup extends Component
{
    /**
     * Create a new component instance.
     */
    public $title, $modalName, $customClass;
    public function __construct($title = "", $modalName = "", $customClass = "")
    {
        $this->title = $title;
        $this->modalName = $modalName;
        $this->customClass = $customClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-popup');
    }
}
