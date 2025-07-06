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
    <div class="container body-container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @elseif(session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
            @elseif(session('resent'))
            <div class="alert alert-warning">
                {{ session('resent') }}

            </div>
            @endif
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">

                            @auth <!-- Only show if user is authenticated -->
                            <p>Welcome, {{ Auth::user()->name }}!</p>
                            <p>Your email: {{ Auth::user()->email }}</p>

                            <div class="mt-4">
                                <a href="{{ route('auth.logout') }}"
                                    onclick="event.preventDefault(); 
                                document.getElementById('logout-form').submit();"
                                    class="btn btn-danger">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                            @else
                            <p>Please login to access the dashboard.</p>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br>
        @endsection

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>