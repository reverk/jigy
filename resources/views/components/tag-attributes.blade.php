<div class="d-inline-flex {{$paddings}} flex-wrap">
    <a href="{{route('venue', $article->is_outside)}}"
       class="pr-2 py-2 text-dark font-weight-bold align-self-center text-dark">
        {{ $article->is_outside }}
    </a>
    @isset($article->category->name)
        <div class="mx-2 py-2">|</div>
        <a href="{{route('category', $article->category->slug)}}"
           class="text-dark px-2 py-2 align-self-center font-weight-bold"
        >
            {{$article->category->name}}
        </a>
        <div class="mx-2 py-2">|</div>
    @endisset
    @forelse($article->tags->toArray() as $tag)
        <a href="{{route('tag', $tag['slug'])}}"
           class="text-dark px-2 py-2 align-self-center font-weight-light">
            {{$tag['name']}}
        </a>
    @empty

    @endforelse
</div>
