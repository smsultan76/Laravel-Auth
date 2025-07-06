<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Welcome</title>
</head>

<body>
    <!-- Navigation -->
    @extends('layouts.default')
    @section('content')

    <body class="bg-light">
        <div class="container body-container">
            <div class="login-container">
                <div class="login-header">
                    <h2><i class="fas fa-sign-in-alt me-2"></i>Welcome Back</h2>
                    <p class="mb-0">Sign in to your account</p>
                </div>
                <div class="login-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <p class="mb-0"><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        <p class="mb-0">
                            <i class="fas fa-exclamation-circle me-2">
                                {{Session::get('fail')}} 
                            </i></p></div>
                    @endif
                    @if(Session::has('status'))
                    <div class="alert alert-success">
                        <p class="mb-0">
                                {{Session::get('status')}} 
                            </p></div>
                    @endif
                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}"
                                    placeholder="Enter your email"  autofocus>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Enter your password">
                                <button class="btn btn-outline-secondary toggle-password" type="button">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-login btn-primary text-white">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </button>
                        </div>
                        <div class="text-center mb-3">
                            <a href="{{ route('password.request')}}" class="text-decoration-none">
                                Forgot Your Password?
                            </a>
                        </div>
                        <div class="divider">OR</div>
                        <div class="social-login text-center">
                            <p class="mb-3">Sign in with</p>
                            <a href="#" class="btn btn-outline-primary me-2">
                                <i class="fab fa-google me-2"></i>Google
                            </a>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="fab fa-facebook-f me-2"></i>Facebook
                            </a>
                        </div>
                    </form>
                </div>

                <div class="login-footer text-center p-3 bg-light">
                    Don't have an account?
                    <a href="{{ route('Regform') }}" class="text-decoration-none fw-bold">
                        Sign up here
                    </a>
                </div>
            </div>
        </div>
        @endsection
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Select all toggle password buttons
                const toggleButtons = document.querySelectorAll('.toggle-password');

                // Add click event to each button
                toggleButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        // Find the associated password input
                        const passwordInput = this.parentElement.querySelector('input[type="password"], input[type="text"]');
                        const icon = this.querySelector('i');

                        // Toggle the input type
                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInput.setAttribute('type', type);

                        // Toggle the eye icon
                        icon.classList.toggle('fa-eye');
                        icon.classList.toggle('fa-eye-slash');

                        // Optional: Change button text/aria-label for accessibility
                        const toggleText = type === 'password' ? 'Show password' : 'Hide password';
                        this.setAttribute('aria-label', toggleText);
                    });
                });
            });
        </script>
    </body>

</html>