@extends('layouts.user-app')

@section('content')
    <h1>Exam: {{ $exam->exam_title }}</h1>
    <h2>Subject: {{ $subject->subject_name }}</h2>
    <h3>Duration: {{ $exam->duration }}</h3>

    <form method="post" action="{{ route('exam.submit', $exam->id) }}">
        @csrf
        @foreach($questions as $question)
            <div class="question">
                <p>{{ $question->text }}</p>
                @if($question->type === 'multiple_choice')
                    <ul>
                        @foreach($question->options as $option)
                            <li>
                                <label>
                                    <input type="radio" name="answer[{{ $question->id }}]" value="{{ $option->id }}">
                                    {{ $option->text }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                @elseif($question->type === 'short_answer')
                    <input type="text" name="answer[{{ $question->id }}]">
                @endif
            </div>
        @endforeach
        <button type="submit">Submit Exam</button>
    </form>

    <div id="timer"></div>

    <script>
        // Set the duration of the exam in minutes
        
        // Display the initial time
        document.getElementById('timer').textContent = formatTime(minutes, seconds);

        // Start the countdown
        const countdown = setInterval(() => {
            if (minutes === 0 && seconds === 0) {
                clearInterval(countdown);
                document.getElementById('timer').textContent = 'Time\'s up!';
                document.querySelector('form').submit(); // Automatically submit the form when time's up
            } else {
                if (seconds === 0) {
                    minutes--;
                    seconds = 59;
                } else {
                    seconds--;
                }
                document.getElementById('timer').textContent = formatTime(minutes, seconds);
            }
        }, 1000);

        // Function to format time (adds leading zeros)
        function formatTime(minutes, seconds) {
            return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
        }
    </script>
@endsection
