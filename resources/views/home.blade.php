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
        <h2 class="text-center mb-5">Choose Your Template</h2>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card template-card shadow-sm" onclick="selectTemplate('Landing Page')">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Landing Page">
                    <div class="card-body text-center">
                        <h5 class="card-title">Landing Page</h5>
                        <p class="card-text">Perfect for promoting products and services.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card template-card shadow-sm" onclick="selectTemplate('Portfolio')">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="Portfolio">
                    <div class="card-body text-center">
                        <h5 class="card-title">Portfolio</h5>
                        <p class="card-text">Showcase your work with a professional portfolio layout.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card template-card shadow-sm" onclick="selectTemplate('E-commerce')">
                    <img src="https://via.placeholder.com/350x200" class="card-img-top" alt="E-commerce">
                    <div class="card-body text-center">
                        <h5 class="card-title">E-commerce</h5>
                        <p class="card-text">Create an online store with a modern and clean design.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
