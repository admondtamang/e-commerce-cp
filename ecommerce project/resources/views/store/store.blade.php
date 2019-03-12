@extends('.layouts.app')

@section('content')

<h1>Store Dashboard</h1>
<div class="row">
    <a class="card text-center shadow p-5" href="{{ route('products.index') }}">products</a>
</div>
@endsection 