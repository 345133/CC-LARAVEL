<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>Car Rental | @yield('title')</title>
<!--Bootstrap -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"  type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"  type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}"  type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}"  type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}"  type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-slider.min.css') }}"  type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
 crossorigin="anonymous" />

<link rel="stylesheet" href="{{ asset('assets/switcher/css/switcher.css') }}"  type="text/css">
<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}"  type="text/css">

<link rel="stylesheet" href="{{ asset('assets/switcher/css/red.css') }}"  type="text/css">
<link rel="stylesheet" href="{{ asset('assets/switcher/css/orange.css') }}"  type="text/css">
<link rel="stylesheet" href="{{ asset('assets/switcher/css/blue.css') }}"  type="text/css">
<link rel="stylesheet" href="{{ asset('assets/switcher/css/green.css') }}"  type="text/css">
<link rel="stylesheet" href="{{ asset('assets/switcher/css/purple.css') }}"  type="text/css">


<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="../assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="{{ asset('assets/images/favicon-icon/favicon.png') }}">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('css/rentcar.css') }}"  type="text/css">

</head>
<body>


<!-- Start Switcher -->
{{-- @include('../includes/colorswitcher') --}}
<!-- /Switcher -->


@include('../includes/rentcarheader')

@yield('content')
<!--Footer -->
@include('../includes/rentcarfooter')
<!-- /Footer-->
<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top-->

<!-- Scripts -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/interface.js') }}"></script>
<script src="{{ asset('assets/switcher/js/switcher.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-slider.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>
