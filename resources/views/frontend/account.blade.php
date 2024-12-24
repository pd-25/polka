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
                    <h2 class="mb-4">My Account</h2>
                </div>
                <div class="col-lg-12">
                    <div class="account-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="pro-img-box">
                                    <img src="{{ asset('frontend-asset/images/default_avatar.png') }}" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="pro-box-ctn">
                                    <ul>
                                        <li><i class="fa fa-user-o" aria-hidden="true"></i> {{ auth()->user()?->name }}</li>
                                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ auth()->user()?->email }}
                                        </li>
                                        <li><i class="fa fa-phone" aria-hidden="true"></i> {{ auth()->user()?->phone }}</li>
                                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>
                                            {{ auth()->user()?->street_address }}</li>
                                        <li><i class="fa fa-key" aria-hidden="true"></i> <b>Current Password:</b> ******
                                        </li>

                                        <li><a class="banner-btn" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                {{ __('Log Out') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                            <div class="col-lg-2">
                                <a href="" class="sp-btn-snd">Edit</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 text-center">
                    <h3 class="mb-4">My Order Details</h3>
                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                </div>
                <div class="col-lg-12">
                    <table class="table cart-tl">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (auth()->user()->orders as $order)
                                <tr>
                                    <td colspan="6">
                                        <strong>Order Number: {{ $order->order_number }}</strong><br>
                                        <strong>Stauts: {{ $order->status }}</strong>
                                    </td>
                                </tr>
                                @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <th scope="row">
                                            <img src="{{ asset('storage/' . $orderItem?->product?->productPrimaryImage?->image_path) }}"
                                                class="img-fluid">
                                        </th>
                                        <td>{{ $orderItem->product?->name }}</td>
                                        <td>₹{{ $orderItem->price }}</td>
                                        <td>{{ \Carbon\Carbon::parse($orderItem->created_at)->format('d M, Y h:i A') }}
                                        </td>
                                        <td>{{ $orderItem->quantity }}</td>
                                        <td>{{ $order->street_address }}</td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="6">No orders found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </section>


    <section id="line2-section"> </section>

    <script src="js/script.js" defer></script>
    <script src="owl-carousel/js/owl.carousel.js"></script>
@endsection
