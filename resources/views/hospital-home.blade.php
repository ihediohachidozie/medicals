@extends('layouts.hospital-app')

@section('content')
<div class="container">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('assets/images/carousel/banner_9.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="{{asset('assets/images/carousel/banner_10.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="{{asset('assets/images/carousel/banner_11.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
</div>
@endsection
