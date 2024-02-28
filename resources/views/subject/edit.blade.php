@extends('layouts.app')
@section('content')
<h1 class="font-bold text-3xl  bg-green-200 px-2">Edit</h1>
<hr class="h-1 bg-green-600">
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<!--<div class="w-full max-w-xs grid grid-cols-1  place-content-center h-auto mx-auto py-10"></div>-->
<form action="{{ route('subject.update', $subjects->id) }}" class="bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4" method="post" enctype="multipart/form-data">
    @csrf
  
    <div class="mb-3">
        <label for="code" class="form-label">Code</label>
        <input type="text" class="form-control w-full " id="code" name="code" value="{{$subjects->code}}">
    </div>
    <div class="mb-3">
        <label for="subject_name" class="form-label">Subject Name</label>
        <input type="text" class="form-control w-full" id="subject_name" name="subject_name" value="{{$subjects->subject_name}}" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control w-full" id="description" name="description" rows="10" required>{{$subjects->description}}</textarea>
    </div>
    <div class="mb-3">
        <label for="credit_hrs" class="form-label">credit hrs</label>
        <input type="text" class="form-control w-full" id="credit_hrs" name="credit_hrs" value="{{$subjects->credit_hrs}}" required>
    </div>
    <div class="mb-3">
        <label for="faculties_id" class="block text-gray-700 text-sm font-bold mb-2">Faculties:</label>
        <select name="faculties_id" id="faculties_id">
            @foreach($faculties as $faculty)
            <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="flex justify-center mt-6">
        <input class="bg-blue-600 text-white px-4 py-2 rounded mx-2 hover:cursor-pointer" type="submit" value="update">
        <a href="{{route('subject.index')}}" class="bg-red-500 text-white px-4 py-2 rounded mx-2">cancel</a>
    </div>
</form>
@endsection