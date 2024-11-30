<div class="py-5">
    <div class="container">
        <div class="row align-items-center">
            @foreach ($content['logos'] as $logo)
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="{{ $logo['link'] }}">
                        <img 
                            class="img-fluid img-brand d-block mx-auto" 
                            src="{{ asset($logo['image']) }}" 
                            alt="{{ $logo['alt'] }}" 
                            aria-label="{{ $logo['aria_label'] }}" 
                        />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
