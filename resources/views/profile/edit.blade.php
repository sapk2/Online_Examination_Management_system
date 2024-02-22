@extends('layouts.user-app')
@section('content')
<div class="flex justify-center items-center h-screen">
    <div class="card bg-white rounded-lg drop-shadow-2xl p-9 max-w-2xl w-full">
        <h1 class="font-bold text-3xl mb-6 text-center  ">Profile</h1>
        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="mb-3">
           
           <label for="code" class="form-label">Full Name *</label>
           <input type="text" class="form-control w-full " id="code" name="name" value="{{$user->name}}">
       </div>
       <div class="mb-3">
           <label for="subject_name" class="form-label">User Name</label>
           <input type="text" class="form-control w-full" id="userrname" name="username" value="{{$user->username}}" required disabled>
       </div>
       <div class="mb-3">
           <label for="description" class="form-label">Email *</label>
           <input class="form-control w-full" id="description" name="email" rows="10" required value="{{$user->email}}">
       </div>
       <div class="mb-3">
           <label for="mobileno" class="form-label">Mobile Number</label>
           <input type="number" class="form-control w-full" id="mobileno" name="mobileno" value="{{$user->mobileno}}">
       </div>
       <input type="file" name="image" class="block w-full my-4 p-2 rounded">
       <div class="flex justify-center mt-6">
           <input class="bg-blue-600 text-white px-4 py-2 rounded mx-2 hover:cursor-pointer" type="submit" value="update">
           <a href="{{ route('profile.index') }}" class="bg-red-500 text-white px-4 py-2 rounded mx-2">cancel</a>
       </div>

        </form>
    </div>
</div>
@endsection
