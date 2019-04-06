@extends('layouts.app') 
@section('content')

<h2 class="text-center title mt-2">Search - {{$products->count()}}</h2>
@if ($products->count()>0)

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
              <span>$88.00 </span>
            </a>
            </div>
        </div>
    </article>
    @endforeach
</div>
</div>

@else
<div class="container text-center">
    <img src="{{asset('images/empty_product.svg')}}" width="200" alt="empty">
    <h2>No products found</h2>
</div>

@endif
@endsection