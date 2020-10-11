<x-layouts.dashboard-layout>
    <section class="container">
        <a href="{{route('dashboard.articles')}}"
           class="d-inline-flex my-lg-4 mt-3 py-1 text-dark">
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
        <div class="h2 font-weight-bold my-3 mb-4">
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

        <div class="form-row my-1">
            <div class="col">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => 'Ex. Activity Name']) }}
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-4">
                {{ Form::label('thumbnail', 'Thumbnail Image') }}
                <div class="custom-file">
                    {{ Form::file('thumbnail', ['class' => 'custom-file-input', 'id' => 'customFile']) }}
                    <label class="custom-file-label"
                           for="customFile">Choose file</label>
                </div>
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
        </div>

        <div class="form-group my-3">
            {{ Form::label('excerpt', 'Excerpt') }}
            {{ Form::text('excerpt', old('excerpt'), ['class' => 'form-control', 'placeholder' => 'Ex. summary of the topic']) }}
            @error('excerpt')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group my-3">
            {{ Form::label('body', 'Body') }}
            {{ Form::textarea('body', old('body'), ['class' => 'body form-control']) }}
            @error('body')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-row my-3">
            <div class="col">
                {{ Form::label('category', 'Category') }}
                {{ Form::select('category', $categories, null, ['class' => 'custom-select'])}}
                @error('category')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                {{ Form::label('qOutside', 'Event held outside?') }}
                <br>
                <div class="form-check form-check-inline">
                    {{ Form::radio('isOutside', 'Outside', isset($article->is_outside) ? $article->is_outside : '', ['class' => 'form-check-input']) }}
                    {{ Form::label('Outside', 'Yes', ['class' => 'form-check-label']) }}
                </div>
                <div class="form-check form-check-inline">
                    {{ Form::radio('isOutside', 'Inside', isset($article->is_outside) ? !$article->is_outside : true, ['class' => 'form-check-input']) }}
                    {{ Form::label('inside', 'No', ['class' => 'form-check-label']) }}
                </div>
            </div>
        </div>

        <div class="form-group my-3">
            {{ Form::label('tags', 'Tags') }}
            <br>
            @forelse($tags as $tag)
                <div class="form-check form-check-inline">
                    {{ Form::checkbox('tags[]', $tag->id, old('tags'), ['class' => 'form-check-input']) }}
                    {{ Form::label($tag->slug, $tag->name, ['class' => 'form-check-label']) }}
                </div>
            @empty

            @endforelse
            @error('tags')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{ Form::submit($action, ['class' => 'btn primary-gradient mt-3']) }}

        {!! Form::close() !!}
    </section>
</x-layouts.dashboard-layout>

