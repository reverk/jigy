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

    <!-- Laravel PWA -->
    @laravelPWA

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"
            defer></script>
    <script src="{{asset('node_modules/flexmasonry/dist/flexmasonry.js')}}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            FlexMasonry.init('.grid', {
                responsive: true,
                breakpointCols: {
                    'min-width: 768px': 4,
                    'min-width: 425px': 2,
                },
            })
        });
    </script>
    <script>
        {{--Go to latest article--}}
        function scrollToContent() {
            let element = document.querySelector("#latest-article");
            element.scrollIntoView({behavior: "smooth"});
        }

        {{--Show more fillables in search--}}
        function showAdvancedSearch() {
            let x = document.getElementById("advanced_search");
            if (x.classList.contains("d-none")) {
                x.classList.remove("d-none")
            } else {
                x.classList.add("d-none")
            }
        }
    </script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}"
          rel="stylesheet">
    <link rel="stylesheet"
          href="{{asset('css/styles.css')}}">
    <link rel="stylesheet"
          href="{{asset('node_modules/flexmasonry/dist/flexmasonry.css')}}">

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
<x-flash-message :msg="$msg ?? ''"/>

@if(!Request::routeIs('index'))
    <x-layouts.navbar/>
@endif

<main class="min-vh-100">
    {{ $slot }}
</main>

<x-layouts.footer/>


</body>
</html>
