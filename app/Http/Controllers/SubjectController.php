<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = subject::all();
        return view('subject.index', compact('subjects'));
    }
    public function create()
    {
        $faculties = Faculty::all();
        return view('subject.create', compact('faculties'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'subject_name' => 'required|string',
            'description' => 'required|string',
            'credit_hrs' => 'required|integer',
            'faculties_id' => 'required',
        ]);

        Subject::create($request->all());

        return redirect()->route('subject.index')->with('success', 'Subject created successfully.');
    }
    public function edit($id)
    {
        $subjects = Subject::find($id);
        $faculties = Faculty::all();
        return view('subject.edit', compact('subjects', 'faculties'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'subject_name' => 'required|string',
            'description' => 'required|string',
            'credit_hrs' => 'required|integer',
            'faculties_id' => 'required',
        ]);
        $subject = Subject::findOrFail($id);
        $subject->update([
            'code' => $request->input('code'),
            'subject_name' => $request->input('subject_name'),
            'description' => $request->input('description'),
            'credit_hrs' => $request->input('credit_hrs'),
            'faculties_id' => $request->input('faculties_id'),
        ]);
        return redirect()->route('subject.index')->with('success', $request->input('subject_name') . ' subject updated sucessfully.');
    }
    public function delete($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect()->route('subject.index')->with('success', 'Subject deleted sucessfully.');
    }
}
