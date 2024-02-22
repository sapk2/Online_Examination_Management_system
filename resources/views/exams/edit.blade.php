@extends('layouts.app')
@section('content')
<h1 class="font-bold text-3xl bg-green-200 px-2">Edit </h1>
<hr class="h-2 bg-green-600">
<div class="grid-layout drop-shadow-md bg-gray-100 p-3 mt-3 min-h-min">
@if(session('success'))
    <div id="success-alert" class="h-2/5 w-3/5 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-100 bg-opacity-75 backdrop-blur-lg border border-green-400 text-green-700 px-6 py-4 rounded-md text-lg shadow-md flex flex-col justify-center items-center z-50 transition-all duration-500 ease-in-out">
        {{ session('success') }}
    </div>

    <script>
        // Function to close the alert
        function closeAlert() {
            var successAlert = document.getElementById('success-alert');
            successAlert.style.opacity = '0'; // Fade out effect
            successAlert.style.transform = 'translateY(-20px)'; // Move up slightly
            var mytable = document.getElementById('mytable');
            mytable.style.filter = 'none'; // Remove the blur effect
        }

        // Wait for the document to be fully loaded
        document.addEventListener("DOMContentLoaded", function() {
            var mytable = document.getElementById('mytable');
            mytable.style.filter = 'blur(1.5rem)'; // Apply the blur effect initially

            // Set a timeout to hide the alert after a few seconds (e.g., 3000 milliseconds)
            setTimeout(function() {
                closeAlert();
            }, 2000); // 3000 milliseconds = 3 seconds
        });
    </script>
    @endif
        <form action="{{ route('exams.update', $exam->id) }}" method="POST"enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exam_title" class="form-label">Exam Title</label>
                <input type="text" class="form-control" id="exam_title" name="exam_title" value="" required>
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
            <select class="form-control" id="questiontype" name="Questiontype" required>
                <option value="multiple_choice">Multiple Choice</option>
                <option value="true_false">True/False</option>
                <option value="short_answer">Short Answer</option>
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
<a href="{{route('exams.index')}}" class="bg-red-500 text-white px-4 py-4 rounded-mx-2 rounded ">Exit</a>
        </form>
        
        @endsection