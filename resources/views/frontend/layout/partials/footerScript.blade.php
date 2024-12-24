<script src="{{ asset('frontend-asset/js/script.js')}}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('frontend-asset/owl-carousel/js/owl.carousel.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- End Owl pranab-->
    <script>
        $(document).ready(function () {
            var owl = $('#owl-category');
            owl.owlCarousel({
                items: 6,
                loop: true,
                nav: true,
                margin: 30,
                dots: false,
                autoplay: false,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 4
                    },
                    1000: {
                        items: 6
                    }
                }
            });
            $('.play').on('click', function () {
                owl.trigger('play.owl.autoplay', [2000])
            })
            $('.stop').on('click', function () {
                owl.trigger('stop.owl.autoplay')
            })
        })
    </script>

    <script>
        $(document).ready(function () {
            var owl = $('#owl-top-sell-one');
            owl.owlCarousel({
                items: 4,
                loop: true,
                nav: true,
                margin: 30,
                dots: false,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            });
            $('.play').on('click', function () {
                owl.trigger('play.owl.autoplay', [2000])
            })
            $('.stop').on('click', function () {
                owl.trigger('stop.owl.autoplay')
            })
        })
    </script>
    <script>
        $(document).ready(function () {
            var owl = $('#owl-top-sell-two');
            owl.owlCarousel({
                items: 4,
                loop: true,
                nav: true,
                margin: 30,
                dots: false,
                autoplay: true,
                autoplayTimeout: 2000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            });
            $('.play').on('click', function () {
                owl.trigger('play.owl.autoplay', [2000])
            })
            $('.stop').on('click', function () {
                owl.trigger('stop.owl.autoplay')
            })
        })
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
    @yield('script')