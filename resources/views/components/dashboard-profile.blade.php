<section class="container d-flex justify-content-between align-items-center flex-lg-row flex-column p-2 my-5">
    <div class="d-inline-flex align-items-center">
        <img src="{{auth()->user()->avatar}}"
             alt="Profile image"
             width=100px>
        <div class="d-inline-flex align-items-center ml-4">
            <span class="h2 font-weight-bold">{{auth()->user()->name}}</span>
            <div class="dot mx-3 d-none d-lg-block"></div>
{{--            TODO: Add edit link--}}
            <a href="#" class="small text-muted d-none d-lg-block text-dark">Edit</a>
        </div>
    </div>
    <div class="d-inline-flex align-items-center m-lg-0 mt-5">
{{--        TODO: Add Create article link --}}
        <a href="#"
           class="btn">Create Article</a>
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
</section>
