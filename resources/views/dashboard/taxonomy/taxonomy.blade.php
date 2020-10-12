<x-layouts.dashboard-layout>
    <div class="container">
        <x-dashboard-header :name="$name"/>

        <div class="row flex-column flex-lg-row mt-3">
            <div class="col">
                <div class="h4">Tags</div>
                <div class="list-group mt-3">
                    @forelse($tags as $tag)
                        <div class="list-group-item list-group-item-action d-flex justify-content-between">
                            <div>
                                {{$tag->name}}
                            </div>
                            <div class="btn-group"
                                 data-toggle="buttons">
                                <a href="{{route('dashboard.tag.edit', $tag->slug)}}"
                                   class="btn btn-outline-info btn-sm">
                                    <span> Edit </span>
                                </a>
                                {!! Form::open(['route' => ['dashboard.tag.delete', $tag->slug], 'method' => 'delete', 'onsubmit' => 'return confirm(\'Are you sure you want to delete this?\')']) !!}
                                @csrf
                                {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm rounded-right', 'style' => 'border-radius: 0;']) }}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="col">
                <div class="h4">Categories</div>
                <div class="list-group mt-3">
                    @forelse($categories as $category)
                        <div class="list-group-item list-group-item-action d-flex justify-content-between">
                            <div>
                                {{$category->name}}
                            </div>
                            <div class="btn-group"
                                 data-toggle="buttons">
                                <a href="{{route('dashboard.category.edit', $category->slug)}}"
                                   class="btn btn-outline-info btn-sm">
                                    <span> Edit </span>
                                </a>
                                {!! Form::open(['route' => ['dashboard.category.delete', $category->slug], 'method' => 'delete', 'onsubmit' => 'return confirm(\'Are you sure you want to delete this?\')']) !!}
                                @csrf
                                {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm rounded-right', 'style' => 'border-radius: 0;']) }}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard-layout>
