<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>

     @yield('before-styles')
        <link rel="stylesheet" href="{{ url('css/animate.css')}}">
        <link rel="stylesheet" href="{{ url('css/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{ url('css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{ url('css/flexslider.css')}}">
        <link rel="stylesheet" href="{{ url('css/chosen.min.css')}}">
		<link rel="stylesheet" href="{{ url('css/style.css')}}">
        <link rel="stylesheet" href="{{ url('css/responsive.css')}}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/
        <script src="{{ url('js/vendor/modernizr-2.8.3.min.js')}}"></script>
    @yield('after-styles')
</head>
<body>
@include('user.layouts.header')
@yield('content')
@include('user.layouts.footer')
@yield('before-scripts')
        <script src="{{ url('js/vendor/jquery-1.12.0.min.js')}}"></script>
        <script src="{{ url('js/bootstrap.min.js')}}"></script>
        <script src="{{ url('js/owl.carousel.min.js')}}"></script>
        <script src="{{ url('js/jquery.meanmenu.js')}}"></script>
        <script src="{{ url('js/wow.min.js')}}"></script>
        <script src="{{ url('js/jquery.parallax-1.1.3.js')}}"></script>
        <script src="{{ url('js/jquery.countdown.min.js')}}"></script>
        <script src="{{ url('js/jquery.flexslider.js')}}"></script>
        <script src="{{ url('js/chosen.jquery.min.js')}}"></script>
        <script src="{{ url('js/jquery.counterup.min.js')}}"></script>
        <script src="{{ url('js/waypoints.min.js')}}"></script>
        <script src="{{ url('js/plugins.js')}}"></script>
        <script>
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        </script>
@yield('after-scripts')
</body>
</html>