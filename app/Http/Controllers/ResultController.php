<?php

namespace App\Http\Controllers;
use App\Models\Result;
use App\Models\Exam;
use App\Models\subject;
use Illuminate\Http\Request;

class ResultController extends Controller
{
  public function index(){
    $result=Result::with(['exam','subject'])->get();
    return view('results.index',compact('result'));
  }
  public function create(){
    $exams = Exam::all();
    $subjects = Subject::all();
    return view('results.create', compact('exams', 'subjects'));

  }
  public function store(Request $request){
    $request->validate([
      'student_name' => 'required|string',
      'mark' => 'required|integer',
      'exam_id' => 'required',
      'subject_id' => 'required',
      'remarks' => 'nullable',
    ]);
    Result::create($request->all());

        return redirect()->route('results.index')->with('success', 'Result created successfully');
  
  }
  public function edit($id){
    $result = Result::findOrFail($id);
        $exams = Exam::all();
        $subjects = Subject::all();
        return view('results.edit', compact('result', 'exams', 'subjects')); 
  }
  public function update(Request $request,$id){
    $request->validate([
      'student_name' => 'required|string',
      'mark' => 'required|integer',
      'exam_id' => 'required',
      'subject_id' => 'required',
      'remarks' => 'nullable',
    ]);
    $result = Result::findOrFail($id);
        $result->update($request->all());

        return redirect()->route('results.index')->with('success', 'Result updated successfully');

  }
  public function delete($id){
   
    $result = Result::findOrFail($id);
    $result->delete();

    return redirect()->route('results.index')->with('success', 'Result deleted successfully');

  }
}
