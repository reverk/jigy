<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Material Design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
</head>
<body>

{{--@guest--}}
{{--    <li class="nav-item">--}}
{{--        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--    </li>--}}
{{--    @if (Route::has('register'))--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--        </li>--}}
{{--    @endif--}}
{{--@else--}}
{{--    <li class="nav-item dropdown">--}}
{{--        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"--}}
{{--           aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--            {{ Auth::user()->name }}--}}
{{--        </a>--}}

{{--        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--            <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--               onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                {{ __('Logout') }}--}}
{{--            </a>--}}

{{--            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                @csrf--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--@endguest--}}

<main>
    {{ $slot }}
</main>

</body>
</html>
