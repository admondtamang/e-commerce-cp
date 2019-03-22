@extends('layouts/store_layout') 
@section('content')
<div class="container">
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Parent Category</th>
                <th>Url</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $cat)
            <tr>
                <td>{{ $cat->category }}</td>
                <td>{{$cat->parent_id}}</td>
                <td>{{ $cat->url }}</td>
                <td>
                    <a href="{{route('category.edit',$cat->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{route('category.destroy',$cat->id) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>
@endsection