<x-layouts.dashboard-layout>
    <div class="container">
        <section class="d-flex justify-content-between p-2 my-5">
            <div class="h2 font-weight-bold">Users</div>
            <div>
                <a href="{{route('dashboard.users.create')}}"
                   class="btn primary-gradient">Create user</a>
            </div>
        </section>

        <section class="list-group list-group-flush">
            @forelse($users as $user)
                <div class="d-flex flex-row align-items-center p-2 py-3 list-group-item list-group-item-action">
                    <header class="image rounded-circle d-flex align-items-center"
                            style="width: 96px; min-width: 32px;">
                        <img src="{{$user->avatar}}"
                             alt="{{$user->name}}"
                             class="mw-100 mh-100 rounded-circle">
                    </header>
                    <desc class="d-flex flex-column ml-4">
                        <div class="h2 font-weight-bold mb-2">{{$user->name}}</div>
                        <div class="">Role: {{$user->getRoleNames()->first() ?? 'None'}}</div>
                    </desc>
                    <footer class="ml-auto">
                        <div class="btn-group"
                             data-toggle="buttons">
                            <a href="{{route('dashboard.users.edit', $user->id)}}"
                               class="btn btn-outline-info btn-sm">
                                <span> View/Edit </span>
                            </a>
                            {!! Form::open(['route' => ['dashboard.users.delete', $user->id], 'method' => 'delete', 'onsubmit' => 'return confirm(\'Are you sure you want to delete this?\')']) !!}
                            @csrf
                            @if($user->id == auth()->user()->id)
                                {{ Form::submit('Delete', [
                                                            'class' => 'btn btn-outline-secondary btn-sm rounded-right disabled',
                                                            'style' => 'border-radius: 0;',
                                                            'data-toggle'=>'tooltip',
                                                            'data-placement'=>"top",
                                                            'title'=>'To delete your own account, go to settings.'
                                                          ])
                                }}
                            @else
                                {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm rounded-right', 'style' => 'border-radius: 0;']) }}
                            @endif
                            {!! Form::close() !!}
                        </div>
                    </footer>
                </div>
            @empty
            @endforelse
        </section>
    </div>
</x-layouts.dashboard-layout>
