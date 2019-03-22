@extends('layouts/store_layout') {{-- 
@section('title','Add Category') --}} 
@section('content')
<H1 class="pb-2">Edit Category</H1>

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

<form action="{{route('category.edit')}}" method="POST">
    @csrf {{-- categoy --}}
    <div class="form-group {{$errors->has('category')?' has-error':''}}">
        <input type="text" class="form-control" value="{{$cat->category}}" name="category" placeholder="Category"> @if ($errors->has('category'))
        <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('category') }}</strong>
            </span> @endif
    </div>

    {{-- Select Category --}}
    <div class="form-group {{$errors->has('selectCategory')?' has-error':''}}">

        <select class="form-control" name="parent_id">
            <option value="" disabled selected>Select a Category</option>
            @foreach ($category as $cat)
                <option value="{{ $cat->id }}">{{$cat->category}}</option>
            @endforeach
        </select> @if ($errors->has('selectCategory'))
        <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('selectCategory') }}</strong>
            </span> @endif
    </div>


    {{-- url --}}
    <div class="form-group {{$errors->has('url')?' has-error':''}}">
        <input type="text" class="form-control" value="{{$cat->url}}" name="url" placeholder="url"> @if ($errors->has('url'))
        <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('url') }}</strong>
            </span> @endif
    </div>

    <input type="submit" value="Submit" class="btn btn-dark ">

</form>
@endsection