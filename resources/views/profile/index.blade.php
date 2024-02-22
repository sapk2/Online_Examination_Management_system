@extends('layouts.user-app')

@section('content')
<!-- component -->
<!-- This is an example component -->

<div class="h-full">
 
  <div class="border-b-2 block md:flex">

    <div class="w-full md:w-2/5 p-4 sm:p-6 lg:p-8 bg-white shadow-md">
      <div class="flex justify-between">
        <span class="text-xl font-semibold block"> Profile</span>
        <a href="{{ route('profile.edit') }}" class="-mt-2 text-md font-bold text-white bg-gray-700 rounded-full px-5 py-2 hover:bg-gray-800">Edit</a>
        <a href="{{ route('profile.destroy') }}" class="-mt-2 text-md font-bold text-white bg-gray-700 rounded-full px-5 py-2 hover:bg-gray-800">Delete</a>
      </div>
      <span class="text-gray-600">This information is secret so be careful</span>
      <div class="w-full p-8 mx-2 flex justify-center">
       @if(Auth::user()->image)
          <img class="image rounded-circle" src="{{asset(Auth::user()->image)}}" alt="profile_image" style="width: 80px;height: 80px; padding: 10px; margin: 0px; ">
       @endif                      
      </div>
    </div>
    
    <div class="w-full md:w-3/5 p-8 bg-white lg:ml-4 shadow-md">
      <div class="rounded  shadow p-6">
        <div class="pb-6">
          <label for="name" class="font-semibold text-gray-700 block pb-1">Name</label>
          <div class="flex">
            <input disabled id="username" class="border-1  rounded-r px-4 py-2 w-full" type="text" value="{{Auth::user()->name}}" />
          </div>
        </div>
        <div class="pb-4">
          <label for="about" class="font-semibold text-gray-700 block pb-1">Email</label>
          <input disabled id="email" class="border-1  rounded-r px-4 py-2 w-full" type="email" value="{{Auth::user()->email}}" />
        </div>
        <div class="mb-3">
           <label for="mobileno" class="form-label">Mobile Number</label>
           <input disabled id="number" class="form-control w-full" id="mobileno" name="mobileno" value="{{$user->mobileno}}">
       </div>
         
        </div>
      </div>
    </div>

  </div>
 
</div>


  
@endsection
