<footer class="footer py-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 text-lg-start">
                {{ $content['copyright'] }}
            </div>
            <div class="col-lg-4 my-3 my-lg-0">
                @if (isset($content['social_links']))
                    @foreach ($content['social_links'] as $platform => $url)
                        <a class="btn btn-dark btn-social mx-2" href="{{ $url }}" aria-label="{{ ucfirst($platform) }}">
                            <i class="fab fa-{{ $platform }}"></i>
                        </a>
                    @endforeach
                @endif
            </div>
            <div class="col-lg-4 text-lg-end">
                @if (isset($content['footer_links']))
                    @foreach ($content['footer_links'] as $label => $url)
                        <a class="link-dark text-decoration-none me-3" href="{{ $url }}">
                            {{ ucfirst(str_replace('_', ' ', $label)) }}
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</footer>
