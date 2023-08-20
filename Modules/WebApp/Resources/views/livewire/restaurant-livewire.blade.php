<div>
    <section id="testimonial">
        <div class="container">
            <div class="row h-100">
                <div class="col-lg-7 mx-auto text-center mb-6">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Featured Restaurants</h5>
                </div>
            </div>
            <div class="row gx-2">
                @foreach ($restaurants as $restaurant)
                    <a href="#" class="col-sm-6 col-md-4 col-lg-3 h-100 mb-5 card-restaurant rounded-2"
                        wire:click='redirectTo("{{ encrypt($restaurant->id) }}", "{{ encrypt($restaurant->distance) }}")'>
                        <div class="card card-span h-100 text-white rounded-3">

                            @foreach ($restaurant->getMedia('banner') as $item)
                                <img class="img-fluid rounded-3 h-100 m-2" src="{{ $item->getUrl() }}" alt="..." />
                            @endforeach

                            @if (!$restaurant->getMedia('banner')->first())
                                <img class="img-fluid rounded-3 h-100 m-2"
                                    src="{{ config('media-library.placeholder') }}"
                                    alt="..." />
                            @endif

                            {{-- Tag --}}
                            {{-- <div class="card-img-overlay ps-0">
                            <span class="badge bg-danger p-2 ms-3">
                                <i class="fas fa-t>ag me-2 fs-0"></i>
                                <span class="fs-0">20% off</span>
                            </span>
                            <span class="badge bg-primary ms-2 me-1 p-2">
                                <i class="fas fa-clock me-1 fs-0"></i>
                                <span class="fs-0">Fast</span>
                            </span>
                        </div> --}}
                            <div class="card-body p-2">
                                <div class="d-flex align-items-center mb-3">
                                    @foreach ($restaurant->getMedia('logo') as $item)
                                        <img class="img-fluid" width="64" height="64" src="{{ $item->getUrl() }}"
                                            alt="" />
                                    @endforeach

                                    @if (!$restaurant->getMedia('logo')->first())
                                        <img class="img-fluid" width="64" height="64"
                                            src="{{ config('media-library.placeholder') }}"
                                            alt="..." />
                                    @endif

                                    <div class="flex-1 ms-3">
                                        <h5 class="mb-0 fw-bold text-1000">{{ $restaurant->business_name }}</h5>
                                        {{-- <span class="text-primary fs--1 me-1">
                                            <i class="fas fa-star"></i>
                                        </span>
                                        <span class="mb-0 text-primary">46</span> --}}
                                    </div>
                                </div>
                                <span class="badge bg-soft-danger p-2">
                                    @foreach ($restaurant->openingHour as $opening)
                                        <span class="fw-bold fs-1 text-danger">
                                            {{ $opening->day }}
                                            {{ $opening->opening }} - {{ $opening->closing }}
                                        </span>
                                    @endforeach
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
</div>

<style scoped>
    .card-restaurant:hover {
        box-shadow: 1px 1px 10px 0px #dc3545;
    }

    .card-restaurant:active {
        box-shadow: 1px 1px 18px 0px #dc3545;
    }
</style>
