
@extends('layouts.app')
@section('content')
<h1 class="font-bold text-3xl bg-green-200 px-2">Create</h1>
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

<form action="{{ route('results.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="student_name">Student Name:</label>
                <input type="text" name="student_name" class="form-control  w-full" required>
            </div>
            <div class="form-group">
                <label for="mark">Mark:</label>
                <input type="number" name="mark" class="form-control  w-full" required>
            </div>
            <div class="form-group">
                <label for="exam_id">Exam:</label>
                <select name="exam_id" class="form-control  w-full" required>
                    @foreach($exams as $exam)
                        <option value="{{ $exam->id }}">{{ $exam->exam_title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subject_id">Subject:</label>
                <select name="subject_id" class="form-control  w-full" required>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="remarks">Result:</label>
                <select name="remarks" class="form-control  w-full" required>
                    <option value="1">Pass</option>
                    <option value="0">Fail</option>
                </select>
            </div>
            <div class="flex justify-center mt-6">
            <input class="bg-green-500 text-white px-4 py-2 rounded mx-2 rounded mx-2" type="submit" value="Submit">
            <a href="{{route('results.index')}}" class="bg-red-500 text-white px-4 py-4 rounded-mx-2">Cancel</a>
        </div>
        </form>
    </div>
@endsection