<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        $students = Student::paginate(10);

        return view('livewire.show', [
            'students' => $students
        ]);
    }
}
