<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Models\Exam;
use App\Models\subject;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index(){
        $exams=Exam::all();
        return view('exams.index',compact('exams'));
    }
    public function create(){
        $subjects=subject::all();
        return view('exams.create',compact('subjects'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'exam_title' => 'required',
            'exam_code' => 'required',
            'duration' => 'required',
            'start_at'=>'required',
            'end_at'=>'required',
            'numberof_question' => 'required|integer',
            'questiontype'=>'required',
            'fullmark' => 'required|numeric',
            'subject_id' => 'required',
        ]);

        Exam::create($request->all());

        return redirect()->route('exams.index')->with('success', 'Exam created successfully');
    }
 
    public function edit($id)
    {
        $subjects=subject::all();
        $exam = Exam::findOrFail($id);
        return view('exams.edit', compact('exam','subjects'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'exam_title' => 'required',
            'exam_code' => 'required',
            'duration' => 'required', 
            'start_at'=>'required',
            'end_at'=>'required',
            'numberof_question' => 'required|integer',
            'questiontype'=>'required|enum',
            'fullmark' => 'required|numeric',
            'subject_id' => 'required',
        ]);

        $exam = Exam::findOrFail($id);
        $exam->update($request->all());

        return redirect()->route('exams.index')->with('success', 'Exam updated successfully');
    }

    public function delete($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return redirect()->route('exams.index')->with('success', 'Exam deleted successfully');
    }
    public function upcomingexam()
    {
        // Fetch upcoming exams from the database
        $exams = Exam::where('start_at', '>', now())->get();

        // Pass the upcoming exams data to the view
        return view('user.exams.upcomingexam', compact('exams'));
    }
    public function ongoingexam()
    {
        // Fetch ongoing exams from the database
        $exams = Exam::where('start_at', '<=', now())
                      ->where('end_at', '>=', now())
                      ->get();
    
        // Pass the ongoing exams data to the view
        return view('user.exams.ongoingexam', compact('exams'));
    }
    public function take(Exam $exam)
    {
        // Retrieve the subject related to the exam
        $subject = $exam->subject;

        // Retrieve questions related to the exam
        $questions = $exam->questions;

        // Pass the exam, subject, and questions data to a view
        return view('exams.take', compact('exam', 'subject', 'questions'));
    }
    public function submit(Request $request, Exam $exam)
{
    // Validate the form submission
    $validatedData = $request->validate([
        // Add validation rules for submitted answers if needed
    ]);

    // Process the submitted answers and save them to the database
   
    foreach ($validatedData['answer'] as $questionId => $answer) {
        // Logic to save each answer to the database
    }

    // Redirect the user or return a response
    
    return redirect()->route('exam.result', $exam->id)->with('success', 'Exam submitted successfully!');
}

   
}
