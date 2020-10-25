<x-layouts.dashboard-layout>
    <section class="container">
        <a href="{{route('dashboard.taxonomy')}}"
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

    <section class="container"
             style="max-width: 650px">
        <div class="h2 font-weight-bold my-3 mb-4">
            {{$name}}
        </div>

        @if(isset($category))
            {!! Form::model($category ?? '', [
                  'route' => ['dashboard.category.update', $category->slug],
                  'method' => 'patch',
            ]) !!}
        @else
            {!! Form::open([
                  'route' => ['dashboard.category.store']
                ])
            !!}
        @endif
        @csrf

        <div class="form-group my-3">
            {{ Form::label('name', 'Category Name') }}
            {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Category name']) }}
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="justify-content-end d-flex">
            {{ Form::submit($action, ['class' => 'btn primary-gradient mt-3']) }}
        </div>

        {!! Form::close() !!}
    </section>
</x-layouts.dashboard-layout>
