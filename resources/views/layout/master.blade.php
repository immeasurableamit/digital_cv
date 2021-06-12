<!DOCTYPE html>
<html>

<head>
    <title>Digital CV Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!-- plugin css -->
    <link href="{{ asset('public/assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />

    <!-- end plugin css -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/demo_1/style.css') }}">
    <!-- End layout styles -->


    @stack('plugin-styles')

    <!-- common css -->
    <link href="{{ asset('public/assets/vendors/core/core.css') }}" rel="stylesheet" />
    <!-- end common css -->

    @stack('style')
</head>

<body class="sidebar-dark">


    <div class="main-wrapper" id="app">
        @include('layout.sidebar')
        <div class="page-wrapper">
            @include('layout.header')
            <div class="page-content">
                @yield('content')
            </div>
            @include('layout.footer')
        </div>
    </div>

    <!-- base js -->
    <script src="{{ asset('public/assets/vendors/core/core.js') }}"></script>
    <script src="{{ asset('public/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <!-- end base js -->

    <!-- plugin js -->
    @stack('plugin-scripts')
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('public/assets/js/template.js') }}"></script>
    <!-- end common js -->

    @stack('custom-scripts')
    <script>
$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>

</body>

</html>
