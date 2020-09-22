<x-layouts.layout>
    <section class="container pt-5 mt-2 article-width">
        <h1 class="h1">{{$article->title}}</h1>

        <div class="d-inline-flex py-3">
            <a href="{{route('category', $article->category->slug)}}"
               class="text-decoration-none text-dark pr-2 align-self-center font-weight-bold"
            >
                {{$article->category->name}}
            </a>
            <div class="vertical-line align-self-center mx-2"></div>
            @foreach($article->tags->toArray() as $tag)
                <a href="{{route('tag', $tag['slug'])}}"
                   class="text-decoration-none text-dark px-2 align-self-center font-weight-light">
                    {{$tag['name']}}
                </a>
            @endforeach
        </div>

        <h6 class="font-weight-light h6 py-2 text-muted">
            By {{$article->user->name}} at {{date('d-m-Y', strtotime($article->user->created_at))}}
        </h6>
    </section>

    <section class="container-fluid px-0 pt-4 pb-5">
        <img src="{{$article->thumbnail_image}}" alt="Cover Image" class="article-cover-image">
    </section>

    <section class="container pb-5 article-width">
        {!! $article->body !!}
    </section>
</x-layouts.layout>
