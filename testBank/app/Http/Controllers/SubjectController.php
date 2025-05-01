<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Question;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
   
    public function subjectForm()
    {
        return view("subject.createSub");
    }

    public function addSubject(Request $request)
    {
        $request->validate([
            "sub_code"=> "required",
            "sub_name"=> "required",
        ]);

        Subject::create([
            "sub_code"=> $request->sub_code,
            "sub_name"=> $request->sub_name,
        ]);

        return redirect("fetchSubjects");
        //return view("employee.index");
    }

    public function fetchSubjects(){
        $subjects = Subject::all();
        return view('employee.index', compact('subjects'));
    }

    public function allQuestions($code){
        return view('employee.index', compact('subjects'));
    }

    public function editFormSub($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subject.editForm', compact('subject'));
    }

    public function updateSub(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            "sub_code"=> "required",
            "sub_name"=> "required",
        ]);

        // Find the question and update it
        $subject = Subject::findOrFail($id);
        $subject->update([
            'sub_code' => $request->sub_code,
            'sub_name' => $request->sub_name,
        ]);

        return redirect()->route('index', ['subject' => $subject]);
    }

    public function deleteSub($id)
    {
        // Find the question and delete it
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->route('index', ['subject' => $subject]);
    }

    public function search(Request $request)
    {
        $query = Subject::query();

        // Search filter
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('sub_code', 'like', "%$search%")
                ->orWhere('sub_name', 'like', "%$search%");
        }

        // Sorting
        $sortBy = $request->input('sort_by', 'sub_code'); // default to sub_code
        $order = $request->input('order', 'asc');         // default to ascending

        $subjects = $query->orderBy($sortBy, $order)->paginate(10); // paginated

        return view('employee.index', compact('subjects', 'sortBy', 'order'));
    }
}
