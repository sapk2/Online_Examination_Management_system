<!-- resources/views/results/index.blade.php -->

@extends('layouts.app')
@section('content')

<h1 class="font-bold text-3xl px-2 pt-4">Result</h1>

<div class="grid-layout drop-shadow-md  px-3  min-h-min">
    <div class="my-5 text-right px-2">
        <a href="{{route('results.create')}}"class="bg-green-600 text-white px-4 py-2 rounded">➕ Add</a>
        @if(session('success'))
            <div id="alert alert-success mt-3" class="h-2/5 w-3/5 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-100 bg-opacity-75 backdrop-blur-lg border border-green-400 text-green-700 px-6 py-4 rounded-md text-lg shadow-md flex flex-col justify-center items-center z-50 transition-all duration-500 ease-in-out" >
                {{ session('success') }}
            </div>
            <script>
        // Function to close the alert
        function closeAlert() {
            var successAlert = document.getElementById('success-alert');
            successAlert.style.display = 'none';
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

        <table id="mytable" class="display">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Mark</th>
                    <th>Exam</th>
                    <th>Subject</th>
                    <th>Remarks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($result as $result)
                    <tr>
                        <td>{{ $result->student_name }}</td>
                        <td>{{ $result->mark }}</td>
                        <td>{{ $result->exam->exam_title }}</td>
                        <td>{{ $result->subject->subject_name }}</td>
                        <td><?php if ( $result->remarks=='1') {
                            echo'pass';
                        }
                        else{
                            echo'fail';
                        }
                        ?></td>
                        <!--<td>{{ $result->remarks }}</td>-->
                       
                        <td>
                            <a href="{{route('results.edit',$result->id)}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Edit</a>
                            <a href="{{route('results.delete',$result->id)}}" onclick="return confirm('Are you sure to Delete?')" class="bg-red-600 text-white px-4 py-2 rounded-lg">Delete</a>
                        </td>
                    
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
    $(document).ready(function() {
        $('#mytable').DataTable();
    });
</script>
@endsection
