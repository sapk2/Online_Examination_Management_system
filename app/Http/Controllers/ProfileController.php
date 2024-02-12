<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
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
        //unlink(' $user->img');
        $image_name=time().'-'.$request->image->extension();
        $request->image->move(public_path('img'),$image_name);
        $path="/img".$image_name;
    
        $user->name = $request->name;
        $user->image=$path;
        $user->save();
       }
        

      
        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    
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
}
