<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">{{ $content['heading'] }}</h2>
            <h3 class="section-subheading text-muted">{{ $content['subheading'] }}</h3>
        </div>
        <div class="row">
            @foreach ($content['members'] as $member)
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" />
                        <h4>{{ $member['name'] }}</h4>
                        <p class="text-muted">{{ $member['role'] }}</p>
                        <a class="btn btn-dark btn-social mx-2" href="{{ $member['social']['twitter'] }}" aria-label="{{ $member['name'] }} Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="{{ $member['social']['facebook'] }}" aria-label="{{ $member['name'] }} Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="{{ $member['social']['linkedin'] }}" aria-label="{{ $member['name'] }} LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <p class="large text-muted">{{ $content['description'] }}</p>
            </div>
        </div>
    </div>
</section>
