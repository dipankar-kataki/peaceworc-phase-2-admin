<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Title -->
		<title> {{ Request::segment(1) }} | Peaceworc - Admin Panel </title>

		<!--- Favicon -->
		<link rel="icon" href="{{asset('assets/img/brand/peaceworc-favicon.png')}}" type="image/x-icon"/>

		<!--- Icons css -->
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet">

		<!-- Owl-carousel css-->
        <link href="{{asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet"/>

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

		<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
  
		

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
					

					<!-- row -->
					{{-- <div class="row row-sm ">
						<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
							<div class="card overflow-hidden">
								<div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-10">Project Budget</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 text-muted mb-2">The Project Budget is a tool used by project managers to estimate the total cost of a project. A project budget template includes a detailed estimate of all costs. <a href="#">Learn more</a></p>
								</div>
								<div class="card-body pd-y-7">
									<div class="area chart-legend mb-0">
										<div>
											<i class="mdi mdi-album text-primary mr-2"></i> Total Budget
										</div>
										<div>
											<i class="mdi mdi-album text-pink mr-2"></i>Amount Used
										</div>
									</div>
									 <canvas id="project-budget" class=""></canvas>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
							<div class="card overflow-hidden">
								<div class="card-body pb-3">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-10">project &amp; task</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 text-muted mb-3">In project, a task is an activity that needs to be accomplished within a defined period of time or by a deadline. <a href="#">Learn more</a></p>
									<div class="table-responsive mb-0 projects-stat tx-14">
										<table class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap  ">
											<thead>
												<tr>
													<th>Project &amp; Task</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<div class="project-names">
															<h6 class="bg-primary-transparent text-primary d-inline-block mr-2 text-center">U</h6>
															<p class="d-inline-block font-weight-semibold mb-0">UI Design</p>
														</div>
													</td>
													<td>
														<div class="badge badge-success">Completed</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="project-names">
															<h6 class="bg-pink-transparent text-pink d-inline-block text-center mr-2">R</h6>
															<p class="d-inline-block font-weight-semibold mb-0">Landing Page</p>
														</div>
													</td>
													<td>
														<div class="badge badge-warning">Pending</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="project-names">
															<h6 class="bg-success-transparent text-success d-inline-block mr-2 text-center">W</h6>
															<p class="d-inline-block font-weight-semibold mb-0">Website &amp; Blog</p>
														</div>
													</td>
													<td>
														<div class="badge badge-danger">Canceled</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="project-names">
															<h6 class="bg-purple-transparent text-purple d-inline-block mr-2 text-center">P</h6>
															<p class="d-inline-block font-weight-semibold mb-0">Product Development</p>
														</div>
													</td>
													<td>
														<div class="badge badge-teal">on-going</div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="project-names">
															<h6 class="bg-danger-transparent text-danger d-inline-block mr-2 text-center">L</h6>
															<p class="d-inline-block font-weight-semibold mb-0">Logo Design</p>
														</div>
													</td>
													<td>
														<div class="badge badge-success">Completed</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
					<!-- /row -->

					<!-- row -->
					{{-- <div class="row row-sm">
						<div class="col-lg-6 col-xl-4 col-md-12 col-sm-12">
							<div class="card overflow-hidden latest-tasks">
								<div class="">
									<div class="d-flex justify-content-between pl-4 pt-4 pr-4">
										<h4 class="card-title mg-b-10">Latest Task</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<div class="">
										<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-bold" role="tablist">
											<li class="nav-item">
												<a class="nav-link active show" data-toggle="tab" href="#tasktab-1" role="tab" aria-selected="false">
													Today
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#tasktab-2" role="tab" aria-selected="false">
													Week
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#tasktab-3" role="tab" aria-selected="true">
													Month
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="card-body pt-3">
									<div class="tab-content">
										<div class="tab-pane fade active show" id="tasktab-1" role="tabpanel">
											<div class="">
												<div class="tasks">
													<div class=" task-line primary active">
														<a href="#" class="label">
															XML Import & Export
														</a>
														<div class="time">
															12:00 PM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input checked type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks">
													<div class="task-line pink">
														<a href="#" class="label">
															Database Optimization
														</a>
														<div class="time">
															02:13 PM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks">
													<div class="task-line success">
														<a href="#" class="label">
															Create Wireframes
														</a>
														<div class="time">
															06:20 PM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks">
													<div class="task-line warning">
														<a href="#" class="label">
															Develop MVP
														</a>
														<div class="time">
															10: 00 PM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks">
													<div class="task-line teal">
														<a href="#" class="label">
															Design Ecommerce
														</a>
														<div class="time">
															10: 00 PM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks mb-0">
													<div class="task-line purple">
														<a href="#" class="label">
															Fix Validation Issues
														</a>
														<div class="time">
															12: 00 AM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="tasktab-2" role="tabpanel">
											<div class="">
												<div class="tasks">
													<div class=" task-line teal">
														<a href="#" class="label">
															Management meeting
														</a>
														<div class="time">
															06:30 AM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks">
													<div class="task-line danger">
														<a href="#" class="label">
															Connect API to pages
														</a>
														<div class="time">
															08:00 AM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks">
													<div class="task-line purple">
														<a href="#" class="label">
															Icon change in Redesign App
														</a>
														<div class="time">
															11:20 AM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks">
													<div class="task-line warning">
														<a href="#" class="label">
															Test new features in tablets
														</a>
														<div class="time">
															02: 00 PM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks">
													<div class="task-line success">
														<a href="#" class="label">
															Design Logo
														</a>
														<div class="time">
															04: 00 PM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks mb-0">
													<div class="task-line primary">
														<a href="#" class="label">
															Project Launch
														</a>
														<div class="time">
															06: 00 PM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="tasktab-3" role="tabpanel">
											<div class="">
												<div class="tasks">
													<div class=" task-line info">
														<a href="#" class="label">
															Design a Landing Page
														</a>
														<div class="time">
															06:12 AM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks">
													<div class="task-line danger">
														<a href="#" class="label">
															Food Delivery Mobile Application
														</a>
														<div class="time">
															3:00 PM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks">
													<div class="task-line warning">
														<a href="#" class="label">
															Export Database values
														</a>
														<div class="time">
															03:20 PM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks">
													<div class="task-line pink">
														<a href="#" class="label">
															Write Simple Python Script
														</a>
														<div class="time">
															04: 00 PM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks">
													<div class="task-line success">
														<a href="#" class="label">
															Write Simple Anugalr Program
														</a>
														<div class="time">
															05: 00 PM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
												<div class="tasks mb-0">
													<div class="task-line primary">
														<a href="#" class="label">
															Design PSD files
														</a>
														<div class="time">
															06: 00 PM
														</div>
													</div>
													<span class="add-delete-task ">
														<a href="#" class="btn btn-link">
															<i class="fa fa-edit"></i>
														</a>
														<a href="#" class="btn btn-link"><i class="fa fa-trash"></i></a>
													</span>
													<div class="checkbox">
														<label class="check-box">
															<label class="ckbox"><input type="checkbox"><span></span></label>
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 col-lg-6 col-xl-4">
							<div class="card overflow-hidden">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-10 mt-2">Projects Workload</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 text-muted mb-0"> In the Project Workload report, their remaining assignments, completion dates, whether their work is at-risk. <a href="#">Learn more</a></p>
								</div>
								<div class="card-body">
									<div class="">
										<div class="row justify-content-md-center">
											<div class="col-sm-12">
												<div class="">
													<canvas id="chartDonut" class="ht-175 drop-shadow mx-auto"></canvas>
												</div>
											</div>
										</div>
									</div>
									<div class="pt-3">
										<div class="row ">
											<div class="col-sm-8 ">
												<h6 class="mb-0 tx-15 d-flex"><span class="legend bg-primary-gradient brround"></span><span class="ml-3">40.32%</span></h6>
												<p class="text-muted  tx-13 mb-0 ml-4">External</p>
											</div>
											<div class="col-sm-4 ">
												<span id="sparkel1">1,3,7,8,4,5,4,8,6</span>
											</div>
										</div>
									</div>

									<div class="pt-3">
										<div class="row ">
											<div class="col-sm-8 ">
												<h6 class="mb-0 tx-15 d-flex"><span class="legend bg-warning-gradient brround"></span><span class="ml-3">40.73%</span></h6>
												<p class="text-muted tx-13 mb-0 ml-4 ">Internal</p>
											</div>
											<div class="col-sm-4 ">
												<span id="sparkel2">2,5,6,4,8,6,5,9,6</span>
											</div>
										</div>
									</div>
									<div class="pt-3">
										<div class="row ">
											<div class="col-sm-8 ">
												<h6 class="mb-0 tx-15 d-flex"><span class="legend bg-success-gradient brround"></span><span class="ml-3">50.12%</span></h6>
												<p class="text-muted tx-13 mb-0 ml-4">Other</p>
											</div>
											<div class="col-sm-4 ">
												<span id="sparkel3">2,5,6,4,8,6,5,9,6</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-xl-4 col-md-12 col-sm-12">
							<div class="card card-dashboard-events">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-10">Upcoming Events</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 text-muted mb-0">It had the latest news and notes from the championship, while previewing the upcoming event.. <a href="#">Learn more</a></p>
								</div>
								<div class="card-body">
									<div class="list-group ">
										<div class="list-group-item border-top-0">
											<div class="event-indicator bg-primary-gradient"></div><label>Nov 20 <span>Tuesday</span></label>
											<h6>PH World Mall Lantern Festival</h6>
											<p><strong>8AM - 4PM</strong> Bay Area, San Francisco</p><small><span class="tx-danger">Sold Out</span> (3000 tickets sold)</small>
										</div>
										<div class="list-group-item">
											<div class="event-indicator bg-danger-gradient"></div><label>Nov 23 <span>Friday</span></label>
											<h6>Asia Pacific Generation Workshop</h6>
											<p><strong>8AM - 5PM</strong> Singapore</p><small><span class="tx-warning">Sold Out Soon</span> (12 tickets left)</small>
										</div>
										<div class="list-group-item border-bottom-0">
											<div class="event-indicator bg-info-gradient"></div><label>Nov 23 <span>Friday</span></label>
											<h6>Korea Smart Device Trade Show</h6>
											<p><strong>8AM - 5PM</strong> Singapore</p><small><span class="tx-success">Free Registration</span> (Limited seats only)</small>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
					<!-- /row -->

					<!-- row -->
					{{-- <div class="row row-sm ">
						<div class="col-md-12 col-xl-12">
							<div class="card overflow-hidden review-project">
								<div class="card-body">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-10">All Projects</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 text-muted mb-3">A project is an activity to meet the creation of a unique product or service and thus activities that are undertaken to accomplish routine activities cannot be considered projects. <a href="#">Learn more</a></p>
									<div class="table-responsive mb-0">
										<table class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
											<thead>
												<tr>
													<th>Project</th>
													<th>Team Members</th>
													<th>Categorie</th>
													<th>Created</th>
													<th>Status</th>
													<th>Deadline</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<div class="project-contain">
															<h6 class="mb-1 tx-13">Angular Project</h6>
														</div>
													</td>
													<td>
														<div class="image-grouped"><img class="profile-img brround" alt="profile image" src="assets/img/faces/11.jpg"><img class="profile-img brround " alt="profile image" src="assets/img/faces/12.jpg"><img class="profile-img brround" alt="profile image" src="assets/img/faces/2.jpg"></div>
													</td>
													<td>Web Design</td>
													<td>01 Jan 2020</td>
													<td><span class="badge badge-primary-gradient">Ongoing</span></td>
													<td>15 March 2020</td>
												</tr>
												<tr>
													<td>
														<div class="project-contain">
															<h6 class="mb-1 tx-13">PHP Project</h6>
														</div>
													</td>
													<td>
														<div class="image-grouped"><img class="profile-img brround" alt="profile image" src="assets/img/faces/16.jpg"><img class="profile-img brround " alt="profile image" src="assets/img/faces/8.jpg"><img class="profile-img brround" alt="profile image" src="assets/img/faces/7.jpg"></div>
													</td>
													<td>Web Development</td>
													<td>03 March 2020</td>
													<td><span class="badge badge-success-gradient">Ongoing</span></td>
													<td>15 Jun 2020</td>
												</tr>
												<tr>
													<td>
														<div class="project-contain">
															<h6 class="mb-1 tx-13">Python</h6>
														</div>
													</td>
													<td>
														<div class="image-grouped"><img class="profile-img brround" alt="profile image" src="assets/img/faces/3.jpg"><img class="profile-img brround " alt="profile image" src="assets/img/faces/12.jpg"><img class="profile-img brround" alt="profile image" src="assets/img/faces/15.jpg"></div>
													</td>
													<td>Web Development</td>
													<td>15 March 2020</td>
													<td><span class="badge badge-danger-gradient">Pending</span></td>
													<td>15 March 2020</td>
												</tr>
												<tr>
													<td>
														<div class="project-contain">
															<h6 class="mb-1 tx-13">Android App</h6>
														</div>
													</td>
													<td>
														<div class="image-grouped"><img class="profile-img brround" alt="profile image" src="assets/img/faces/7.jpg"><img class="profile-img brround " alt="profile image" src="assets/img/faces/6.jpg"><img class="profile-img brround" alt="profile image" src="assets/img/faces/16.jpg"></div>
													</td>
													<td>Android</td>
													<td>15 March 2020</td>
													<td><span class="badge badge-success-gradient">Ongoing</span></td>
													<td>15 March 2020</td>
												</tr>
												<tr>
													<td>
														<div class="project-contain">
															<h6 class="mb-1 tx-13">Mobile Application</h6>
														</div>
													</td>
													<td>
														<div class="image-grouped"><img class="profile-img brround" alt="profile image" src="assets/img/faces/8.jpg"><img class="profile-img brround " alt="profile image" src="assets/img/faces/11.jpg"><img class="profile-img brround" alt="profile image" src="assets/img/faces/15.jpg"></div>
													</td>
													<td>Android</td>
													<td>15 March 2020</td>
													<td><span class="badge badge-pink-gradient">Ongoing</span></td>
													<td>15 March 2020</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
					<!-- /row -->

					<!-- row -->
					{{-- <div class="row row-sm ">
						<div class="col-lg-12 col-xl-4 col-sm-12">
							<div class="card">
								<div class="card-header pb-0 pt-4">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-10">Top Ongoing Projects</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 text-muted mb-0">Project Description is a formally written declaration of the project and its idea and context . <a href="#">Learn more</a></p>
								</div>
								<div class="card-body p-0 m-scroll mh-350 mt-2">
									<div class="list-group projects-list">
										<a href="#" class="list-group-item list-group-item-action flex-column align-items-start border-top-0">
											<div class="d-flex w-100 justify-content-between">
												<h6 class="mb-1 font-weight-semibold ">PSD Projects</h6>
												<small class="text-danger"><i class="fa fa-caret-down mr-1"></i>5 days ago</small>
											</div>
											<p class="mb-0 text-muted mb-0 tx-12">Started:17-02-2020</p>
											<small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit...</small>
										</a>
										<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
											<div class="d-flex w-100 justify-content-between">
												<h6 class="mb-1 font-weight-semibold">Wordpress Projects</h6>
												<small class="text-success"><i class="fa fa-caret-up mr-1"></i>2 days ago</small>
											</div>
											<p class="mb-0 text-muted mb-0 tx-12">Started:15-02-2020</p>
											<small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit..</small>
										</a>
										<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
											<div class="d-flex w-100 justify-content-between">
												<h6 class="mb-1 font-weight-semibold">HTML &amp; CSS3 Projects</h6>
												<small class="text-danger"><i class="fa fa-caret-down mr-1"></i>1 days ago</small>
											</div>
											<p class="mb-0 text-muted mb-0 tx-12">Started:26-02-2020</p>
											<small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit..</small>
										</a>
										<a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
											<div class="d-flex w-100 justify-content-between">
												<h6 class="mb-1 font-weight-semibold">HTML &amp; CSS3 Projects</h6>
												<small class="text-danger"><i class="fa fa-caret-down mr-1"></i>1 days ago</small>
											</div>
											<p class="mb-0 text-muted mb-0 tx-12">Started:26-02-2020</p>
											<small class="text-muted">Lorem ipsum dolor sit amet, consectetuer adipiscing elit..</small>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-lg-6 col-md-12">
							<div class="card overflow-hidden ">
								<div class="card-header pb-0 pt-4">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-10 ">Activity</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 text-muted mb-0">An activity is a scheduled phase in a project plan with a distinct beginning and end. <a href="#">Learn more</a></p>
								</div>
								<div class="card-body p-0">
									<div class="activity Activity-scroll">
										<div class="activity-list">
											<img src="assets/img/faces/6.jpg" alt="" class="img-activity">
											<div class="time-activity ">
												<div class="item-activity">
												<p class="mb-0"><span class="h6 mr-1">Adam Berry</span><span class="text-muted tx-13"> Add a new projects</span> <span class="h6 ml-1 added-project"> AngularJS Template</span></p><small class="text-muted ">30 mins ago</small> </div>
											</div>
										   <img src="assets/img/faces/9.jpg" alt="" class="img-activity">
											<div class="time-activity">
												<div class="item-activity">
												<p class="mb-0"><span class="h6 mr-1">Irene Hunter</span> <span class="text-muted tx-13"> Add a new projects</span> <span class="h6 ml-1 added-project text-danger">Free HTML Template</span></p><small class="text-muted ">1 days ago</small> </div>
											</div> <img src="assets/img/faces/3.jpg" alt="" class="img-activity">
											<div class="time-activity">
												<div class="item-activity">
												<p class="mb-0"><span class="h6 mr-1">John Payne</span> <span class="text-muted tx-13"> Add a new projects</span> <span class="h6 ml-1 added-project text-success">Free PSD Template</span></p><small class="text-muted ">3 days ago</small> </div>
											</div> <img src="assets/img/faces/4.jpg" alt="" class="img-activity">
											<div class="time-activity">
												<div class="item-activity ">
												<p class="mb-0"><span class="h6 mr-1">Julia Hardacre</span> <span class="text-muted tx-13"> Add a new projects</span> <span class="h6 ml-1 added-project text-warning">Free UI Template</span></p><small class="text-muted ">5 days ago</small> </div>
											</div> <img src="assets/img/faces/5.jpg" alt="" class="img-activity">
											<div class="time-activity">
												<div class="item-activity">
												<p class="mb-0"><span class="h6 mr-1">Adam Berry</span> <span class="text-muted tx-13"> Add a new projects</span> <span class="h6 ml-1 added-project text-pink"> AngularJS Template</span></p><small class="text-muted ">30 mins ago</small> </div>
											</div> <img src="assets/img/faces/6.jpg" alt="" class="img-activity">
											<div class="time-activity">
												<div class="item-activity">
												<p class="mb-0"><span class="h6 mr-1">Irene Hunter</span> <span class="text-muted tx-13"> Add a new projects</span> <span class="h6 ml-1 added-project text-purple">Free HTML Template</span></p><small class="text-muted ">1 days ago</small> </div>
											</div> <img src="assets/img/faces/16.jpg" alt="" class="img-activity">
											<div class="time-activity">
												<div class="item-activity">
												<p class="mb-0"><span class="h6 mr-1">John Payne</span><span class="text-muted tx-13"> Add a new projects</span> <span class="h6 ml-1 added-project text-success">Free PSD Template</span></p><small class="text-muted ">3 days ago</small> </div>
											</div> <img src="assets/img/faces/10.jpg" alt="" class="img-activity">
											<div class="time-activity mb-0">
												<div class="item-activity mb-0">
												<p class="mb-0"><span class="h6 mr-1">Julia Hardacre</span><span class="text-muted tx-13"> Add a new projects</span><span class="h6 ml-1 added-project">Free UI Template</span></p><small class="text-muted ">5 days ago</small> </div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-lg-6 col-xl-4">
							<div class="card">
								<div class="card-header pt-4 pb-0">
									<div class="d-flex justify-content-between">
										<h4 class="card-title mg-b-10 ">Task Statistics</h4>
										<i class="mdi mdi-dots-horizontal text-gray"></i>
									</div>
									<p class="tx-12 text-muted mb-0">The Statistics You can also summarize your data in a graphical display, such as histograms <a href="#">Learn more</a> </p>
								</div>
								<div class="pl-4 pr-4 pt-4 pb-3">
									<div class="">
										<div class="row">
											<div class="col-md-6 col-6 text-center">
												<div class="task-box primary mb-0">
													<p class="mb-0 tx-12">Total Tasks</p>
													<h3 class="mb-0">385</h3>
												</div>
											</div>
											<div class="col-md-6 col-6 text-center">
												<div class="task-box danger  mb-0">
													<p class="mb-0 tx-12">Overdue Tasks</p>
													<h3 class="mb-0">19</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="task-stat pb-0">
									<div class="d-flex tasks">
										<div class="mb-0">
											<div class="h6 fs-15 mb-0"><i class="far fa-dot-circle text-primary mr-2"></i>Completed Tasks</div>
											<span class="text-muted tx-11 ml-4">8:00am - 10:30am</span>
										</div>
										<span class="float-right ml-auto">135</span>
									</div>
									<div class="d-flex tasks">
										<div class="mb-0">
											<div class="h6 fs-15 mb-0"><i class="far fa-dot-circle text-pink mr-2"></i>Inprogress Tasks</div>
											<span class="text-muted tx-11 ml-4">8:00am - 10:30am</span>
										</div>
										<span class="float-right ml-auto">75</span>
									</div>
									<div class="d-flex tasks">
										<div class="mb-0">
											<div class="h6 fs-15 mb-0"><i class="far fa-dot-circle text-success mr-2"></i>On Hold Tasks</div>
											<span class="text-muted tx-11 ml-4">8:00am - 10:30am</span>
										</div>
										<span class="float-right ml-auto">23</span>
									</div>
									<div class="d-flex tasks mb-0 border-bottom-0">
										<div class="mb-0">
											<div class="h6 fs-15 mb-0"><i class="far fa-dot-circle text-purple mr-2"></i>Pending Tasks</div>
											<span class="text-muted tx-11 ml-4">8:00am - 10:30am</span>
										</div>
										<span class="float-right ml-auto">1</span>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
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

		<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

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


        @yield('custom-scripts')
	
	</body>
</html>