<?php

namespace App\Http\Controllers;

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
}
