<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
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
        'name' => 'required',
        'description' => 'nullable',
        'price' => 'required|numeric',
    ]);

    Students::create($request->all());

    return redirect()->route('students.index')->with('success', 'student added!');
}

    /**
     * Display the specified resource.
     */
    public function show(Students $students)
    {
        //
    }

    public function edit(Students $students)
    {
        return view('students.edit', compact('students'));
    }
    

    public function update(Request $request, Students $students)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
        ]);
    
        $students->update($request->all());
    
        return redirect()->route('students.index')->with('success', 'student updated!');
    }
    

    public function destroy(Students $students)
    {
        $students->delete();
    
        return redirect()->route('students.index')->with('success', 'student deleted!');
    }
    
}
