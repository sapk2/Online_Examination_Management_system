<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\ExamNotices;
use Illuminate\Http\Request;

class ExamNoticeController extends Controller
{
    public function index(){
        $examNotices=ExamNotices::all();
        return view('examnotices.index',compact('examNotices'));
    }
    public function create()

    {
        $faculties = Faculty::all();
        return view('examnotices.create' ,compact('faculties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'exam_date' => 'required|date',
            'faculties_id' => 'required',
        ]);

        ExamNotices::create($request->all());

        return redirect()->route('examnotices.index')->with('success', 'Exam notice created successfully ✅' );
    }

    public function edit($id)
    {
        $faculties = Faculty::all();
        $examNotice = ExamNotices::findOrFail($id);
        return view('examnotices.edit', compact('examNotice','faculties'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'exam_date' => 'required|date',
            'faculties_id' => 'required',
        ]);

        $examNotice = ExamNotices::findOrFail($id);
        $examNotice->update($request->all());

        return redirect()->route('examnotices.index')->with('success', 'Exam notice updated successfully ✅ ');
    }

    public function delete($id)
    {
        $examNotice = ExamNotices::findOrFail($id);
        $examNotice->delete();

        return redirect()->route('examnotices.index')->with('success', 'Exam notice deleted successfully ✅');
    }
}
