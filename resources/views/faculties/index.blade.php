@extends('layouts.app')
@section('content')
<h1 class="text-3xl font-bold px-4 pt-2">Faculty</h1>
<div class="grid-layout drop-shadow-md px-4 min-h-min">

    <div class="my-5 text-right px-2">
        <a href="{{route('faculties.create')}}" class="bg-green-600 text-white px-4 py-2 rounded">➕ Add</a>
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
    {{-- datatable --}}
    <table id="mytable" class="display">
        <thead>
            <tr>
                <th>Sn</th>
                <th>faculty_name</th>
                <th>status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faculties as $faculty)
            <tr>
                <td>{{$loop->index + 1 }}</td>
                <td>{{$faculty->faculty_name}}</td>
                <td><?php if ($faculty->status == '1') {
                        echo 'Active';
                    } else {
                        echo 'Inactive';
                    } ?></td>
             
                <td>
                    <a href="{{route('faculties.edit',$faculty->id)}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Edit</a>
                    <a href="{{route('faculties.delete',$faculty->id)}}" onclick="return confirm('Are you sure to Delete?')" class="bg-red-600 text-white px-4 py-2 rounded-lg">Delete</a>
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