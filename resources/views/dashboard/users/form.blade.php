<x-layouts.dashboard-layout>
    <section class="container">
        <a href="{{route('dashboard.users')}}"
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

        @if(isset($user))
            {!! Form::model($user, [
                  'route' => ['dashboard.users.update', $user->id],
                  'method' => 'patch',
                  'files' => true
            ]) !!}
        @else
            {!! Form::open([
                  'files' => true,
                  'route' => ['dashboard.users.store']
                ])
            !!}
        @endif
        @csrf

        <div class="form-row my-3">
            <div class="col">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) }}
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => 'johndoe@example.com']) }}
                <small class="form-text text-muted" >Users may need to verify their emails.</small>
            </div>
            <div class="col-2">
                {{ Form::label('role', 'Role') }}
                {{ Form::select('role', $role, null, ['class' => 'custom-select']) }}
                @error('role')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row my-3">
            <div class="col">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => '******']) }}
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                {{ Form::label('password_confirmation', 'Confirm Password') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => '******']) }}
            </div>
        </div>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="form-row my-3">
            <div class="col">
                {{ Form::label('avatar', 'Avatar') }}
                <div class="custom-file">
                    {{ Form::file('avatar', ['class' => 'custom-file-input', 'id' => 'customFile']) }}
                    <label class="custom-file-label align-items-center d-flex"
                           for="customFile">
                        @if(isset($user))
                            <img src="{{$user->avatar}}"
                                 alt="{{$user->name}}"
                                 class="mw-100 mh-100 mr-2">
                        @endif
                        Choose file
                    </label>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            {{ Form::submit($action, ['class' => 'btn primary-gradient mt-3']) }}
        </div>
        {!! Form::close() !!}
    </section>
</x-layouts.dashboard-layout>
