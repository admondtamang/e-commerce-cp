@extends('layouts.app')

@section('content')

<h1>Store Dashboard</h1>
<div class="row">
    <a class="card text-center shadow p-5" href="{{ route('products.index') }}">products</a>
    <a class="card text-center shadow p-5" href="{{ route('category.index') }}">Category</a>
</div>
@endsection 