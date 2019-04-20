@extends('.layouts.app') 
@section('content')
<form action="{{route('checkout.store')}}" method="POST">
    <div class="row">
        <div class="col-xs-6 col-md-6">
            <div class="container p-5">
                <h3 class="pb-3">Shipping Address</h3>
                @csrf
                <div class="form-group {{$errors->has('name')?'has-error':''}}">
                    <input type="text" class="form-control" name="name" id="name" value="" placeholder="User Name">
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
                    <input type="number" class="form-control" name="postal_code" value="" id="postal_code" placeholder="Postal Code">
                    <span class="text-danger">{{$errors->first('postal_code')}}</span>
                </div>
                <div class="form-group {{$errors->has('phone')?'has-error':''}}">
                    <input type="text" class="form-control" name="phone" value="" id="phone" placeholder="Phone">
                    <span class="text-danger">{{$errors->first('phone')}}</span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-6">
            <div class="container p-5">
                <h3 class="pb-3">Payment Option</h3>
                <img src="{{url('images/cod.jpg')}}" alt="cod" width="200"> <br>{{--
                <div class="form-group {{$errors->has('Card number')?'has-error':''}}">
                    <input type="text" class="form-control" name="card_number" value="" id="Card number" placeholder="Card number">
                    <span class="text-danger">{{$errors->first('Card number')}}</span>
                </div>
                <div class="form-group {{$errors->has('date')?'has-error':''}}">
                    <input type="date" class="form-control" name="expire_date" value="" id="date" placeholder="date">
                    <span class="text-danger">{{$errors->first('date')}}</span>
                </div> --}}

                <input type="submit" class="btn btn-primary mt-2">

            </div>
        </div>

    </div>

</form>
@endsection