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
        <h2 class="mb-4">Privacy Policy</h2>
        <p>A privacy policy is a statement or legal document (in privacy law) that discloses some or all of the ways a
          party gathers, uses, discloses, and manages a customer or client's data.[1] Personal information can be
          anything that can be used to identify an individual, not limited to the person's name, address, date of birth,
          marital status, contact information, ID issue, and expiry date, financial records, credit information, medical
          history, where one travels, and intentions to acquire goods and services.[2] In the case of a business, it is
          often a statement that declares a party's policy on how it collects, stores, and releases personal information
          it collects. It informs the client what specific information is collected, and whether it is kept
          confidential, shared with partners, or sold to other firms or enterprises.[3][4] Privacy policies typically
          represent a broader, more generalized treatment, as opposed to data use statements, which tend to be more
          detailed and specific.</p>
      </div>
    </div>
  </div>
</section>


<section id="line2-section"> </section>

<script src="js/script.js" defer></script>
<script src="owl-carousel/js/owl.carousel.js"></script>

@endsection