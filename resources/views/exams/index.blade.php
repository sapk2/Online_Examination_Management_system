@extends('layouts.app')
@section('content')
<h1 class="font-blod text-3xl   px-2">Exams</h1>
<div class="grid-layout drop-shadow-md  p-2 min-h-min">
    <div class="my-5 text-right  px-2">
        <a href="{{route('exams.create')}}" class="bg-green-600 text-white px-4 py-2 rounded">➕ Add New</a>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <table id="mytable" class="display">
        <thead>
            <tr>
                <th>SN</th>
                <th>Exam Title</th>
                <th>Exam code</th>
                <th>Duration</th>
                <th>Start At</th>
                <th>End At</th>
                <th>Questions</th>
                <th>Types</th>
                <th> Marks</th>
                <th>Subject Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($exams as $exam)
            <td>{{$loop->index + 1}} </td>
            <td>{{$exam->exam_title}}</td>
            <td>{{ $exam->exam_code}}</td>
            <td>{{ $exam->duration}}</td>
            <td>{{ $exam->start_at }}</td>
             <td>{{ $exam->end_at }}</td>
            <td>{{ $exam->numberof_question }}</td>
            <td>{{ $exam->questiontype }}</td>
            <td>{{ $exam->fullmark }}</td>
            <td>@php $subject=\App\Models\subject::find($exam->subject_id);echo"$subject->subject_name" @endphp</td>
            <td>
                    <div class="mb-3">
                        <a href="{{ route('exams.edit', $exam->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded">Edit</a>
                    </div>
                    <form action="{{ route('exams.delete', $exam->id) }}" method="post" style="display: inline;">
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