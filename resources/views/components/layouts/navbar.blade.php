<nav class="navbar navbar-expand-lg navbar-light bg-light container">
    <a class="navbar-brand" href="{{route('index')}}">JiGy</a>

    <button class="navbar-toggler border-0"
            type="button"
            data-toggle="collapse"
            data-target="#navbarToggler"
            aria-controls="navbarToggler"
            aria-expanded="false"
            aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
        <div class="navbar-nav ml-auto">
            <x-layouts.navbar-item-link routeTo="index" iconName="home" name="Home"/>
            <x-layouts.navbar-item-link routeTo="index" iconName="collections" name="Gallery"/>
            <x-layouts.navbar-item-link routeTo="index" iconName="info" name="About"/>
            <x-layouts.navbar-item-link routeTo="index" iconName="search" name="Search"/>
            @guest
                <a class="nav-item nav-link d-inline-flex align-self-center btn btn-outline-info px-3 py-2 py-md-1"
                   href="{{route('login')}}">
                    <i class="material-icons">login</i>
                    <desc class="ml-1">Login</desc>
                </a>
                {{--                @if(Route::has('register'))--}}
                {{--                    <x-layouts.navbar-item routeTo="register" iconName="add_circle" name="register"/>--}}
                {{--                @endif--}}
            @endguest
            @auth
                <x-layouts.navbar-item-link routeTo="index" iconName="face" name="Hello, {{Auth::user()->name}}"/>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger d-inline-flex">
                        <i class="material-icons align-self-center mr-2">logout</i>
                        <desc class="align-self-center">Logout</desc>
                    </button>
                </form>
            @endauth
        </div>
    </div>
</nav>
