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

<style>
.custom-navbar {
    background: linear-gradient(90deg, #44799d, #A7D2D5); /* Soft blue to light teal gradient */
    border-bottom: 2px solid #E6E6E6; /* Light border for contrast */
}

.custom-navbar .navbar-brand {
    font-family: 'Poppins', sans-serif;
    color: #FFFFFF;
}

.custom-navbar .nav-link {
    color: #FFFFFF;
    font-weight: 500;
    transition: color 0.3s ease, background-color 0.3s ease; /* Added background color transition */
}

.custom-navbar .nav-link:hover {
    color: #FFD700; /* Gold color for hover effect */
    background-color: rgba(255, 215, 0, 0.2); /* Light gold background on hover */
    border-radius: 5px; /* Optional: rounded corners on hover */
}


.custom-navbar .btn-outline-light {
    background-color: #56b2d3; /* Muted teal primary color */
    border-color: #6DA2B6;
    color: #fff;
}

.custom-navbar .btn-outline-light:hover {
    background-color: #57a0bb; /* Darker muted teal on hover */
    border-color: #257fa0;
}

.custom-navbar .btn-primary {
    background-color: #51a8c8; /* Muted teal primary color */
    border-color: #6DA2B6;
    color: #fff;
}

.custom-navbar .btn-primary:hover {
    background-color: #61a8c2; /* Darker muted teal on hover */
    border-color: #257fa0;
}
</style>
