@extends('layouts.app')
@section('content')
<h1 class="font-blod text-3xl bg-green-200 px-2">create_Question</h1>
<hr class="h-1 bg-green-600">


@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('questions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="question" class="form-label">Question</label><br>
        <textarea id="default-editor" name="question">


                </textarea>
        <div class="mb-3">
            <label for="question_type" class="form-label">Question Type</label><br>
            <select class="form-control" id="question_type" name="Question_type" required>
                <option value="multiple_choice">Multiple Choice</option>
                <option value="true_false">True/False</option>
                <option value="short_answer">Short Answer</option>
            </select>
        </div>
       
        <div class="mb-3">
            <label for="marks" class="form-label">Marks</label>
            <input type="number" class="form-control" id="marks" name="marks" required>
        </div>
        <div class="mb-3">
            <label for="subject_id" class="form-label">Subject ID</label>
            <input type="text" class="form-control" id="subject_id" name="subject_id" required>
        </div>
        <!-- Add other form fields as needed -->


        <div class="flex justify-center mt-6">
            <input class="bg-blue-500 text-white px-4 py-2 rounded mx-2 rounded mx-2" type="submit" value="submit">
            <a href="{{route('questions.index')}}" class="bg-red-500 text-white px-4 py-4 rounded-mx-2">Exit</a>
        </div>
</form>
</div>
<script src="https://cdn.tiny.cloud/1/zt4xqikf31pavctxjft9ccar7c2fdsvwwzj6h98trxjj7wup/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#default-editor'
    });
</script>
@endsection
