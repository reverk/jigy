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
    <x-title name="Latest Article"/>
    <x-latest-article :article="$latest"/>

    <x-title name="Articles"/>

    @foreach ($articles as $article)
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

