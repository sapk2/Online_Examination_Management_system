@extends('layouts.user-app')
@section('content')

<h1 class="font-blod text-3xl mb-4">Exam </h1>
<hr class="h-1 bg-green-500" >

@if(session('f'))
	<div class="alert alert-danger">
		<p>Exam not Started</p>
	</div>
@endif
    <table id="mytable" class="display">
        <thead>
            <tr>
             <th>Exam Title</th>
             <th>Duration</th>
             <th>Subject Name</th>
             <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($exams as $exam)
                    <tr>
                        <td>{{ $exam->exam_title }}</td>
                        <td>{{ $exam->duration }}</td>
                        <td>
                            @php 
                                $subject = \App\Models\Subject::find($exam->subject_id);
                                echo $subject->subject_name;
                            @endphp
                        </td>
                        
        </tbody>

    </table>


@endsection
