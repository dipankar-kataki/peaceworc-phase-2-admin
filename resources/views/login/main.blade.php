<!DOCTYPE html>
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
	<head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Peaceworc Admin Panel">
		<meta name="Author" content="Ekodus Technologies Private Limited">
		<!-- Title -->
		<title> Login -  Peaceworc </title>

		<!--- Favicon -->
		<link rel="icon" href="{{asset('assets/img/brand/peaceworc-favicon.png')}}" type="image/x-icon"/>

		<!--- Icons css -->
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

		
		<!--- Right-sidemenu css -->
		<link href="{{asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

		<!--- Custom Scroll bar -->
		<link href="{{asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

		<!--- Style css -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet">

		<!--- Sidemenu css -->
		<link href="{{asset('assets/css/sidemenu.css')}}" rel="stylesheet">

		<!--- Animations css -->
		<link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
		
		<!--- Switcher css -->
		<link href="{{asset('assets/switcher/css/switcher.css')}}" rel="stylesheet">
		<link href="{{asset('assets/switcher/demo.css')}}" rel="stylesheet">	
	</head>
	
	<body class="main-body">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{asset('assets/img/loaders/loader-4.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		<!-- main-signin-wrapper -->
		<div class="my-auto page page-h">
			<div class="main-signin-wrapper">
				<div class="main-card-signin d-md-flex wd-100p">
				<div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white" >
					<div class="my-auto authentication-pages">
						<div>
							<img src="{{asset('assets/img/brand/peaceworc-logo-white-vertical.png')}}" class=" m-0 mb-4" alt="logo">
							{{-- <h5 class="mb-4">Responsive Modern Dashboard &amp; Admin Template</h5>
							<p class="mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<a href="index.html" class="btn btn-success">Learn More</a> --}}
						</div>
					</div>
				</div>
				<div class="p-5 wd-md-50p">
					<div class="main-signin-header">
						<h2>Welcome back!</h2>
						<h4>Please sign in to continue</h4>
						<form action="#">
							@csrf
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" placeholder="Enter your email" name="email" type="email" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" placeholder="Enter your password" name="password" type="password">
							</div><button class="btn btn-main-primary btn-block">Sign In</button>
						</form>
					</div>
					<div class="main-signin-footer mt-3 mg-t-5">
						<p><a href="#">Forgot password?</a></p>
					</div>
				</div>
			</div>
			</div>
		</div>
		<!-- /main-signin-wrapper -->
		
		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

		<!--- JQuery min js -->
		<script src="assets/plugins/jquery/jquery.min.js"></script>

		<!--- Datepicker js -->
		<script src="assets/plugins/jquery-ui/ui/widgets/datepicker.js"></script>

		<!--- Bootstrap Bundle js -->
		<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!--- Ionicons js -->
		<script src="assets/plugins/ionicons/ionicons.js"></script>

		
		<!--- Moment js -->
		<script src="assets/plugins/moment/moment.js"></script>

		<!--- JQuery sparkline js -->
		<script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

		<!--- Perfect-scrollbar js -->
		<script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="assets/plugins/perfect-scrollbar/p-scroll.js"></script>


		<!--- Rating js -->
		<script src="assets/plugins/rating/jquery.rating-stars.js"></script>
		<script src="assets/plugins/rating/jquery.barrating.js"></script>

		<!--- Custom Scroll bar Js -->
		<script src="assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js"></script>


		<!--- Sidebar js -->
		<script src="assets/plugins/side-menu/sidemenu.js"></script>


		<!--- Right-sidebar js -->
		<script src="assets/plugins/sidebar/sidebar.js"></script>
		<script src="assets/plugins/sidebar/sidebar-custom.js"></script>
		
		<!--- Eva-icons js -->
		<script src="assets/js/eva-icons.min.js"></script>

		<!--- Scripts js -->
		<script src="assets/js/script.js"></script>

		<!--- Custom js -->
		<script src="assets/js/custom.js"></script>
		
		<!--- Switcher js -->
		<script src="assets/switcher/js/switcher.js"></script>
	
	</body>
</html>