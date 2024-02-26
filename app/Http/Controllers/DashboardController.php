<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totaluser = User::all()->count();
        $totalsubject = subject::all()->count();
        $totalquestion = Questions::all()->count();
        $questions = Questions::orderBy('id', 'ASC')->get();

        // Initialize arrays to store labels and data
        $labels = [];
        $data = [];

        // Loop through each question and extract the month and year from the created_at timestamp
        foreach ($questions as $question) {
            $monthYear = $question->created_at->format('F Y');

            // If the month is not already in the labels array, add it and set the corresponding data value to 1
            if (!in_array($monthYear, $labels)) {
                $labels[] = $monthYear;
                $data[$monthYear] = 1;
            } else {
                // If the month is already in the labels array, increment the corresponding data value
                $data[$monthYear]++;
            }
        }


        // Replace this with your actual data retrieval logic
        $data = [
            'labels' => $labels,
            'data' => array_values($data), // Get values from associative array
        ];

        return view('dashboard', compact('totaluser', 'totalsubject', 'totalquestion', 'data'));
    }

    public function userIndex()
    {
        $user = User::all();
        $addednumber = Auth()->user()->mobileno;
        return view('user.dashboard', compact('user','addednumber'));
    }
    
public function teacherIndex(){
    $user = User::all();
       
        return view('teacher.dashboard', compact('user'));
}
    
}
