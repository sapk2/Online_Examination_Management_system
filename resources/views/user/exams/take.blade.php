@extends('layouts.user-app')

@section('content')
   <div class="flex-none w-23 h-14"> <h1 class="font-blod text-3xl px-4 py-4">Take Exam</h1></div>
   <hr style="height:2px;border-width:0;color:gray;background-color:green">
    <div class="grid-layout-xl drop-shadow-xl p-2 min-h-min">
        <div class="mt-3">
            <p class="text-primary">Home / <span class="text-white">Exam</span></p>
            <hr>
        </div>

        <div class="">
            <h5><div class="text-center">COUNTDOWN: <span class="ml-2" style="color: #bf360c;" id="demo"></span></div></h5>
        </div>

        <div class="">
            <form action="{{ route('submit.exam', $exam->id) }}" method="post">
                @csrf
                <h4 class="text-uppercase text-center my-3 text-info">Exam Title: {{ $exam->exam_title }}</h4>
                <div class="row">
                    <div class="col-md-4 col-lg-4">
                        
                        <div class="text-center"><b>Exam Date: {{ $exam->start_at }}</b></div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center"><b>Total Time: {{ $exam->duration }} min</b></div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center"><b>Full Marks: {{ $exam->fullmark }}</b></div>
                    </div>
                </div>
                <hr>
                @php $i=1 @endphp
                @foreach($questions as $question)
                <div>
                    <label for="question">{{ $i }}. {{ $question->question_text }}</label>
                    <div class="row my-2">
                        <div class="col-5 ml-5"><input type="radio" name="answers[{{ $question->id }}]" value="A"> A. {{ $question->option_a }}</div>
                        <div class="col-5"><input type="radio" name="answers[{{ $question->id }}]" value="B"> B. {{ $question->option_b }}</div>
                    </div>
                    <div class="row mb-3 my-2">
                        <div class="col-5 ml-5"><input type="radio" name="answers[{{ $question->id }}]" value="C"> C. {{ $question->option_c }}</div>
                        <div class="col-5"><input type="radio" name="answers[{{ $question->id }}]" value="D"> D. {{ $question->option_d }}</div>
                    </div>
                </div>
                @php $i++ @endphp
                @endforeach
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-sx mr-2 mb-5 mt-3" style="width: 150px;">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Set the countdown timer
    var countDownDate = new Date("{{ $exam->end_at }}").getTime();
    var x = setInterval(function() {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        document.getElementById("demo").innerHTML = hours + "h "
            + minutes + "m " + seconds + "s ";
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
</script>

@endsection
