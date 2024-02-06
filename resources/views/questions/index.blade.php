@extends('layouts.app')
@section('content')
<h1 class="font-bold text-3xl pt-4 px-2">Question</h1>

<div class="grid-layout drop-shadow-md  p-3  min-h-min">
    <div class="my-5 text-right px-2">
        <a href="{{route('questions.create')}}" class="bg-green-600 text-white px-4 py-2 rounded">➕ Add New</a>
    </div>
    @if(session('success'))
    <div id="success-alert" class="h-2/5 w-3/5 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-100 bg-opacity-75 backdrop-blur-lg border border-green-400 text-green-700 px-6 py-4 rounded-md text-lg shadow-md flex flex-col justify-center items-center z-50 transition-all duration-500 ease-in-out">
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
    <table id="mytable" class="Display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Question</th>
                <th>Type</th>
                <th>Marks</th>
                <th>Subject ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($question as $question)
            <tr>
                <td>{{ $question->id }}</td>
                <td> {!! $question->question !!}</td>
                <td>{{ $question->Question_type }}</td>
                <td>{{ $question->marks }}</td>
                <td><?php $subject = \App\Models\subject::find($question->subject_id);
                if($subject){
                    echo $subject->subject_name;
                }
            else{
                echo $question->subject_id;
            }
            ?> </td>
                <td>
                    <a href="{{ route('questions.edit', $question->id) }}" class="bg-green-600 text-white px-4 py-2 rounded">Edit</a>
                    <form action="{{ route('questions.delete', $question->id) }}" method="post" style="display: inline;">
                        @csrf
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
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