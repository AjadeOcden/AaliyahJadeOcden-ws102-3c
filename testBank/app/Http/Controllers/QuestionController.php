<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class QuestionController extends Controller
{
    public function questionForm($sub_name, $sub_code)
    {
        return view("questions.questionForm", compact("sub_name", 'sub_code'));
    }

    public function addQuestion(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'options' => 'required|array|min:4',
            'correct_answer' => 'required',
            'sub_code' => 'required|string',
            'term' => 'required|string|in:Midterm,Final',

        ]);

        Question::create([
            'question' => $request->question,
            'options' => json_encode($request->options),
            'correct_answer' => $request->options[$request->correct_answer],
            'sub_code' => $request->sub_code,
            'term' => $request->term,
        ]);

        return redirect()->route('allQuestions', ['sub_code' => $request->sub_code]);

    }

    public function allQuestions($sub_code){
        $subject = Subject::where('sub_code', $sub_code)->firstOrFail();

        $questions = Question::where('sub_code', $subject->sub_code)->get();

        foreach ($questions as $question) {
            $question->options = json_decode($question->options);
        }

        return view('questions.allQuestions', compact('questions', 'subject'));
    }


    public function editQuestion($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.editQuestion', compact('question'));
    }

    public function updateQuestion(Request $request, $id)
{
    // Validate the incoming data
    $validated = $request->validate([
        'question' => 'required|string',
        'options' => 'required|array|min:4',
        'correct_answer' => 'required',
        'sub_code' => 'required|string',
        'term' => 'required|string|in:Midterm,Final',
    ]);

    // Find the existing question by ID
    $question = Question::findOrFail($id);

    // Update the question
    $question->update([
        'question' => $request->question,
        'options' => json_encode($request->options),
        'correct_answer' => $request->options[$request->correct_answer],
        'sub_code' => $request->sub_code,
        'term' => $request->term,
    ]);

    // Redirect back to the questions list or a specific route
    return redirect()->route('allQuestions', ['sub_code' => $request->sub_code]);
}

    public function deleteQuestion($id)
    {
        // Find the question and delete it
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('allQuestions', ['sub_code' => $question->sub_code]);
    }

    public function testForm($sub_code){
        $subject = Subject::where('sub_code', $sub_code)->firstOrFail();
        return view("questions.testForm",  ['subject' => $subject]);
    }

    public function generateTest(Request $request, $sub_code)
{
    // Validate the inputs
    $validated = $request->validate([
        'num_items' => 'required|integer|min:1', // Number of questions to generate
        'term' => 'required|string|in:Midterm,Final', // Exam type: Midterm or Final
    ]);
    
    // Get subject based on the code
    $subject = Subject::where('sub_code', $sub_code)->firstOrFail();
    
    // Get random questions based on the selected term (Midterm or Final)
    $questions = Question::where('sub_code', $sub_code)
                         ->where('term', $validated['term'])  // Filter by term
                         ->inRandomOrder()
                         ->limit($validated['num_items'])    // Limit by the number of items
                         ->get();
    
    // Decode the options to make them usable
    foreach ($questions as $question) {
        $question->options = json_decode($question->options);
    }
    $semester = $request->sem;
    $sy= $request->sy;
    $term = $request->term;

    // Generate the PDF and pass data (questions and subject)
    $pdf = Pdf::loadView('questions.testQuestions', compact('questions', 'subject', 'semester', 'sy', 'term'));
    
    // Create a unique file name using the subject code and timestamp
    $timestamp = now()->format('Ymd_His');
    $filename = $subject->sub_code . '_' . $subject->sub_name . '_' . $validated['term'] . '_' . $timestamp . '.pdf';

    // Stream the PDF (preview in the browser)
    return $pdf->stream($filename);
}

public function previewTestPdf($sub_code)
{
    // Get the subject and questions to render in the PDF
    $subject = Subject::where('sub_code', $sub_code)->firstOrFail();
    $questions = session('preview_test_data')['questions'] ?? [];

    // Generate the PDF
    $pdf = Pdf::loadView('questions.testQuestions', compact('questions', 'subject'));

    // Return the PDF as a stream (for preview)
    return $pdf->stream('test_preview.pdf');
}



    
    public function downloadTest($sub_code)
    {
    }
    

public function sort(Request $request)
{
    $sub_code = $request->input('sub_code');
    $sortByTerm = $request->input('sort_by'); // Midterm or Final
    $order = $request->input('order', 'asc');

    $subject = Subject::where('sub_code', $sub_code)->firstOrFail();

    $query = Question::where('sub_code', $sub_code);

    if ($sortByTerm) {
        $query->where('term', $sortByTerm);
    }

    $questions = $query->orderBy('term', $order)->get();

    foreach ($questions as $q) {
        $q->options = json_decode($q->options);
    }

    return view('questions.allQuestions', compact('questions', 'subject', 'sortByTerm', 'order'));
}



}


