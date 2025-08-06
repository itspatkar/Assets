<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $passvar;

    /**
     * Create a new component instance.
     */
    public function __construct($type, $name, $passvar = "Default Test")
    {
        $this->type = $type;
        $this->name = $name;
        $this->passvar = $passvar;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
