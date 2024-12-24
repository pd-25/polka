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
            <div class="col-lg-12 text-center">
                <h2 class="mb-4">Our Certificates</h2>
            </div>
            <div class="col-lg-4">
                <a href="{{asset('frontend-asset/images/certificate1.jpg')}}" class="fancylight popup-btn"
                    data-fancybox-group="light">
                    <img class="img-fluid" src="{{asset('frontend-asset/images/certificate1.jpg')}}" alt="">
                </a>
            </div>
            <div class="col-lg-4">
                <a href="images/certificate1.jpg" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{asset('frontend-asset/images/certificate1.jpg')}}" alt="">
                </a>
            </div>
            <div class="col-lg-4">
                <a href="images/certificate1.jpg" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{asset('frontend-asset/images/certificate1.jpg')}}" alt="">
                </a>
            </div>
        </div>
    </div>
</section>


<section id="line2-section"> </section>

<script src="js/script.js" defer></script>
<script src="owl-carousel/js/owl.carousel.js"></script>
<script src="dist/simple-lightbox.js?v2.2.1"></script>
<script>
    (function () {
        var $gallery = new SimpleLightbox('.gallery a', '.gallery a p', {});
    })();
</script>
<script>

    // $('.portfolio-item').isotope({
    //  	itemSelector: '.item',
    //  	layoutMode: 'fitRows'
    //  });
    $('.portfolio-menu ul li').click(function () {
        $('.portfolio-menu ul li').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');
        $('.portfolio-item').isotope({
            filter: selector
        });
        return false;
    });
    $(document).ready(function () {
        var popup_btn = $('.popup-btn');
        popup_btn.magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
</script>

@endsection