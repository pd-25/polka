<!-- Bootstrap core CSS -->
<link href="{{ asset('frontend-asset/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend-asset/css/bootstrap-grid.css')}}" rel="stylesheet">
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('frontend-asset/js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{ asset('frontend-asset/js/popper.min.js')}}"></script>
    <script src="{{ asset('frontend-asset/js/bootstrap.min.js')}}"></script>
    <!-- Owl Carousel Assets pranab -->
    <link href="{{ asset('frontend-asset/owl-carousel/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend-asset/owl-carousel/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <!-- Owl Carousel Assets pranab -->

    <!-- Custom styles for this template -->
    <link href="{{ asset('frontend-asset/css/modern-business.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-asset/css/menu-style.css')}}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.6.3/css/ionicons.min.css">
    <link href="{{ asset('frontend-asset/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('frontend-asset/css/responsive.css')}}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-asset/css/slideout.css')}}" />
    <script type="text/javascript">
        $(document).ready(function () {
            $('.headersearch').on('click', '.search-toggle', function (e) {
                var selector = $(this).data('selector');

                $(selector).toggleClass('show').find('.search-input').focus();
                $(this).toggleClass('active');

                e.preventDefault();
            });
        });
    </script>