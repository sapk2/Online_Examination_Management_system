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
 
<nav class="bg-white border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="/user/dashboard" class="flex items-center space-x-3 rtl:space-x-reverse">
    <img src="/img/logo.png" class="h-8" alt="Flowbite Logo" />
   </a>

   <div class="flex items-center justify-center">
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        @if(Auth::user()->image)
<img class="image rounded-circle" src="{{asset(Auth::user()->image)}}" alt="profile_image" style="width: 50px;height: 50px; padding: 10px; margin: 0px; ">
@endif
      </button>
      <!-- Dropdown menu -->
     <div class="z-50 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 absolute" id="user-dropdown" style="top: calc(9% + 0px); right: 0;">
        <div class="px-4 py-3">
         <a href="/profile.index">  <span class="pr-2 pl-1">  {{Auth::user()->username}}🎉 </span></a>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
            <li>
              <a href="{{route('profile.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">my profile</a>
           </li>
            <li>
              <a href="{{route('exams.ongoingexam')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Exam</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"></a>
            </li>
            <li>
            <form action="{{route('logout')}}" method="POST" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-red-600 dark:text-gray-200 dark:hover:text-white  ">
                @csrf
                <button type="submit" class="w-full text-left"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
            </li>
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');

        // Toggle dropdown visibility when the button is clicked
        menuButton.addEventListener('click', function () {
            const expanded = menuButton.getAttribute('aria-expanded') === 'true' || false;
            menuButton.setAttribute('aria-expanded', !expanded);
            userDropdown.classList.toggle('hidden');
        });

        // Close dropdown when user clicks outside of it
        document.addEventListener('click', function (event) {
            if (!menuButton.contains(event.target) && !userDropdown.contains(event.target)) {
                menuButton.setAttribute('aria-expanded', 'false');
                userDropdown.classList.add('hidden');
            }
        });
    });
</script>

      
  </div>
  </div>
</nav>

           
      
@yield('content')
</body>

</html>