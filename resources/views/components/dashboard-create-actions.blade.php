<div class="d-inline-flex align-items-center {{$margins}}">
    <a href="{{route('dashboard.articles.create')}}"
       class="btn primary-gradient">Create Article</a>
    <div class="dropdown">
        <i class="material-icons btn"
           role="button"
           type="button"
           data-toggle="dropdown">
            keyboard_arrow_down
        </i>
        <div class="dropdown-menu dropdown-menu-right"
             aria-labelledby="dropdownMenuButton">
            {{--                TODO: Add tag, category & settings link--}}
            @can('manage taxonomies')
                <a class="dropdown-item"
                   href="{{route('dashboard')}}">Create tag</a>
                <a class="dropdown-item"
                   href="{{route('dashboard')}}">Create category</a>
                <div class="dropdown-divider"></div>
            @endcan
            <a class="dropdown-item"
               href="#">Settings</a>
            <div class="dropdown-divider"></div>
            <form action="{{route('logout')}}"
                  method="post"
            >
                @csrf
                <button type="submit"
                        class="dropdown-item">
                    <desc class="text-danger">Logout</desc>
                </button>
            </form>
        </div>
    </div>
</div>
