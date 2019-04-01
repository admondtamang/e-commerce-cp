@extends('layouts/store_layout') 
@section('content')
<div class="container">
    <div class="card p-4">
        <div class="card-header">
            <h2>Category</h2>
            <a href="{{route('category.create')}}" class="btn btn-primary">Add New Category</a>
        </div>
        <div class="card-body">
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
    </div>


</div>
@endsection