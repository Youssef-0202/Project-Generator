<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{$content['heading']}}</h2>
            <h3 class="section-subheading text-muted">{{$content['subheading']}}</h3>
        </div>
        <div class="row text-center">
            @foreach ($content['services'] as $service)
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="{{ $service['icon'] }} fa-stack-1x fa-inverse"></i>
                </span>
                <h4 class="my-3">{{ $service['title'] }}</h4>
                <p class="text-muted">{{ $service['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>