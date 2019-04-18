@extends('layouts.app') 
@section('content')
<div class="conatiner" style="width:60%;margin:0 auto;">
    <h2 class="mb-3">Contact us</h2>
    <form action="{{route('products.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="controls{{$errors->has('name')?' has-error':''}}">
                <input type="text" name="name" id="name" placeholder="Enter name" class="form-control " value="{{old('name')}}" title=""
                    required="required">
                <span class="text-danger ">{{$errors->first('name')}}</span>
            </div>
        </div>

        <div class="form-group ">
            <div class="controls{{$errors->has('email')?' has-error':''}}">
                <input type="email" name="email" placeholder="Enter Email" id="email" class="form-control " value="{{old('email')}}" title=""
                    required="required">
                <span class="text-danger ">{{$errors->first('email')}}</span>
            </div>
        </div>

        <div class="form-group ">
            <div class="controls{{$errors->has('message')?' has-error':''}}">
                <textarea name="message" placeholder="Enter message" id="message" class="form-control" value="{{old('message')}}" cols="30"
                    rows="10" required="required"></textarea>
                <span class="text-danger ">{{$errors->first('message')}}</span>
            </div>
        </div>
        <button type="submit" class="btn btn-dark">submit</button>

</div>
@endsection