<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Questions;
use App\Models\subject;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller

{
    public function index()
    {
        if (Auth()->user() != null) {
            $user = Auth()->user()->roles;

            return view('welcome', compact('user'));

            # code...
        }
    }

   

}
