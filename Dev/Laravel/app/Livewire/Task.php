<?php

namespace App\Livewire;

use Livewire\Component;

class Task extends Component
{
    public $num1, $num2, $result = 0;

    public function addNum()
    {
        $this->result = $this->num1 + $this->num2;
    }

    // add this function in Livewire Component file
    public function addInputFields()
    {
        $this->addInputFields()[] = [
            'field1' => '',
            'field2' => '',
        ];
    }

    public function render()
    {
        return view('livewire.task');
    }
}
