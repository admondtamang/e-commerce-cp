@extends('.layouts.app') 
@section('content') {{-- @if($products->count()>0) --}}
<div class="features_items">
    <!--features_items-->
    <?php
            if($byCate!=""){
                $products=$list_product;
                echo '<h3 class=" text-center">Category '.$byCate->name.'</h3>';
            }else{
                echo '<h3 class=" text-center">List Products</h3>';
            }
    ?>
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
{{-- @else
<h3 class="text-center">Nothing Found</h3>
@endif --}}
<!--features_items-->
@endsection