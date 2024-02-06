<?php


namespace App\Http\Controllers;


use App\Models\Questions;
use App\Models\subject;
use Illuminate\Http\Request;
use Symfony\Component\Console\Question\Question as QuestionQuestion;
use Termwind\Question;

use function Ramsey\Uuid\v1;


class QuestionController extends Controller
{
    public function index(){
        $question=Questions::all();
        return view('questions.index',compact('question'));
    }
    public function create(){
        return view('questions.create');
    }
    public function store(Request $request){
        $request->validate([
            'question'=>'required|string',
            'Question_type' => 'required',
            'marks' => 'required|integer',
            'subject_id' => 'required',
        ]);
        // dd($request->all());
        Questions::create($request->all());
        return redirect()->route('questions.index')->with('sucess','Question created sucessfully');
    }
 
    public function edit($id){
        $questions=Questions::find($id);
        return view('questions.edit', compact('questions'));


    }
    public function update(Request $request,$id){
        $request->validate([
            'question'=>'required',
            'Question_type' => 'required',
            'marks' => 'required|integer',
            'subject_id' => 'required',


        ]);
        $questions = Questions::findOrFail($id);
        $questions->update([
            'question' => $request->input('question'),
            'Question_type' => $request->input('Question_type'),
            'subject_id' =>$request->input('subject_id'),
            'marks' => $request->input('marks'),
        ]);

        return redirect()->route('questions.index')->with('sucess','question updated sucessfully');




    }
    public function delete($id){
        $question = Questions::find($id);

        if (!$question) {
            return redirect()->route('questions.index')->with('error', 'Question not found');
        }
    
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully');
    }
}

