<a class="nav-item nav-link d-inline-flex px-3 py-2 py-md-1 {{ Request::routeIs($routeTo) ? 'active' : '' }}"
   href="{{route($routeTo)}}">
    <i class="material-icons align-self-center">{{$iconName}}</i>
    <desc class="ml-1 align-self-center navbar-item-font">{{$name}}</desc>
</a>
