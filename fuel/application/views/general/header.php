<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Medicspot</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" href="assets/favicon/favicon.ico">
		<link rel="icon" href="assets/favicon/favicon.png" sizes="192x192">
		<link rel="apple-touch-icon" href="assets/favicon/apple-touch-icon.png">
		
		<link rel="stylesheet" href="<?php echo base_url('assets/css/site.normalize.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/site.main.css');?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/site.booking.css');?>">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css"/>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<script src="<?php echo base_url('assets/js/site.main.js');?>" defer></script>
		<script src="<?php echo base_url('assets/js/moment-with-locales.js');?>"></script>

		<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAPpH4FGQaj_JIJOViHAeHGAjl7RDeW8OQ&callback=initMap" async defer></script>

	</head>
	
	<body>
		<header id="page-header">
			<div class="container">
				<div class="page-header-wrapper">
					<a href="/" class="page-logo" title="Medicspot">Medicspot</a>
					<nav class="nav-main">
						<div class="mobile-menu-header">
							<a href="/" class="page-logo" title="Medicspot">Medicspot</a>
							<button id="close-menu" title="Close Menu">
								<i class="fa fa-times"></i>
							</button>
						</div>
						<a href="/" class="active">Home</a>
						<a href="pricing">Pricing</a>
						<a href="how-it-works">How it works</a>
						<a href="establishment">Our clinics</a>
					</nav>
					<button id="show-menu" title="Show Menu">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
		</header>