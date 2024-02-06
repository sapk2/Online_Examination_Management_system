@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-5 p-5 bg-gray-100 shadow-md">
        <h1 class="font-bold text-3xl mb-5">EditNotice</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('examnotices.update', $examNotice->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-600">Title:</label>
                <input type="text" name="title" id="title" class="mt-1 p-2 w-full border rounded-md" value="{{ $examNotice->title }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                <textarea id="default-editor" id="description" name="description" class="mt-1 p-2 w-full border rounded-md" required>{{$examNotice->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="exam_date" class="block text-sm font-medium text-gray-600">Exam Date:</label>
                <input type="date" name="exam_date" id="exam_date" class="mt-1 p-2 w-full border rounded-md" value="{{$examNotice->exam_date }}" required>
            </div>
            <div class="mb-4">
                <label for="faculties_id" class="block text-sm font-medium text-gray-600">Faculties ID:</label>
                <input type="text" name="faculties_id" id="faculties_id" class="mt-1 p-2 w-full border rounded-md" value="{{ $examNotice->faculties_id }}" required>
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
