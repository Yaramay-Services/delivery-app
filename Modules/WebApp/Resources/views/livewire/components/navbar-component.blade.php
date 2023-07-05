<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
            <a class="navbar-brand d-inline-flex" href="{{ route('webapp') }}">
                <img class="d-inline-block"
                    src="/WebAppTheme/public/assets/img/gallery/logo.svg" alt="logo" />
                    <span class="text-1000 fs-3 fw-bold ms-2 text-gradient">
                        Mappiya
                    </span>
                </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon">
                </span></button>
            <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">
                {{-- <div class="mx-auto pt-5 pt-lg-0 d-block d-lg-none d-xl-block">
                    <p class="mb-0 fw-bold text-lg-center">Deliver to: <i
                            class="fas fa-map-marker-alt text-warning mx-2"></i>
                        <span class="fw-normal">Current Location</span>
                        <span id="current-location">Mirpur 1 Bus Stand, Dhaka</span>
                    </p>
                </div> --}}
                {{-- <form class="d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0">
                    <div class="input-group-icon pe-2"><i class="fas fa-search input-box-icon text-primary"></i>
                        <input class="form-control border-0 input-box bg-100" type="search" placeholder="Search Food"
                            aria-label="Search" />
                    </div>
                </form> --}}
            </div>
        </div>
    </nav>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var x = document.getElementById("current-location");

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
            }

            function showPosition(position) {
                @this.set('latitude', position.coords.latitude)
                @this.set('longitude', position.coords.longitude)
            }
            getLocation()
        })
    </script>
@endpush
