@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="col-sm-9 padding-right">
        @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{Session::get('message')}}
        </div>
        @endif
    </div>
    <div class="product-details">
        <!--product-details-->
        <div class="row">
            <div class="col-sm-5">
                <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                    <a href="{{url('uploads/products/',$detail_product->image)}}">
                            <img src="{{url('uploads/products/',$detail_product->image)}}" alt="" style="width:100%" id="dynamicImage"/>
                        </a>
                </div>

            </div>
            <div class="col-sm-7">
    @include('layouts/error');
                <form action="{{ route('addToCart') }}" method="post" role="form">
                    @csrf
                    <input type="hidden" value="{{$detail_product->id}}" name="product_id">
                    <input type="hidden" value="{{ $detail_product->name }}" name="name">
                    <input type="hidden" value="{{ $detail_product->price }}" name="price">
                    <input type="hidden" value="{{ $detail_product->stock_quantity }}" name="quantity">
                    <p>Product detail: <b>{{$detail_product->name}}</b></p>
                    <p>Product description: <b>{{$detail_product->description}}</b></p>
                    <p>Product price: <b>{{$detail_product->price}}</b></p>
                    <p>Product quantity: <b><input type="number" name="stock" value="1" ><b>stock available</b>{{$detail_product->stock_quantity}}</b>
                    </p>
                    <p><b>Condition:</b> New</p>
                    <a href=""><img src="{{asset('frontEnd/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
                    <input type="submit" value="Add to Cart" class="addtocart btn btn-success btn-block btn-lg btn-loads">
                </form>
            </div>
        </div>
    </div>
    <!--/product-details-->
</div>
@endsection