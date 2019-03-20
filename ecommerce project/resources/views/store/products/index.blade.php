@extends('layouts.app')
@section('content')
 <h1>Your Products</h1>
<a class="btn btn-primary mb-3" href="{{ url('/store/products/create')}}">Add new products</a>


<div class="container-fluid">
    @if(Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            <strong>Well done!</strong> {{Session::get('message')}}
        </div>
    @endif
    <div class="widget-box">
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>description</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>stock Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
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
                            <a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-info btn-mini">View</a>
                            {{-- <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-mini">Edit</a> --}}
                        <form action="{!! route('products.destroy',[$product->id]) !!}" method="POST">
                            @csrf
                            {!! method_field('DELETE') !!}
                            <button type="submit" class="btn btn-danger btn-sm"> Delete</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection