<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        // Retrieve the currently authenticated user's profile information
        $user = auth()->user();

        // Return the profile view with the user data
        return view('profile.index', compact('user'));
    }
    public function edit(Request $request): View
    {
        $addednumber = Auth()->user()->mobileno;
        $user = $request->user();
        return view('profile.edit', compact('addednumber', 'user'));
    }
   
   
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

       if($request->hasFile('image'))
       {
        $user=User::where('id',$request->user()->id)->first();
        //unlink('$user->img');
        $image_name=time().'-'.$request->image->extension();
        $request->image->move(public_path('img'),$image_name);
        $path="/img/".$image_name;
    
        $user->name = $request->name;
        $user->image=$path;
        $user->save();
       }
        

      
        $request->user()->save();

        return Redirect::route('profile.index')->with('status', 'profile-updated');
    
    }

    
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function show(){
        $user= Auth::user();
        $rank=$this->calculateRank($user);
        $examProgress=$this->getUserExamProgress($user);
        return view('profile',compact('user','rank','examProgress'));
    }
    // Calculate user's rank based on exam scores
    private function calculateRank($user)
    {
        $score = $user->examScores->sum('score');
        $rank = Exam::where('completed', true)
            ->where('score', '>', $score)
            ->count() + 1; // Add 1 to start from rank 1
        return $rank;
    }
    // Retrieve user's progress in each exam attempt
private function getUserExamProgress($user)
{
    // Retrieve all completed exams for the user
    $completedExams = $user->exams()->where('completed', true)->get();

    $examProgress = [];
    foreach ($completedExams as $exam) {
        $examProgress[] = [
            'exam_title' => $exam->exam_title,
            'score' => $exam->score,
            // Add any other relevant data about the exam
        ];
    }

    return $examProgress;
}

}
