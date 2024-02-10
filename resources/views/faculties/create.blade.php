@extends('layouts.app')
@section('content')


<h1 class="text-3xl font-bold px-4 py-2">Create Faculty</h1>
<div class="grid-layout drop-shadow-md px-4 min-h-min">


<!-- Display validation errors if any -->
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
    @endif   @if(session('success'))
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
<!-- form creation-->
<form action="{{route('faculties.store')}}" method="post">
    @csrf
    <div class="mb-4">
        <label for="faculty_name" class="block text-gray-700 text-sm font-bold mb-2">Faculty Name:</label>
        <input type="text" name="faculty_name" id="faculty_name" class="form-input rounded-md w-full" value="{{old('faculty_name')}}">
    </div>
    <div class="mb-4">
        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
        <input type="radio" name="status" id="status" value="1"> Enable &nbsp;
        <input type="radio" name="status" id="status" value="0"> Disable
    </div>
    <div class="flex justify-center mt-6">
        <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded mx-2">Add faculty</button>
        <a href="{{route('faculties.index')}}" class="bg-red-600 text-white px-9 py-1 rounded block">cancel</a>
    </div>
</form>
</div>

@endsection
