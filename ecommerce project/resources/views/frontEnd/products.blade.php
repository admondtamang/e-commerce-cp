@extends('.layouts.app') 
@section('content')
<h1>Products</h1>
<div class="features_items">
    <!--features_items-->
    <?php
            if($byCate!=""){
                $products=$list_product;
                echo '<h2 class="title text-center">Category '.$byCate->name.'</h2>';
            }else{
                echo '<h2 class="title text-center">List Products</h2>';
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
<!--features_items-->
@endsection