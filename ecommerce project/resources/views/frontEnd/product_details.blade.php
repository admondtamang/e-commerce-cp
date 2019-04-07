@extends('layouts.app') 
@section('content')
    @include('layouts/error')

<div class="container">

    <div class="product-details">
        <!--product-details-->
        <div class="row">
            <div class="col-sm-7">
                <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                    <a href="{{url('uploads/products/',$detail_product->image)}}">
                            <img src="{{url('uploads/products/',$detail_product->image)}}" alt="" style="width:85%" id="dynamicImage"/>
                        </a>
                </div>

            </div>
            <div class="col-sm-5 pt-3">
                <form action="{{ route('addToCart') }}" method="post" role="form">
                    @csrf
                    <input type="hidden" value="{{$detail_product->id}}" name="product_id">
                    <input type="hidden" value="{{ $detail_product->name }}" name="name">
                    <input type="hidden" value="{{ $detail_product->price }}" name="price">
                    <input type="hidden" value="{{ $detail_product->stock_quantity }}" name="stock">

                    <h2>{{$detail_product->name}}</h2>
                    <p>{{$detail_product->description}}</p>
                    <h4 class="my-2"> Rs.<b>{{$detail_product->price}}</b></h4>
                    <p class="text-blod">Quantity: <b><input type="number" name="quantity" value="1" ></b></p>
                    <p> @if ($detail_product->stock_quantity)
                        <b><i class="fas fa-check-circle mr-1"></i>In stock</b> @else
                        <b>Out of Stock</b> @endif
                    </p>
                    <button type="submit" value="Add to Cart" class="addtocart btn btn-dark btn-block btn-lg btn-loads"><i class="fa fa-shopping-basket mr-1" aria-hidden="true"></i>Add to Cart</button>
                </form>
                @guest
                <button type="submit" class=" btn btn-block btn-lg btn-loads"><i class="fas fa-heart" aria-hidden="true"></i> Add to Wishlist</button>                @else
                <form action="{{route('wishlist.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$detail_product->id}}">
                    <input type="hidden" name="user_id" value=" @if(auth()->user()->id) {{auth()->user()->id}}@endif">
                    <input type="hidden" name="name" value="{{$detail_product->name}}">
                    <input type="hidden" name="price" value="{{$detail_product->price}}">
                    <input type="hidden" name="store_id" value="{{$detail_product->store_id}}">
                    <button type="submit" class="btn btn-lg btn-loads"><i class="fas fa-heart text-danger" aria-hidden="true"></i> Add to Wishlist</button>
                </form>
                @endguest
                <p class="text-muted small">* Get the item you ordered or get your money back. Covers your purchase price and original shipping.
                </p>
            </div>
        </div>
    </div>

    <div class="container">

    </div>
    <!--/product-details-->
</div>
@endsection