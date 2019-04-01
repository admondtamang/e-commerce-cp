@extends('.layouts.app') 
@section('content')
<h1>Shipping Address</h1>
<form action="">
    @csrf {{-- Name --}}
    <div class="form-group {{$errors->has('name')?'has-error':''}}">
        <input type="text" class="form-control" name="name" id="name" value="" placeholder="Shipping Name">
        <span class="text-danger">{{$errors->first('name')}}</span>
    </div>
    <div class="form-group {{$errors->has('address')?'has-error':''}}">
        <input type="text" class="form-control" value="" name="address" id="address" placeholder="Shipping Address">
        <span class="text-danger">{{$errors->first('address')}}</span>
    </div>
    <div class="form-group {{$errors->has('email')?'has-error':''}}">
        <input type="email" class="form-control" name="email" value="" id="email" placeholder="Shipping City">
        <span class="text-danger">{{$errors->first('email')}}</span>
    </div>
    <div class="form-group {{$errors->has('postal_code')?'has-error':''}}">
        <input type="text" class="form-control" name="postal_code" value="" id="postal_code" placeholder="Shipping State">
        <span class="text-danger">{{$errors->first('postal_code')}}</span>
    </div>
    <div class="form-group {{$errors->has('phone')?'has-error':''}}">
        <input type="text" class="form-control" name="phone" value="" id="phone" placeholder="Shipping State">
        <span class="text-danger">{{$errors->first('phone')}}</span>
    </div>
    <input type="button" value="submit" class="btn btn-primary">
</form>
@endsection