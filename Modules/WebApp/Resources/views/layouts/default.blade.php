<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('WebAppTheme/public/assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('WebAppTheme/public/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('WebAppTheme/public/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('WebAppTheme/public/assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('WebAppTheme/public/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage"
        content="{{ asset('WebAppTheme/public/assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('WebAppTheme/public/assets/css/theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/fontawesome-free6/css/all.min.css') }}" rel="stylesheet" />

    {{-- Laravel Vite - CSS File --}}
    {{-- {{ module_vite('build-webapp', 'Resources/assets/sass/app.scss') }} --}}
    @stack('css')
    @livewireStyles()
</head>

<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <livewire:webapp::components.navbar-component>

        {{ $slot }}

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-0 pt-7 bg-1000">

            <div class="container">
                <hr class="border border-800" />
                <div class="row flex-center pb-3">
                    <div class="col-md-6 order-0">
                        <p class="text-200 text-center text-md-start">All rights Reserved &copy; Yaramay, {{ now()->format('Y') }}</p>
                    </div>
                    <div class="col-md-6 order-1">
                        <p class="text-200 text-center text-md-end"> Made with&nbsp;
                            <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="15"
                                height="15" fill="#FFB30E" viewBox="0 0 16 16">
                                <path
                                    d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z">
                                </path>
                            </svg>&nbsp;by&nbsp;<a class="text-200 fw-bold" href="https://themewagon.com/"
                                target="_blank">ThemeWagon </a>
                        </p>
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('WebAppTheme/public/vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('WebAppTheme/public/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('WebAppTheme/public/vendors/is/is.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('WebAppTheme/public/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('WebAppTheme/public/assets/js/theme.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap"
        rel="stylesheet">

    {{-- Laravel Vite - JS File --}}
    {{-- {{ module_vite('build-webapp', 'Resources/assets/js/app.js') }} --}}
    @livewireScripts()
    @stack('scripts')
</body>

</html>
