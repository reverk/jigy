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
    {{--    TODO: Refine UI here --}}
    {{--    Latest post --}}
    <x-title name="Latest Post"/>
    <div class="container py-3">
        <div class="row flex-lg-row flex-column">
            <a href="{{route('article', $latest->slug)}}" class="col-lg-7">
                <img src="{{$latest->thumbnail_image}}" alt="Latest post image" class="latest_image">
            </a>
            <div class="col-lg-4 d-flex">
                <section class="pl-3 align-self-center">
                    <div class="d-inline-flex py-2">
                        <a href="{{route('category', $latest->category->slug)}}"
                           class="text-decoration-none text-dark pr-3 align-self-center font-weight-bold"
                        >
                            {{$latest->category->name}}
                        </a>
                        <div class="vertical_line align-self-center"></div>
                        @foreach($latest->tags->toArray() as $tag)
                            <a href="{{route('tag', $tag['slug'])}}"
                               class="text-decoration-none text-dark px-2 align-self-center font-weight-light">
                                {{$tag['name']}}
                            </a>
                        @endforeach
                    </div>
                    <desc class="py-2">
                        <a href="{{route('article', $latest->slug)}}" class="text-decoration-none text-dark">
                            <h2 class="h2 font-weight-bold">{{$latest->title}}</h2>
                            <p>{{Str::limit($latest->excerpt, 100)}}</p>
                        </a>
                        <h6 class="font-weight-light h6 text-muted">
                            Posted by {{$latest->user->name}} at {{date('d-m-Y', strtotime($latest->user->created_at))}}
                        </h6>
                    </desc>
                </section>
            </div>
        </div>
    </div>

    @foreach ($articles as $article)

        {{--
            articles => [
                slug
                title
                thumbnail_image
                excerpt
                category:name
                category:slug
                tag => [
                    tag:name
                    tag:slug
                ]
            ]
        --}}
        {{--        <div class="container">--}}
        {{--            <a href="{{route('article', $article->slug)}}" class="h1">Post: {{ $article->title }}</a>--}}
        {{--            <img src="{{$article->thumbnail_image}}" alt="Title Image">--}}
        {{--            <p>Body: {{ $article->body }}</p>--}}
        {{--            <p>Category: <a href="{{route('category', $article->category->name)}}">{{$article->category->slug}}</a></p>--}}
        {{--            @foreach($article->tags->toArray() as $tag)--}}
        {{--                <p>Tags: <a href="{{route('tag', $tag['slug'])}}">{{ $tag['name'] }}</a></p>--}}
        {{--            @endforeach--}}
        {{--        </div>--}}
    @endforeach

    <div class="container">
        {{ $articles->links() }}
    </div>

    @auth
        <p class="container">You're logged in!</p>
    @endauth
</x-layouts.layout>

