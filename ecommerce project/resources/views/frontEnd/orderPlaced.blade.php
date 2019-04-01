@extends('.layouts.app') 
@section('content')

<div class="container text-center my-5">
    <img src="{{asset('images/shopping.jpg')}}" alt="shopping" class="img-fluid">
    <div class="shop d-inline">
        <i>Your order has been placed.</i>
        <a href="/"><button class="btn btn-outline-primary d-inline">Return Home</button></a>

    </div>
</div>
@endsection