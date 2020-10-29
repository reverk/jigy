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

    <!-- jQuery and JS bundle w/ Popper.js -->


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

    <script>
        {{--Go to latest article--}}
        function scrollToContent() {
            let element = document.querySelector("#latest-article");
            element.scrollIntoView({behavior: "smooth"});
        }
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

    <!-- Material Design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">

    <!--Tags plugin-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-tags.css') }}">
    <script src="{{ asset('js/bootstrap-tags.js') }}"
            defer></script>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&family=Quicksand:wght@300;400&display=swap"
        rel="stylesheet">

    <!--  jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
</head>
<body>

<x-layouts.navbar/>

<main>
    {{ $slot }}
</main>

<x-layouts.footer/>


</body>
</html>
