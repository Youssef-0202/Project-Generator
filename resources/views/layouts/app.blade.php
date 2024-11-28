<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Frontend Generator')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
   
    @if (Request::is('register'))
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    @endif
    @if (Request::is('login'))
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @endif


</head>

<body>
    <!-- Navbar -->
    <x-navbar />

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <x-footer />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
    <script>
        // GSAP Animations for Hero Section
        window.onload = () => {
            gsap.from('.hero-section h1', {
                duration: 1,
                y: -100,
                opacity: 0,
                ease: 'power2.out'
            });
            gsap.from('.hero-section p', {
                duration: 1.5,
                y: 100,
                opacity: 0,
                delay: 0.5
            });
            gsap.from('.hero-section .btn', {
                duration: 1,
                opacity: 0,
                y: 20,
                stagger: 0.3,
                delay: 1
            });
        };
    </script>
</body>

</html>
