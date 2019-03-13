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
                    class="inputBoxs form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                    name="email"
                    placeholder="Email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                />

                @if ($errors->has('email'))
                <span class="text-danger" role="alert">
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
                    class="form-control inputBoxs{{ $errors->has('password') ? 'text-danger' : '' }}"
                    name="password"
                    required
                />
                    @if ($errors->has('email'))
                    <span class="text-danger" role="alert">
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

@endsection
