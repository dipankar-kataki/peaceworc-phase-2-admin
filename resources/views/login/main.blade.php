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

		<!--- Style css -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

		<!--- Animations css -->
		<link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">

		<!--- Toastr Notification-->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
						<div class="text-center">
							<img src="{{asset('assets/img/brand/peaceworc-logo-white-vertical.png')}}" class="m-0 mb-4" style="height:220px;" alt="logo">
						</div>
					</div>
				</div>
				<div class="p-5 wd-md-50p">
					<div class="main-signin-header">
						<h2>Welcome back!</h2>
						<h4>Please sign in to continue</h4>
						<form id="loginForm">
							@csrf
							<div class="form-group">
								<label>Email</label>
								<input class="form-control" placeholder="Enter your email" name="email" type="email" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" placeholder="Enter your password" name="password" type="password">
							</div>
							<button class="btn btn-main-primary btn-block signin-btn" type="submit">Sign In</button>
						</form>
					</div>
					<div class="main-signin-footer mt-3 mg-t-5">
						<p><a href="#">Forgot password?</a></p>
					</div>
				</div>
			</div>
			</div>
		</div>

		@include('common.footer')
		<!-- /main-signin-wrapper -->
		

		<!--- JQuery min js -->
		<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>

		<!--- Scripts js -->
		<script src="{{asset('assets/js/script.js')}}"></script>

		<!--- Custom js -->
		<script src="{{asset('assets/js/custom.js')}}"></script>

		<!--- Toastr js -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

		<script>
			$('#loginForm').on('submit', function(e){

				e.preventDefault();

				const formData = new FormData(this);

				$('.signin-btn').attr('disabled', true);
				$('.signin-btn').text('Please Wait...');

				$.ajax({
					url:"{{route('admin.login')}}",
					type:"POST",
					contentType: false,
					processData: false,
					data:formData,
					success:function(response){
						if(response.status == 1){
							setTimeout(() => {
								$('.signin-btn').text('SignIn Successful');
							}, 1000);

							setTimeout(() => {
								$('.signin-btn').text('Redirecting...');
								window.location.replace(response.url);
							}, 2000);

							
						}else{
							toastr.error(response.message, 'Error', {
								positionClass: 'toast-top-right',
								closeButton: true,
								progressBar: true,
								timeOut: 3000
							});
							$('.signin-btn').attr('disabled', false);
							$('.signin-btn').text('Sign In');
						}
					},error:function(xhr, status, error){
						toastr.error('Oops! Something Went Wrong.', 'Error', {
							positionClass: 'toast-top-right',
							closeButton: true,
							progressBar: true,
							timeOut: 3000
						});

						$('.signin-btn').attr('disabled', false);
						$('.signin-btn').text('Sign In');
					}
				});


			});	
		</script>
	
	</body>
</html>