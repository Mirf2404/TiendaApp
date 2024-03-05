<!doctype html>
<html lang="en">
<head>
    <title>Fashion Template for Bootstrap</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Demo powered by Templatetrip">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,900" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl-carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/lightbox.css') }}" rel="stylesheet">
</head>


  <body class="index layout1">
  	
	<header class="header-area header-sticky text-center header-default">
	<div class="header-main-sticky">
	<div class="header-nav">
	<div class="container">
		<div class="nav-left float-left"><div class="ttheader-service">Wants to explore Upcoming Deals on Weekends?</div>
		</div>
		<div class="nav-right float-right d-flex">aspetur autodit autfugit
		<div class="ttheader-mail"><a href="mailto:demo.store@gmail.com">demo.store@gmail.com</a></div>
		</div>
	</div>
	</div>
	<div class="header-main-head">
	
    <div class="header-main">
	<div class="container">
           
		<div class="header-middle float-lg-left float-md-left float-sm-left float-xs-none">
				<div class="logo">
								<a href="{{asset('shop')}}"><img src="{{ asset('assets/img/logos/logo.png') }}" alt="logo" width="200" height="50" ></a>		</div>
		</div> 
		<div class="header-right d-flex d-xs-flex d-sm-flex justify-content-end float-right">
		<div class="search-wrapper"> 
			<a>
			<i class="material-icons search">search</i>
			<i class="material-icons close">close</i>			</a>
			<form autocomplete="off" action="/action_page.php" class="search-form">
			  <div class="autocomplete">
				<input id="myInput" type="text" name="myCountry" placeholder="Search here">
				<button type="button"><i class="material-icons">search</i></button>
			  </div>
			</form>
		</div>  
		<div class="user-info">
		<button type="button" class="btn">
		<i class="material-icons">perm_identity</i>		</button>
		<div id="user-dropdown" class="user-menu">
		<ul>
			<li><a href="my-account.html" class="text-capitalize">my account</a></li>
			<li><a href="#" class="modal-view button" data-toggle="modal" data-target="#modalRegisterForm">Register</a></li>
			<li><a href="#" class="modal-view button" data-toggle="modal" data-target="#modalLoginForm">login</a></li>
		</ul>
		</div>
		</div>
	
		</div>
		</div>
	</div>
	</div> 
	
		</li>
		</ul>
		<!-- Links -->
		</div>
		<!-- Collapsible content -->
		
		</nav>
	</div>
	</div>
	</div>
	</div>
	</header>
  @yield('contenido')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/parallax.js') }}"></script>
<script src="{{ asset('assets/js/lightbox-2.6.min.js') }}"></script>
<script src="{{ asset('assets/js/ResizeSensor.min.js') }}"></script>
<script src="{{ asset('assets/js/theia-sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('assets/js/inview.js') }}"></script>
<script src="{{ asset('assets/js/cookiealert.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.lazy.min.js') }}"></script>


		</body>
</html>