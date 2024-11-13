<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="hero-section text-light d-flex align-items-center">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 mb-4">Build Beautiful Websites Effortlessly</h1>
                <p class="lead mb-5">Leverage our powerful website generator to create stunning, responsive websites in minutes. No coding required!</p>
                <a href="#" class="btn btn-primary btn-lg me-3">Get Started</a>
                <a href="/features" class="btn btn-outline-light btn-lg">Learn More</a>
            </div>
        </div>
    </div>
</section>
@endsection
