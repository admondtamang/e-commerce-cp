@extends('layouts/store_layout') 
@section('content')

<div class="container-fluid">
    @if(Session::has('message'))
    <div class="alert alert-success text-center" role="alert">
        <strong>Well done!</strong> {{Session::get('message')}}
    </div>
    @endif @if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
            <li> {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card p-4">
        <div class="card-header">
            <h2 class="mb-3">Add Products</h2>

        </div>
        <div class="card-body">

            <form action="{{route('products.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                @csrf {{--
                <div class="form-group">
                    <label class="control-label">Select Category</label>
                    <div class="controls">
                        <select name="categories_id" style="width: 415px;">

                </select>
                    </div>
                </div> --}}
                <div class="form-group">
                    <div class="controls{{$errors->has('name')?' has-error':''}}">
                        <input type="text" name="name" id="name" placeholder="Product name" class="form-control " value="{{old('name')}}" title=""
                            required="required" style="width: 400px;">
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls{{$errors->has('stock_quantity')?' has-error':''}}">
                        <input type="number" name="stock_quantity" placeholder="Stock Quantity" id="stock_quantity" class="form-control " value="{{old('stock_quantity')}}"
                            title="" required="required" style="width: 400px;">
                        <span class="text-danger">{{$errors->first('stock_quantity')}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="controls{{$errors->has('description')?' has-error':''}}">
                        <textarea class="form-control" name="description" id="description" rows="6" placeholder="Product Description" style="width: 580px;padding:10px;height:auto;">{{old('description')}}</textarea>
                        <span class="text-danger">{{$errors->first('description')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls{{$errors->has('price')?' has-error':''}}">
                        <input type="number" placeholder="Price (Nrs)" name="price" id="price" class="form-control" value="{{old('price')}}" title=""
                            required="required">
                        <span class="text-danger">{{$errors->first('price')}}</span>
                    </div>
                </div>
                {{-- Image --}}
                <div class="form-group">
                    <label class="control-label">Image upload</label>
                    <div class="controls">
                        <input type="file" name="image" id="image" />
                        <span class="text-danger">{{$errors->first('image')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label"></label>
                    <div class="controls">
                        <button type="submit" class="btn btn-success">Add New Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>
@endsection