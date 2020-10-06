<div class="d-flex align-content-center flex-lg-row flex-column py-2 my-2">
    <div class="dashboard-image">
        <img src="{{$article->thumbnail_image}}"
             alt="{{$article->thumbnail_image}}"
             class="mw-100 mh-100"
        >
    </div>
    <div class="d-flex align-self-center flex-column ml-0 ml-lg-5">
        <x-tag-attributes :article="$article"
                          paddings="p-1"/>
        <div class="d-flex align-items-lg-center flex-column flex-lg-row p-1">
            {{--            TODO: Add link to article --}}
            <div class="h2 font-weight-bold">{{Str::limit($article->title, 45)}}</div>
            <div class="dot mx-3 d-none d-lg-block"></div>
            <div class="d-inline-flex align-items-center mt-lg-0 mt-2">
                <a href="#"
                   class="text-dark small">Edit</a>
                <span class="vertical-line mx-2"></span>
                <a href="#"
                   class="text-dark small">Delete</a>
            </div>
        </div>
        @if (Request::routeIs('dashboard.articles.all'))
            <desc class="p-1 small">
                Posted by {{$article->user->name}}
                at {{date('d-m-Y', strtotime($article->user->created_at))}}
            </desc>
        @endif
    </div>
</div>
