<div class="card border-0 rounded-0">
    <img src="{{$article->thumbnail_image}}" class="card-img-top rounded-0" alt="Title Image">


    <div class="card-body p-0 pb-3">
        <div class="d-inline-flex py-3">
            <a href="{{route('category', $article->category->slug)}}"
               class="text-decoration-none text-dark pr-2 align-self-center font-weight-bold"
            >
                {{$article->category->name}}
            </a>
            <div class="vertical_line align-self-center mx-2"></div>
            @foreach($article->tags->toArray() as $tag)
                <a href="{{route('tag', $tag['slug'])}}"
                   class="text-decoration-none text-dark px-2 align-self-center font-weight-light">
                    {{$tag['name']}}
                </a>
            @endforeach
        </div>

        <h4 class="card-title font-weight-bold py-2">
            <a href="{{route('article', $article->slug)}}"
               class="text-decoration-none text-dark">{{$article->title}}</a>
        </h4>
        <p class="card-text">{{Str::limit($article->excerpt, 100)}}</p>

        <h6 class="font-weight-light h6 text-muted">
            By {{$article->user->name}} at {{date('d-m-Y', strtotime($article->user->created_at))}}
        </h6>
    </div>

</div>
