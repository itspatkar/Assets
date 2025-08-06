<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class Form extends Component
{
    use WithPagination;

    public $name;
    public $email;
    public $age;
    public $city;

    public function createStudent()
    {
        $this->validate([
            'name' => 'required',
            'email' =>  'required|email',
            'age' => 'required|numeric|min:16|max:28',
            'city' => 'required'
        ]);

        $student = new Student();
        $student->name = $this->name;
        $student->email = $this->email;
        $student->age = $this->age;
        $student->city = $this->city;
        $student->save();

        $this->reset('name', 'email', 'age', 'city');

        session()->flash('success', 'Student created successfully');
    }

    public function render()
    {
        return view('livewire.form');
    }
}
