@extends('frontend.layout.main')
@section('content')
    <section id="banner-slider" class="banner-slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active" style="background-image: url('/frontend-asset/images/banner.jpg');">
                    <canvas id="canvas"></canvas>
                    <div class="carousel-caption">
                        <h1><span>100%</span> Organic Food</h1>
                        <p class="banner-ctn">Our organic food products are not only delicious but also offer double
                            immune support.</p>
                        <a href="" class="banner-btn">Shop Now</a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="line-section"> </section>
    <section id="category-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div id="demo-pranab">
                        <div id="owl-category" class="owl-carousel owl-theme">
                            @forelse ($categories as $category)
                                <div class="item">
                                    <div class="category-box">
                                        <img src="{{ asset('frontend-asset/images/cat-pic1.png') }}" class="img-fluid">
                                        <h4><a href="" class="rm-btn-sm">{{ $category->name }}</a></h4>
                                    </div>
                                </div>
                            @empty
                                <div class="item">
                                    <div class="category-box">
                                        <p>No Category found</p>
                                    </div>
                                </div>
                            @endforelse


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="product-heading-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-3">
                    <h2>Most Popular Products</h2>
                </div>
            </div>

        </div>
    </section>

    <section id="product-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-menu mt-2 mb-4">
                        <ul>
                            <li class="btn btn-outline-dark active" data-filter="*">All Products</li>
                            @forelse ($categories as $category_w)
                                <li class="btn btn-outline-dark" data-filter=".category{{ $category_w->id }}">
                                    {{ $category_w->name }}</li>
                            @empty
                                <li>no category found</li>
                            @endforelse

                            {{-- <li class="btn btn-outline-dark" data-filter=".category2">Organic Oil</li>
                            <li class="btn btn-outline-dark" data-filter=".category3">Organic Dry Fruits</li>
                            <li class="btn btn-outline-dark" data-filter=".category4">Sugar, Salt & Jaggery</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portfolio-item row">
                @forelse ($products as $productW)
                    <div class="item category{{ $productW->category_id }} col-lg-3 col-md-3 col-12 col-sm">
                        <div class="product-box">
                            <div class="product-box-img">
                                <img src="{{ asset('storage/' . $productW?->productPrimaryImage?->image_path) }}"
                                    class="img-fluid">
                            </div>
                            <div class="product-box-ctn">
                                <h4>{{ $productW->name }}</h4>
                                <p class="pro-sort-desc">{{ Str::limit($productW->description, 50, '...') }}</p>
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
                                <p class="pro-box-price">₹{{ $productW?->productVariantPrice?->price }}</p>
                                <a href="{{ route('singleProduct', $productW->slug) }}" class="sp-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

                {{-- <div class="item category1 col-lg-3 col-md-3 col-12 col-sm">
                    <div class="product-box">
                        <div class="product-box-img">
                            <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                        </div>
                        <div class="product-box-ctn">
                            <h4>Jaggery Powder</h4>
                            <p class="pro-sort-desc">Our organic food products are certified organic by recognized
                                certification agencies.</p>
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
                            <p class="pro-box-price">₹90.00</p>
                            <a href="" class="sp-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="item category3 col-lg-3 col-md-3 col-12 col-sm">
                    <div class="product-box">
                        <div class="product-box-img">
                            <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                        </div>
                        <div class="product-box-ctn">
                            <h4>Jaggery Powder</h4>
                            <p class="pro-sort-desc">Our organic food products are certified organic by recognized
                                certification agencies.</p>
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
                            <p class="pro-box-price">₹90.00</p>
                            <a href="" class="sp-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="item category4 col-lg-3 col-md-3 col-12 col-sm">
                    <div class="product-box">
                        <div class="product-box-img">
                            <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                        </div>
                        <div class="product-box-ctn">
                            <h4>Jaggery Powder</h4>
                            <p class="pro-sort-desc">Our organic food products are certified organic by recognized
                                certification agencies.</p>
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
                            <p class="pro-box-price">₹90.00</p>
                            <a href="" class="sp-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="item category2 col-lg-3 col-md-3 col-12 col-sm">
                    <div class="product-box">
                        <div class="product-box-img">
                            <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                        </div>
                        <div class="product-box-ctn">
                            <h4>Jaggery Powder</h4>
                            <p class="pro-sort-desc">Our organic food products are certified organic by recognized
                                certification agencies.</p>
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
                            <p class="pro-box-price">₹90.00</p>
                            <a href="" class="sp-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="item category3 col-lg-3 col-md-3 col-12 col-sm">
                    <div class="product-box">
                        <div class="product-box-img">
                            <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                        </div>
                        <div class="product-box-ctn">
                            <h4>Jaggery Powder</h4>
                            <p class="pro-sort-desc">Our organic food products are certified organic by recognized
                                certification agencies.</p>
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
                            <p class="pro-box-price">₹90.00</p>
                            <a href="" class="sp-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="item category4 col-lg-3 col-md-3 col-12 col-sm">
                    <div class="product-box">
                        <div class="product-box-img">
                            <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                        </div>
                        <div class="product-box-ctn">
                            <h4>Jaggery Powder</h4>
                            <p class="pro-sort-desc">Our organic food products are certified organic by recognized
                                certification agencies.</p>
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
                            <p class="pro-box-price">₹90.00</p>
                            <a href="" class="sp-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="item category1 col-lg-3 col-md-3 col-12 col-sm">
                    <div class="product-box">
                        <div class="product-box-img">
                            <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                        </div>
                        <div class="product-box-ctn">
                            <h4>Jaggery Powder</h4>
                            <p class="pro-sort-desc">Our organic food products are certified organic by recognized
                                certification agencies.</p>
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
                            <p class="pro-box-price">₹90.00</p>
                            <a href="" class="sp-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="item category2 col-lg-3 col-md-3 col-12 col-sm">
                    <div class="product-box">
                        <div class="product-box-img">
                            <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                        </div>
                        <div class="product-box-ctn">
                            <h4>Jaggery Powder</h4>
                            <p class="pro-sort-desc">Our organic food products are certified organic by recognized
                                certification agencies.</p>
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
                            <p class="pro-box-price">₹90.00</p>
                            <a href="" class="sp-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="item category1 col-lg-3 col-md-3 col-12 col-sm">
                    <div class="product-box">
                        <div class="product-box-img">
                            <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                        </div>
                        <div class="product-box-ctn">
                            <h4>Jaggery Powder</h4>
                            <p class="pro-sort-desc">Our organic food products are certified organic by recognized
                                certification agencies.</p>
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
                            <p class="pro-box-price">₹90.00</p>
                            <a href="" class="sp-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="item category4 col-lg-3 col-md-3 col-12 col-sm">
                    <div class="product-box">
                        <div class="product-box-img">
                            <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                        </div>
                        <div class="product-box-ctn">
                            <h4>Jaggery Powder</h4>
                            <p class="pro-sort-desc">Our organic food products are certified organic by recognized
                                certification agencies.</p>
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
                            <p class="pro-box-price">₹90.00</p>
                            <a href="" class="sp-btn">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="item category3 col-lg-3 col-md-3 col-12 col-sm">
                    <div class="product-box">
                        <div class="product-box-img">
                            <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                        </div>
                        <div class="product-box-ctn">
                            <h4>Jaggery Powder</h4>
                            <p class="pro-sort-desc">Our organic food products are certified organic by recognized
                                certification agencies.</p>
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
                            <p class="pro-box-price">₹90.00</p>
                            <a href="" class="sp-btn">Shop Now</a>
                        </div>
                    </div>
                </div> --}}



            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="{{ route('products') }}" class="sp-btn-snd">view all products</a>
                </div>
            </div>

        </div>
    </section>


    <section id="register-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2>Trusted By<br> 5,000+ Families.</h2>
                    <p>100% Chemical-free Pure<br> Organic Product Today</p>
                    <a href="{{ route('register') }}" class="sp-dark-btn">Registger Now</a>
                </div>
            </div>
        </div>
    </section>



    <section id="line-section"> </section>



    <section id="top-sell-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-4">
                    <h2>Top Selling Products</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div id="demo-pranab">
                        <div id="owl-top-sell-one" class="owl-carousel owl-theme">
                            @forelse ($topSelling->take(6) as $topSelling_p)
                                <div class="item">
                                    <div class="product-box border-box">
                                        <div class="product-box-img">
                                            <img src="{{ asset('storage/' . $topSelling_p?->productPrimaryImage?->image_path) }}"
                                                class="img-fluid">
                                        </div>
                                        <div class="product-box-ctn">
                                            <h4>{{ $topSelling_p?->name }}</h4>
                                            <p class="pro-sort-desc">
                                                {{ Str::limit($topSelling_p->description, 50, '...') }}.</p>
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
                                            <p class="pro-box-price">₹{{ $topSelling_p?->productVariantPrice?->price }}</p>
                                            <a href="{{ route('singleProduct', $topSelling_p->slug) }}" class="sp-btn">Shop
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                            {{-- <div class="item">
                                <div class="product-box border-box">
                                    <div class="product-box-img">
                                        <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="product-box-ctn">
                                        <h4>Jaggery Powder</h4>
                                        <p class="pro-sort-desc">Our organic food products are certified organic by
                                            recognized certification agencies.</p>
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
                                        <p class="pro-box-price">₹90.00</p>
                                        <a href="" class="sp-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-box border-box">
                                    <div class="product-box-img">
                                        <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="product-box-ctn">
                                        <h4>Jaggery Powder</h4>
                                        <p class="pro-sort-desc">Our organic food products are certified organic by
                                            recognized certification agencies.</p>
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
                                        <p class="pro-box-price">₹90.00</p>
                                        <a href="" class="sp-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-box border-box">
                                    <div class="product-box-img">
                                        <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="product-box-ctn">
                                        <h4>Jaggery Powder</h4>
                                        <p class="pro-sort-desc">Our organic food products are certified organic by
                                            recognized certification agencies.</p>
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
                                        <p class="pro-box-price">₹90.00</p>
                                        <a href="" class="sp-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-box border-box">
                                    <div class="product-box-img">
                                        <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="product-box-ctn">
                                        <h4>Jaggery Powder</h4>
                                        <p class="pro-sort-desc">Our organic food products are certified organic by
                                            recognized certification agencies.</p>
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
                                        <p class="pro-box-price">₹90.00</p>
                                        <a href="" class="sp-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div> --}}



                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div id="demo-pranab">
                        <div id="owl-top-sell-two" class="owl-carousel owl-theme">
                            @forelse ($topSelling->skip(6) as $topSellingS)
                                <div class="item">
                                    <div class="product-box border-box">
                                        <div class="product-box-img">
                                            <img src="{{ asset('storage/' . $topSellingS?->productPrimaryImage?->image_path) }}"
                                                class="img-fluid">
                                        </div>
                                        <div class="product-box-ctn">
                                            <h4>{{ $topSellingS?->name }}</h4>
                                            <p class="pro-sort-desc">
                                                {{ Str::limit($topSellingS->description, 50, '...') }}.</p>
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
                                            <p class="pro-box-price">₹{{ $topSellingS?->productVariantPrice?->price }}
                                            </p>
                                            <a href="{{ route('singleProduct', $topSellingS->slug) }}"
                                                class="sp-btn">Shop
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                            {{-- <div class="item">
                                <div class="product-box border-box">
                                    <div class="product-box-img">
                                        <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="product-box-ctn">
                                        <h4>Jaggery Powder</h4>
                                        <p class="pro-sort-desc">Our organic food products are certified organic by
                                            recognized certification agencies.</p>
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
                                        <p class="pro-box-price">₹90.00</p>
                                        <a href="" class="sp-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="item">
                                <div class="product-box border-box">
                                    <div class="product-box-img">
                                        <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="product-box-ctn">
                                        <h4>Jaggery Powder</h4>
                                        <p class="pro-sort-desc">Our organic food products are certified organic by
                                            recognized certification agencies.</p>
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
                                        <p class="pro-box-price">₹90.00</p>
                                        <a href="" class="sp-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-box border-box">
                                    <div class="product-box-img">
                                        <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="product-box-ctn">
                                        <h4>Jaggery Powder</h4>
                                        <p class="pro-sort-desc">Our organic food products are certified organic by
                                            recognized certification agencies.</p>
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
                                        <p class="pro-box-price">₹90.00</p>
                                        <a href="" class="sp-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-box border-box">
                                    <div class="product-box-img">
                                        <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="product-box-ctn">
                                        <h4>Jaggery Powder</h4>
                                        <p class="pro-sort-desc">Our organic food products are certified organic by
                                            recognized certification agencies.</p>
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
                                        <p class="pro-box-price">₹90.00</p>
                                        <a href="" class="sp-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product-box border-box">
                                    <div class="product-box-img">
                                        <img src="{{ asset('frontend-asset/images/pro-img.jpg') }}" class="img-fluid">
                                    </div>
                                    <div class="product-box-ctn">
                                        <h4>Jaggery Powder</h4>
                                        <p class="pro-sort-desc">Our organic food products are certified organic by
                                            recognized certification agencies.</p>
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
                                        <p class="pro-box-price">₹90.00</p>
                                        <a href="" class="sp-btn">Shop Now</a>
                                    </div>
                                </div>
                            </div> --}}



                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a href="{{ route('products') }}" class="sp-btn-snd">view all products</a>
                </div>
            </div>

        </div>
    </section>


    <section id="about-bg-section"></section>
    <section id="welcome-section">
        <div class="container">
            <div class="row justify-content-center about-box">
                <div class="col-lg-5">
                    <h2>About Our Company</h2>
                    <p>We specialize in producing tasty, healthy, wholesome, and nutritious organic food products that
                        are dedicated to better eating for better living.</p>
                    <a href="{{ route('aboutUs') }}" class="banner-btn">know more about us</a>
                </div>
            </div>
        </div>
    </section>

    <section id="wcu-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-4">
                    <h2>Why Choose Us</h2>
                </div>
                <div class="col-lg-3">
                    <div class="category-box">
                        <img src="{{ asset('frontend-asset/images/wcu-img1.png') }}" class="img-fluid m-auto pb-4">
                        <h4>Harvested With Care</h4>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category-box">
                        <img src="{{ asset('frontend-asset/images/wcu-img2.png') }}" class="img-fluid m-auto pb-4">
                        <h4>Good Clean Green Nutrition</h4>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category-box">
                        <img src="{{ asset('frontend-asset/images/wcu-img3.png') }}" class="img-fluid m-auto pb-4">
                        <h4>Expert Approved</h4>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="category-box">
                        <img src="{{ asset('frontend-asset/images/wcu-img4.png') }}" class="img-fluid m-auto pb-4">
                        <h4>Organic Certified Nutrition</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center mt-4">
                    <a href="{{ route('aboutUs') }}" class="sp-btn-snd">Know More</a>
                </div>
            </div>
        </div>
    </section>


    <section id="line2-section"> </section>

    <section id="video-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-4">
                    <h2>Our Videos</h2>
                </div>
                <div class="col-lg-6">
                    <div class="video-box">
                        <iframe width="100%" height="320" src="https://www.youtube.com/embed/8PmM6SUn7Es"
                            title="Is Organic Really Better? Healthy Food or Trendy Scam?" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="video-box">
                        <iframe width="100%" height="320" src="https://www.youtube.com/embed/8PmM6SUn7Es"
                            title="Is Organic Really Better? Healthy Food or Trendy Scam?" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                    </div>
                </div>

            </div>
    </section>


    <section id="line-section"> </section>


    <section id="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-ctn-box">
                        <h2 class="text-center mb-4">Frequently Asked Questions</h2>
                        <div class="accordion-wrapper">
                            <div class="accordion">
                                <input type="radio" name="radio-a" id="check1">
                                <label class="accordion-label" for="check1">How to make homemade chili peanut
                                    oil?</label>
                                <div class="accordion-content">
                                    <p>Maecenas placerat lorem at odio pretium, eu pulvinar lectus sodales. Ut at libero
                                        quis lacus aliquam facilisis. Aliquam lacus velit, semper ac velit consectetur,
                                        tincidunt viverra lectus. Duis cursus ex at lorem ullamcorper ornare.</p>
                                </div>
                            </div>
                            <div class="accordion">
                                <input type="radio" name="radio-a" id="check2">
                                <label class="accordion-label" for="check2">Why 10 comfortable foods to enjoy during the
                                    rainy season?</label>
                                <div class="accordion-content">
                                    <p>Nam semper arcu ut sem pharetra, a lobortis ante aliquet. Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit. Suspendisse non ipsum lacinia, tempus augue
                                        quis, gravida velit. Ut nibh arcu, interdum at placerat eu, bibendum in mi. </p>
                                </div>
                            </div>
                            <div class="accordion">
                                <input type="radio" name="radio-a" id="check3">
                                <label class="accordion-label" for="check3">What are the esential kitchen care tips to
                                    keep your space fresh and hygenic?</label>
                                <div class="accordion-content">
                                    <p>Nam semper arcu ut sem pharetra, a lobortis ante aliquet. Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit. Suspendisse non ipsum lacinia, tempus augue
                                        quis, gravida velit. Ut nibh arcu, interdum at placerat eu, bibendum in mi</p>
                                </div>
                            </div>
                            <div class="accordion">
                                <input type="radio" name="radio-a" id="check4">
                                <label class="accordion-label" for="check4">Whole wheat flour vs regular wheat flour-
                                    what’s the healthier?</label>
                                <div class="accordion-content">
                                    <p>Nam semper arcu ut sem pharetra, a lobortis ante aliquet. Lorem ipsum dolor sit
                                        amet, consectetur adipiscing elit. Suspendisse non ipsum lacinia, tempus augue
                                        quis, gravida velit. Ut nibh arcu, interdum at placerat eu, bibendum in mi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="line2-section"> </section>
@endsection
