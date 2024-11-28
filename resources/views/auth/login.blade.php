@extends('layouts.app')

@section('content')
<div class="login-page">
    <div class="login-box">
        <h2 class="login-title">Sign In</h2>
        <p class="login-subtitle">Welcome back! Please sign in to continue.</p>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="login-errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('login') }}" method="POST" class="login-form">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn-login">Sign In</button>
        </form>

        <div class="alternative-action">
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        </div>
    </div>
</div>
@endsection
