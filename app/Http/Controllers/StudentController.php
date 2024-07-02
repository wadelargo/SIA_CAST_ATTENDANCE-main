<?php

namespace App\Http\Controllers;

use App\Models\Student;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student()
    {
        $students = Student::orderBy('id')->get();
        return view('student.index', ['students' => $students]);
    }

    public function create()
    {
        return view('student.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'year_level' => 'required',
            'address' => 'required',
        ]);

        Student::create([
            'full_name' => $request->full_name,
            'year_level' => $request->year_level,
            'address' => $request->address,
        ]);

        return redirect('/student')->with('info', 'A new student has been added');
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        return view('student.edit', compact( 'student'));
    }
    

    public function update(Student $student, Request $request)
    {
        $request->validate([

            'full_name' => 'required',
            'year_level' => 'required',
            'address' => 'required',
        ]);

        $student->update($request->all());
        return redirect('/student')->with('info', "$student->full_name has been updated successfully");
    }

    public function delete(Student $student)
    {
        $student->delete();
        return redirect('/student')->with('info', "$student->full_name has been deleted successfully");
    }
    
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function pdf()
    {
        $students = Student::latest()->get();
        $pdf = Pdf::loadView('student/pdf', ['students' => $students]);

        return $pdf->download('students-list.pdf', $pdf);
    }
    
}
