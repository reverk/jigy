<x-layouts.layout>
    <section class="container mt-5 article-width">
        <div class="article-cover-image d-flex justify-content-center my-3">
            <img src="{{$article->thumbnail_image}}"
                 alt="Cover Image"
                 class="mw-100 mh-100">
        </div>

        <h1 class="h1">{{$article->title}}</h1>

        <h6 class="font-weight-light h6 py-2 text-muted">
            <x-tag-attributes :article="$article"
                              paddings="py-4"/>
            <div>
                By {{$article->user->name}} at {{date('d-m-Y', strtotime($article->user->created_at))}}
            </div>
        </h6>

        <section class="mt-5 article-body">
            {!! $article->body !!}
        </section>
    </section>
</x-layouts.layout>
