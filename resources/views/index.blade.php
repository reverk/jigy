{{--            @if (Route::has('login'))--}}
{{--                <div class="top-right links">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/home') }}">Home</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}">Login</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}">Register</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}

<x-layouts.layout>
    <x-hero-card/>

    @isset($latest)
        <x-title name="Latest Article"/>
        <x-latest-article :article="$latest"/>
    @endisset

    <x-title name="Articles"/>
    <div class="container">
        <div class="row">
            @forelse($articles as $article)
                <div class="col-lg py-3">
                    <x-card :article="$article"/>
                </div>
                @if ($loop->iteration % 2 == 0)
                    <div class="w-100"></div>
                @endif
            @empty
                <x-error-post/>
            @endforelse

        </div>
    </div>


    <div class="container">
        {{ $articles->links() }}
    </div>
</x-layouts.layout>

