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
                <div class="dot mx-3"></div>
                <span class="small text-muted">Edit Profile</span>
            </div>
        </div>
        <div class="d-inline-flex align-items-center">
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
                    <a class="dropdown-item"
                       href="{{route('dashboard')}}">Dashboard</a>
                    <a class="dropdown-item"
                       href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="h2 font-weight-bold py-2 mb-3">Articles</div>
        @forelse($articles as $article)
            <p>Title:{{ $article->title}}</p>
        @empty
            <x-error-post/>
        @endforelse
    </section>
</x-layouts.dashboard-layout>
