<?php

namespace App\Http\Controllers;
use App\Models\User;
//use App\Http\Controllers\UserAnswer;
use App\Models\Exam;
use App\Models\Questions;
use App\Models\subject;
use App\Models\UserAnswer;
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
    public function pastexam()
    {
        // Retrieve all past exams
        $pastExams = Exam::where('end_at', '<', now())->get();
       foreach ($pastExams as $pastExam) {
        // Assuming user answers are stored as attributes of the Exam model
        $userAnswers[$pastExam->id] = [
            'question1' => $pastExam->user_answer_question1,
            'question2' => $pastExam->user_answer_question2,
          
        ];
    }

    // Pass data to the view
    return view('user.exams.pastexam', compact('pastExams'));
    }

    public function take(Exam $exam)
    {
        // Retrieve the subject related to the exam
        $subject = $exam->subject;

        // Retrieve questions related to the exam
        $questions = $exam->questions;

        // Pass the exam, subject, and questions data to a view
        return view('user.exams.take', compact('exam', 'subject', 'questions'));
    }

public function submitAnswers($Request,$request,$examid ){
    $request->validate([
        'answers'=>'required|array',
        'answers.*'=>'required|string',
    ]);
    // Process the submitted answers
    $totalQuestions = count($request->input('answers'));
    $correctAnswers = 0;
    foreach ($request->input('answers') as $questionId => $selectedOption) {
       // Check if the selected option matches the correct answer for the question
        $question = Questions::findOrFail($questionId);
        if ($selectedOption === $question->correct_option) {
            $correctAnswers++;
        }
       
       
       
        UserAnswer::create([
            'user_id' => auth()->id(), // Assuming you're using authentication
            'exam_id' => $examid,
            'question_id' => $questionId,
            'selected_option' => $selectedOption,
        ]);
    }
    // Calculate the score
    $score = ($correctAnswers / $totalQuestions) * 100;
    return redirect()->route('user.exams.submitted')->with('score', $score);
}
 public function show($id)
    {
        $exam = Exam::findOrFail($id);
        $subject = $exam->subject; 

// Load user's answers for each question
    $exam->load('questions.userAnswer');
    $user=auth()->user();
    $userattempt =UserAnswer::where('user_id',$user->id)->where('exam_id',$exam->id)->get();
       
    return view('user.exams.show', compact('exam', 'subject'));
    }
   
}
