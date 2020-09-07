<x-layouts.layout>
    <div class="container">
        <a href="{{route('article', $article->slug)}}" class="h1">Post: {{ $article->title }}</a>
        <img src="{{$article->thumbnail_image}}" alt="Title Image">
        <p>Body: {{ $article->body }}</p>
        <p>Category: <a href="{{route('category', $article->category->name)}}">{{$article->category->slug}}</a></p>
        @foreach($article->tags->pluck('slug') as $tag)
            <p>Tags: <a href="{{route('tag', $tag)}}">{{ $tag }}</a></p>
        @endforeach
    </div>
</x-layouts.layout>
