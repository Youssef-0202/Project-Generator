<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="hero-section text-light d-flex align-items-center">
    <div class="container text-center">
        <!-- Hero Section -->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 mb-4">Build Beautiful Websites Effortlessly</h1>
                <p class="lead mb-5">
                    Leverage our powerful website generator to create stunning, responsive websites in minutes. No coding required!
                </p>
                <a href="#" class="btn btn-primary btn-lg me-3">Get Started</a>
                <a href="/features" class="btn btn-outline-light btn-lg">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="features-section py-5 bg-light text-center">
    <div class="container">
        <h2 class="mb-5">Powerful Features at Your Fingertips</h2>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0 feature-card">
                    <div class="card-body">
                        <i class="fas fa-bolt fa-3x mb-4 text-primary"></i>
                        <h5 class="card-title">Fast and Efficient</h5>
                        <p class="card-text">Generate fully responsive websites in no time with our optimized code generator.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0 feature-card">
                    <div class="card-body">
                        <i class="fas fa-paint-brush fa-3x mb-4 text-primary"></i>
                        <h5 class="card-title">Customizable Templates</h5>
                        <p class="card-text">Choose from a wide range of templates and customize them to fit your needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow-sm border-0 feature-card">
                    <div class="card-body">
                        <i class="fas fa-shield-alt fa-3x mb-4 text-primary"></i>
                        <h5 class="card-title">Secure and Reliable</h5>
                        <p class="card-text">Built with the latest security standards to keep your data safe.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Template Gallery Section -->
<section id="templates" class="template-section py-5">
    <div class="container">
        <h2 class="text-center mb-5">Templates</h2>
        
<!--template crousll-->
<div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('images/back1.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5 class="card-title">Agency</h5>
            <p class="card-text"> se destine aux petites entreprises et aux agences. Son design chaleureux et propre.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/back2.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5 class="card-title">Stylish Portfolio </h5>
            <p class="card-text">est un template Bootstrap permettant de créer un très beau portfolio sur une page.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('images/back3.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h5 class="card-title">Clean Blog</h5>
            <p class="card-text">est un template Bootstrap permettant de créer un très beau blog sur une page.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

    </div>
</section>



@endsection
