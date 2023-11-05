@extends('layouts.web')

@section('title', 'Inicio')

@section('content')
<div id="carouselExample" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active c-item">
            <img src="https://media.baamboozle.com/uploads/images/91929/1620483520_374496_url.jpeg" class="d-block w-100 c-img" alt="slider 1">
            <div class="carousel-caption top-0 mt-4">
                <p class="mt-5 fs-3 text-uppercase">
                    Descubre nuevas experiencias
                </p>
                <h1 class="display-1 fw-bolder text-capitalize"> Shopping bag</h1>
                <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Descubre</button>
            </div>
        </div>
        <div class="carousel-item c-item">
            <img src="https://storage.googleapis.com/hrblog-spotify-com.appspot.com/1/2023/04/AdobeStock_340509733-scaled.jpeg" class="d-block  w-100 c-img"  alt="slider 2">
            <div class="carousel-caption top-0 mt-4">
                <p class="mt-5 fs-3 text-uppercase">
                    Descubre nuevas experiencias
                </p>
                <h1 class="display-1 fw-bolder text-capitalize"> Shopping bag</h1>
                <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Descubre</button>
            </div>
        </div>
        <div class="carousel-item c-item">
            <img src="https://crescensinc.com/wp-content/uploads/2018/05/Happy-People1-1.jpg" class="d-block  w-100 c-img"  alt="slider 3">
            <div class="carousel-caption top-0 mt-4">
                <p class="mt-5 fs-3 text-uppercase">
                    Descubre nuevas experiencias
                </p>
                <h1 class="display-1 fw-bolder text-capitalize"> Shopping bag</h1>
                <button class="btn btn-primary px-4 py-2 fs-5 mt-5">Descubre</button>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>




<div class="relative ">
    @if (Route::has('login'))
        <div class="btn">
            @auth
                <a href="{{ url('/home') }}" class="btn btn-info btn-xs">Home</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-succes btn-xs">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-secondary btn-xs">Register</a>
                @endif
            @endauth
        </div>
    @endif

</div>

@endsection
