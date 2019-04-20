@extends('layouts.app') 
@section('content')
<div class="container">
  @include('error')
  <h1 class="text-bold">My Wishlist</h1>
  @if($products->count()>0)
  <div class="container bg-light p-4 my-4">
    @foreach ($products as $product)
    <div class="row">
      <div class="col-xs-2 col-md-2 col-lg-2">
        <img class="mr-2" src="{{url('uploads/products/',$product->image)}}" alt="whishlist_image" class="image-fluid" style="width:100%">
      </div>
      <div class="col-xs-8 col-md-8 col-lg-7 text-muted">
        <h4>{{$product->name}}</h4>
        <p>{{$product->description}}</p>

        <b>Price:{{$product->price}}</b>
      </div>
      <div class="col-xs-2 col-md-2 col-lg-3 text-muted">
        Added {{$product->created_at}}<br>
        <div class="text-danger">
          <i class="fa fa-trash text-danger" aria-hidden="true"></i>
        </div>
      </div>
    </div>

    @endforeach

  </div>

  @else
  <p class="lead">
    You don't added any products to wishlist</p>
  @endif
</div>
@endsection