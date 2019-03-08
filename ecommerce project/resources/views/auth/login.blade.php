@extends('layouts.app') 
@section('content')

<div class="signin" id="customerSignin">
    <div class="container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1 class="login-heading">Login</h1>
            <p>
                    <input
                    id="email"
                    type="email"
                    class="inputBoxs form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                />

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong
                        >{{ $errors->first('email') }}</strong
                    >
                </span>
                @endif
            </p>


            <p>
                <input
                    id="password"
                    type="password"
                    placeholder="{{ __('Password') }}"
                    class="form-control inputBoxs{{ $errors->has('password') ? ' is-invalid' : '' }}"
                    name="password"
                    required
                />
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
            </p>

            <div class="form-group row mb-4">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-dark" name="submit">
                        {{ __("Login") }}
                    </button> 

                    @if (Route::has('password.request'))
                    <a
                        class="btn"
                        href="{{ route('password.request') }}"
                    >
                        {{ __("Forgot Your Password?") }}
                    </a>
                    @endif
                </div>
            </div>


            
        </form>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Login") }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input
                                    id="email"
                                    type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    autofocus
                                />

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong
                                        >{{ $errors->first('email') }}</strong
                                    >
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label
                                for="password"
                                class="col-md-4 col-form-label text-md-right"
                                >{{ __("Password") }}</label
                            >

                            <div class="col-md-6">
                                <input
                                    id="password"
                                    type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password"
                                    required
                                />

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong
                                        >{{ $errors->first('password') }}</strong
                                    >
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input"
                                    type="checkbox" name="remember"
                                    id="remember"
                                    {{ old("remember") ? "checked" : "" }}>

                                    <label
                                        class="form-check-label"
                                        for="remember"
                                    >
                                        {{ __("Remember Me") }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __("Login") }}
                                </button>

                                @if (Route::has('password.request'))
                                <a
                                    class="btn btn-link"
                                    href="{{ route('password.request') }}"
                                >
                                    {{ __("Forgot Your Password?") }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
