@extends('layouts.app')

@section('content')
<div class="row profile">
    <aside class="col-lg-4">
        <ul>
            <li>
                <h6 class="active">Mangage Account</h6>
                <ul>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Shipping Address</a></li>
                    <li><a href="#">Payment Option</a></li>
                </ul>
            </li>
            <li>Your orders</li>
            <h6 href="#">Order list</h6>
                <ul>
                    <li><a href="#">Order List</a></li>
                    <li><a href="#">Order Arrived</a></li>
                    <li><a href="#">Order Cancel</a></li>
                </ul>
                
            <li><h6>Reviews</h6></li>
            <li><h6>My wishlist</h6></li>
        </ul>
    </aside>
    <article class="col-lg-8">
        <div class="row">
            <div class="col-lg-6">
                <div class="card p-4">
                    <h2>Hello Ram</h2>
                    <a href="#">Edit</a>
                    <ul>
                        <li><b>Name:</b> Admond Tamang</li>
                    <li><b>Phone:</b> {{  }}</li>
                        <li><b>Address:</b> Nuwakot, Kathmandu</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                    <div class="card p-4">
                            <h2>Shipping Address</h2>
                            <a href="#">Edit</a>
                            <span class="text-muted">Default Shipping Address</span>
                            <ul>
                                <li><b>Address:</b> Macchapokhari</li>
                                <li><b>Phone:</b> 977 9852226666</li>
                            </ul>
                        </div>
            </div>
        </div>
    </article>
</div>

@endsection
