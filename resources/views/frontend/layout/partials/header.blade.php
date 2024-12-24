<header id="main-header" class="header">
    <div id="top-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-4 logo-box">
                    <div class="logo">
                        <img src="{{ asset('frontend-asset/images/logo.png') }}" class="img-fluid">
                    </div>
                </div>


                <!-- Section: Navbar Menu -->
                <div class="col-lg-8 col-8 align-self-center">
                    <div class="overlay"></div>
                    <nav class="menu">
                        <div class="menu-mobile-header">
                            <button type="button" class="menu-mobile-arrow"><i
                                    class="ion ion-ios-arrow-back"></i></button>
                            <div class="menu-mobile-title"></div>
                            <button type="button" class="menu-mobile-close"><i class="ion ion-ios-close"></i></button>
                        </div>
                        <ul class="menu-section">
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="{{ route('aboutUs') }}">About Us</a></li>

                            <li class="menu-item-has-children">
                                <a href="#">Product <i class="ion ion-ios-arrow-down"></i></a>
                                <div class="menu-subs menu-mega menu-column-5">
                                    @foreach ($categories as $category)
                                        <div class="list-item">
                                            <h4 class="title">{{ $category->name }}</h4>
                                            <hr>
                                            <ul>
                                                @foreach ($category->products as $product)
                                                    <li><a
                                                            href="{{ route('singleProduct', $product->slug) }}">{{ $product->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                    {{-- <div class="list-item">
                                        <h4 class="title">Sugar, Salt & Jaggery</h4>
                                        <hr>
                                        <ul>
                                            <li><a href="product.html">Product Name Here</a></li>
                                            <li><a href="product.html">Product Name Here</a></li>
                                            <li><a href="product.html">Product Name Here</a></li>
                                            <li><a href="product.html">Product Name Here</a></li>
                                            <li><a href="product.html">Product Name Here</a></li>
                                            <li><a href="product.html">Product Name Here</a></li>
                                            <li><a href="product.html">Product Name Here</a></li>
                                            <!--<li class="menu-btncls"><a href="#">View More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>-->
                                        </ul>
                                    </div> --}}




                                    <div class="list-item">
                                        <img src="{{ asset('frontend-asset/images/menu-pic2.png') }}" class="img-fluid"
                                            alt="...">
                                    </div>
                                </div>
                            </li>
                            {{-- <li class="menu-item-has-children">
                                <a href="#">Product <i class="ion ion-ios-arrow-down"></i></a>
                                <div class="menu-subs menu-mega menu-column-5">
                                    @foreach ($categories as $category)
                                        <div class="list-item">
                                            <h4 class="title">{{ $category->name }}</h4>
                                            <hr>
                                            <ul>
                                                @foreach ($category->products as $product)
                                                    <li><a href="{{ route('singleProduct', $product->id) }}">{{ $product->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </li> --}}
                            <li><a href="{{route('certificate')}}">Certificate</a></li>
                            <li><a href="{{route('contactus')}}">Contact Us</a></li>
                        </ul>
                    </nav>
                    <div class="header-item-right">
                        <button type="button" class="menu-mobile-trigger">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-2 col-4 align-self-center mt--1">
                    <div id="header-1" class="headersearch">
                        <nav class="header-nav">
                            <div class="search-button">
                                <a href="#" class="search-toggle" data-selector="#header-1"></a>
                            </div>
                            <ul class="head-account">
                                @if (Route::has('login'))
                                    @auth
                                        <li><a href="{{ route('account') }}">Account</a></li>
                                        <li><a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"
                                                    aria-hidden="true"></i><sup>({{ auth()->user()->carts->count() }})</sup></a>
                                        </li>
                                    @else
                                        <li><a href="{{ route('login') }}">Log in</a></li>

                                        {{-- @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                        @endif --}}
                                    @endauth
                                @endif

                            </ul>
                            <form action="" class="search-box">
                                <input type="text" class="text search-input" placeholder="Type here to search..." />
                            </form>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
