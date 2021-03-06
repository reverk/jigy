<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible"
          content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Backend</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"
            defer></script>
    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    {{--    Might need a better solution to this --}}
    @if(Request::routeIs('dashboard.articles.create') || Request::routeIs('dashboard.articles.edit') || Request::routeIs('dashboard.profile') || Request::routeIs('dashboard.users'))
        @if (Request::routeIs('dashboard.articles.create') || Request::routeIs('dashboard.articles.edit'))
            <script src="{{asset('node_modules/tinymce/tinymce.min.js')}}"></script>
            <script src="{{asset('js/tinymce_config.js')}}"></script>
        @endif
        <script>
            document.addEventListener("DOMContentLoaded", function (event) {
                document.querySelector('.custom-file-input').addEventListener('change', function (e) {
                    var fileName = document.getElementById("myInput").files[0].name
                    var nextSibling = e.target.nextElementSibling
                    nextSibling.innerText = fileName
                })
            });
        </script>
    @endif
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}"
          rel="stylesheet">
    <link rel="stylesheet"
          href="{{asset('css/styles.css')}}">
    <link rel="stylesheet"
          href="{{asset('css/backend_styles.css')}}">

    <!-- Material Design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=Quicksand:wght@300;400&display=swap"
        rel="stylesheet">
</head>
<body>
<x-flash-message :msg="$msg ?? ''"/>

<x-layouts.dashboard-navbar/>

<main class="min-vh-100">
    {{ $slot }}
</main>

<x-layouts.footer/>

</body>
</html>
