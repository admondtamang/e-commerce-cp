@extends('layouts.app') 
@section('content')

<div class="signin" id="customerSignin">
    <div class="container">
        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <h1 class="login-heading">Admin Login</h1>
            <p>
                <input id="email" type="email" class="inputBoxs form-control {{ $errors->has('email') ? 'text-danger' : '' }}" name="email"
                    placeholder="Email" value="{{ old('email') }}" required autofocus /> @if ($errors->has('email'))
                <span class="text-danger" role="alert">
                    <strong
                        >{{ $errors->first('email') }}</strong
                    >
                </span> @endif
            </p>


            <p>
                <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control inputBoxs{{ $errors->has('password') ? 'text-danger' : '' }}"
                    name="password" required /> @if ($errors->has('email'))
                <span class="text-danger" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span> @endif
            </p>

            <div class="form-group row mb-4">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-dark" name="submit">
                        {{ __("Login") }}
                    </button> @if (Route::has('password.request'))
                    <a class="btn" href="{{ route('password.request') }}">
                        {{ __("Forgot Your Password?") }}
                    </a> @endif
                </div>
            </div>



        </form>
    </div>
</div>
{{--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>                                @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required> @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection