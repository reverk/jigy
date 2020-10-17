<div class="flash-message">
    {{--    Password reset --}}
    @if (session('status'))
        <p class="alert alert-success">{{ session('status') }}
            <a href="#"
               class="close"
               data-dismiss="alert"
               aria-label="close">&times;</a>
        </p>
    @endif

    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                <a href="#"
                   class="close"
                   data-dismiss="alert"
                   aria-label="close">&times;</a>
            </p>
        @endif
    @endforeach
</div>
