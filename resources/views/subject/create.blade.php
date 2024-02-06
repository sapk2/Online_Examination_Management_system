@extends('layouts.app')
@section('content')
<h1 class="font-bold text-3xl bg-green-200 px-2">Create Subject</h1>
<hr class="h-2 bg-green-600">
<div class="grid-layout drop-shadow-md bg-gray-100 p-3 mt-3 min-h-min">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form action="{{ route('subject.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="number" class="form-control w-full " id="code" name="code">
        </div>
        <div class="mb-3">
            <label for="subject_name" class="form-label">Subject Name</label>
            <input type="text" class="form-control w-full" id="subject_name" name="subject_name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control w-full" id="description" name="description" required></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Credit Hrs</label>
            <input type="text" class="form-control w-full" id="credit_hrs" name="credit_hrs" required>
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
            <input class="bg-green-500 text-white px-4 py-2 rounded mx-2 rounded mx-2" type="submit" value="Submit">
            <a href="{{route('subject.index')}}" class="bg-red-500 text-white px-4 py-4 rounded-mx-2">Cancel</a>
        </div>
    </form>
</div>
@endsection