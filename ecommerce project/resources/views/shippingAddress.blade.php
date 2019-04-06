@extends('.layouts.app') 
@section('content')
<div class="container">
    @if (count($errors) > 0)
    <div class="alert alert-danger container-fluid">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif @if(Session::has('message'))
    <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        {{Session::get('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif
</div>
<div class="container">
    <h2 class="mb-4">Shipping Address</h2>
    <form action="{{route('submit.shipping')}}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
        <div class="form-group {{$errors->has('name')?'has-error':''}}">
            <input type="text" class="form-control" name="name" id="name" value="" placeholder="Shipping Name">
            <span class="text-danger">{{$errors->first('name')}}</span>
        </div>
        <div class="form-group {{$errors->has('address')?'has-error':''}}">
            <input type="text" class="form-control" value="" name="address" id="address" placeholder="Shipping Address">
            <span class="text-danger">{{$errors->first('address')}}</span>
        </div>
        <div class="form-group {{$errors->has('email')?'has-error':''}}">
            <input type="email" class="form-control" name="email" value="" id="email" placeholder="Email">
            <span class="text-danger">{{$errors->first('email')}}</span>
        </div>
        <div class="form-group {{$errors->has('postal_code')?'has-error':''}}">
            <input type="text" class="form-control" name="postal_code" value="" id="postal_code" placeholder="Postal code">
            <span class="text-danger">{{$errors->first('postal_code')}}</span>
        </div>
        <div class="form-group {{$errors->has('phone')?'has-error':''}}">
            <input type="text" class="form-control" name="phone" value="" id="phone" placeholder="Phone">
            <span class="text-danger">{{$errors->first('phone')}}</span>
        </div>
        <button type="submit" value="submit" class="btn btn-dark">Submit</button>
    </form>
</div>
@endsection