{{--TODO: Add profile image
https://blog.medhicham.com/en/blog-en/10-steps-to-get-you-on-image-profile-upload-for-laravel-5--}}
<x-layouts.dashboard-layout>

    <section class="container d-flex justify-content-between align-items-center flex-lg-row flex-column p-2 my-5">
        <div class="d-inline-flex align-items-center">
            <img src="{{auth()->user()->avatar}}"
                 alt="Profile image"
                 width=100px>
            <div class="d-inline-flex align-items-center ml-4">
                <span class="h2 font-weight-bold">{{auth()->user()->name}}</span>
                <div class="dot mx-3 d-none d-lg-block"></div>
                <span class="small text-muted d-none d-lg-block">Edit</span>
            </div>
        </div>
        <div class="d-inline-flex align-items-center m-lg-0 mt-5">
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

    <section class="container">
        <div class="h2 font-weight-bold py-2 mb-3">Articles</div>
        @forelse($articles as $article)
            <div class="d-flex align-content-center flex-lg-row flex-column py-2 my-3">
                <div class="dashboard-image">
                    <img src="{{$article->thumbnail_image}}"
                         alt="{{$article->thumbnail_image}}"
                         class="mw-100 mh-100"
                    >
                </div>
                <div class="d-flex align-self-center flex-column ml-0 ml-lg-5">
                    <x-tag-attributes :article="$article"
                                      paddings="p-1 mb-2 mt-0 mt-2"/>
                    <div class="d-flex align-items-lg-center flex-column flex-lg-row p-1">
                        <div class="h2 font-weight-bold">{{Str::limit($article->title, 45)}}</div>
                        <div class="dot mx-3 d-none d-lg-block"></div>
                        <div class="d-inline-flex align-items-center mt-lg-0 mt-2">
                            <a href="#"
                               class="text-dark small">Edit</a>
                            <span class="vertical-line mx-2"></span>
                            <a href="#"
                               class="text-dark small">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <x-error-post/>
        @endforelse

        <div class="d-flex justify-content-end">
            <a href="#"
               class="d-inline-flex my-lg-5 mt-3 py-1 text-dark">
                <span class="align-self-center">
                    View More
                </span>
                <span class="material-icons"
                      style="font-size: 32px">
                    keyboard_arrow_right
                </span>
            </a>
        </div>
    </section>
</x-layouts.dashboard-layout>
