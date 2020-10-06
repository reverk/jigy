<x-layouts.dashboard-layout>
    <section class="container">
        <a href="{{url()->previous()}}"
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
            Create an Article
        </div>

        {!! Form::open([
              'files' => true,
              'url' => route('dashboard.articles.store')
            ])
        !!}
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
            {{ Form::textarea('body', old('body'), ['rows' => 1]) }}
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
            @foreach($tags as $tag)
                {{ Form::checkbox('tags[]', $tag->name) }}
                {{ Form::label($tag->slug, $tag->name) }}
            @endforeach
            @error('tags')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {{ Form::label('thumbnail', 'Thumbnail Image') }}
            {{ Form::file('image') }}
            @error('thumbnail')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{ Form::submit('Create Article') }}


        {!! Form::close() !!}
    </section>
</x-layouts.dashboard-layout>

