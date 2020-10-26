<x-layouts.dashboard-layout>
    <div class="container">
        <x-dashboard-header :name="$name"/>

        <div class="row flex-column flex-lg-row mt-3">
            <div class="col">
                <div class="h4 mb-3">Tags</div>
                <div class="list-group-flush list-group-overflow mt-3">
                    @forelse($tags as $tag)
                        <div class="list-group-item d-flex justify-content-between">
                            <div>
                                {{$tag->name}}
                            </div>
                            {!! Form::open(['route' => ['dashboard.tag.delete', $tag->slug], 'method' => 'delete', 'onsubmit' => 'return confirm(\'Are you sure you want to delete this?\')']) !!}
                            <div class="btn-group"
                                 data-toggle="buttons">
                                <a href="{{route('dashboard.tag.edit', $tag->slug)}}"
                                   class="btn btn-outline-info btn-sm">
                                    <span> Edit </span>
                                </a>
                                @csrf
                                {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) }}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
            <div class="col">
                <div class="h4 mb-3">Categories</div>
                <div class="list-group-flush list-group-overflow mt-3">
                    @forelse($categories as $category)
                        <div class="list-group-item d-flex justify-content-between">
                            <div>
                                {{$category->name}}
                            </div>
                            {!! Form::open(['route' => ['dashboard.category.delete', $category->slug], 'method' => 'delete', 'onsubmit' => 'return confirm(\'Are you sure you want to delete this?\')']) !!}
                            <div class="btn-group"
                                 data-toggle="buttons">
                                <a href="{{route('dashboard.category.edit', $category->slug)}}"
                                   class="btn btn-outline-info btn-sm">
                                    <span> Edit </span>
                                </a>
                                @csrf
                                {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) }}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts.dashboard-layout>
