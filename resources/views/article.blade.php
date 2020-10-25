<x-layouts.layout>
    <section class="container pt-5 mt-2 article-width">
        <h1 class="h1">{{$article->title}}</h1>

        <x-tag-attributes :article="$article" paddings="py-3 pt-4"/>

        <h6 class="font-weight-light h6 py-2 text-muted">
            By {{$article->user->name}} at {{date('d-m-Y', strtotime($article->user->created_at))}}
        </h6>
    </section>

    <section class="container-fluid px-0 pt-4 pb-5">
        <img src="{{$article->thumbnail_image}}"
             alt="Cover Image"
             class="article-cover-image">
    </section>

    <section class="container pb-5 article-width">
        {!! $article->body !!}
    </section>
</x-layouts.layout>
