<section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{ $content['heading'] }}</h2>
            <h3 class="section-subheading text-muted">{{ $content['subheading'] }}</h3>
        </div>
        <ul class="timeline">
            @foreach ($content['timeline'] as $item)
                @if (isset($item['finalMessage']))
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>{{ $item['finalMessage'] }}</h4>
                        </div>
                    </li>
                @else
                    <li class="{{ $item['inverted'] ? 'timeline-inverted' : '' }}">
                        <div class="timeline-image">
                            <img class="rounded-circle img-fluid" src="{{ asset($item['image']) }}" alt="..." />
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>{{ $item['year'] }}</h4>
                                <h4 class="subheading">{{ $item['subheading'] }}</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">{{ $item['description'] }}</p>
                            </div>
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</section>
