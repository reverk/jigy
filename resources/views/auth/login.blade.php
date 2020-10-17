<x-layouts.layout>
    <div class="container d-flex align-items-center justify-content-center"
         style="height: 80vh">
        <div class="border mt-5 p-4 col-md-6 d-inline">
            <div class="pb-5 text-center">
                <h1>Login</h1>
            </div>
            {{--    form--}}
            <form>
                {{--        username--}}
                <div class="form-group mt-3">
                    <label for="username">Username or Email:</label>
                    <input type="username" class="form-control" id="username" placeholder="Enter username or email">
                </div>
                {{--            password--}}
                <div class="form-group">
                    <label for="pass">Password:</label>
                    <input type="pass" class="form-control" id="pass" placeholder="Enter Password">
                    <a href="{{route('password.email')}}"><small class="form-text text-muted">Forgot Password?</small></a>
                </div>
                {{--            btn--}}
                <div class="container mt-5">
                    <div class="d-flex flex-row-reverse">
                        <button type="submit" class="p-2 ml-2 btn btn-primary">Login</button>
                        <a class="btn btn-secondary p-2" href="#" role="button">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--  <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group ">
                            <label for="email"
                                   class="col-md-6 col-form-label text-left">{{ __('Username or email:') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email"
                                       class="form-control mb-4 @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password"
                                   class="col-md-4 col-form-label text-left">{{ __('Password') }}</label><br>

                            <div class="col-md-12">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                            @endif
                        </div>

                        <div class="form-group mb-10">
                            <div class="col-md-8 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>--}}

</x-layouts.layout>
