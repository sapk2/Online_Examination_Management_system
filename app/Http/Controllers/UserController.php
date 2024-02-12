<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use App\Models\PasswordResetToken; // Adjust the namespace and model name based on your project

class UserController extends Controller 
{
    public function index()
    {
        $users = User::all();
        return view('manageusers.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('manageusers.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('manageusers.edit', compact('user'));
    } 

    public function update(Request $request, User $user)
    {
        $request->validate([
            
            'name' => 'required|string|max:255',
            'username' => 'required',
            'mobileno' => 'required|number',
            'email' => 'required|email|unique:users',
            'password' => 'nullable|string|min:8',
            'roles' => 'required|integer',
            'image'=>'required|image',
        ]);
        $request->validate([
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $user=User::where('id',$user)->first();
        unlink(' $user->image');
        $image_name=time().'-'.$request->img->extension();
        $request->image->move(public_path('img'),$image_name);
        $path="/img".$image_name;
    
        $user->name = $request->name;
        $user->image=$path;
        
           
           

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Update password only if a new one is provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->roles = $request->input('roles');
        $user->save();

        return redirect()->route('manageusers.index')->with('success', 'User updated successfully');
    }
   

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('manageusers.index')->with('success', 'User deleted successfully');
    }
}
