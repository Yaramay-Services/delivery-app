<div>
    <section class="py-5 overflow-hidden bg-primary" id="home">
        <div class="container">
            <div class="row flex-center">
                <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner"
                        href="#!"><img class="img-fluid" src="/WebAppTheme/public/assets/img/gallery/hero-header.png"
                            alt="hero-header" /></a></div>
                <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
                    <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">Are you starving?</h1>
                    <h1 class="text-800 mb-5 fs-4">Within a few clicks, find meals that<br
                            class="d-none d-xxl-block" />are accessible near you</h1>
                    <div class="card w-xxl-75">
                        <div class="card-body">

                            <div class="d-flex">

                                <button class="btn btn-danger w-100" type="button" wire:click='findFood()'>Find Food</button>
                            </div>
                            <div class="mt-2" wire:ignore>
                                <div id="map" style="widows: 200px; height: 200px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>

    <script src="https://unpkg.com/@mapbox/mapbox-sdk/umd/mapbox-sdk.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            }

            function showPosition(position) {
                mapboxgl.accessToken =
                    'pk.eyJ1IjoicmVuaWVyLXRyZW51ZWxhIiwiYSI6ImNrZHhya2l3aTE3OG0ycnBpOWxlYjV3czUifQ.4hVvT7_fiVshoSa9P3uAew';

                const map = new mapboxgl.Map({
                    container: 'map',
                    // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
                    style: 'mapbox://styles/mapbox/streets-v12',
                    center: [position.coords.longitude, position.coords.latitude],
                    zoom: 14
                });

                @this.set('latitude', position.coords.latitude)
                @this.set('longitude', position.coords.longitude)

                // Create a default Marker and add it to the map.
                const marker1 = new mapboxgl.Marker()
                    .setLngLat([position.coords.longitude, position.coords.latitude])
                    .addTo(map);

                map.on('click', (e) => {
                    marker1.setLngLat([e.lngLat.wrap().lng, e.lngLat.wrap().lat])
                    @this.set('latitude', e.lngLat.wrap().lat)
                    @this.set('longitude', e.lngLat.wrap().lng)
                });
            }

            getLocation()
        })
    </script>
@endpush
