@extends('layouts/store_layout') 
@section('content')
<div class="card p-4">
    <div class="card-header">
        <h2>Store Profile</h2>
    </div>
    <div class="card-body">
        <h2>Hello, {{ Auth::guard('store')->user()->name }}</h2>

    </div>
</div>
@endsection