@extends('layouts.user-app')
@section('content')
<div class="flex items-center"><h1 class="text-3xl px-4 py-4">Upcoming  Exam</h1></div>

<hr style="height:2px;border-width:0;color:gray;background-color:green">
@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<table id="mytable" class="display">
        <thead>
            <tr>
                <th>SN</th>
                <th>Exam Title</th>
                <th>Exam Code</th>
                <th>Duration</th>
                <th>Question Type</th>
                <th>Full Marks</th>
                <th>Subject Name</th>
                <th>Start At</th>
                <th>End At</th>
            </tr>
        </thead>
        <tbody> 
            @foreach($exams as $exam)
                <tr>
                    <td>{{ $exam->exam_title }}</td>
                    <td>{{ $exam->exam_code }}</td>
                    <td>{{ $exam->duration }}</td>
                    <td>{{ $exam->questiontype }}</td>
                    <td>{{ $exam->fullmark }}</td>
                    <td>{{ $exam->subject->subject_name }}</td>
                    <td>{{ $exam->start_at }}</td>
                    <td>{{ $exam->end_at }}</td>
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