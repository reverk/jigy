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
            <div class="d-flex align-items-center py-2 my-2" style="max-height: 130px">
                <div style="max-width: 200px">
                    <img src="{{$article->thumbnail_image}}"
                         alt="{{$article->thumbnail_image}}"
                         class="mw-100 mh-100"
                    >
                </div>
                <div class="d-flex flex-column ml-5">
                    <x-tag-attributes :article="$article"/>
                    <div class="d-inline-flex align-items-center">
                        <span class="h2 font-weight-bold">{{Str::limit($article->title, 45)}}</span>
                        <span class="dot mx-3"></span>
                        <a href="#" class="text-dark small">Edit</a>
                        <span class="vertical-line mx-2"></span>
                        <a href="#" class="text-dark small">Delete</a>
                    </div>
                </div>
            </div>
        @empty
            <x-error-post/>
        @endforelse
    </section>
</x-layouts.dashboard-layout>
