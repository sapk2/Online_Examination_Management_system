@extends('layouts.teacher-app')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 mt-14" >

    <h1 class="font-bold text-3xl bg-gray-200 px-2">Subjects</h1>
    <hr>
    <div class="grid-layout drop-shadow-md bg-gray-100 p-3 mt-3 min-h-min">
<table class="text-center mt-5 w-full">
    <tr>
        <th class="border border-gray-200 p-2 bg-gray-300">S.N</th>
        <th class="border border-gray-200 p-2 bg-gray-300">Subject Name</th>
        <th class="border border-gray-200 p-2 bg-gray-300">Description</th>
        <th class="border border-gray-200 p-2 bg-gray-300">Credit hrs</th>
        <th class="border border-gray-200 p-2 bg-gray-300">Faculty</th>
      
    </tr>
        @foreach ($subjects as $subject)
        <tr> 
            <td  class="border border-gray-200 p-2">{{$loop->index + 1}}</td>
        <td class="border border-gray-200 p-2">{{ $subject->subject_name }} </td>
        <td  class="border border-gray-200 p-2">{{ $subject->description }}</td>
        <td  class="border border-gray-200 p-2">{{ $subject->credit_hrs }}</td>
        <td  class="border border-gray-200 p-2">
            <?php $faculty =  \App\Models\Faculty::find($subject->faculties_id);
                if ($faculty) 
                {
                        echo $faculty->faculty_name;
                } 
                    else 
                    {
                        echo $subject->faculties_id;
                    } 
                    
            ?>
                    
                
                
        </td>
                     
    </tr>
           
        @endforeach
   
</table>
         </div></div></div>

@endsection