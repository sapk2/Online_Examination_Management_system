<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\subject;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    public function index(){
        $faculties=Faculty::all();
        return view('faculties.index',compact('faculties'));
    }
    public function create(){
       
        return view('faculties.create');
    }
    public function store(Request $request){
        $request->validate([
            'faculty_name'=>'required|string',
            'status'=>'required',   
        ]);
        Faculty::create($request->all(
        ));
        return redirect()->route('faculties.index')->with('success', 'Exam notice created successfully ✅' );
    }
    public function edit($id){
        $faculty=Faculty::findOrfail($id);
        $subjects = subject::all();
        return view('faculties.edit',compact('faculty','subjects'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'faculty_name'=>'required|string',
            'status'=>'required',
        ]);
        $faculty=Faculty::findOrFail($id);
        $faculty->update($request->all());
        return redirect()->route('faculties.index')->with('sucess','Faculty updated sucessfully');
    }
    public function delete($id){
        $faculty=Faculty::findOrFail($id);
        if ($faculty->subject()->exists()) {
            return redirect()->route('faculties.index')->with('error', 'Cannot delete Faculty. Related subjects exist.');
        }
        $faculty->delete();
        return redirect()->route('faculties.index')->with('sucess','Faculty deleted sucessfully');
    }

}
