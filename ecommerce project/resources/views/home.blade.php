@extends('layouts.app')

@section('content')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <div class="img"><img class="d-block img-fluid" src="{{asset('images/banner01.jpg')}}" alt="First slide"></div>
      </div>
      <div class="carousel-item">
        <div class="img"><img class="d-block img-fluid" src="{{asset('images/banner02.jpg')}}" alt="Second slide"></div>
      </div>
      <div class="carousel-item">
        <div class="img"><img class="d-block img-fluid" src="{{asset('images/banner03.jpg')}}" alt="Third slide"></div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>


{{-- products --}}



@endsection
