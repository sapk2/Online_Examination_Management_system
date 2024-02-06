@extends('layouts.app')
@section('content')
    <h1 class="text-3xl font-bold  bg-green-200 px-2">Edit Faculty</h1>
    <hr class="h-1 bg-green-600">


    <!-- Display validation errors if any -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="post" action="{{ route('faculties.update', ['id' => $faculty->id]) }}">
        @csrf
        <div class="mb-4">
        <label for="faculty_name" class="block text-gray-700 text-sm font-bold mb-2">Faculty Name:</label>
        <input type="text" name="faculty_name" id="faculty_name" class="form-input rounded-md w-full" value="{{$faculty->faculty_name}}">
    </div>
    <div class="mb-4">
        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
        <input type="radio" name="status" id="status" value="1"<?php if ($faculty->status == "1"){echo 'checked';} ?>> Enable &nbsp;
        <input type="radio" name="status" id="status" value="0"<?php if ($faculty->status != "1"){echo 'checked';} ?>> Disable
    </div>


    <div class="flex justify-center mt-6">
            <input class="bg-blue-600 text-white px-4 py-2 rounded mx-2 hover:cursor-pointer" type="submit" value="update">
            <a href="{{route('faculties.index')}}" class="bg-red-500 text-white px-4 py-2 rounded mx-2">cancel</a>
        </div>
    </form>
@endsection
