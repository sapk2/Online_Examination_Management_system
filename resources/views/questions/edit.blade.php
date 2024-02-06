@extends('layouts.app')
@section('content')
<h1 class="font-bold text-3xl bg-green-200 px-2">Edit Question</h1>
<hr class="h-1 bg-red-600">
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{route('questions.update', $questions->id)}}" method="post" enctype="multipart/form-data">
@csrf
    <div class="mb-3">
        <label for="question" class="from-label">Question</label>
        <textarea name="question" id="default-editor">{{$questions->question}}</textarea>
    </div>
    <div>
        <label for="question_type" class="form-label">Question type</label>
        <select class="form-control" id="question_type" name="Question_type">
            <option value="multiple_choice" @if($questions->Question_type == 'multiple_choice') selected @endif>Multiple Choice</option>
            <option value="true_false" @if($questions->Question_type == 'true_false') selected @endif>True/False</option>
            <option value="short_answer" @if($questions->Question_type == 'short_answer') selected @endif>Short Answer</option>
            <option value="essay" @if($questions->Question_type == 'essay') selected @endif>Essay</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="marks" class="form-label">Marks</label>
        <input type="number" name="marks" id="marks" class="form-control" value="{{$questions->marks}}" required>
    </div>
    <div class="mb-4">
        <label for="subject_id" class="block text-gray-700 text-sm font-bold mb-2">Subject ID:</label>
        <input type="text" name="subject_id" id="subject_id" class="form-input rounded-md w-full " value="{{ $questions->subject_id }}">
    </div>
    <div class="flex justify-center mt-6">
        <input class="bg-blue-600 text-white px-4 py-2 rounded mx-2 hover:cursor-pointer" type="submit" value="update">
        <a href="{{route('questions.index')}}" class="bg-red-500 text-white px-4 py-2 rounded mx-2">Exit</a>
    </div>
</form>
<script src="https://cdn.tiny.cloud/1/zt4xqikf31pavctxjft9ccar7c2fdsvwwzj6h98trxjj7wup/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#default-editor'
    });
</script>


@endsection
