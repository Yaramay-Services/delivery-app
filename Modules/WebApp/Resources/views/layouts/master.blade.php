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
        href="{{ asset('WebAppTheme/public/img/favicons/favicon-mappiya-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('WebAppTheme/public/img/favicons/favicon-mappiya-logo-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon"
        href="{{ asset('WebAppTheme/public/assets/img/favicons/mappiya-logo.png') }}">
    <link rel="manifest" href="{{ asset('WebAppTheme/public/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage"
        content="{{ asset('WebAppTheme/public/assets/img/favicons/mappiya-logo.png') }}">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('WebAppTheme/public/assets/css/theme.css') }}" rel="stylesheet" />

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

        @yield('content')

        <!-- ============================================-->
        <!-- <section> begin ============================-->

            <section class="py-0 pt-1 bg-1000">
                <div class="container">
                    <hr class="border border-800" />
                    <div class="row flex-center pb-3">
                        <div class="col-md-6 order-0">
                            <p class="text-200 text-center text-md-start">All rights Reserved &copy; Yaramay, {{ now()->format('Y') }}</p>
                        </div>
                        <div class="col-md-6 order-1">
                            
                        </div>
                    </div>
                </div>
                <!-- end of .container-->
            </section>
        </div>
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
