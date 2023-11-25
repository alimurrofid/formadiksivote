<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/logo-formadiksi.png') }} " type="image/png" />
    <title>@yield('title') - Formadiksi Polinema</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/e5c96fca62.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/input.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body class="overflow-x-hidden bg-white dark:bg-neutral-900">
    @include('user.partials.usernavbar')

    @yield('usercontent')
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    <!-- JS Libraries -->
    @include('sweetalert::alert')
    @stack('customJS')
</body>

</html>
