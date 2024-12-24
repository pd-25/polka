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
                <div class="col-lg-12">
                    <h2 class="mb-4">My Cart</h2>
                    <table class="table cart-tl" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalAmount = 0;
                            @endphp
                            @forelse ($carts as $cartitem)
                                @php
                                    $itemTotal = $cartitem?->productVariant?->price * $cartitem?->quantity;
                                    $totalAmount += $itemTotal;
                                @endphp
                                <tr>
                                    <th scope="row"><img
                                            src="{{ asset('storage/' . $cartitem?->product?->productPrimaryImage?->image_path) }}"
                                            class="img-fluid"></th>
                                    <td>{{ $cartitem?->product?->name }}</td>
                                    <td>₹{{ $cartitem?->productVariant?->price }}</td>
                                    <td>
                                        <ul class="pro-qty-list">
                                            {{-- <li class="ctrl">
                                                <div class="ctrl__button ctrl__button--decrement">–</div>
                                                <div class="ctrl__counter">
                                                    <input class="ctrl__counter-input" maxlength="10" type="text"
                                                        value="0">
                                                    <div class="ctrl__counter-num">{{ $cartitem?->quantity }}</div>
                                                </div>
                                                <div class="ctrl__button ctrl__button--increment">+</div>
                                            </li> --}}
                                            <li class="ctrl">
                                                <div class="ctrl__button ctrl__button--decrement"
                                                    onclick="decrementQuantity({{ $cartitem?->id }})">–</div>
                                                <div class="ctrl__counter">
                                                    <input class="ctrl__counter-input" maxlength="10" type="text"
                                                        value="1" id="quantityInput{{ $cartitem?->id }}" readonly>
                                                    <div class="ctrl__counter-num" id="quantityDisplay{{ $cartitem?->id }}">
                                                        {{ $cartitem?->quantity }}
                                                    </div>
                                                </div>
                                                <div class="ctrl__button ctrl__button--increment"
                                                    onclick="incrementQuantity({{ $cartitem?->id }})">+</div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>₹<span id="itemTotal{{ $cartitem?->id }}">{{ $itemTotal }}</span></td>
                                    <td><i class="fa fa-trash" aria-hidden="true"></i></td>
                                </tr>
                            @empty
                            @endforelse

                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Cart Total</b></td>
                                <td><b>₹<span id="totalAmnt">{{ $totalAmount }}</span></b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 mb-4">
                    <p><input id="Coupon" type="text" maxlength="10" name="Coupon" class="form-control"
                            placeholder="Enter Coupon Code"></p>
                </div>
                <div class="col-lg-3 mb-4">
                    <a href="" class="sp-btn-snd">Apply Coupon</a>
                </div>
                <div class="col-lg-6 txright">
                    <p><a href="{{ route('checkout') }}" class="banner-btn">Checkout</a></p>
                </div>

            </div>
        </div>
    </section>


    <section id="line2-section"> </section>

    <script src="js/script.js" defer></script>
    <script src="owl-carousel/js/owl.carousel.js"></script>
    <!-- End Owl pranab-->
    <script>
        function incrementQuantity(cartId) {
            let quantity = parseInt(document.getElementById('quantityInput' + cartId).value);
            
                quantity++;
                document.getElementById('quantityInput' + cartId).value = quantity;
                document.getElementById('quantityDisplay' + cartId).textContent = quantity;
                updateCart(cartId, quantity);

        }

        function decrementQuantity(cartId) {
            let quantity = parseInt(document.getElementById('quantityInput' + cartId).value);
            if (quantity > 1) {
                quantity--;
                document.getElementById('quantityInput' + cartId).value = quantity;
                document.getElementById('quantityDisplay' + cartId).textContent = quantity;
                updateCart(cartId, quantity);
            }
        }

        function updateCart(cartId, quantity) {
            fetch('/update-cart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-Token': '{{ csrf_token() }}' // CSRF token for security
                    },
                    body: JSON.stringify({
                        cart_id: cartId,
                        quantity: quantity
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Update the item total and cart total based on the response
                    if (data.status) {
                        
                        $( "#itemTotal"+cartId ).load(window.location.href + " #itemTotal"+cartId );
                        $( "#totalAmnt" ).load(window.location.href + " #totalAmnt" );
                    }
                })
                .catch(error => {
                    console.error('Error updating cart:', error);
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
