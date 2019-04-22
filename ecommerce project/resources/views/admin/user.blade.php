@extends('layouts/admin_layout') 
@section('content')
<div class="card p-4">
    <div class="card-header">
        <h2>Users</h2>
    </div>
    <div class="card-body">
        <div class="row">

            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->address}}</td>
                        <td>@if($user->status==1)
                            <p class="text-success"><i class="fa fa-check-circle mr-1" aria-hidden="true"></i>verified</p> @else
                            <p class="text-info text-center">-</p> @endif
                        </td>
                        <td>

                            @if($user->status==0)
                            <form action="{{route('admin.verify',$user->id)}}" method="POST">
                                @csrf {{ method_field('PUT') }}
                                <button type="submit" class="btn btn-outline-sucess"> Verify</button>
                            </form>
                            @else
                            <form action="{{route('admin.blacklist',$user->id)}}" method="POST">
                                @csrf {{ method_field('PUT') }}
                                <button type="submit" class="btn btn-danger"><i class="fa fa-stop-circle" aria-hidden="true"></i>Blacklist</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            {{--
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center text-warning">
                                    <i class="fa fa-address-book" aria-hidden="true"></i>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            {{$user->name}}
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection