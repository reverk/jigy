<div class="container py-3">
    <div class="row flex-lg-row flex-column justify-content-center">
        <a href="{{route('article', $article->slug)}}" class="col-lg-7">
            <img src="{{$article->thumbnail_image}}" alt="Latest post image" class="latest-image">
        </a>
        <div class="col-lg-5 d-flex">
            <section class="pl-lg-3 pl-0 align-self-center">
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
                <desc class="py-2">
                    <a href="{{route('article', $article->slug)}}" class="text-decoration-none text-dark">
                        <h2 class="h2 font-weight-bold">{{$article->title}}</h2>
                        <p>{{Str::limit($article->excerpt, 100)}}</p>
                    </a>
                    <h6 class="font-weight-light h6 text-muted">
                        By {{$article->user->name}} at {{date('d-m-Y', strtotime($article->user->created_at))}}
                    </h6>
                </desc>
            </section>
        </div>
    </div>
</div>
