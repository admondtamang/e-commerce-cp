@extends('layouts/store_layout') 
@section('content')
<H1 class="pb-2">Add Category</H1>

{{-- For Errors --}} @if(Session::has('message'))
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
        <h2>Create Category</h2>
    </div>
    <div class="card-body">
        <form action="{{route('category.store')}}" method="POST">
            @csrf {{-- categoy --}}
            <div class="form-group {{$errors->has('category')?' has-error':''}}">
                <input type="text" class="form-control" name="category" placeholder="Category Name"> @if ($errors->has('category'))
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category') }}</strong>
                            </span> @endif
            </div>

            {{-- Select Category --}}
            <div class="form-group {{$errors->has('selectCategory')?' has-error':''}}">

                <select class="form-control" name="parent_id">
                            <option value="0">Select a Category</option>
                            @foreach ($category as $cat)
                                <option value="{{ $cat->id }}">{{$cat->category}}</option>
                            @endforeach
                        </select>
                <i class="text-muted small">Leave as it if it's parent</i> @if ($errors->has('selectCategory'))
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('selectCategory') }}</strong>
                            </span> @endif
            </div>

            {{-- url --}}
            <div class="form-group {{$errors->has('url')?' has-error':''}}">
                <input type="text" class="form-control" name="url" placeholder="url"> @if ($errors->has('url'))
                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('url') }}</strong>
                            </span> @endif
            </div>

            <input type="submit" value="Submit" class="btn btn-dark ">

        </form>
    </div>
</div>
@endsection