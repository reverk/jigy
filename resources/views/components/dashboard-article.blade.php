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
            <a href="{{route('article', $article->slug)}}"
               class="h2 font-weight-bold text-dark">
                {{Str::limit($article->title, 45)}}
            </a>
            <div class="dot mx-3 d-none d-lg-block"></div>
            <div class="d-inline-flex align-items-center mt-lg-0 mt-2">
                <a href="{{route('dashboard.articles.edit', $article->slug)}}"
                   class="text-dark small">Edit</a>
                <span class="vertical-line mx-2"></span>
                {!! Form::open(['route' => ['dashboard.articles.delete', $article->slug], 'method' => 'delete', 'onsubmit' => 'return confirm(\'Are you sure you want to delete this?\')']) !!}
                    @csrf
                    {{ Form::submit('Delete', ['class' => 'btn btn-link text-dark small']) }}
                {!! Form::close() !!}
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
