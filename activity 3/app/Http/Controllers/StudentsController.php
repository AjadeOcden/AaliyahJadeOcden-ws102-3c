<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class StudentsController extends Controller
{
    public function index()
    {
        // Change $student to $students for a collection of students
        $students = Students::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'program' => 'required',
        ]);

        Students::create($request->all());

        return redirect()->route('students.index')->with('success', 'Student added!');
    }

    public function show(Students $student)
    {
        // Generate QR code with student data
        $qr = QrCode::size(200)->generate(json_encode([
            'id' => $student->id,
            'fname' => $student->fname,
            'lname' => $student->lname,
            'email' => $student->email,
            'program' => $student->program,
        ]));

        return view('students.show', compact('student', 'qr'));
    }

    public function edit(Students $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Students $student)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'program' => 'required',
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Student updated!');
    }

    public function destroy(Students $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted!');
    }
}
