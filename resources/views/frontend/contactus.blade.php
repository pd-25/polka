@extends('frontend.layout.main')
@section('content')
    <section class="banner-slider" id="inn-banner-slider">
        <div data-ride="carousel" class="carousel slide" id="carouselExampleIndicators">
            <div role="listbox" class="carousel-inner">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div style="background-image: url('/frontend-asset/images/inn-banner.jpg')" class="carousel-item active">
                </div>
            </div>
        </div>
    </section>
    <!-- Page Content -->

    <section id="line-section"> </section>

    <section id="inn-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2>Contact With Us</h2>
                    <p>We appreciate feedback and interaction of any sort so please feel free to get in touch.</p>
                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                    <form id="contact-form" method="post" action="{{ route('postcontactus') }}" role="form">
                        @csrf
                        <div class="controls">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="form_name" type="text" name="first_name" class="form-control"
                                            placeholder="First Name" required="required"
                                            data-error="Firstname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="form_lastname" type="text" name="last_name" class="form-control"
                                            placeholder="Last Name" required="required" data-error="Lastname is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="form_email" type="email" name="email" class="form-control"
                                            placeholder="Email" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input id="form_phone" type="tel" name="phone" class="form-control"
                                            placeholder="Phone no.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input id="form_subject" type="text" name="subject" class="form-control"
                                        placeholder="Subject" required="required" data-error="Subject is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Message..." rows="4"
                                            required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <input type="submit" class="banner-btn" value="Submit Now">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 address-box">
                    <h3>Origayen Agro Pvt Ltd</h3>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> Origayen Agro Pvt Ltd. 23/11A Pranabananda
                        Road,<br>Garia, Kolkata- 700084</p>
                    <br>
                    <p><i class="fa fa-phone" aria-hidden="true"></i> +91 6289865859</p>
                    <p><i class="fa fa-envelope" aria-hidden="true"></i> corporateoffice@origayenagro.com</p>
                    <br>
                    <ul class="footer-social">
                        <li><a href="https://www.facebook.com/fitnet.in/" target="_blank"><i
                                    class="fa fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/FitNet11" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCZ2WM7I3TET2BxAyb7u0t3g" target="_blank"><i
                                    class="fa fa-youtube"></i></a></li>
                        <li><a href="https://www.instagram.com/fitnetgroup/" target="_blank"><i
                                    class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.linkedin.com/in/fit-net-02969b176/" target="_blank"><i
                                    class="fa fa-linkedin"></i></a></li>
                    </ul>
                    <hr>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12174.82838372363!2d88.3824857!3d22.4660979!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02719f815977fd%3A0x6345a79adf6f446f!2sOrigayen%20Agro%20Pvt%20Ltd!5e1!3m2!1sen!2sin!4v1727791516842!5m2!1sen!2sin"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>


    <section id="line2-section"> </section>

    <script src="js/script.js" defer></script>
    <script src="owl-carousel/js/owl.carousel.js"></script>
@endsection
