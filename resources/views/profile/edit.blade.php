@extends('layouts.user-app')
@section('content')
<div class="grid-layout drop-shadow-md bg-gray-100 p-3 min-h-min">
    <h1 class="font-bold text-3xl  px-2">Edit Profile</h1>
    <!--<div class="w-full max-w-xs grid grid-cols-1  place-content-center h-auto mx-auto py-10"></div>-->
    <form action="{{route('profile.update')}}" class="bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4" method="post" enctype="multipart/form-data">
        @csrf
        @method('post')
        
        <input type="file" name="photopath" class="block w-full my-4 p-2 rounded">
                       <button type="submit" class="btn btn-info" style="background-color:blue;">upload</button>
        <div class="mb-3">
            
            <label for="code" class="form-label">Full Name *</label>
            <input type="text" class="form-control w-50% " id="code" name="name" value="{{$user->name}}">
        </div>
        <div class="mb-3">
            <label for="subject_name" class="form-label">User Name</label>
            <input type="text" class="form-control w-50%" id="subject_name" name="username" value="{{$user->username}}" required disabled>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Email *</label>
            <input class="form-control w-50%" id="description" name="email" rows="10" required value="{{$user->email}}">
        </div>
        <div class="mb-3">
            <label for="mobileno" class="form-label">Mobile Number</label>
            <input type="number" class="form-control w-50%" id="mobileno" name="mobileno" value="{{$user->mobileno}}">
        </div>
        <div class="flex justify-center mt-6">
            <input class="bg-blue-600 text-white px-4 py-2 rounded mx-2 hover:cursor-pointer" type="submit" value="update">
            <a href="profile.index" class="bg-red-500 text-white px-4 py-2 rounded mx-2">cancel</a>
        </div>
        
    </form>
</div>
@endsection