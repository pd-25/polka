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
        <h2 class="mb-4">Terms & Conditions</h2>
        <p>Because of its importance, there are 5 main reasons why you should have a Terms and Conditions agreement: to
          prevent abuses, to protect your creative content, to terminate accounts, to limit your legal liability and to
          set your governing law. This article will look further into each of these reasons why you should have a Terms
          and Conditions agreement.</p>
      </div>
    </div>
  </div>
</section>

<section id="line2-section"> </section>

<script src="js/script.js" defer></script>
<script src="owl-carousel/js/owl.carousel.js"></script>

@endsection