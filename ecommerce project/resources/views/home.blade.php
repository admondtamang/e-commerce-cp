@extends('layouts.app')

@section('content')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <div class="img"><img class="d-block img-fluid" src="{{asset('images/banner01.jpg')}}" alt="First slide"></div>
      </div>
      <div class="carousel-item">
        <div class="img"><img class="d-block img-fluid" src="{{asset('images/banner02.jpg')}}" alt="Second slide"></div>
      </div>
      <div class="carousel-item">
        <div class="img"><img class="d-block img-fluid" src="{{asset('images/banner03.jpg')}}" alt="Third slide"></div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

<div class="slide" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
  <div><h3>1</h3></div>
  <div><h3>2</h3></div>
  <div><h3>3</h3></div>
  <div><h3>4</h3></div>
  <div><h3>5</h3></div>
  <div><h3>6</h3></div>
</div>
{{-- products --}}

<div class="col-sm-9">
  <div class="features_items"><!--features_items-->
      <h2 class="text-center m-5">Features Products</h2>
      <div class="row">
      @foreach($products as $product)
              <div class="col-sm-4">
              <div class="product-image-wrapper">
              <div class="single-products">
                  <div class="productinfo text-center">
                      <a href="{{url('/product-detail',$product->id)}}"><img src="{{url('uploads/products/',$product->image)}}" alt="" /></a>
                      <h2>$ {{$product->price}}</h2>
                      <p>{{$product->name}}</p>
                      <a href="{{url('/product-detail',$product->id)}}" class="btn btn-default add-to-cart">View Product</a>
                  </div>
              </div>
              <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                      <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                      <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                  </ul>
              </div>
          </div>
      </div>
      @endforeach
    </div>
  </div><!--features_items-->

</div>



@endsection
