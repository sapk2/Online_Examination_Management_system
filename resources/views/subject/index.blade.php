@extends('layouts.app')
@section('content')
<h1 class="font-bold text-3xl px-2 pt-4">Subjects</h1>
<div class="grid-layout drop-shadow-md  px-4  min-h-min">
    <div class="my-5 text-right px-2">
        <a href="{{route('subject.create')}}" class="bg-green-600 text-white px-4 py-2 rounded">➕ Add New</a>
        @if(session('success'))
        <div id="success-alert" class="h-2/5 w-3/5 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-100 bg-opacity-75 backdrop-blur-lg border border-green-400 text-green-700 px-6 py-4 rounded-md text-lg shadow-md flex flex-col justify-center items-center z-50 transition-all duration-500 ease-in-out">
            {{ session('success') }}
        </div>

        <script>
            // Function to close the alert
            function closeAlert() {
                var successAlert = document.getElementById('success-alert');
                successAlert.style.display = 'none';
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
    </div>
    <table id="mytable" class="display">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Code</th>
                <th>Subject Name</th>
                <th>Description</th>
                <th>Credit hrs</th>
                <th>Faculty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{$loop->index + 1}} </td>
                <td>{{ $subject->code }}</td>
                <td>{{ $subject->subject_name }}</td>
                <td>{{ $subject->description }}</td>
                <td>{{ $subject->credit_hrs }}</td>
                <td><?php $faculty =  \App\Models\Faculty::find($subject->faculties_id);
                    if ($faculty) {
                        echo $faculty->faculty_name;
                    } else {
                        echo $subject->faculties_id;
                    } ?></td>

                <td>
                    <div class="mb-3">
                        <a href="{{ route('subject.edit', $subject->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded">Edit</a>
                    </div>
                    <form action="{{ route('subject.delete', $subject->id) }}" method="post" style="display: inline;">
                        @csrf
                        @method('get')
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