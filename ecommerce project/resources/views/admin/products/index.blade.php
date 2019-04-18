@extends('layouts/admin_layout') 
@section('content')


<div class="container-fluid">
    @if(Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
        <strong>Well done!</strong> {{Session::get('message')}}
    </div>
    @endif
    <div class="widget-box">
        <div class="widget-content nopadding">
            <div class="card p-4">
                <div class="card-header">
                    <h2>All Products</h2>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>description</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>stock Quantity</th>
                                <th>Price</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <?php $i++; ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td style="vertical-align: middle;">{{$product->name}}</td>
                                <td style="vertical-align: middle;">{{$product->description}}</td>
                                <td style="text-align: center;"><img src="{{url('uploads/products/',$product->image)}}" alt="" width="50"></td>
                                <td style="vertical-align: middle;">{{$product->category}}</td>
                                <td style="vertical-align: middle;">{{$product->stock_quantity}}</td>
                                <td style="vertical-align: middle;">{{$product->price}}</td>
                                <td style="text-align: center; vertical-align: middle;">

                                    <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#myModal{{$product->id}}"><i class="fas fa-eye mr-2"></i>View</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="#myModal{{$product->id}}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h5 class="modal-title" id="myModal{{$product->id}}">{{$product->name}}</h5>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="container">

                                                        <div class="product-details">
                                                            <!--product-details-->
                                                            <div class="row">
                                                                <div class="col-sm-7">
                                                                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                                                                        <a href="{{url('uploads/products/',$product->image)}}">
                                <img src="{{url('uploads/products/',$product->image)}}" alt="" style="width:85%" id="dynamicImage"/>
                            </a>
                                                                    </div>

                                                                </div>
                                                                <div class="col-sm-5 pt-3">
                                                                    <form action="{{ route('addToCart') }}" method="post" role="form">
                                                                        @csrf

                                                                        <h2>{{$product->name}}</h2>
                                                                        <p>{{$product->description}}</p>
                                                                        <h4 class="my-2"> Rs.<b>{{$product->price}}</b></h4>
                                                                        <p class="text-blod">Quantity: <b><input type="number" name="quantity" value="1" ></b></p>
                                                                        <p> @if ($product->stock_quantity)
                                                                            <b><i class="fas fa-check-circle mr-1"></i>In stock</b>                                                                            @else
                                                                            <b>Out of Stock</b> @endif
                                                                        </p>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-mini">Edit</a>                                        --}}
                                        <form action="{!! route('products.destroy',[$product->id]) !!}" style="display:inline-block" method="POST">
                                            @csrf {!! method_field('DELETE') !!}
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash mr-2"></i> Delete</button>
                                        </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
@endsection