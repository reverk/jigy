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
    @if(env('APP_ENV') == 'production' || env('APP_ENV') == 'staging')
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
                crossorigin="anonymous"></script>
    @else
        <script src="{{ asset('js/app.js') }}"
                defer></script>
    @endif
    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    @if (Request::routeIs('dashboard.articles.create') || Request::routeIs('dashboard.articles.edit'))
        @if(env('APP_ENV') == 'production' || env('APP_ENV') == 'staging')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.11/tinymce.min.js"
                    integrity="sha512-3tlegnpoIDTv9JHc9yJO8wnkrIkq7WO7QJLi5YfaeTmZHvfrb1twMwqT4C0K8BLBbaiR6MOo77pLXO1/PztcLg=="
                    crossorigin="anonymous"></script>
        @else
            <script src="{{asset('node_modules/tinymce/tinymce.min.js')}}"></script>
        @endif
        <script src="{{asset('js/tinymce_config.js')}}"></script>
    @endif
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    <!-- Styles -->
    @if(env('APP_ENV') == 'production' || env('APP_ENV') == 'staging')
        <link rel="stylesheet"
              href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
              integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
              crossorigin="anonymous">
    @else
        <link href="{{ asset('css/app.css') }}"
              rel="stylesheet">
    @endif
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

<x-layouts.dashboard-navbar/>

<main>
    {{ $slot }}

</main>

<x-layouts.footer/>

</body>
</html>
