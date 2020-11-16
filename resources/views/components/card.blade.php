<div class="card border-0 rounded-0">
    <img src="{{$article->thumbnail_image}}"
         class="card-img-top rounded-0"
         alt="Title Image">


    <div class="card-body p-0 pb-3">

        <x-tag-attributes :article="$article" paddings="py-3 pt-4"/>

        <h4 class="card-title font-weight-bold py-2">
            <a href="{{route('article', $article->slug)}}"
               class="text-decoration-none text-dark">{{$article->title}}</a>
        </h4>
        <p class="card-text">{{Str::limit($article->excerpt, 100)}}</p>

        <h6 class="font-weight-light h6 text-muted">
            By {{$article->user->name}} at {{date('d-m-Y', strtotime($article->created_at))}}
        </h6>
    </div>

</div>
