<x-layouts.layout>
    <h1 class="container">Tags related to: {{$name}}</h1>
    @foreach ($articles as $article)
        <div class="container">
            <a href="{{route('article', $article->slug)}}" class="h1">Post: {{ $article->title }}</a>
            <img src="{{$article->thumbnail_image}}" alt="Title Image">
            <p>Body: {{ $article->body }}</p>
            <p>Category: <a href="{{route('category', $article->category->name)}}">{{$article->category->slug}}</a></p>
            @foreach($article->tags->toArray() as $tag)
                <p>Tags: <a href="{{route('tag', $tag['slug'])}}">{{ $tag['name'] }}</a></p>
            @endforeach
        </div>
    @endforeach
</x-layouts.layout>
