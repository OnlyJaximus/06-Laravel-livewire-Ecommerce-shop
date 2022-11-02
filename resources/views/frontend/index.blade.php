@extends('layouts.app')

@section('title', 'Home Page')

{{-- First Page --}}
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

        <div class="carousel-inner">

            @foreach ($sliders as $key => $slider_item)
                <div class="carousel-item {{ $key == '0' ? 'active' : '' }}">
                    @if ($slider_item->image)
                        {{-- class="d-block w-100" --}}
                        <img src="{{ asset("$slider_item->image") }}"class="d-block w-100">
                    @endif

                    {{-- <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $slider_item->title }}</h5>
                        <p>{{ $slider_item->description }}</p>
                    </div> --}}

                    <div class="carousel-caption d-none d-md-block">
                        <div class="custom-carousel-content">
                            <h1>
                                {{ $slider_item->title }}
                            </h1>
                            <p>
                                {{ $slider_item->description }}
                            </p>
                            <div>
                                <a href="#" class="btn btn-slider">
                                    Get Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome to Blex of Web IT E-Commerce</h4>
                    <div class="underline mx-auto"></div>
                    <p>Browse & discover millions of products. Read customer reviews and find best sellers. We ship to over
                        100 international destinations, right to your doorstep. eShop has the lowest selling fee in the
                        world for all our sellers. 1% fee on all item sold making us the marketplace with the lowest fee for
                        online sellers. Earum at fugit omnis sint blanditiis
                        reiciendis eos doloribus, sit nostrum provident? Reiciendis, nesciunt pariatur! Quaerat cupiditate
                        dolore illo asperiores esse deleniti vitae, expedita perspiciatis? Commodi aut libero repudiandae
                        in quod soluta magnam,We respect our customer by not collecting every bit of data about you since
                        thats not the world we want to live in or create.</p>
                </div>
            </div>
        </div>
    </div>


    {{-- Trending Products --}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Trending Products

                    </h4>
                    <div class="underline mb-4"></div>
                </div>


                @if ($trendingProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($trendingProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger">New</label>

                                            @if ($productItem->productImages->count() > 0)
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{ $productItem->selling_price }}</span>
                                                <span class="original-price">${{ $productItem->original_price }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Avaiable</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>


    {{-- New Arruvals Products --}}
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>New Arrivals
                        <a href="{{ url('/new-arrivals') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline mb-4"></div>
                </div>


                @if ($trendingProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($newArrivalsProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger">New</label>

                                            @if ($productItem->productImages->count() > 0)
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{ $productItem->selling_price }}</span>
                                                <span class="original-price">${{ $productItem->original_price }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No New Arrivals Avaiable</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>



    {{-- Featured Products --}}
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Featured Products
                        <a href="{{ url('/featured-products') }}" class="btn btn-warning float-end">View More</a>
                    </h4>
                    <div class="underline mb-4"></div>
                </div>


                @if ($featuredProducts)
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme four-carousel">
                            @foreach ($featuredProducts as $productItem)
                                <div class="item">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <label class="stock bg-danger">New</label>

                                            @if ($productItem->productImages->count() > 0)
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    <img src="{{ asset($productItem->productImages[0]->image) }}"
                                                        alt="{{ $productItem->name }}">
                                                </a>
                                            @endif
                                        </div>
                                        <div class="product-card-body">
                                            <p class="product-brand">{{ $productItem->brand }}</p>
                                            <h5 class="product-name">
                                                <a
                                                    href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                    {{ $productItem->name }}
                                                </a>
                                            </h5>
                                            <div>
                                                <span class="selling-price">${{ $productItem->selling_price }}</span>
                                                <span class="original-price">${{ $productItem->original_price }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Featured Products Avaiable</h4>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.four-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {

                // mobile
                0: {
                    items: 1
                },

                //tablet
                600: {
                    items: 3
                },
                //laptop/desktop
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
