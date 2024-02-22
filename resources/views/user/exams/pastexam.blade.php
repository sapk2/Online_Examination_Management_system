@extends('layouts.user-app')
@section('content')
   <div class="flex-none w-23 h-14"> <h1 class="font-blod text-3xl px-4 py-4">Past Exams</h1></div>
   <hr style="height:2px;border-width:0;color:gray;background-color:green">
    <div class="grid-layout-xl drop-shadow-xl p-2 min-h-min">
        <table id="pastExamsTable" class="display">
            <thead>
                <tr>
                    <th>Exam Title</th>
                    <th>Duration</th>
                    <th>Subject Name</th>
                    <th>Question Type</th>
                    <th>Start At</th>
                    <th>End At</th>
                    <th>User Answers</th>
                    <th>Correct Answers</th>
                </tr>
            </thead>
            <tbody> 
            @if (count($pastExams) > 0)
                @php
                    $count = 1;
                @endphp
                @foreach($pastExams as $pastExam)
                    <tr class="success">
                        <td>{{ $pastExam->exam_title }}</td>
                        <td>{{ $pastExam->duration }}Hrs</td>
                        <td>
                            @php 
                                $subject = \App\Models\Subject::find($pastExam->subject_id);
                                echo $subject->subject_name;
                            @endphp
                        </td>
                        <td>{{ $pastExam->questiontype }}</td>
                        <td>{{ $pastExam->start_at }}</td>
                        <td>{{ $pastExam->end_at }}</td>
                        <td>
                            <!-- Display user answers -->
                            <!-- Assuming $userAnswers is an array containing user's answers -->
                            <!-- Assuming $correctAnswers is an array containing correct answers -->
                            @foreach ($userAnswers[$pastExam->id] as $key => $userAnswer)
                                @if ($userAnswer != $correctAnswers[$pastExam->id][$key])
                                    <span style="color: red;">{{ $userAnswer }}</span>
                                    (Correct Answer: {{ $correctAnswers[$pastExam->id][$key] }})<br>
                                @else
                                    {{ $userAnswer }}<br>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <!-- Display correct answers (hidden if user answer is correct) -->
                            @foreach ($correctAnswers[$pastExam->id] as $correctAnswer)
                                <span style="visibility: hidden;">{{ $correctAnswer }}</span><br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8"> No Past Exams Available</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#pastExamsTable').DataTable();
        });
    </script>
@endsection
