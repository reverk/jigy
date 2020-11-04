{{-- Upper navbar --}}
<div class="container d-flex justify-content-between align-items-center p-2 my-3">
    <a class="ml-2 mb-0"
       href="{{route('index')}}"
       style="width: 45px">
        <img src="{{asset('static/images/logo.svg')}}"
             alt="Logo"
             class="mw-100 mh-100">
    </a>
    <div class="mr-2 dropdown">
        <img src="{{auth()->user()->avatar}}"
             role="button"
             type="button"
             data-toggle="dropdown"
             alt="Profile image"
             width=28px
             class="rounded-circle">
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
</div>

{{--Only hide if it's creating something--}}
@if(
    !(Request::routeIs('dashboard.articles.create') || Request::routeIs('dashboard.articles.edit') ||
    Request::routeIs('dashboard.tag.create') || Request::routeIs('dashboard.tag.edit') ||
    Request::routeIs('dashboard.category.create') || Request::routeIs('dashboard.category.edit') ||
    Request::routeIs('dashboard.users.create') || Request::routeIs('dashboard.users.edit'))
)

    {{-- Lower navbar --}}
    <ul class="nav nav-tabs container my-2">
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}"
               href="{{route('dashboard')}}">Dashboard</a>
        </li>
        <li class="nav-item">
            @if (auth()->user()->can('manage all articles'))
                <a class="nav-link dropdown-toggle {{ Request::routeIs('dashboard.articles') || Request::routeIs('dashboard.articles.all') ? 'active' : '' }}"
                   data-toggle="dropdown"
                   href="#"
                   role="button"
                   aria-haspopup="true"
                   aria-expanded="false">Articles</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item"
                       href="{{route('dashboard.articles')}}">Your Articles</a>
                    <a class="dropdown-item"
                       href="{{route('dashboard.articles.all')}}">All Articles</a>
                </div>
            @else
                <a class="nav-link {{ Request::routeIs('dashboard.articles') ? 'active' : '' }}"
                   href="{{route('dashboard.articles')}}">Articles</a>
            @endif
        </li>
        @can('manage taxonomies')
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard.taxonomy') ? 'active' : '' }}"
                   href="{{route('dashboard.taxonomy')}}">Tags & Categories</a>
            </li>
        @endcan
        @can('manage users')
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard.users') ? 'active' : '' }}"
                   href="{{route('dashboard.users')}}">Users</a>
            </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('dashboard.profile') ? 'active' : '' }}"
               href="{{route('dashboard.profile')}}">Settings</a>
        </li>
    </ul>

@endif

