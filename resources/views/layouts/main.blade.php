<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Smart movie Reviewer</title>
    <link rel="stylesheet" href="/css/main.css">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>

      <!-- Styles -->
      <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>



</head>
<body class="font-sans bg-indigo-100 text-gray-900">
<nav class="border-b border-gray-800">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center justify-between px-4 py-6">
        <ul class="flex flex-col md:flex-row items-center">
            <li>
                <a href="{{route('movies.index')}}">
                    <img src="/img/cinema_visitor.png" alt="logo" width="70" height="70">
                </a>

            </li>
            <li class="md:ml-16 mt-3 md:mt-0">
                <a href="{{route('news.index')}}" class=" text-gray-900 hover:text-green-300"><b>Home</b></a>
            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
                <a href="{{route('movies.index')}}" class=" text-gray-900 hover:text-green-300"><b>Movies</b></a>

            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
                <a href="{{route('tv.index')}}" class=" text-gray-900 hover:text-green-300"><b>Tv shows</b></a>

            </li>
            <li class="md:ml-6 mt-3 md:mt-0">
                <a href="{{route('actors.index')}}" class=" text-gray-900 hover:text-green-300"><b>People</b></a>

            </li>

        </ul>

        <div class="flex  flex-col md:flex-row items-center">
     <livewire:search-dropdown>
&nbsp;
        <a href="{{route('wishlist.index')}}"> <img src="/img/heart.png" alt="logo" width="20" height="20"></a>
       <div class="md:ml-20 mt-3 md:mt-0">


        @guest
        <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
       &nbsp;
        @if (Route::has('register'))
            <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
    @else

        <span><b>{{ Auth::user()->name }}</b></span>
&nbsp;
        <a href="{{ route('logout') }}"
           class="no-underline hover:underline"
           onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            {{ csrf_field() }}
        </form>
    @endguest
    </div>
</div>
    </div>
</nav>
@yield('content')
@livewireScripts


</body>
</html>



