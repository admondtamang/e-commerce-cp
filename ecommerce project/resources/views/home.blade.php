@extends('layouts.app') 
@section('content')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <div class="myImg"><img class="d-block img-fluid" style="background:cover;" src="{{asset('images/banner01.jpg')}}" alt="Second slide"></div>
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
{{-- products --}}

<div class="features_items">
  <!--features_items-->
  <h2 class="text-center m-5 title">All Products</h2>
  <div class="row">
    @foreach($products as $product)

    <article class="wrapper-thumbnail col-xxs-12 col-xs-6 col-sm-4 col-md-4 col-lg-3 fadeinslow animated">
      <div class="thumbnail">
        <a href="{{url('/product-detail',$product->id)}}" class="thumbnail-image">
              <img src="{{url('uploads/products/',$product->image)}}" itemprop="image" class="product-image" alt="Geo Tray" rel="itmimg87978943">
            </a>
        <div class="caption text-center m-2">
          <h3 itemprop="name"><a href="{{url('/product-detail',$product->id)}}" title="Geo Tray">{{$product->name}}</a></h3>
          <a href="{{url('/product-detail',$product->id)}}">
                <span>Rs. {{$product->price}} </span>
              </a>
        </div>
      </div>
    </article>
    @endforeach
  </div>
</div>

<!--features_items-->
@endsection