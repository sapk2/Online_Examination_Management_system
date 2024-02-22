@extends('layouts.user-app')
@section('content')
   <div class="flex-none w-23 h-14"> <h1 class="font-blod text-3xl px-4 py-4">OnGoingExams</h1></div>
   <hr style="height:2px;border-width:0;color:gray;background-color:green">
    <div class="grid-layout-xl drop-shadow-xl p-2 min-h-min">
        <table id="mytable" class="display">
            <thead>
                <tr>
                    <th>Exam Title</th>
                    <th>Duration</th>
                    <th>Subject Name</th>
                    <th>Question Type</th>
                    <th>Start At</th>
                    <th>End At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody> 
            @if (count($exams) > 0)
                @php
                    $count = 1;
                @endphp
                @foreach($exams as $exam)
                    <tr class="sucess">
                        <td>{{ $exam->exam_title }}</td>
                        <td>{{ $exam->duration }}Hrs</td>
                        <td>
                            @php 
                                $subject = \App\Models\Subject::find($exam->subject_id);
                                echo $subject->subject_name;
                            @endphp
                        </td>
                        <td>{{ $exam->questiontype }}</td>
                        <td>{{ $exam->start_at }}</td>
                        <td>{{ $exam->end_at }}</td>
                        <td>
                            <a href="{{ route('exams.take', $exam->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded">Take Exam</a>
                        </td>
                    </tr>
                @endforeach
            @endif(
                <tr>
                    <td colspan="7"> No Exams Running</td>
                </tr>
            )
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        });
    </script>
@endsection
