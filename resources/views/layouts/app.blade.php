<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>UPICON Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/Nunito.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    @include('layouts/sections/styles')
    @yield('styles')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('layouts/sections/navbar/dashboard-side-navbar')

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('layouts/sections/navbar/dashboard-upper-navbar')

                @yield('content')

            </div>


            @include('layouts/sections/footer/dashboard-footer')

        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    @include('layouts/sections/scripts/base-scripts')
    <script src="{{ asset('assets/js/bs-init.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
</body>

</html>
