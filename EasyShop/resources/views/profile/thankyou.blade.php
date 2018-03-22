<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your Order Has Successfully Placed">
    <meta name="author" content="Marvin Marzon">
    <title>Thank You | Tingson Furniture</title>
    <link href="{{ asset('theme/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('theme/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('theme/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('theme/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('theme/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('theme/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('theme/images/ico/apple-touch-icon-57-precomposed.png') }}">
</head><!--/head-->

<body>
	<div class="container text-center">
		<div class="logo-404">
			<a href="{{ url('/') }}"><img src="{{ asset('theme/images/home/logo.png') }}" alt="Back To Homepage | Tingson Furniture" /></a>
		</div>
		<div class="content-404">
			<h1><b>{{Auth::user()->name}},</b> Your Order Has Been Placed.</h1>
			<h1><a class="btn btn-primary" href="{{ url('/orders') }}">Go To MY ORDERS</a></h2>
		</div>
	</div>

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>