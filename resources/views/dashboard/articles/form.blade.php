<x-layouts.dashboard-layout>
    <section class="container">
        <a href="{{route('dashboard.articles')}}"
           class="d-inline-flex my-lg-5 mt-3 py-1 text-dark">
            <span class="material-icons"
                  style="font-size: 32px">
                keyboard_arrow_left
            </span>
            <span class="align-self-center">
                Go back
            </span>
        </a>
    </section>

    <section class="container">
        <div class="h2 font-weight-bold">
            {{$name}}
        </div>

        @if(isset($article))
            {!! Form::model($article, [
                  'route' => ['dashboard.articles.update', $article->slug],
                  'method' => 'patch',
                  'files' => true
            ]) !!}
        @else
            {!! Form::open([
                  'files' => true,
                  'route' => ['dashboard.articles.store']
                ])
            !!}
        @endif
        @csrf

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', old('title')) }}
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::label('excerpt', 'Excerpt') }}
            {{ Form::text('excerpt', old('excerpt')) }}
            @error('excerpt')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::label('body', 'Body') }}
            {{ Form::textarea('body', old('body'), ['class' => 'body']) }}
            @error('body')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::label('category', 'Category') }}
            {{ Form::select('category', $categories)}}
            @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::label('tags', 'Tags') }}
            @forelse($tags as $tag)
                {{ Form::checkbox('tags[]', $tag->id, old('tags')) }}
                {{ Form::label($tag->slug, $tag->name) }}
            @empty

            @endforelse
            @error('tags')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::label('qOutside', 'Event held outside?') }}

            {{ Form::radio('isOutside', 'Outside', isset($article->is_outside) ? $article->is_outside : '') }}
            {{ Form::label('Outside', 'Yes') }}

            {{ Form::radio('isOutside', 'Inside', isset($article->is_outside) ? !$article->is_outside : true) }}
            {{ Form::label('inside', 'No') }}
        </div>

        <div class="form-group">
            {{ Form::label('thumbnail', 'Thumbnail Image') }}
            {{ Form::file('thumbnail') }}
            @isset($article->thumbnail_image)
                <img src="{{$article->thumbnail_image}}"
                     alt="{{$article->thumbnail_image}}"
                     class="40"
                >
            @endisset
            @error('thumbnail')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{ Form::submit($action) }}


        {!! Form::close() !!}
    </section>
</x-layouts.dashboard-layout>

