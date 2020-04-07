<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
     @yield('before-styles')
     <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
     <link href="{{url('css/styles.css')}}" rel="stylesheet">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
     <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    @yield('after-styles')
</head>
<body>
    @include('admin.layouts.header')
    @yield('content')
    <script src="{{url('js/jquery-1.11.1.min.js')}}"></script>
	<script src="{{url('js/bootstrap.min.js')}}"></script>
    <script src="{{url('js/custom.js')}}"></script>
    <script src="{{url('js/admin.js')}}"></script>
</body>
</html>