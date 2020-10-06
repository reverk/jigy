{{--TODO: Add links when route is available--}}
{{-- Upper navbar --}}
<div class="container d-flex justify-content-between align-items-center p-2 my-3">
    <div class="h5 ml-2 mb-0">{{env('APP_NAME', 'Laravel')}}</div>
    <div class="mr-2 dropdown">
        <img src="{{auth()->user()->avatar}}"
             role="button"
             type="button"
             data-toggle="dropdown"
             alt="Profile image"
             width=28px>
        <div class="dropdown-menu dropdown-menu-right"
             aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item"
               href="{{route('dashboard')}}">Dashboard</a>
            <a class="dropdown-item"
               href="#">Settings</a>
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

{{-- Lower navbar --}}
<ul class="nav nav-tabs container my-2">
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}"
           href="{{route('dashboard')}}">Dashboard</a>
    </li>
    <li class="nav-item">
        @if (auth()->user()->can('manage all articles'))
            <a class="nav-link dropdown-toggle {{ Request::routeIs('dashboard.articles') ? 'active' : '' }}"
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
            <a class="nav-link"
               href="{{route('dashboard.articles')}}">Articles</a>
        @endif
    </li>
    @can('manage taxonomies')
        <li class="nav-item">
            <a class="nav-link"
               href="#">Tags & Categories</a>
        </li>
    @endcan
    @can('manage users')
        <li class="nav-item">
            <a class="nav-link"
               href="#">Users</a>
        </li>
    @endcan
    <li class="nav-item">
        <a class="nav-link"
           href="#">Settings</a>
    </li>
</ul>
