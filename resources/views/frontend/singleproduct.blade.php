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
            <div class="row mb-5">
                <div class="col-lg-5">
                    <div id="demo-pranab">
                        <div id="owl-single-product" class="owl-carousel owl-theme">
                            @forelse ($singleProduct->productImages as $pImage)
                                <div class="item">
                                    <img src="{{ asset('storage/' . $pImage->image_path) }}" class="img-fluid">
                                </div>
                            @empty
                                <div class="item">
                                    <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                                </div>
                            @endforelse


                        </div>

                    </div>
                </div>
                <div class="col-lg-7 single-pro-ctnbox">
                    <h2 class="mb-1">{{ $singleProduct->name }}</h2>
                    <ul class="pb-list">
                        <li class="pro-box-review">
                            <span class="fa fa-star rev-checked"></span>
                            <span class="fa fa-star rev-checked"></span>
                            <span class="fa fa-star rev-checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span><a href="#revBox">(10Reviews)</a></span>
                        <li>
                    </ul>
                    <p>{{ $singleProduct->description }}</p>
                    <h4>Size</h4>
                    <hr>
                    <ul class="size-list">
                        @forelse ($singleProduct->productVariants as $index => $productVariant)
                            <li data-price="{{ $productVariant->price }}" data-id="{{ $productVariant->id }}"
                                onclick="changeSize(this)" class="{{ $index === 0 ? 'active' : '' }}">
                                {{ $productVariant->measurement }}{{ $productVariant->measurement_param }}
                            </li>
                        @empty
                            <li>No sizes available</li>
                        @endforelse
                    </ul>
                    <hr>
                    <p class="pro-box-price mb-0">₹<span id="price">
                            {{ $singleProduct->productVariants->first()->price ?? '0' }}
                        </span></p>
                    <p class="vt-txt">(Including VAT)</p>

                    <ul class="pro-qty-list">
                        <li class="ctrl">
                            <div class="ctrl__button ctrl__button--decrement" onclick="decrementQuantity()">–</div>
                            <div class="ctrl__counter">
                                <input class="ctrl__counter-input" maxlength="10" type="text" value="1"
                                    id="quantityInput">
                                <div class="ctrl__counter-num" id="quantityDisplay">1</div>
                            </div>
                            <div class="ctrl__button ctrl__button--increment" onclick="incrementQuantity()">+</div>
                        </li>
                        <li>
                            @auth
                                @if ($singleProduct->carts->count() > 0)
                                    <a href="{{ route('cart') }}" class="banner-btn">Already Added to Bag</a>
                                @else
                                    <a onclick="addToCart({{ $singleProduct->id }})" class="banner-btn">Add To Bag</a>
                                @endif
                            @else
                                <a onclick="promptLogin()" class="banner-btn">Add To Bag</a>
                            @endauth

                        </li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-between border-bottom mb-3 rev-box">
                <div class="col-lg-4 col-sm-6 col-7">
                    <ul class="pb-list">
                        <li class="pro-box-review">
                        <li class="rev-txt">{{ number_format($singleProduct->averageRating() ?? 0, 1) }}</li>
                        @for ($i = 1; $i <= 5; $i++)
                            <span
                                class="fa fa-star {{ $i <= round($singleProduct->averageRating() ?? 0) ? 'rev-checked' : '' }}"></span>
                        @endfor
                        </li>
                    </ul>
                    <p class="revCap">Based on {{ $singleProduct->productReviews->count() }} reviews</p>
                </div>


                <div class="col-lg-3 col-sm-6 col-5 rev-brnBox">
                    @auth
                        <a href="" class="sp-btn-snd" data-toggle="modal" data-target="#exampleModal-Rev">Write A
                            Review</a>
                    @else
                        <a onclick="promptReviewLogin()" class="sp-btn-snd">Write A
                            Review</a>
                    @endauth

                </div>

                <div class="modal fade" id="exampleModal-Rev" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Write A Review</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="review-form" method="post"
                                    action="{{ route('writeFeedback', $singleProduct->slug) }}"
                                    enctype="multipart/form-data" role="form">
                                    @csrf
                                    <div class="controls">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="rate">
                                                    <input type="radio" id="star5" name="star"
                                                        value="5" />
                                                    <label for="star5" title="text">5 stars</label>
                                                    <input type="radio" id="star4" name="star"
                                                        value="4" />
                                                    <label for="star4" title="text">4 stars</label>
                                                    <input type="radio" id="star3" name="star"
                                                        value="3" />
                                                    <label for="star3" title="text">3 stars</label>
                                                    <input type="radio" id="star2" name="star"
                                                        value="2" />
                                                    <label for="star2" title="text">2 stars</label>
                                                    <input type="radio" id="star1" name="star"
                                                        value="1" />
                                                    <label for="star1" title="text">1 star</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea id="form_message" name="note" class="form-control"
                                                        placeholder="Tell us your feedback about the product..." rows="4" required="required"
                                                        data-error="Please,leave us a message." required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="submit" class="banner-btn" value="Submit Now">
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div id="revBox" class="row justify-content-between rev-box">
                @forelse ($singleProduct->productReviews as $singleReview)
                    <div class="col-lg-12 border-bottom">
                        <ul class="pb-list">
                            <li class="pro-box-review">
                                {{-- Display star rating dynamically --}}
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="fa fa-star {{ $i <= $singleReview->star ? 'rev-checked' : '' }}"></span>
                                @endfor
                            </li>
                        </ul>
                        {{-- Display review note --}}
                        <p>{{ $singleReview->note }}</p>

                        {{-- Display user name --}}
                        <p class="rev-name"><b>{{ $singleReview->user?->name ?? 'Anonymous' }}</b></p>
                    </div>
                @empty
                    <p>No reviews yet..</p>
                @endforelse



                {{-- <div class="col-lg-12 border-bottom mt-3">
                    <ul class="pb-list">
                        <li class="pro-box-review">
                            <span class="fa fa-star rev-checked"></span>
                            <span class="fa fa-star rev-checked"></span>
                            <span class="fa fa-star rev-checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        <li>
                    </ul>
                    <p>Pellentesque tristique feugiat massa id efficitur. Aliquam pretium dui sit amet ipsum congue congue.
                        Vivamus auctor dignissim risus quis mattis. Phasellus bibendum est at enim semper, nec aliquet quam
                        pretium. Sed finibus enim ipsum, porttitor scelerisque tellus imperdiet sed. </p>
                    <p><b>John Thomas</b></p>
                </div>

                <div class="col-lg-12 border-bottom mt-3">
                    <ul class="pb-list">
                        <li class="pro-box-review">
                            <span class="fa fa-star rev-checked"></span>
                            <span class="fa fa-star rev-checked"></span>
                            <span class="fa fa-star rev-checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        <li>
                    </ul>
                    <p>Pellentesque tristique feugiat massa id efficitur. Aliquam pretium dui sit amet ipsum congue congue.
                        Vivamus auctor dignissim risus quis mattis. Phasellus bibendum est at enim semper, nec aliquet quam
                        pretium. Sed finibus enim ipsum, porttitor scelerisque tellus imperdiet sed. </p>
                    <p><b>John Thomas</b></p>
                </div>

                <div class="col-lg-12 mt-3">
                    <ul class="pb-list">
                        <li class="pro-box-review">
                            <span class="fa fa-star rev-checked"></span>
                            <span class="fa fa-star rev-checked"></span>
                            <span class="fa fa-star rev-checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        <li>
                    </ul>
                    <p>Pellentesque tristique feugiat massa id efficitur. Aliquam pretium dui sit amet ipsum congue congue.
                        Vivamus auctor dignissim risus quis mattis. Phasellus bibendum est at enim semper, nec aliquet quam
                        pretium. Sed finibus enim ipsum, porttitor scelerisque tellus imperdiet sed. </p>
                    <p><b>John Thomas</b></p>
                </div> --}}
            </div>

            <div class="row mt-5">
                <div class="col-lg-12 mb-3">
                    <h2>Related Products</h2>
                </div>
                {{-- @dd($relatedProducts, $singleProduct) --}}
                <div class="col-lg-12">
                    <div id="demo-pranab">
                        <div id="owl-related-product" class="owl-carousel owl-theme">
                            @forelse ($relatedProducts as $relatedProductT)
                                <div class="item">
                                    <div class="product-box border-box">
                                        <div class="product-box-img">
                                            <img src="{{ asset('storage/' . $relatedProductT?->productPrimaryImage?->image_path) }}"
                                                class="img-fluid">
                                        </div>
                                        <div class="product-box-ctn">
                                            <h4>{{ $relatedProductT?->name }}</h4>
                                            <p class="pro-sort-desc">
                                                {{ Str::limit($relatedProductT->description, 50, '...') }}.</p>
                                            <ul class="pb-list">
                                                <li class="pro-box-review">
                                                    <span class="fa fa-star rev-checked"></span>
                                                    <span class="fa fa-star rev-checked"></span>
                                                    <span class="fa fa-star rev-checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span><a href="">10Reviews</a></span>
                                                <li>
                                            </ul>
                                            <p class="pro-box-price">₹{{ $relatedProductT?->productVariantPrice?->price }}
                                            </p>
                                            <a href="{{ route('singleProduct', $relatedProductT->slug) }}"
                                                class="sp-btn">Shop
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse



                        </div>

                    </div>
                </div>

            </div>


        </div>
    </section>


    <section id="line2-section"> </section>

    <script src="js/script.js" defer></script>
    <script src="owl-carousel/js/owl.carousel.js"></script>
    <!-- End Owl pranab-->
    <script>
        $(document).ready(function() {
            var owl = $('#owl-single-product');
            owl.owlCarousel({
                items: 1,
                loop: true,
                nav: true,
                margin: 0,
                dots: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            });
            $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [2000])
            })
            $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            var owl = $('#owl-related-product');
            owl.owlCarousel({
                items: 4,
                loop: true,
                nav: true,
                margin: 30,
                dots: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 4
                    }
                }
            });
            $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [2000])
            })
            $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
            })
        })
    </script>
    <script>
        function changeSize(element) {
            // Remove active class from all list items
            document.querySelectorAll('.size-list li').forEach(function(item) {
                item.classList.remove('active');
            });

            // Add active class to the clicked item
            element.classList.add('active');

            // Get the price from the clicked element's data-price attribute
            const price = element.getAttribute('data-price');

            // Update the price display
            document.getElementById('price').textContent = price + ".00";
        }

        function incrementQuantity() {
            let quantity = parseInt(document.getElementById('quantityInput').value);
            quantity++;
            document.getElementById('quantityInput').value = quantity;
            document.getElementById('quantityDisplay').textContent = quantity;
        }

        function decrementQuantity() {
            let quantity = parseInt(document.getElementById('quantityInput').value);
            if (quantity > 1) {
                quantity--;
                document.getElementById('quantityInput').value = quantity;
                document.getElementById('quantityDisplay').textContent = quantity;
            }
        }

        function addToCart(productId) {
            const quantity = parseInt(document.getElementById('quantityInput').value);
            if (quantity > 0) {
                const activeVariant = document.querySelector('.size-list li.active');
                const variantId = activeVariant.getAttribute('data-id');
                const price = activeVariant.getAttribute('data-price');
                console.log("Adding to cart:", {
                    variantId: variantId,
                    quantity: quantity,
                    price: price,
                    productId: productId
                });

                fetch("{{ route('addToCart') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json"
                        },
                        body: JSON.stringify({
                            variantId: variantId,
                            quantity: quantity,
                            price: price,
                            productId: productId
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            return response.json().then(data => {
                                throw data;
                            });
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('the data- ', data);
                        if (data.status === 'success') {
                            swal(data.msg, "", "success");
                        } else {
                            swal(data.msg, "", "success");
                        }
                    });
            } else {
                alert("Please select a quantity greater than 0.");
            }
        }

        function promptLogin() {
            swal("Please log in to add items to your bag.", "", "warning").then(() => {
                window.location.href = "{{ route('login') }}";
            });
        }

        function promptReviewLogin() {
            swal("Please log in to add review.", "", "warning").then(() => {
                window.location.href = "{{ route('login') }}";
            });
        }

        (function() {
            'use strict';

            function ctrls() {
                var _this = this;

                this.counter = 0;
                this.els = {
                    decrement: document.querySelector('.ctrl__button--decrement'),
                    counter: {
                        container: document.querySelector('.ctrl__counter'),
                        num: document.querySelector('.ctrl__counter-num'),
                        input: document.querySelector('.ctrl__counter-input')
                    },
                    increment: document.querySelector('.ctrl__button--increment')
                };

                this.decrement = function() {
                    var counter = _this.getCounter();
                    var nextCounter = (_this.counter > 0) ? --counter : counter;
                    _this.setCounter(nextCounter);
                };

                this.increment = function() {
                    var counter = _this.getCounter();
                    var nextCounter = (counter < 9999999999) ? ++counter : counter;
                    _this.setCounter(nextCounter);
                };

                this.getCounter = function() {
                    return _this.counter;
                };

                this.setCounter = function(nextCounter) {
                    _this.counter = nextCounter;
                };

                this.debounce = function(callback) {
                    setTimeout(callback, 100);
                };

                this.render = function(hideClassName, visibleClassName) {
                    _this.els.counter.num.classList.add(hideClassName);

                    setTimeout(function() {
                        _this.els.counter.num.innerText = _this.getCounter();
                        _this.els.counter.input.value = _this.getCounter();
                        _this.els.counter.num.classList.add(visibleClassName);
                    }, 100);

                    setTimeout(function() {
                        _this.els.counter.num.classList.remove(hideClassName);
                        _this.els.counter.num.classList.remove(visibleClassName);
                    }, 200);
                };

                this.ready = function() {
                    _this.els.decrement.addEventListener('click', function() {
                        _this.debounce(function() {
                            _this.decrement();
                            _this.render('is-decrement-hide', 'is-decrement-visible');
                        });
                    });

                    _this.els.increment.addEventListener('click', function() {
                        _this.debounce(function() {
                            _this.increment();
                            _this.render('is-increment-hide', 'is-increment-visible');
                        });
                    });

                    _this.els.counter.input.addEventListener('input', function(e) {
                        var parseValue = parseInt(e.target.value);
                        if (!isNaN(parseValue) && parseValue >= 0) {
                            _this.setCounter(parseValue);
                            _this.render();
                        }
                    });

                    _this.els.counter.input.addEventListener('focus', function(e) {
                        _this.els.counter.container.classList.add('is-input');
                    });

                    _this.els.counter.input.addEventListener('blur', function(e) {
                        _this.els.counter.container.classList.remove('is-input');
                        _this.render();
                    });
                };
            };

            // init
            var controls = new ctrls();
            document.addEventListener('DOMContentLoaded', controls.ready);
        })();
    </script>
@endsection
