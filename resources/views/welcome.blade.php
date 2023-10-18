<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Title -->
		<title> @yield('page-title') | Peaceworc - Admin Panel </title>

		<!--- Favicon -->
		<link rel="icon" href="{{asset('assets/img/brand/peaceworc-favicon.png')}}" type="image/x-icon"/>

		<!--- Icons css -->
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

		<!-- Owl-carousel css-->
        <link href="{{asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet"/>
		<!--- Internal Timeline css-->
		{{-- <link href="{{asset('assets/plugins/timeline/css/timeline.min.css')}}" rel="stylesheet"> --}}
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

		<!--- Toastr Notification-->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
		<link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

		{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> --}}
		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		<link rel="stylesheet" href="{{asset('assets/plugins/lightbox2-master/dist/css/lightbox.min.css')}}">
		
		<style>
			.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
				cursor: default;
				color: #666 !important;
				border: 1px solid #d5d5d5;
				background: #e1dddd;
				box-shadow: none;
			}
		</style>

        @yield('custom-css')
    </head>

	<body class="main-body  app sidebar-mini">
		
		<!-- Loader -->
		<div id="global-loader">
			@include('common.custom-loader')
			{{-- <img src="{{asset('assets/img/loaders/loader-4.svg')}}" class="loader-img" alt="Loader"> --}}
		</div>
		<!-- /Loader -->

		<!-- main-sidebar opened -->
        @include('common.sidebar-main')
		<!-- /main-sidebar -->
		
        <!-- main-content -->
		<div class="main-content">

		    <!-- main-header -->
			@include('common.top-header-main')
			<!-- /main-header -->

			<!-- container -->
			<div class="container-fluid">
				
                <!-- breadcrumb -->
				@include('common.breadcrumb-section')
				<!-- /breadcrumb -->
				
                <!-- main-content-body -->
				<div class="main-content-body">
                    @yield('content')
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /main-content -->
		
        <!--Sidebar-right-->
		@include('common.animated-sidebar')
		<!--/Sidebar-right-->

        <!-- Footer opened -->
		@include('common.footer')
		<!-- Footer closed -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top">
            <i class="las la-angle-double-up"></i>
        </a>

		<!--- JQuery min js -->
		<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

		<!--- Datepicker js -->
		<script src="{{asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>

		<!--- Bootstrap Bundle js -->
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

		<!--- Ionicons js -->
		<script src="{{asset('assets/plugins/ionicons/ionicons.js')}}"></script>

		<!--- Chart bundle min js -->
        <script src="{{asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
        <!--- Internal Sampledata js -->
        <script src="{{asset('assets/js/chart.flot.sampledata.js')}}"></script>
        <!--- Index js -->
        <script src="{{asset('assets/js/index.js')}}"></script>

		<!--- Ionicons js -->
		<script src="{{asset('assets/plugins/ionicons/ionicons.js')}}"></script>
		<!--- Select2 js -->
		<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
		<!--- Internal Chartjs js -->
		<script src="{{asset('assets/js/chart.chartjs.js')}}"></script>

		<!--- Internal lightslider js -->
		<script src="{{asset('assets/plugins/lightslider/js/lightslider.min.js')}}"></script>

		<!--- Internal Chat js -->
		<script src="{{asset('assets/js/chat.js')}}"></script>

		<!--- Moment js -->
		<script src="{{asset('assets/plugins/moment/moment.js')}}"></script>

		<!--- JQuery sparkline js -->
		<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

		<!--- Perfect-scrollbar js -->
		<script src="{{asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
		<script src="{{asset('assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>


		<!--- Rating js -->
		<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>
		<script src="{{asset('assets/plugins/rating/jquery.barrating.js')}}"></script>

		<!--- Custom Scroll bar Js -->
		<script src="{{asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>


		<!--- Sidebar js -->
		<script src="{{asset('assets/plugins/side-menu/sidemenu.js')}}"></script>


		<!--- Right-sidebar js -->
		<script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>
		<script src="{{asset('assets/plugins/sidebar/sidebar-custom.js')}}"></script>
		
		<!--- Eva-icons js -->
		<script src="{{asset('assets/js/eva-icons.min.js')}}"></script>

		<!--- Scripts js -->
		<script src="{{asset('assets/js/script.js')}}"></script>

		<!--- Custom js -->
		<script src="{{asset('assets/js/custom.js')}}"></script>
		
		<!--- Toastr js -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

		<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

		<script src="{{asset('assets/plugins/lightbox2-master/dist/js/lightbox.js')}}"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
		

        @yield('custom-scripts')
	
	</body>
</html>