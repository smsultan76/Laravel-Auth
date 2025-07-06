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
    @extends('layouts.default')
    @section('content')
    <div class="container body-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Enter New Password</h3>
                    </div>
                    <div class="card-body">

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-lebel text-md-right">{{__('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                                value="{{$email ?? old('email')}}" autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
<br>
                        <div class="form-gorup row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" 
                                 autocomplete="new-password" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-gorup row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" name="password_confirmation" id="password-confirm" class="form-control @error('password') is-invalid @enderror" 
                                 autocomplete="new-password" autofocus>
                            </div>
                        </div><br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>

                    </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
    @endsection
</body>
</html>