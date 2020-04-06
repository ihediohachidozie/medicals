@extends('layouts.practitioner-app')

@section('content')
<div class="container">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('assets/images/carousel/banner_5.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="{{asset('assets/images/carousel/banner_6.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="{{asset('assets/images/carousel/banner_8.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
</div>
@endsection
