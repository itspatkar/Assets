<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class Clicker extends Component
{

    public function handleClick()
    {
        dump("clicked!");
    }

    public function createStudent()
    {
        $student = new Student;
        $student->name = "Student";
        $email = "student" . count(Student::all()) . "@mail.com";
        $student->email = $email;
        $student->age = 18;
        $student->city = "Mumbai";
        $student->save();
    }

    public function render()
    {
        $title = "Title";

        $students = Student::all();

        return view('livewire.clicker', [
            'title' => $title,
            'students' => $students
        ]);
    }
}
