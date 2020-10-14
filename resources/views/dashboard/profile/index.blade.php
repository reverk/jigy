<x-layouts.dashboard-layout>
    <div class="container"
         style="max-width: 850px">

        <header class=" my-5 h2 font-weight-bold">
            Settings
        </header>

        {!! Form::open([
              'route' => ['dashboard.profile.update', auth()->user()->id],
              'method' => 'patch'
            ])
        !!}
        <section class="mb-3">
            <header class="d-flex flex-column rounded-top border border-bottom-0 p-3 py-4">
                <h3 class="font-weight-bold">Your name</h3>
                <p class="my-2 mt-3">This is your name that will be displayed throughout {{env('APP_NAME', 'Laravel')}}.</p>
                {{Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => auth()->user()->name, 'style' => 'max-width: 300px;'])}}
                @error('name')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </header>
            <footer class="d-flex justify-content-between align-items-center rounded-bottom border p-2 px-3"
                 style="background: #F3F3F3;">
                <div>Please do not exceed 32 characters maximum.</div>
                {{ Form::submit('Save', ['class' => 'btn primary-gradient']) }}
            </footer>
        </section>
        {!! Form::close() !!}

        {!! Form::open([
              'route' => ['dashboard.profile.update', auth()->user()->id],
              'method' => 'patch'
            ])
        !!}
        <section class="mb-3">
            <header class="d-flex flex-column rounded-top border border-bottom-0 p-3 py-4">
                <h3 class="font-weight-bold">Your email</h3>
                <p class="my-2 mt-3">This is your address that will be used to login {{env('APP_NAME', 'Laravel')}}.</p>
                {{Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => auth()->user()->email, 'style' => 'max-width: 300px;'])}}
                @error('email')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </header>
            <footer class="d-flex justify-content-between align-items-center rounded-bottom border p-2 px-3"
                 style="background: #F3F3F3;">
                <div>We will email you to verify the change.</div>
                {{ Form::submit('Save', ['class' => 'btn primary-gradient']) }}
            </footer>
        </section>
        {!! Form::close() !!}

        {!! Form::open([
            'route' => ['dashboard.profile.update', auth()->user()->id],
            'method' => 'patch'
            ])
        !!}
        <section class="mb-3">
            <header class="d-flex flex-column rounded-top border border-bottom-0 p-3 py-4">
                <h3 class="font-weight-bold">Your password</h3>
                <p class="my-2 mt-3">This is your password that will be used to login {{env('APP_NAME', 'Laravel')}}.</p>
                {{Form::password('password', ['class' => 'form-control', 'placeholder' => '********', 'style' => 'max-width: 300px;'])}}
                {{Form::password('password_confirmation', ['class' => 'form-control mt-2', 'placeholder' => '********', 'style' => 'max-width: 300px;'])}}
                @error('password')
                <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </header>
            <footer class="d-flex justify-content-between align-items-center rounded-bottom border p-2 px-3"
                 style="background: #F3F3F3;">
                <div>Do not use passwords that are easy to guess.</div>
                {{ Form::submit('Save', ['class' => 'btn primary-gradient']) }}
            </footer>
        </section>
        {!! Form::close() !!}

        {!! Form::open([
              'route' => ['dashboard.profile.update', auth()->user()->id],
              'method' => 'patch',
              'files' => true
            ])
        !!}
        <section class="mb-3">
            <header class="d-flex justify-content-between align-items-center rounded-top border border-bottom-0 p-3 py-4">
                <div class="flex-column">
                    <h3 class="font-weight-bold">Your avatar</h3>
                    <p class="my-2 mt-3">This is your avatar. <br>Click on the button below to change to your own
                        liking.</p>
                    <div class="custom-file"
                         style="max-width: 300px;">
                        {{ Form::file('avatar', ['class' => 'custom-file-input', 'id' => 'customFile']) }}
                        <label class="custom-file-label"
                               for="customFile">Choose file</label>
                    </div>
                    @error('avatar')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <img src="{{asset(auth()->user()->avatar)}}"
                     alt="Avatar" width="96">
            </header>
            <footer class="d-flex justify-content-between align-items-center rounded-bottom border p-2 px-3"
                 style="background: #F3F3F3;">
                <div>An avatar is optional, but recommended.</div>
                {{ Form::submit('Save', ['class' => 'btn primary-gradient']) }}
            </footer>
        </section>
        {!! Form::close() !!}

        {!! Form::open([
              'route' => ['dashboard.profile.delete', auth()->user()->id],
              'method' => 'delete',
              'onsubmit' => 'return confirm(\'Are you sure you want to delete your account?\')',
            ])
        !!}
        <section class="mb-3">
            <header class="d-flex flex-column rounded-top border border-danger border-bottom-0 p-3 py-4">
                <h3 class="font-weight-bold">Delete your account</h3>
                <p class="mt-3 mb-0">This action will delete your account in {{env('APP_NAME', 'Laravel')}} including all your articles.</p>
            </header>
            <footer class="d-flex justify-content-end align-items-center rounded-bottom border border-danger p-2 px-3"
                 style="background: #F3F3F3;">
                {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            </footer>
        </section>
        {!! Form::close() !!}
    </div>
</x-layouts.dashboard-layout>
