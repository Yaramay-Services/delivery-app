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
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('WebAppTheme/public/assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('WebAppTheme/public/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('WebAppTheme/public/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('WebAppTheme/public/assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('WebAppTheme/public/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('WebAppTheme/public/assets/img/favicons/mstile-150x150.png') }}">
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

    @yield('content')

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('WebAppTheme/public/vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('WebAppTheme/public/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('WebAppTheme/public/vendors/is/is.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('WebAppTheme/public/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('WebAppTheme/public/assets/js/theme.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap" rel="stylesheet">

    {{-- Laravel Vite - JS File --}}
    {{-- {{ module_vite('build-webapp', 'Resources/assets/js/app.js') }} --}}
    @livewireScripts()
    @stack('sctips')
</body>

</html>
