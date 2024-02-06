@extends('layouts.app')

@section('content')
    <h1 class="font-bold text-3xl  px-2 pt-2"> Manage Users</h1>
    
    <div class="grid-layout drop-shadow-md px-4 pt-2 mt-6 min-h-min">
        @if(session('success'))
            <div id="alert alert-success" class="h-2/5 w-3/5 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-100 bg-opacity-75 backdrop-blur-lg border border-green-400 text-green-700 px-6 py-4 rounded-md text-lg shadow-md flex flex-col justify-center items-center z-50 transition-all duration-500 ease-in-out">
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
                <th>Register No</th>
                <th>Name</th>
                <th>User Name</th>
                <th>Mobile No</th>
                <th> Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{$user->username}}</td>
                    <td>{{ $user->mobileno }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roles }}</td>

                    <td>
                        <a href="{{ route('manageusers.edit', $user->id) }}" class="bg-green-600 text-white px-4 py-2 rounded">Edit</a>
                        <a href="{{ route('manageusers.delete', $user->id) }}" onclick="return confirm('Are you sure to delete?')" class="bg-red-600 text-white px-4 py-2 rounded">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function(){
            $('#mytable').DataTable();
        });
    </script>
@endsection
