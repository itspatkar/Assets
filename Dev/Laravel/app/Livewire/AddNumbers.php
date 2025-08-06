<?php

namespace App\Livewire;

use Livewire\Component;

class AddNumbers extends Component
{
    public $num1, $num2, $result = 0;

    public function addNum()
    {
        $this->result = $this->num1 + $this->num2;
    }

    public function render()
    {
        return view('livewire.add-numbers');
    }
}
