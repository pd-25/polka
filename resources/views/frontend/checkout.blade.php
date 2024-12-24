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
                    <h2 class="mb-4">Checkout</h2>
                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                    <form id="checkout-form" method="post" action="{{ route('placeOrder') }}" role="form"
                        class="border-box p-4">
                        @csrf
                        <div class="controls">
                            <div class="row mb-5">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input id="fname" type="text" name="name" class="form-control"
                                            required="required" data-error="First Name is required."
                                            value="{{ auth()->user()->name }}">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input id="Email" type="text" name="email" class="form-control"
                                            required="required" data-error="Email is required."
                                            value="{{ auth()->user()->email }}">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input id="Phone" type="text" name="phone" class="form-control"
                                            required="required" data-error="Phone is required."
                                            value="{{ auth()->user()->phone }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control" name="country" id="country">
                                            <option selected value="India">India</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Street Address</label>
                                        <input id="Street_address" type="text" name="street_address" class="form-control"
                                            required="required" data-error="Street Address is required."
                                            value="{{ auth()->user()->street_address }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Apartment, suite, unit etc. (optional)</label>
                                        <input id="Apartment" type="text" name="appertment_house_no" class="form-control"
                                            required="required" data-error="Apartment is required."
                                            value="{{ auth()->user()->appertment_house_no }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Town / City</label>
                                        <input id="City" type="text" name="town_city" class="form-control"
                                            required="required" data-error="City is required."
                                            value="{{ auth()->user()->town_city }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input id="State" type="text" name="state" class="form-control"
                                            required="required" data-error="State is required."
                                            value="{{ auth()->user()->state }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Postcode</label>
                                        <input id="Postcode" type="text" name="postcode" class="form-control"
                                            required="required" data-error="Postcode is required."
                                            value="{{ auth()->user()->postcode }}">
                                    </div>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <table class="table cart-tl">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Product</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $totalAmount = 0;
                                            @endphp
                                            @forelse ($cartItems as $cartItem)
                                                @php
                                                    $itemTotal =
                                                        $cartItem?->productVariant?->price * $cartItem?->quantity;
                                                    $totalAmount += $itemTotal;
                                                @endphp
                                                <tr>
                                                    <th scope="row"><img
                                                            src="{{ asset('storage/' . $cartItem?->product?->productPrimaryImage?->image_path) }}"
                                                            class="img-fluid"></th>
                                                    <td>{{ $cartItem?->product?->name }}</td>
                                                    <td>₹{{ $itemTotal }}</td>
                                                </tr>
                                            @empty
                                            @endforelse

                                            <tr>
                                                <th scope="row"></th>
                                                <td><b>Cart Total</b></td>
                                                <td><b>₹{{ $totalAmount }}</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>



                            <div class="row mb-4">
                                <div class="col-lg-12">
                                    <div class="form-check mb-3 pl-0">
                                        <input class="form-check-input" type="radio" name="payment_mode"
                                            id="cashOnDelivery" value="cash" checked>
                                        <label class="form-check-label pay-radio" for="cashOnDelivery">
                                            Cash on Delivery
                                        </label>
                                    </div>
                                    <div class="form-check pl-0">
                                        <input class="form-check-input" type="radio" name="payment_mode"
                                            id="razorpay" value="razorpay">
                                        <label class="form-check-label pay-radio" for="razorpay">
                                            Pay Via Razorpay
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <button class="banner-btn" type="submit" id="placeOrderBtn">Place Order</button>
                                    <button class="banner-btn" type="button" id="payOnlineBtn"
                                        style="display: none;">Pay Online</button>
                                </div>
                            </div>




                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>


    <section id="line2-section"> </section>

    {{-- <script src="{{ asset('frontend-asset/js/script.js') }}" defer></script> --}}
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cashOnDeliveryOption = document.getElementById('cashOnDelivery');
            const razorpayOption = document.getElementById('razorpay');
            const placeOrderBtn = document.getElementById('placeOrderBtn');
            const payOnlineBtn = document.getElementById('payOnlineBtn');

            // Run toggle function on page load to set initial button state
            toggleButtons();

            // Event listeners for changing payment options
            cashOnDeliveryOption.addEventListener('change', toggleButtons);
            razorpayOption.addEventListener('change', toggleButtons);

            function toggleButtons() {
                if (cashOnDeliveryOption.checked) {
                    placeOrderBtn.style.display = 'block';
                    payOnlineBtn.style.display = 'none';
                } else if (razorpayOption.checked) {
                    placeOrderBtn.style.display = 'none';
                    payOnlineBtn.style.display = 'block';
                }
            }
        });

        var options = {
            "key": "{{ env('RAZORPAY_KEY') }}",
            "amount": "{{ $totalAmount * 100 }}",
            "currency": "INR",
            "name": "{{ env('APP_NAME') }}",
            "description": "Test Transaction",
            "image": "{{ asset('frontend-asset/images/logo.png') }}",
            "handler": function(response) {
                fetch("{{ route('razorpay.payment.store') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            razorpay_payment_id: response.razorpay_payment_id,
                            name: document.getElementById("fname").value,
                            email: document.getElementById("Email").value,
                            phone: document.getElementById("Phone").value,
                            country: document.getElementById("country").value,
                            street_address: document.getElementById("Street_address").value,
                            appertment_house_no: document.getElementById("Apartment").value,
                            town_city: document.getElementById("City").value,
                            state: document.getElementById("State").value,
                            postcode: document.getElementById("Postcode").value,
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Payment was successful!");
                            // Redirect or perform additional actions
                        } else {
                            alert("Payment verification failed.");
                        }
                    })
                    .catch(error => console.error("Payment verification error:", error));
            },
            "prefill": {
                "name": document.getElementById("fname").value,
                "email": document.getElementById("Email").value,
                "contact": document.getElementById("Phone").value
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#3399cc"
            }
        };

        var rzp1 = new Razorpay(options);

        document.getElementById('payOnlineBtn').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>
@endsection
