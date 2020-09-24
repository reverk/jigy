<div class="d-inline-flex py-3 pt-4">
    <a href="{{route('venue', isOutside($article->is_outside))}}"
       class="pr-2 text-dark font-weight-bold align-self-center text-decoration-none text-dark">
        {{ isOutside($article->is_outside) }}
    </a>
    <div class="vertical-line align-self-center mx-2"></div>
    <a href="{{route('category', $article->category->slug)}}"
       class="text-decoration-none text-dark px-2 align-self-center font-weight-bold"
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
