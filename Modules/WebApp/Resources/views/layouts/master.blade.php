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
    <link href="{{ asset('WebAppTheme/public/vendors/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('WebAppTheme/public/assets/css/theme-footer.css') }}" rel="stylesheet" />
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


    <footer id="footer">
    <div class="footer-top">
        <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
            <div class="footer-info">
                <h3>Mappiya</h3>
                <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
                </p>
                <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                </div>
            </div>
            </div>

            <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
                <li>
                <i class="bx bx-chevron-right"></i> <a href="#">Home</a>
                </li>
                <li>
                <i class="bx bx-chevron-right"></i> <a href="#">About us</a>
                </li>
                <li>
                <i class="bx bx-chevron-right"></i> <a href="#">Services</a>
                </li>
                <li>
                <i class="bx bx-chevron-right"></i>
                <a href="#">Terms of service</a>
                </li>
                <li>
                <i class="bx bx-chevron-right"></i>
                <a href="#">Privacy policy</a>
                </li>
            </ul>
            </div>

            <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
                <li>
                <i class="bx bx-chevron-right"></i> <a href="#">Web Design</a>
                </li>
                <li>
                <i class="bx bx-chevron-right"></i>
                <a href="#">Web Development</a>
                </li>
                <li>
                <i class="bx bx-chevron-right"></i>
                <a href="#">Product Management</a>
                </li>
                <li>
                <i class="bx bx-chevron-right"></i> <a href="#">Marketing</a>
                </li>
                <li>
                <i class="bx bx-chevron-right"></i>
                <a href="#">Graphic Design</a>
                </li>
            </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>
                Tamen quem nulla quae legam multos aute sint culpa legam noster
                magna
            </p>
            <form action="" method="post">
                <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
            </div>
        </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
        © Copyright <strong><span>Yaramay</span></strong>. All Rights Reserved
        </div>
        <div class="credits">Designed by <a href="#!">YARAMAY DEV, {{ now()->format('Y') }}</a></div>
    </div>
    </footer>
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
