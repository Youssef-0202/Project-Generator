<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WebsiteGen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container-fluid vh-100 d-flex">
    <!-- Left Side -->
    <div class="left-section d-flex flex-column justify-content-center align-items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mb-4" style="width: 150px;">
        <h2 class="text-white">Hello 👋!</h2>
        <p class="text-light">If you don't have an account, create it from here</p>
        <a href="/register" class="btn btn-warning text-dark mb-2">Go Register</a>
        <a href="/" class="btn btn-outline-light">Go Home</a>
        <img src="https://source.unsplash.com/300x200/?design" alt="Illustration" class="mt-4" style="max-width: 80%;">
    </div>

    <!-- Right Side -->
    <div class="right-section d-flex flex-column justify-content-center align-items-center">
        <h2 class="mb-4">Sign In</h2>
        <form action="/login" method="POST" class="w-75">
            @csrf
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-3">
                <a href="/forgot-password" class="text-decoration-none">Forgot Your Password?</a>
            </div>
            <button type="submit" class="btn btn-dark w-100">Sign In</button>
        </form>
    </div>
</div>
<style>
    /* public/css/login.css */

/* Global styles */
body {
    font-family: 'Arial', sans-serif;
    overflow: hidden;
}

/* Left Section */
.left-section {
    background-color: #0a0a0a;
    flex: 1;
    text-align: center;
    padding: 40px;
    color: white;
    position: relative;
}

.left-section h2 {
    font-size: 2.5rem;
    font-weight: bold;
}

.left-section p {
    font-size: 1.1rem;
}

.left-section img {
    border-radius: 12px;
}

/* Right Section */
.right-section {
    background-color: #f5f5f5;
    flex: 1;
    padding: 40px;
}

.right-section h2 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #333;
}

.right-section form {
    max-width: 400px;
}

.right-section .form-control {
    background-color: #e0e0e0;
    border: none;
    border-radius: 8px;
}

.right-section .btn-dark {
    background-color: #1a1a2e;
    border: none;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

.right-section .btn-dark:hover {
    background-color: #111;
}

</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
