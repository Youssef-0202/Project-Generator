<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="{{ url('/') }}">WebsiteGen</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/features') }}">Features</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/templates') }}">Templates</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ url('/contact') }}">Contact</a></li>
                <li class="nav-item"><a class="btn btn-outline-light text-white mx-2" href="{{ url('/login') }}">Login</a></li>
                <li class="nav-item"><a class="btn btn-primary text-white" href="{{ route('register') }}">Sign Up</a></li>
            </ul>
        </div>
    </div>
</nav>
