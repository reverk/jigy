<x-layouts.layout>
    <div class="container d-flex align-items-center justify-content-center"
         style="height: 80vh">
        <div class="border p-4 col-md-6 d-inline">
            <div class="pb-5 text-center">
                <h1>Forgot Password</h1>
            </div>
            {{--    form--}}
            <form method="POST" action="{{ route('password.email') }}">
                {{--        email--}}
                <div class="form-group mt-3">
                    <label for="email">Please enter your email:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                {{--            btn--}}
                <div class="container mt-5">
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="p-2 ml-2 btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{--<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
</x-layouts.layout>
