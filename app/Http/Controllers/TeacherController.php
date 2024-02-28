<?php

namespace App\Http\Controllers;
use App\Models\Faculty;
use App\Models\subject;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {  $faculties = Faculty::all();
        $subjects = subject::all(); // Fetch all subjects
        return view('teacher.subject.subjects', compact('subjects','faculties'));
    }
}
