{{--TODO: Add profile image
https://blog.medhicham.com/en/blog-en/10-steps-to-get-you-on-image-profile-upload-for-laravel-5--}}
<x-layouts.dashboard-layout>
{{--    TODO: Move to navbar--}}
    {{--    Flash message --}}
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                    <a href="#"
                       class="close"
                       data-dismiss="alert"
                       aria-label="close">&times;</a>
                </p>
            @endif
        @endforeach
    </div>

    <x-dashboard-profile/>

    <section class="container">
        <div class="h2 font-weight-bold py-2 mb-3">Articles</div>

        @forelse($articles as $article)
            <x-dashboard-article :article="$article"/>
        @empty
            <x-error-post/>
        @endforelse

        <div class="d-flex justify-content-end">
            <a href="{{route('dashboard.articles')}}"
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