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
            @foreach ($templates as $template)
            <div class="col-lg-4 col-md-6">
                <div class="card template-card shadow-sm" ">
                    <img src="{{ $template->imagePrev}}" class="card-img-top" alt="Agency">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $template->nom }}</h5>
                        <p class="card-text"> se destine aux petites entreprises et aux agences. Son design chaleureux et propre.</p>
                        <a href="{{ route('templates.show', $template->templateId) }}"  class="stretched-link"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection