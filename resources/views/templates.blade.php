@extends('layouts.app')

@section('title', 'templates')

@section('content')
<div class="container my-5">
    <h2 class="text-center">Templates</h2>
    <p class="lead text-center">Explore the Templates of our website generator.</p>
</div>
<!-- Template Gallery Section -->
<section id="templates" class="template-section py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Choose Your Template</h2>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card template-card shadow-sm" ">
                    <img src="{{asset('images/back1.jpg')}}" class="card-img-top" alt="Agency">
                    <div class="card-body text-center">
                        <h5 class="card-title">Agency</h5>
                        <p class="card-text"> se destine aux petites entreprises et aux agences. Son design chaleureux et propre.</p>
                        <a href="{{url('/temp1')}}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card template-card shadow-sm" onclick="selectTemplate('Portfolio')">
                    <img src="{{asset('images/back2.jpg')}}" class="card-img-top" alt="Portfolio">
                    <div class="card-body text-center">
                        <h5 class="card-title">Stylish Portfolio </h5>
                        <p class="card-text">est un template Bootstrap permettant de créer un très beau portfolio sur une page.</p>
                        <a href="{{url('/temp3')}}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card template-card shadow-sm" onclick="selectTemplate('E-commerce')">
                    <img src="{{asset('images/back3.jpg')}}" class="card-img-top" alt="E-commerce">
                    <div class="card-body text-center">
                        <h5 class="card-title">Clean Blog</h5>
                        <p class="card-text">est un template Bootstrap permettant de créer un très beau blog sur une page.</p>
                        <a href="{{url('/temp2')}}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection