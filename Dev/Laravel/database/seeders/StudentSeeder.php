<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Student::create([
        //     'name' => 'Mandar',
        //     'email' => 'mandar@email.com'
        // ]);

        $students = collect([
            [
                'name' => 'Mandar',
                'email' => 'mandar@email.com',
                'age' => '22',
                'city' => 'Mumbai'
            ],
            [
                'name' => 'Aman',
                'email' => 'aman@email.com',
                'age' => '19',
                'city' => 'Pune'
            ]
        ]);

        $students->each(function ($student) {
            Student::insert($student);
        });
    }
}
