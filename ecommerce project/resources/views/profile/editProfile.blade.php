@extends('layouts.app') 
@section('content')
<div class="row profile">
    <aside class="col-lg-4">
        <ul>
            <li>
                <h6 class="active">Mangage Account</h6>
                <ul>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Shipping Address</a></li>
                    <li><a href="#">Payment Option</a></li>
                </ul>
            </li>
            <li>Your orders</li>
            <h6 href="#">Order list</h6>
            <ul>
                <li><a href="#">Order List</a></li>
                <li><a href="#">Order Arrived</a></li>
                <li><a href="#">Order Cancel</a></li>
            </ul>

            <li>
                <h6>Reviews</h6>
            </li>
            <li>
                <h6>My wishlist</h6>
            </li>
        </ul>
    </aside>
    <article class="col-lg-8">
        <div class="container">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{{ session()->get('success') }}}
            </div>
            @endif @if($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                    <li> {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Edit Profile') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{!! url('/profile.',$user->id) !!}">
                                @csrf {!! method_field('put') !!} {{-- Name --}}
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}"
                                            required autofocus> @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span> @endif
                                    </div>
                                </div>

                                {{-- Email --}}
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}"
                                            required> @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span> @endif
                                    </div>
                                </div>

                                {{-- Gender --}}
                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                    <div class="col-md-6">
                                        <input id="gender" type="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ $user->gender }}"
                                            required> @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span> @endif
                                    </div>
                                </div>

                                {{-- Phone --}}
                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $user->phone }}"
                                            required> @if ($errors->has('phone'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span> @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                            required> @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span> @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
@endsection