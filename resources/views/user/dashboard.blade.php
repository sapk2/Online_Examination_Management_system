@extends('layouts.user-app')
@section('content')
    <div class="grid-layout drop-shadow-md bg-gray-100 p-3 min-h-min">
        <h1 class="font-bold text-3xl px-2 py-2">Dashboard</h1>
        <div class="container">
            <div class="grid grid-cols-3 gap-10 mt-5">
                <div class="px-2 py-4 flex justify-between bg-blue-600 text-white rounded-lg shadow">
                    <p>Total Users</p>
                    <p class="text-5xl font-bold">2</p>
                </div>


                <div class="px-2 py-4 flex justify-between bg-red-600 text-white rounded-lg shadow">
                    <p>Total Subject</p>
                    <p class="text-5xl font-bold">3</p>
                </div>


                <div class="px-2 py-4 flex justify-between bg-green-600 text-white rounded-lg shadow">
                    <p>Total Questions</p>
                    <p class="text-5xl font-bold">5</p>
                </div>

               
            </div>
        </div>
    @endsection
