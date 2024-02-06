<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Datatabale Scripts -->
    <link rel="stylesheet" href="{{asset('datatable/datatables.css')}}">
    <script src="{{asset('datatable/jquery.js')}}"></script>
    <script src="{{asset('datatable/datatables.js')}}"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="flex">
        <div class="w-56 bg-blue-950 min-h-screen">
            <img class="p-3 m-2" src="{{asset('/img/logo.png')}}" alt="">
            <hr class="color-white border-b-gray-400 border-b-2 mb-8">
            <a href="/dashboard" class="px-4 py-2 text-white hover:bg-blue-900 block border-l-white border-l-4 ml-2 mt-2"><i class="bi bi-speedometer"> Dashboard</i></a>
            <a href="/faculty" class="px-4 py-2 text-white hover:bg-blue-900 block border-l-white border-l-4 ml-2 mt-2"><i class="bi bi-person-vcard-fill"> Faculty</i></a>
            <a href="/subject" class="px-4 py-2 text-white hover:bg-blue-900 block border-l-white border-l-4 ml-2 mt-2"><i class="bi bi-book"> Subject</i></a>
            <a href="/questions" class="px-4 py-2 text-white hover:bg-blue-900 block border-l-white border-l-4 ml-2 mt-2 relative"><i class="bi bi-question-circle"></i> Questions</i></a>
            <a href="/examnotices" class="px-4 py-2 text-white hover:bg-blue-900 block border-l-white border-l-4 ml-2 mt-2 relative"><i class="bi bi-bell-fill"></i> Notice</i></a>
            <a href="/exam" class="px-4 py-2 text-white hover:bg-blue-900 block border-l-white border-l-4 ml-2 mt-2"><i class="bi bi-explicit"></i> Exams</a>
            <a href="/results" class="px-4 py-2 text-white hover:bg-blue-900 block border-l-white border-l-4 ml-2 mt-2"><i class="bi bi-r-square"></i> Results</a>
            <a href="/manageusers" class="px-4 py-2 text-white hover:bg-blue-900 block border-l-white border-l-4 ml-2 mt-2"><i class="bi bi-person-gear"></i> Manage user</a>

            <form action="{{route('logout')}}" method="POST" class="px-4 py-2 text-white hover:bg-red-600 hover:text-white block border-l-red-800 border-l-4 ml-2 mt-2   ">
                @csrf
                <button type="submit" class="w-full text-left"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>


        </div>
        <div class="flex-1">
                <div class="top-0 p-3 bg-blue-900 w-full text-white right-full inset-y-0 right-0 justify-end inline-flex">
                Hello, <a href="{{route('profile.edit')}}"> <span class="pr-2 pl-1"> {{Auth::user()->name;}} </span></a>
                </div>
            @yield('content')
        </div>
    </div>
    <!-- <script>
        var submenu = document.getElementById('submenu');
        submenu.style.display = 'none';
        function showhide(){
            if(submenu.style.display == 'none')
            {
                submenu.style.display = 'block';
            }
            else
            submenu.style.display = 'none';
        }
    </script>-->
</body>

</html>