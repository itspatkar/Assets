<?php

namespace App\Http\Controllers;

use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Illuminate\Http\Request;
use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Barryvdh\Snappy\PdfWrapper;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $data = compact('students');

        return view('models.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('models.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' =>  'required|email',
            'age' => 'required|numeric|min:16|max:28',
            'city' => 'required'
        ]);

        // print_r($request->all());

        // Insert query using Eloquent ORM:
        $student = new Student;
        $student->name = $request['name'];
        $student->email = $request['email'];
        $student->age = $request['age'];
        $student->city = $request['city'];
        $student->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $students = Student::all();

        if ($students->contains($id)) {
            $student = $students->find($id);

            return view('models.show', ['data' => $student]);
        } else {
            return "<h2>Id not found!</h2>";
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        return view('models.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' =>  'required|email',
            'age' => 'required|numeric|min:16|max:28',
            'city' => 'required'
        ]);

        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->age = $request->age;
        $student->city =  $request->city;
        $student->save();

        return redirect()->route('editStudent', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Student::all()->contains($id)) {
            Student::find($id)->delete();
        } else {
            return "<h2>Id not found!</h2>";
        }

        return redirect()->back();
    }

    public function truncate()
    {
        Student::all()->truncate();

        return redirect()->back();
    }

    public function importpage()
    {
        return view('models.importpage');
    }

    public function import(Request $request)
    {
        Excel::import(new StudentImport,  $request->file('sheet'));

        return back()->with('success', 'Students imported successfully.');
    }

    public function export()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }

    public function pdf(string $id)
    {
        $students = Student::all();

        if ($students->contains($id)) {
            $student = $students->find($id);

            $pdf = PDF::loadView('models.print', ['data' => $student]);
            return $pdf->download('student.pdf');
        } else {
            return "<h2>Id not found!</h2>";
        }

        return redirect()->back();
    }
}
