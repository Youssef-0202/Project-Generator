<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend Generator - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
</head>
<body>

    <!-- Navigation Bar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">WebsiteGen</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/features">Features</a></li>
                        <li class="nav-item"><a class="nav-link" href="/templates">Templates</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                        <li class="nav-item"><a class="btn btn-warning text-dark" href="#">Get Started</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
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

    <!-- Footer -->
    <footer class="bg-dark text-light py-3 text-center">
        <p>&copy; 2024 WebsiteGen. All rights reserved.</p>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
    <script>

        // GSAP Animations for Hero Section
window.onload = () => {
    gsap.from('.hero-section h1', { duration: 1, y: -100, opacity: 0, ease: 'power2.out' });
    gsap.from('.hero-section p', { duration: 1.5, y: 100, opacity: 0, delay: 0.5 });
    gsap.from('.hero-section .btn', { 
        duration: 1, 
        opacity: 0, 
        y: 20, 
        stagger: 0.3, 
        delay: 1 
    });
};

    </script>
        <style>
            /* Hero Section */
    .hero-section {
        background: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4)), url('https://source.unsplash.com/1600x900/?web,design');
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }
    
    .hero-section h1 {
        font-size: 3.5rem;
        animation: fadeInDown 1s ease-out;
    }
    
    .hero-section p {
        font-size: 1.2rem;
        opacity: 0;
        animation: fadeInUp 1.5s ease-out 0.5s forwards;
    }
    
    .hero-section .btn {
        animation: fadeIn 2s ease-out 1s forwards;
    }
    
    /* Keyframe Animations */
    @keyframes fadeInDown {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    
    @keyframes fadeInUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    
        </style>
</body>
</html>
