<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


// Basic Controller:
class UserController extends Controller
{
    public function welcome()
    {
        return "welcome";
    }

    public function welcomeView()
    {
        return view('controller.welcome');
    }

    public function greet()
    {
        return "<h2>Hello World!</h2>";
    }

    public function printName(string $name)
    {
        return "<h1>Hello " . $name . "</h1>";
    }

    public function printNameF(string $name)
    {
        return view('controller.greet', ['name' => $name]);
    }

    // Using compact:
    public function printCompact(string $name)
    {
        return view('controller.namecomp', compact('name'));
    }

    public function showGet()
    {
        // Using get():
        $students = DB::table('students')->get();

        // $students = DB::table('students')->where('id', 2)->get();
        // $students = DB::table('students')->select('name', 'city')->get();
        // ->distinct() : return distinct values
        // ->pluck('name') : returns array of values with given keys
        // ->pluck('email', 'name') : return array with 'email' as key & 'name' as value
        // $students = DB::table('students')->where('city', 'Mumbai')->where('age', '>', 18)->get();

        // return $students;
        // dd($students); // debug & die
        // dump($students);

        // foreach ($students as $student) {
        //     echo $student->name . "<br>";
        // }

        return view('querybuilder.index', ['data' => $students]);
    }

    public function showFind(string $id)
    {
        if (DB::table('students')->where('id', $id)->exists()) {
            // Using find():
            $student = DB::table('students')->find($id);

            //return $student;
            return view('querybuilder.read', ['data' => $student]);
        } else {
            return "<h2>Id not found!</h2>";
        }
    }

    public function storeStatic()
    {
        $student = DB::table('students')->insertOrIgnore([
            'name' => 'Vivan',
            'email' => 'vivan2@gmail.com',
            'age' => 20,
            'city' => 'Mumbai'
        ]);

        if ($student) {
            echo "<h2>Student added successfully.</h2>";
        } else {
            echo "<h2>Error: Student not added!<h2>";
        }
    }

    public function updateStatic(string $id)
    {
        $student = DB::table('students')->where('id', $id)->update([
            'name' => 'Vishal',
            'email' => 'vishal2@gmail.com',
            'age' => 23,
            'city' => 'Mumbai'
        ]);

        if ($student) {
            echo "<h2>Student information updated successfully.</h2>";
        } else {
            echo "<h2>Error: Student updation failed!<h2>";
        }
    }

    public function delete(string $id)
    {
        // delete() won't reset the id for that use truncate()
        $student = DB::table('students')->where('id', $id)->delete();

        if ($student) {
            echo "<h2>Student deleted successfully.</h2>";
        } else {
            echo "<h2>Error: Student deletion failed!<h2>";
        }

        return redirect()->route('index');
    }

    public function truncate()
    {
        $student = DB::table('students')->truncate();

        if ($student) {
            echo "<h2>All students deleted successfully.</h2>";
        } else {
            echo "<h2>Error: Students deletion failed!<h2>";
        }

        return redirect()->route('index');
    }

    public function create(Request $request)
    {
        // return $request->all();

        $request->validate([
            'name' => 'required',
            'email' =>  'required|email',
            'age' => 'required|numeric|min:16|max:28',
            'city' => 'required'
        ]);

        $student = DB::table('students')->insertOrIgnore([
            'name' => $request->name,
            'email' =>  $request->email,
            'age' =>  $request->age,
            'city' =>  $request->city
        ]);

        if ($student) {
            echo "<h2>Student added successfully.</h2>";
        } else {
            echo "<h2>Error: Student not added!<h2>";
        }

        // Redirect back to same page
        return redirect()->back();
    }

    public function updateform(string $id)
    {
        $student = DB::table('students')->find($id);
        return view('querybuilder.updateform', ['student' => $student]);
    }

    public function update(string $id, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' =>  'required|email',
            'age' => 'required|numeric|min:16|max:28',
            'city' => 'required'
        ]);

        // $student = DB::table('students')->find($id);
        $student = DB::table('students')->where('id', $id)->update([
            'name' => $request->name,
            'email' =>  $request->email,
            'age' =>  $request->age,
            'city' =>  $request->city
        ]);

        if ($student) {
            echo "<h2>Student information updated successfully.</h2>";
        } else {
            echo "<h2>Error: Student updation failed!<h2>";
        }

        return redirect()->route('updateform', $id);
    }

    public function pagination()
    {
        $students = DB::table('students')->paginate(5);

        return view('querybuilder.pagination', ['data' => $students]);
    }
}
