@extends('frontend.layout.main')
@section('content')
    <section class="banner-slider" id="inn-banner-slider">
        <div data-ride="carousel" class="carousel slide" id="carouselExampleIndicators">
            <div role="listbox" class="carousel-inner">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div style="background-image: url('frontend-asset/images/inn-banner.jpg')" class="carousel-item active">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Content -->
    <section id="line-section"> </section>
    <section id="inn-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 class="mb-4">Login</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="sign-box">
                        <form method="POST" action="{{ route('login') }}" id="login-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" required="required" class="form-control" name="email"
                                            id="user_name">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" required="required" class="form-control" name="password"
                                            id="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-lg-12 fm-link">
                                    <p><a href="recover-password.html">Forgot Password</a></p>
                                </div> --}}

                                <div class="col-lg-12 fm-link">
                                    <p>Don't have an account yet? <a href="{{ route('register') }}">Register Now</a></p>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <input type="submit" value="Login Now" class="banner-btn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="line2-section"> </section>

    <script src="js/script.js" defer></script>
    <script src="owl-carousel/js/owl.carousel.js"></script>
@endsection
