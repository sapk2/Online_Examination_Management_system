@extends('layouts.app')
@section('content')
<h1 class="font-bold text-3xl bg-green-200 px-2">Create </h1>
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
        <form action="{{route('exams.store')}}" method="post"enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exam_title" class="form-label">Exam Title</label>
                <input type="text" class="form-control" id="exam_title" name="exam_title" required>
            </div>
            <div class="mb-3">
                <label for="exam_code" class="form-label">Exam Code</label>
                <input type="number" class="form-control" id="exam_code" name="exam_code" required>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Exam duration</label>
                <input type="int" class="form-control" id="duration" name="duration" required>
            </div>
            <div class="mb-3">
                <label for="start_at" class="form-label">Start At</label>
                <input type="datetime-local" class="form-control" id="start_at" name="start_at" required>
            </div>
            <div class="mb-3">
                <label for="end_at" class="form-label">End At</label>
                <input type="datetime-local" class="form-control" id="end_at" name="end_at" required>
            </div>
            <div class="mb-3">
                <label for="numberof_question" class="form-label"> Total Questions</label>
                <input type="number" class="form-control" id="numberof_question" name="numberof_question" required>
            </div>
            <div class="mb-3">
            <label for="questiontype" class="form-label">Question Type</label><br>
            <select class="form-control" id="questiontype" name="questiontype" required>
                <option value="multiple choice">Multiple Choice</option>
                <option value="short answer">Short Answer</option>
            </select>
        </div>
            <div class="mb-3">
                <label for="fullmark" class="form-label"> Marks</label>
                <input type="number" class="form-control" id="fullmark" name="fullmark" required>
            </div>

            <div class="mb-3">
            <label for="subject_id" class="form-label">Subject ID</label>
            <input type="text" class="form-control" id="subject_id" name="subject_id" required>
        </div>
            <div class="flex justify-center mt-6">
<input class="bg-blue-500 text-white px-4 py-2 rounded mx-2 rounded mx-2" type="submit" value="submit">
<a href="{{route('exams.index')}}" class="bg-red-500 text-white px-4 py-4 rounded-mx-2 rounded">Exit</a>
        </form> 
@endsection