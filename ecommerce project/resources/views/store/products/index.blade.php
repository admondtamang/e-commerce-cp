@extends('layouts/store_layout') 
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
                    <h2>Your Products</h2>
                    <a class="btn btn-outline-primary mb-3" href="{{ url('/store/products/create')}}"><i class="fas fa-plus mr-2"></i>Add new products</a>

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
                                    <a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-outline-success btn-mini"><i class="fas fa-eye mr-2"></i>View</a>                                    {{-- <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-mini">Edit</a>                                    --}}
                                    <form action="{!! route('products.destroy',[$product->id]) !!}" style="display:inline-block" method="POST">
                                        @csrf {!! method_field('DELETE') !!}
                                        <button type="submit" class="btn btn-outline-danger"><i class="fas fa-trash mr-2"></i> Delete</button>
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