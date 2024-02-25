@extends('layouts.user-app')

@section('content')
<h1 class="font-blod text-3xl px-2">Past Exams</h1>
<div class="grid-layout drop-shadow-md p-2 min-h-min">
    <!-- Your add new button and success message code here (if needed) -->
    <table id="pastExamsTable" class="display">
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
                <th>Marks</th>
                <th>Subject Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pastExams as $exam)
            <tr>
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
                        <!-- Modify these links according to your requirements -->
                        <a href="{{ route('exams.show', $exam->id) }}" class="bg-green-600 text-white px-4 py-2 rounded"><svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
</svg>View</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $('#pastExamsTable').DataTable();
    });
</script>
@endsection
