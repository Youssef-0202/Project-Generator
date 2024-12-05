@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="hero-section text-light d-flex align-items-center" style="background: linear-gradient(135deg, #118ddf, #6db1fe); height: 100vh;">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-3 fw-bold mb-4">Create Stunning Websites Effortlessly</h1>
                <p class="lead mb-5">
                    Empower your vision with our professional website generator. No coding, no hassle—just results!
                </p>
                <a href="#" class="btn btn-primary btn-lg me-3">Get Started</a>
                <a href="/features" class="btn btn-outline-light btn-lg">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="features-section py-5 text-center" style="background-color: #f4f4f4;">
    <div class="container">
        <h2 class="mb-5 text-primary">Powerful Features at Your Fingertips</h2>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow border-0 feature-card">
                    <div class="card-body">
                        <i class="fas fa-bolt fa-3x mb-4 text-warning"></i>
                        <h5 class="card-title">Fast and Efficient</h5>
                        <p class="card-text">Generate fully responsive websites in no time with our optimized code generator.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow border-0 feature-card">
                    <div class="card-body">
                        <i class="fas fa-paint-brush fa-3x mb-4 text-warning"></i>
                        <h5 class="card-title">Customizable Templates</h5>
                        <p class="card-text">Choose from a wide range of templates and customize them to fit your needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 shadow border-0 feature-card">
                    <div class="card-body">
                        <i class="fas fa-shield-alt fa-3x mb-4 text-warning"></i>
                        <h5 class="card-title">Secure and Reliable</h5>
                        <p class="card-text">Built with the latest security standards to keep your data safe.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Template Gallery Section -->
<section id="templates" class="template-section py-5" style="background-color: #fafafa;">
    <div class="container">
        <h2 class="text-center mb-5 text-primary">Explore Our Templates</h2>
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/back1.jpg') }}" class="d-block w-100 rounded" alt="Agency">
                    <div class="carousel-caption d-none d-md-block">
                        <p class="text-dark">Perfect for small businesses and agencies with a clean, warm design.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/back2.jpg') }}" class="d-block w-100 rounded" alt="Stylish Portfolio">
                    <div class="carousel-caption d-none d-md-block">
                        <p class="text-dark">A single-page portfolio with stunning Bootstrap aesthetics.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/back3.jpg') }}" class="d-block w-100 rounded" alt="Clean Blog">
                    <div class="carousel-caption d-none d-md-block">
                        <p class="text-dark">Create a beautiful, minimal blog with ease.</p>
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
