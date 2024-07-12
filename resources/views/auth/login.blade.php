@extends('layouts.auth')

@section('content')
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="/assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">NiceAdmin</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3 py-4">

                            <div class="card-body">

                                <div class="pb-3">
                                    <h5 class="card-title fs-4 pb-0">Login to Your Account</h5>
                                    <p class="small">Enter your username & password to login</p>
                                </div>

                                <form class="row g-3" novalidate method="POST"
                                    action="{{ route('login') }}">
                                    @csrf

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input name="email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="" autofocus>
                                            <label for="email">Email address</label>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="" autofocus>
                                            <label for="password">Password</label>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>

                                    @if (Route::has('register'))
                                        <div class="col-12">
                                            <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create
                                                    an
                                                    account</a></p>
                                        </div>
                                    @endif

                                    @if (Route::has('password.request'))
                                        <div class="col-12">
                                            <p class="small mb-0">Forgot Your Password? <a
                                                    href="{{ route('password.request') }}">Reset Password</a></p>
                                        </div>
                                    @endif
                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
