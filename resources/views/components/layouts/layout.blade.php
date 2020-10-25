<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token"
          content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=Quicksand:wght@300;400&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"
            defer></script>
    <script>
        {{--Go to latest article--}}
        function scrollToContent() {
            let element = document.querySelector("#latest-article");
            element.scrollIntoView({behavior: "smooth"});
        }
    </script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}"
          rel="stylesheet">
    <link rel="stylesheet"
          href="{{asset('css/styles.css')}}">

    <!-- Material Design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <!--Tags plugin-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-tags.css') }}">
    <script src="{{ asset('js/bootstrap-tags.js') }}"
            defer></script>
</head>
<body>

<x-layouts.navbar/>

<main>
    {{ $slot }}
</main>

<x-layouts.footer/>


</body>
</html>
