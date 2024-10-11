<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public $inputType;
    public $inputName;
    public $inputClass;
    public $placeholder;
    public $label;

    public function __construct($inputType, $inputName, $inputClass, $placeholder, $label)
    {
        $this->inputType = $inputType;
        $this->inputName = $inputName;
        $this->inputClass = $inputClass;
        $this->placeholder = $placeholder;
        $this->label = $label;
    }
    
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
