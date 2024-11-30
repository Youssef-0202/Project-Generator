<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{ $content['heading'] }}</h2>
            <h3 class="section-subheading text-muted">{{ $content['subheading'] }}</h3>
        </div>
        <div class="row">
            @foreach ($content['items'] as $item)
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item -->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="{{ $item['modal'] }}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset($item['image']) }}" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">{{ $item['captionHeading'] }}</div>
                            <div class="portfolio-caption-subheading text-muted">{{ $item['captionSubheading'] }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
