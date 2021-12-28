@extends('layouts.catering_app')
@section('title')
    Home
@endsection
@section('body')
    <!-- Banner part start -->
    <section class="banner-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <h4>Catering </h4>
                        <h1 class="banner-title">for Special Corporate Events</h1>
                        <p class="paragraph pe-lg-5 my-3">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its
                        layout. The point of using Lorem Ipsum</p>
                        <div class="readmore mt-lg-4 mt-md-4 mt-sm-2">
                            <a class="readmore-btn" href="{{ route('planing.event') }}">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 banner-img">
                    <img class="mx-auto d-block img-fluid" src="assets/img/photos/delivery-car.png" alt="banner-img">
                </div>
            </div>
        </div>
    </section>
    <!-- Banner part end -->

    <!-- Service tools part start -->
    <section class="service-tools my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 my-sm-3 my-lg-5">
                    <div class="d-flex align-items-center service-item">
                        <div class="flex-shrink-0 phone-img">
                            <img class="img-fluid" src="assets/img/icon/phone.png" alt="phone">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h4>Choose and Order</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 my-sm-3 my-lg-5">
                    <div class="d-flex align-items-center service-item">
                        <div class="flex-shrink-0 car-img">
                            <img class="img-fluid" src="assets/img/icon/car.png" alt="phone">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h4>Fasted Delivery</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 my-sm-3 my-lg-5">
                    <div class="d-flex align-items-center service-item">
                        <div class="flex-shrink-0 barger-img">
                            <img class="img-fluid" src="assets/img/icon/barger.png" alt="phone">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h4>Fresh & Delicious</h4>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service tools part end -->

    <!-- SPECIAL CATERING START  -->
    <section class="special-catering">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-sm-3 mb-lg-5 foods">
                    <h4>Choose Your</h4>
                    <h2 class="section-header">Special catering Goods</h2>
                    <ul class="d-flex justify-content-center nav nav-tabs" id="myTab" role="tablist">
                        <li role="presentation">
                            <button class="active" id="allfoods-tab" data-bs-toggle="tab" data-bs-target="#allfoods" type="button" role="tab" aria-controls="allfoods" aria-selected="true">All Foods</button>
                            <img src="assets/img/photos/arrow.png" alt="arrow">
                        </li>
                        @foreach ($categories as $category)
                            <li role="presentation">
                                <button id="food{{ $category->id }}-tab" data-bs-toggle="tab" data-bs-target="#food{{ $category->id }}" type="button" role="tab" aria-controls="food{{ $category->id }}" aria-selected="true">{{ $category->name }}</button>
                                <img src="assets/img/photos/arrow.png" alt="arrow">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="allfoods" role="tabpanel" aria-labelledby="allfoods-tab">
                    <div class="row foodplay">
                        @foreach ($foods as $food)
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 text-center mb-sm-3 mb-lg-5 food-item">
                                <div class="catering-item">
                                    <div class="offer">
                                        <img class="mx-auto d-block" src="{{ asset('assets/img/food/') }}/{{ $food->image }}" alt="catering-img">
                                        @if ($food->discount)
                                            <div class="discount">
                                                <h4>{{ $food->discount }}% Off</h4>
                                            </div>
                                        @endif
                                    </div>
                                    <h4>{{ $food->title }}</h4>
                                    <p class="paragraph pt-2 ps-2 pe-2">{{ $food->short_description }}</p>
                                    <h4 class="price">SAR {{ $food->price }}</h4>
                                    <div class="add-cart mt-3 mb-5">
                                        <button class="custom-btn product_id" data-id={{  $food->id }} href="#">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @empty($food)
                            <p class="text-danger">Nothing to show foods...</p>
                        @endempty
                    </div>
                </div>
                @foreach ($categories as $category)
                    <div class="tab-pane fade" id="food{{ $category->id }}" role="tabpanel" aria-labelledby="food{{ $category->id }}-tab">
                        <div class="row justify-content-center">
                            @foreach (App\Models\Food::where('category_id', $category->id)->inRandomOrder()->limit(4)->get() as $food)
                                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 text-center mb-sm-3 mb-lg-5 food-item">
                                    <div class="catering-item">
                                        <div class="offer">
                                            <img class="mx-auto d-block" src="{{ asset('assets/img/food/') }}/{{ $food->image }}" alt="catering-img">
                                            @if ($food->discount)
                                                <div class="discount">
                                                    <h4>{{ $food->discount }}% Off</h4>
                                                </div>
                                            @endif
                                        </div>
                                        <h4>{{ $food->title }}</h4>
                                        <p class="paragraph pt-2 ps-2 pe-2">{{ $food->short_description }}</p>
                                        <h4 class="price">SAR {{ $food->price }}</h4>
                                        <div class="add-cart mt-3 mb-5">
                                            <button class="custom-btn product_id" data-id="{{ $food->id }}">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @empty($food)
                                <p class="text-danger">Nothing to show foods...</p>
                            @endempty
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- SPECIAL CATERING END  -->

    <!-- DESCOUNT BANNER STAR -->
    <section class="discount-banner mb-sm-3 mb-lg-5">
        <div class="container-fluid">
            <div class="banner-img">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-sm-3 mt-lg-5">
                            <h4 class="mb-3 mt-5">Take a Chance</h4>
                            <h3>40% Discount for First Order</h3>
                            <h3>Or</h3>
                            <h3>Discuss your project</h3>
                            <div class="add-cart mt-5 mb-5">
                                <button class="custom-btn" href="">Send us request</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- DESCOUNT BANNER END -->

    <!-- PRICE PLAN START -->
    <section class="price-plan my-sm-3 my-lg-5">
        <div class="container text-center my-5">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h4>Choose Your</h4>
                    <h2 class="section-header after-before">Catering Price plan</h2>
                    <div class="after-design">
                        <i class="fas fa-circle"></i>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                @foreach ($packages as $package)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="package">
                            <div class="card text-center my-4">
                                <div class="card-header price-plan-img p-0" style="background-image: url({{ asset('assets/img/food/') }}/{{ $package->image }});">
                                    <div class="package-pricing">
                                        <h4 class="">{{ $package->name }}</h4>
                                        <h3 class="section-header">$ {{ $package->price }}/<span>{{ $package->time }}</span> </h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @foreach (App\Models\PackageItems::where('package_id', $package->id)->get() as $package_items)
                                        <p class="paragraph mt-3"> {{ $package_items->items }} </p>
                                    @endforeach
                                </div>
                                <div class="card-footer py-3">
                                    <a class="package_id" data-id="{{ $package->id }}" href="#">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="add-cart mt-4">
                    <a class="custom-btn" href="{{ route('price.plan') }}">Show More Plans</a>
                </div>
            </div>
        </div>
    </section>
    <!-- PRICE PLAN END -->

    <!-- PLANING AND EVENT START -->
    <section class="planing-events my-4">
        <div class="container py-lg-5">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center heading">
                    <h4>Our Services</h4>
                    <h2 class="section-header">Planing & Event</h2>
                    <h3 class="after-before">Management</h3>
                    <div class="after-design">
                        <i class="fas fa-circle"></i>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 align-self-center mb-4">
                    <img src="assets/img/photos/planning-and-event.png" alt="event">
                </div>
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                    <div class="row events">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <h2 class="section-header"> 01 </h2>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="mb-4">Wedding Events</h4>
                                    <p>It is a long established fact that a reader will be distracted.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <h2 class="section-header"> 02 </h2>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="mb-4">Picnic Events</h4>
                                    <p>It is a long established fact that a reader will be distracted.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 active mb-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <h2 class="section-header"> 03 </h2>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="mb-4">Corporate Programs</h4>
                                    <p>It is a long established fact that a reader will be distracted.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <h2 class="section-header"> 04 </h2>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="mb-4">Festival Programs</h4>
                                    <p>It is a long established fact that a reader will be distracted.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mb-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <h2 class="section-header"> 05 </h2>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="mb-4">Private Programs</h4>
                                    <p>It is a long established fact that a reader will be distracted.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <h2 class="section-header"> 06 </h2>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h4 class="mb-4">Social Events</h4>
                                    <p>It is a long established fact that a reader will be distracted.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PLANING AND EVENT END -->

    <!-- ABOUT US START  -->
    <section class="about-us mb-5">
        <div class="container pb-sm-2 pb-lg-4">
            <div class="row text-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-lg-5">
                    <h4>about us</h4>
                    <h2 class="section-header after-before">how is our service?</h2>
                    <div class="after-design">
                        <i class="fas fa-circle"></i>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                    <h6>Make easy life</h6>
                    <h3 class="pe-4">Use Cater Incubator, Be Relax</h3>
                    <p class="paragraph mt-3 mb-lg-5 pe-lg-5">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
                    by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of
                    Lorem Ipsum.</p>
                    <div class="readmore">
                        <a class="readmore-btn" href="login.html">Now Join Us</a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 align-self-center">
                    <img class="img-fluid" src="assets/img/photos/about-us.png" alt="event">
                </div>
            </div>
        </div>
    </section>
    <!-- ABOUT US END  -->

    <!-- NEWSLATTER PART START -->
    @include('catering_components.newslatter')
    <!-- NEWSLATTER PART END -->

    <!-- TESTIMONIAL PART START -->
    <div class="testimonial-part my-lg-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-5">
                    <h4>Testimonial</h4>
                    <h2 class="section-header after-before">Clients Satisfaction</h2>
                    <div class="after-design">
                        <i class="fas fa-circle"></i>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 text-center">
                    <div class="testimonial-slider">
                        <div class="slider-item">
                            <img src="assets/img/icon/testimonial-coma.png" alt="coma">
                            <p class="paragraph py-4">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
                            by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of
                            Lorem Ipsum.</p>
                            <div class="review-img">
                                <img class="rounded-circle left ps-3 pe-3" src="assets/img/users/review-img2.png" alt="review-img">
                                <img class="rounded-circle middle ps-3 pe-3" src="assets/img/users/review-img1.png" alt="review-img">
                                <img class="rounded-circle right ps-3 pe-3" src="assets/img/users/review-img3.png" alt="review-img">
                            </div>
                            <h4 class="pt-3">Mohammed Nur Al-Amin</h4>
                            <p class="paragraph">CEO & Founder, Java-IT</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- TESTIMONIAL PART END -->

    <!-- LATEST BLOG START -->
    @include('catering_components.latest_blog')
    <!-- LATEST BLOG END -->
@endsection
@section('footer_script')
@endsection




