@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-5 p-5 bg-gray-100 shadow-md">
        <h1 class="font-bold text-3xl mb-5">CreateNotice</h1>
        <hr class="h-1 bg-green-200">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('examnotices.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Title:</label>
                <input type="text" name="title" id="title" class="mt-1 p-2 w-full border rounded-md" value="{{ old('title') }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                <textarea id="default-editor" id="description" name="description" class="mt-1 p-2 w-full border rounded-md">{{ old('description') }}</textarea>
            </div>
            <div class="mb-4">
                <label for="exam_date" class="block text-sm font-medium text-gray-600">Exam Date:</label>
                <input type="date" name="exam_date" id="exam_date" class="mt-1 p-2 w-full border rounded-md" value="{{ old('exam_date') }}" required>
            </div>
            <div class="mb-3">
            <label for="faculties_id" class="block text-gray-700 text-sm font-bold mb-2">Faculties:</label>
            <select name="faculties_id" id="faculties_id">
                @foreach($faculties as $faculty)
                <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                @endforeach
            </select>
        </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Create Notice</button>
        </form>
    </div>
    <script src="https://cdn.tiny.cloud/1/zt4xqikf31pavctxjft9ccar7c2fdsvwwzj6h98trxjj7wup/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#default-editor'
    });
</script>
@endsection
