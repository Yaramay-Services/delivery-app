@extends('webapp::layouts.master')

@section('content')

<livewire:webapp::components.hero-component />

<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-0 bg-primary-gradient">

    <div class="container">
        <div class="row justify-content-center g-0">
            <div class="col-xl-9">
                <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
                    <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">How does it work</h5>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-3 mb-6">
                        <div class="text-center"><img class="shadow-icon"
                                src="/WebAppTheme/public/assets/img/gallery/location.png" height="112"
                                alt="..." />
                            <h5 class="mt-4 fw-bold">Select location</h5>
                            <p class="mb-md-0">Choose the location where your food will be delivered.</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-6">
                        <div class="text-center"><img class="shadow-icon"
                                src="/WebAppTheme/public/assets/img/gallery/order.png" height="112"
                                alt="..." />
                            <h5 class="mt-4 fw-bold">Choose order</h5>
                            <p class="mb-md-0">Check over hundreds of menus to pick your favorite food</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-6">
                        <div class="text-center"><img class="shadow-icon"
                                src="/WebAppTheme/public/assets/img/gallery/pay.png" height="112"
                                alt="..." />
                            <h5 class="mt-4 fw-bold">Pay advanced</h5>
                            <p class="mb-md-0">It's quick, safe, and simple. Select several methods of payment</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 mb-6">
                        <div class="text-center"><img class="shadow-icon"
                                src="/WebAppTheme/public/assets/img/gallery/meals.png" height="112"
                                alt="..." />
                            <h5 class="mt-4 fw-bold">Enjoy meals</h5>
                            <p class="mb-md-0">Food is made and delivered directly to your home.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->



<!-- ============================================-->
<!-- <section> begin ============================-->
<section class="py-8 overflow-hidden">

    <div class="container">
        <div class="row flex-center mb-6">
            <div class="col-lg-7">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm text-center text-lg-start">Search by Food</h5>
            </div>
            <div class="col-lg-4 text-lg-end text-center"><a class="btn btn-lg text-800 me-2" href="#"
                    role="button">VIEW ALL <i class="fas fa-chevron-right ms-2"></i></a></div>
            <div class="col-lg-auto position-relative">
                <button class="carousel-control-prev s-icon-prev carousel-icon" type="button"
                    data-bs-target="#carouselSearchByFood" data-bs-slide="prev"><span
                        class="carousel-control-prev-icon hover-top-shadow" aria-hidden="true"></span><span
                        class="visually-hidden">Previous</span></button>
                <button class="carousel-control-next s-icon-next carousel-icon" type="button"
                    data-bs-target="#carouselSearchByFood" data-bs-slide="next"><span
                        class="carousel-control-next-icon hover-top-shadow" aria-hidden="true"></span><span
                        class="visually-hidden">Next</span></button>
            </div>
        </div>
        <div class="row flex-center">
            <div class="col-12">
                <div class="carousel slide" id="carouselSearchByFood" data-bs-touch="false"
                    data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <div class="row h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/search-pizza.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">pizza</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/burger.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Burger
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/noodles.png"
                                            alt="..." />
                                        <div cl
                                        <h3>The <code>RestaurantLivewire</code> livewire component is loaded from the <code>WebApp</code> module.</h3>ass="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Noodles
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/sub-sandwich.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">
                                                Sub-sandwiches</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/chowmein.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Chowmein
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/steak.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Steak</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="5000">
                            <div class="row h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/search-pizza.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">pizza</h5>
                                        </div>
                                    </div>
                                    <h3>The <code>RestaurantLivewire</code> livewire component is loaded from the <code>WebApp</code> module.</h3>"card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/burger.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Burger
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/noodles.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Noodles
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/sub-sandwich.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">
                                                Sub-sandwiches</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/chowmein.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Chowmein
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/steak.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Steak</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="3000">
                            <div class="row h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/search-pizza.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">pizza</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/burger.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Burger
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/noodles.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Noodles
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/sub-sandwich.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">
                                                Sub-sandwiches</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/chowmein.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Chowmein
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/steak.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Steak</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row h-100 align-items-center">
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/search-pizza.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">pizza</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/burger.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Burger
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/noodles.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Noodles
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/sub-sandwich.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">
                                                Sub-sandwiches</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/chowmein.png"
                                            alt="..." />
                                        <div class
                                        <h3>The <code>RestaurantLivewire</code> livewire component is loaded from the <code>WebApp</code> module.</h3>="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Chowmein
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                    <div class="card card-span h-100 rounded-circle"><img
                                            class="img-fluid rounded-circle h-100"
                                            src="/WebAppTheme/public/assets/img/gallery/steak.png"
                                            alt="..." />
                                        <div class="card-body ps-0">
                                            <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Steak</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- end of .container-->

</section>
<!-- <section> close ============================-->
<!-- ============================================-->

<section class="py-0">
    <div class="bg-holder"
        style="background-image:url(/WebAppTheme/public/assets/img/gallery/cta-two-bg.png);background-position:center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <div class="row flex-center">
            <div class="col-xxl-9 py-7 text-center">
                <h1 class="fw-bold mb-4 text-white fs-6">Are you ready to order <br />with the best deals? </h1><a
                    class="btn btn-danger" href="#"> PROCEED TO ORDER<i
                        class="fas fa-chevron-right ms-2"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection
