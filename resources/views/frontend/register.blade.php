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
        <h1 class="mb-4">Register Now</h1>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="sign-box">
          <form method="post" action="" id="login-form">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label>User Name</label>
                  <input type="text" required="required" class="form-control" name="user_name" id="user_name">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" required="required" class="form-control" name="Password" id="Password">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" required="required" class="form-control" name="cPassword" id="cPassword">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" required="required" class="form-control" name="full_name" id="full_name">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="tel" required="required" class="form-control" name="form_Phone" id="form_Phone">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" required="required" class="form-control" name="form_Email" id="form_Email">
                </div>
              </div>
              <div class="col-md-12 mt-3">
                <input type="submit" value="Register Now" class="banner-btn">
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