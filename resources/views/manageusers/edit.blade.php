@extends('layouts.app')


@section('content')
<h1 class="font-bold text-3xl  bg-green-200 px-2">Edit User</h1>
<hr class="h-1 bg-green-600">
@if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
 @endif
 <form action="{{route('manageusers.update', $user->id)}}" method="post" enctype="multipart/form-data">
 @csrf
    <div class="mb-3">
    <label for="Registration_no">Registration_no</label>
    <input type="number" name="id" id="Registration_no" value="{{$user->id}}">
</div>
<div class="mb-3">
    <label for="name">Name</label>
    <input type="text" name="name"value="" id="name" required>
</div>
<div class="mb-3">
    <label for="mobile_no">Mobile_no</label>
    <input type="number" name="mobileno" class="form-control">
</div>
<div class="mb-3">
    <label for="email">Email</label>
    <input type="email" class="email" name="email" required>
</div>
<div class="mb-3">
    <label for="username">Username</label>
    <input type="text" name="username" id="username"required>
</div>
<script>
    // Function to generate a username based on the user's name
    function generateUsername() {
        // Get the value of the name input
        const nameInput = document.getElementById('name');
        const nameValue = nameInput.value.trim();

        // Generate a username based on the name (you can customize this logic)
        const usernameValue = nameValue.replace(/\s+/g, '').toLowerCase() + Math.floor(Math.random() * 1000);

        // Set the generated username to the username input
        const usernameInput = document.getElementById('username');
        usernameInput.value = usernameValue;
    }

    // Attach the function to the 'input' event of the name input
    const nameInput = document.getElementById('name');
    nameInput.addEventListener('input', generateUsername);
</script>
<div>
<label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
        <input type="radio" name="roles" id="role" value="0"> Admin
        <input type="radio" name="roles" id="role" value="1"> Teacher
        <input type="radio" name="roles" id="role" value="2"> Student
    </div>    
    <div class="flex justify-center mt-6">
        <input class="bg-blue-600 text-white px-4 py-2 rounded mx-2" type="submit" value="update">
            <a href="{{route('manageusers.index')}}" class="bg-red-500 text-white px-4 py-4 rounded-mx-2">Exit</a>
        </div>
 </form>
 
@endsection