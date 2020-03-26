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
        <script src="{{ url('js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    @yield('after-styles')
</head>
<body>
@include('user.layouts.header')
@yield('content')
@include('user.layouts.footer')
@yield('before-scripts')
 <!-- Modal end -->
		<!-- all js here -->
        <!-- jquery latest version -->
        <script src="{{ url('js/vendor/jquery-1.12.0.min.js')}}"></script>
		<!-- bootstrap js -->
        <script src="{{ url('js/bootstrap.min.js')}}"></script>
		<!-- owl.carousel js -->
        <script src="{{ url('js/owl.carousel.min.js')}}"></script>
		<!-- meanmenu js -->
        <script src="{{ url('js/jquery.meanmenu.js')}}"></script>
		<!-- wow js -->
        <script src="{{ url('js/wow.min.js')}}"></script>
		<!-- jquery.parallax-1.1.3.js -->
        <script src="{{ url('js/jquery.parallax-1.1.3.js')}}"></script>
		<!-- jquery.countdown.min.js -->
        <script src="{{ url('js/jquery.countdown.min.js')}}"></script>
		<!-- jquery.flexslider.js -->
        <script src="{{ url('js/jquery.flexslider.js')}}"></script>
		<!-- chosen.jquery.min.js -->
        <script src="{{ url('js/chosen.jquery.min.js')}}"></script>
		<!-- jquery.counterup.min.js -->
        <script src="{{ url('js/jquery.counterup.min.js')}}"></script>
		<!-- waypoints.min.js -->
        <script src="{{ url('js/waypoints.min.js')}}"></script>
		<!-- plugins js -->
        <script src="{{ url('js/plugins.js')}}"></script>
		<!-- main js -->
        <script src="{{ url('js/main.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
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