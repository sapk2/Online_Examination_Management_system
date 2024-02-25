@extends('layouts.user-app')

@section('content')
    <h1 class="font-blod text-3xl px-2">Exam Details</h1>
    <div class="grid-layout drop-shadow-md p-2 min-h-min">
        <h2>{{ $exam->exam_title }}</h2>
        <p><strong>Duration:</strong> {{ $exam->duration }}Hrs</p>
        <p><strong>Subject Name:</strong> {{ $subject->subject_name }}</p>
        <p><strong>Start At:</strong> {{ $exam->start_at }}</p>
        <p><strong>End At:</strong> {{ $exam->end_at }}</p>

        <h3>Questions and Answers:</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Your Answer</th>
                    <th>Correct Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($exam->questions as $question)
                    <tr>
                        <td>{{ $question->text }}</td>
                        <td>{{ $question->userAnswer->selected_option ?? 'Not answered' }}</td>
                        <td>{{ $question->correct_answer }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
