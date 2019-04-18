@extends('layouts/admin_layout') 
@section('content')
<div class="card p-4">
    <div class="card-header">
        <h2>Users</h2>
    </div>
    <div class="card-body">
        <div class="row">

            @foreach ($users as $user)
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
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection