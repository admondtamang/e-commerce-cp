@extends('app')
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
        @yield('profileData')
    </article>
</div>

@endsection