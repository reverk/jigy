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

{{--    Something to thinkof in the dashboard --}}
{{--    <ul class="nav nav-tabs">--}}
{{--        <li class="active"><a data-toggle="tab" href="#home">Home</a></li>--}}
{{--        <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>--}}
{{--        <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>--}}
{{--    </ul>--}}

{{--        <div class="tab-content">--}}
{{--            <div id="home" class="tab-pane fade in active">--}}
{{--                <h3>HOME</h3>--}}
{{--                <p>Some content.</p>--}}
{{--            </div>--}}
{{--            <div id="menu1" class="tab-pane fade">--}}
{{--                <h3>Menu 1</h3>--}}
{{--                <p>Some content in menu 1.</p>--}}
{{--            </div>--}}
{{--            <div id="menu2" class="tab-pane fade">--}}
{{--                <h3>Menu 2</h3>--}}
{{--                <p>Some content in menu 2.</p>--}}
{{--            </div>--}}
{{--        </div>--}}

<x-layouts.layout>
    {{--    TODO: Refine UI here --}}
    @isset($latest)
        <x-title name="Latest Article"/>
        <x-latest-article :article="$latest"/>
    @endisset

    <x-title name="Articles"/>
    <div class="container">
{{--        @canany(['manage articles', 'manage all articles'])--}}
{{--            <h1>I can edit articles!</h1>--}}
{{--        @endcanany--}}
{{--        @can('manage all articles')--}}
{{--            <h1>I can edit ALL articles!</h1>--}}
{{--        @endcan--}}
{{--        @can('manage users')--}}
{{--            <h1>I can manage users!</h1>--}}
{{--        @endcan--}}
        <div class="row">
            @forelse ($articles as $article)
                <div class="col-lg py-3">
                    <x-card :article="$article"/>
                </div>
                @if ($loop->iteration % 2 == 0)
                    <div class="w-100"></div>
                @endif
            @empty
                <x-error_post/>
            @endforelse
        </div>
    </div>


    <div class="container">
        {{ $articles->links() }}
    </div>

    @auth
        <p class="container">You're logged in!</p>
    @endauth
</x-layouts.layout>

