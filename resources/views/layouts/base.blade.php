<!doctype html>
<html lang="en">

<head>
    <title>@yield('title') | UPICON Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description"
        content="{{ config('variables.description') ?? '' }}" />
    <meta name="keywords" content="{{ config('variables.keywords') ?? '' }}">
    <!-- Include Styles -->
    @include('layouts/sections/styles')

    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
    </style>

    @yield('style')
</head>

<body id="page-top">
    @yield('layoutContent')
    <!-- Include Scripts -->
    @include('layouts/sections/scripts/base-scripts')

    @yield('script')
</body>

</html>
