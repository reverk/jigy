<div class="container py-3">
    <div class="row flex-lg-row flex-column justify-content-center">
        <a href="{{route('article', $article->slug)}}"
           class="col-lg-6 px-lg-2 p-0">
            <img src="{{$article->thumbnail_image}}"
                 alt="Result Post image"
                 class="latest-image">
        </a>
        <div class="col-lg-4 d-flex px-lg-2 p-0">
            <section class="pl-lg-4 pl-0 align-self-center">
                <x-tag-attributes :article="$article" paddings="py-3 pt-4"/>
                <desc class="py-2">
                    <a href="{{route('article', $article->slug)}}"
                       class="text-decoration-none text-dark">
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
