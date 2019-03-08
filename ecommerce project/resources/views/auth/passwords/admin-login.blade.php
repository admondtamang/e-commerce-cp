@extends('layouts.app') @section('content')

<div class="signin" id="customerSignin">
    <div class="container">
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <h1 class="login-heading">Admin Login</h1>
            <p>
                <input
                    id="email"
                    type="email"
                    placeholder="{{ __('E-Mail Address') }}"
                    class="form-control inputBoxs{{ $errors->has('email') ? ' is-invalid' : '' }}"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                />
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
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

            <div class="form-group row mb-0">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-dark">
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

@endsection
