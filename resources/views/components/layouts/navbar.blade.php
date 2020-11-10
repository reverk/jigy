<nav class="navbar navbar-expand-lg navbar-light container">

    <a class="navbar-brand"
       href="{{route('index')}}"
       style="width: 45px">
        <img src="{{asset('static/images/logo.svg')}}"
             alt="Logo"
             class="mw-100 mh-100">
    </a>

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

    <div class="collapse navbar-collapse"
         id="navbarToggler">
        <div class="navbar-nav ml-auto d-flex align-items-lg-center">
            <x-layouts.navbar-item-link routeTo="index"
                                        iconName="home"
                                        name="Home"/>
            <x-layouts.navbar-item-link routeTo="gallery"
                                        iconName="collections"
                                        name="Gallery"/>
            <x-layouts.navbar-item-link routeTo="about"
                                        iconName="info"
                                        name="About"/>
            <x-layouts.navbar-item-link routeTo="stats"
                                        iconName="analytics"
                                        name="Stats"/>
            <x-layouts.navbar-item-link routeTo="search"
                                        iconName="search"
                                        name="Search"/>
            @guest
                <a class="nav-item d-inline-flex btn primary-gradient px-3 py-2 py-md-1"
                   href="{{route('login')}}">
                    <i class="material-icons">login</i>
                    <desc class="ml-1 navbar-item-font">Login</desc>
                </a>
            @endguest
            @auth
                <div class="nav-item dropdown px-2 py-2 py-md-1">
                    <button
                        role="button"
                        type="button"
                        data-toggle="dropdown"
                        class="btn">
                        <img src="{{auth()->user()->avatar}}"
                             alt="Profile image"
                             class="rounded-circle"
                             width=28px
                        >
                        <span class="ml-2">{{auth()->user()->name}}</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right"
                         aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item"
                           href="{{route('dashboard')}}">Dashboard</a>
                        <a class="dropdown-item"
                           href="{{route('dashboard.profile')}}">Settings</a>
                        <div class="dropdown-divider"></div>
                        <form action="{{route('logout')}}"
                              method="post"
                        >
                            @csrf
                            <button type="submit"
                                    class="dropdown-item d-inline-flex">
                                <i class="material-icons align-self-center mr-2 d-lg-none d-block">logout</i>
                                <desc class="align-self-center text-danger">Logout</desc>
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
