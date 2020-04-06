@extends('layouts.patient-app')

@section('content')
<div class="container">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('assets/images/carousel/banner_1.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="{{asset('assets/images/carousel/banner_2.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="{{asset('assets/images/carousel/banner_3.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>
</div>
@endsection
