<nav class="d-flex container py-3">
    <h3 class="align-self-center m-0">
        <a href="{{route('index')}}" class="text-decoration-none text-dark">
            {{ config('app.name', 'Laravel') }}
        </a>
    </h3>
    <div class="ml-auto">
        <x-layouts.navbar-item iconName="home" routeTo="index" name="Home"/>
        <x-layouts.navbar-item iconName="collections" routeTo="index" name="Gallery"/>
        <x-layouts.navbar-item iconName="info" routeTo="index" name="About"/>
        <x-layouts.navbar-item iconName="search" routeTo="index" name="Search"/>
    </div>
    {{--    TODO: Add route names--}}
</nav>
