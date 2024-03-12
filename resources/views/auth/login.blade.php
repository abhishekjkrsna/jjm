@extends('layouts.blankLayout')

@section('style')
    <style>
        .upicon-logo {
            width: 15rem;
            height: auto;
        }

        body {
            /*
                    background: linear-gradient(0deg, rgba(63, 94, 251, 1) 0%, rgba(70, 244, 252, 1) 100%);
                    */
            background-image: url('https://images.unsplash.com/photo-1506102383123-c8ef1e872756?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            height: 100vh;
            /* Set to full viewport height */
            margin: 0;
            /* Remove default body margin */
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row h-100 d-flex align-items-center justify-content-center">
            <div class="col-sm-9 col-md-7 col-lg-4 mx-auto">
                <div class="card border-0 shadow rounded-3 my-5">
                    <div class="card-body p-4 p-sm-4">

                        <!-- Logo and Title Section -->
                        <div class="d-flex flex-row align-items-center justify-content-center row">
                            <img src="assets/img/upicon.png" class="upicon-logo mb-4">
                            <p class="h2 text-center mb-4">{{ __('Login') }}</p>
                        </div>

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Input -->
                            <div class="form-floating mb-3">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required placeholder="Email address">
                                <label for="email">{{ __('Email Address') }}</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password Input -->
                            <div class="form-floating mb-3">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    placeholder="Password">
                                <label for="password">{{ __('Password') }}</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Remember Me Checkbox -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <!-- Sign In Button -->
                            <div class="d-grid">
                                <button class="btn btn-primary btn-login text-uppercase fw-bold rounded-pill"
                                    type="submit">Sign
                                    in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
