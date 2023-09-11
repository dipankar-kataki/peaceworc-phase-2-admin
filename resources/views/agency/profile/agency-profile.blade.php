@extends('welcome')
@section('page-title', 'Manage Agency Profile')
@section('custom-css')
    <style>
        svg.radial-progress {
            height: auto;
            max-width: 170px;
            padding: 0px;
            transform: rotate(-90deg);
            width: 100%;
        }

        svg.radial-progress circle {
            fill: rgba(0, 0, 0, 0);
            stroke: #fff;
            stroke-dashoffset: 219.91148575129;
            /* Circumference */
            stroke-width: 10;
        }

        svg.radial-progress circle.incomplete {
            opacity: 0.25;
        }

        svg.radial-progress circle.complete {
            stroke-dasharray: 219.91148575129;
            /* Circumference */
        }

        svg.radial-progress text {
            fill: #000;
            font: 400 1em/1 'Oswald', sans-serif;
            text-anchor: middle;
        }



        /*** COLORS ***/
        /* Primary */
        svg.radial-progress:nth-of-type(6n+1) circle {
            stroke: #0e7bc5;
        }

        /* Secondary */
        svg.radial-progress:nth-of-type(6n+2) circle {
            stroke: #83e4e2;
        }
    </style>
@endsection
@section('content')

    {{-- @dd($get_agency_detail) --}}
    <div class="row row-sm">
        <div class="col-lg-4">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="pl-0">
                        <div class="main-profile-overview">
                            <div class="d-flex flex-row flex-wrap align-items-center">
                                <div class="main-img-user profile-user">
                                    <img alt="agency company image"
                                        src="{{ asset($get_agency_detail->agencyProfile->photo) }}">
                                    {{-- <a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a> --}}
                                </div>
                                <div class="d-flex justify-content-between mg-b-20 ml-3">
                                    <div>
                                        <h5 class="main-profile-name">
                                            {{ $get_agency_detail->agencyProfile->company_name ?? 'Not Found' }}</h5>
                                        <p class="main-profile-name-text">Web Designer</p>
                                    </div>
                                </div>
                            </div>
                            <h6>Bio</h6>
                            <div class="main-profile-bio">
                                {{ $get_agency_detail->agencyProfile->about_company ?? 'Not Found' }}
                            </div>
                            <h6>Profile Completion Status</h6>
                            <div class="main-profile-progress-bar d-flex flex-row flex-wrap justify-content-center align-items-center">
                                <svg class="radial-progress" data-percentage="75" viewBox="0 0 80 80">
                                    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                                    <circle class="complete" cx="40" cy="40" r="35"
                                        style="stroke-dashoffset: 39.58406743523136;"></circle>
                                    <text class="percentage" x="50%" y="57%"
                                        transform="matrix(0, 1, -1, 0, 80, 0)">82%</text>
                                </svg>

                                <div class="d-flex flex-column p-3"> 
                                    <label class="ckbox  pb-3">
                                        <input checked="" type="checkbox">
                                        <span>Business Information Added</span>
                                    </label>

                                    <label class="ckbox pb-3">
                                        <input checked="" type="checkbox">
                                        <span>Other Information Added</span>
                                    </label>

                                    <label class="ckbox pb-3">
                                        <input checked="" type="checkbox">
                                        <span>Authorize Officer Added</span>
                                    </label>

                                    <label class="ckbox pb-3">
                                        <input checked="" type="checkbox">
                                        <span>Profile Approved</span>
                                    </label>
                                </div>
                                {{-- <div class="d-flex p-3 border-top"> 
                                    
                                </div>
                                <div class="d-flex p-3 border-top"> 
                                    
                                </div>
                                <div class="d-flex p-3 border-top"> 
                                    
                                </div> --}}
                            </div>
                            <!-- main-profile-bio -->
                            {{-- <div class="main-profile-work-list">
                                <div class="media">
                                    <div class="media-logo bg-success-transparent text-success">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6>{{$get_agency_detail->agencyProfile->email}}</h6>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-logo bg-primary-transparent text-primary">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="media-body">
                                        <h6>{{$get_agency_detail->agencyProfile->phone}}</h6>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- main-profile-work-list -->
                            {{-- <hr class="mg-y-30">
                            <label class="main-content-label tx-13 mg-b-20">Social</label>
                            <div class="main-profile-social-list">
                                <div class="media">
                                    <div class="media-icon bg-primary-transparent text-primary">
                                        <i class="icon ion-logo-github"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Github</span> <a href="#">github.com/spruko</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-success-transparent text-success">
                                        <i class="icon ion-logo-twitter"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Twitter</span> <a href="#">twitter.com/spruko.me</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-info-transparent text-info">
                                        <i class="icon ion-logo-linkedin"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>Linkedin</span> <a href="#">linkedin.com/in/spruko</a>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-icon bg-danger-transparent text-danger">
                                        <i class="icon ion-md-link"></i>
                                    </div>
                                    <div class="media-body">
                                        <span>My Portfolio</span> <a href="#">spruko.com/</a>
                                    </div>
                                </div>
                            </div> --}}
                            <!-- main-profile-social-list -->
                        </div>
                        <!-- main-profile-overview -->
                    </div>
                </div>
            </div>
            {{-- <div class="card mg-b-20">
                <div class="card-body">
                    <div class="main-content-label tx-13 mg-b-25">
                        Conatct
                    </div>
                    <div class="main-profile-contact-list">
                        <div class="media">
                            <div class="media-icon bg-primary-transparent text-primary">
                                <i class="icon ion-md-phone-portrait"></i>
                            </div>
                            <div class="media-body">
                                <span>Mobile</span>
                                <div>
                                    +245 354 654
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-icon bg-success-transparent text-success">
                                <i class="icon ion-logo-slack"></i>
                            </div>
                            <div class="media-body">
                                <span>Slack</span>
                                <div>
                                    @spruko.w
                                </div>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-icon bg-info-transparent text-info">
                                <i class="icon ion-md-locate"></i>
                            </div>
                            <div class="media-body">
                                <span>Current Address</span>
                                <div>
                                    San Francisco, CA
                                </div>
                            </div>
                        </div>
                    </div><!-- main-profile-contact-list -->
                </div>
            </div> --}}
        </div>
        <div class="col-lg-8">
            <div class="main-content-body main-content-body-profile">
                <nav class="nav main-nav-line card">
                    <a class="nav-link active" data-toggle="tab" href="#">Timeline</a>
                    <a class="nav-link" data-toggle="tab" href="#">Gallery</a>
                    <a class="nav-link" data-toggle="tab" href="#">Friends</a>
                    <a class="nav-link" data-toggle="tab" href="#">Following</a>
                    <a class="nav-link" data-toggle="tab" href="#">Account Settings</a>
                </nav><!-- main-profile-body -->
                <div class="main-profile-body p-0">
                    <div class="row row-sm">
                        <div class="col-12">
                            <div class="card mg-b-20">
                                <div class="card-body">
                                    <div class="card-header">
                                        <div class="media">
                                            <div class="media-user mr-2">
                                                <div class="main-img-user avatar-md"><img alt=""
                                                        class="rounded-circle" src="{{ asset('assets/img/faces/6.jpg') }}">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-0 mg-t-9">Petey Cruiser Pechon</h6><span
                                                    class="text-primary">just now</span>
                                            </div>
                                            <div class="ml-auto">
                                                <div class="dropdown show">
                                                    <a class="new" data-toggle="dropdown" href="JavaScript:void(0);"><i
                                                            class="fas fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Edit Post</a> <a
                                                            class="dropdown-item" href="#">Delete Post</a> <a
                                                            class="dropdown-item" href="#">Personal Settings</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mg-t-10">There are many variations of passages of Lorem Ipsum available, but
                                        the majority have suffered alteration in some form, by injected humour, or
                                        randomised words which don't look even slightly believable.</p>
                                    <div><img alt="img" class="w-100" src="{{ asset('assets/img/photos/1.jpg') }}">
                                    </div>
                                    <div class="media mg-t-15 profile-footer">
                                        <div class="media-user mr-2">
                                            <div class="demo-avatar-group">
                                                <div class="demo-avatar-group main-avatar-list-stacked">
                                                    <div class="main-img-user"><img alt="" class="rounded-circle"
                                                            src="{{ asset('assets/img/faces/12.jpg') }}"></div>
                                                    <div class="main-img-user"><img alt="" class="rounded-circle"
                                                            src="{{ asset('assets/img/faces/12.jpg') }}"></div>
                                                    <div class="main-img-user"><img alt="" class="rounded-circle"
                                                            src="{{ asset('assets/img/faces/13.jpg') }}"></div>
                                                    <div class="main-img-user online"><img alt=""
                                                            class="rounded-circle"
                                                            src="{{ asset('assets/img/faces/13.jpg') }}"></div>
                                                    <div class="main-img-user"><img alt="" class="rounded-circle"
                                                            src="{{ asset('assets/img/faces/14.jpg') }}"></div>
                                                    <div class="main-avatar">
                                                        +23
                                                    </div>
                                                </div><!-- demo-avatar-group -->
                                            </div><!-- demo-avatar-group -->
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-0 mg-t-10">28 people like your photo</h6>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="dropdown show">
                                                <a class="new" href="JavaScript:void(0);"><i
                                                        class="far fa-heart"></i></a> <a class="new"
                                                    href="JavaScript:void(0);"><i class="far fa-comment"></i></a> <a
                                                    class="new" href="JavaScript:void(0);"><i
                                                        class="far fa-share-square"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mg-b-20">
                                <div class="card-body h-100">
                                    <div class="card-header">
                                        <div class="media">
                                            <div class="media-user mr-2">
                                                <div class="main-img-user avatar-md"><img alt=""
                                                        class="rounded-circle" src="assets/img/faces/6.jpg"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-0 mg-t-9">Petey Cruiser Pechon</h6><span
                                                    class="text-dark">Sep 26 2019, 10:14am</span>
                                            </div>
                                            <div class="ml-auto">
                                                <div class="dropdown show">
                                                    <a class="new" data-toggle="dropdown"
                                                        href="JavaScript:void(0);"><i class="fas fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Edit Post</a> <a
                                                            class="dropdown-item" href="#">Delete Post</a> <a
                                                            class="dropdown-item" href="#">Personal Settings</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mg-t-10">There are many variations of passages of Lorem Ipsum available, but
                                        the majority have suffered alteration in some form, by injected humour, or
                                        randomised words which don't look even slightly believable.</p>
                                    <div class="d-flex"><img alt="img" class="wd-45p m-1"
                                            src="assets/img/photos/2.jpg"> <img alt="img" class="wd-45p m-1"
                                            src="assets/img/photos/3.jpg"></div>
                                    <div class="media mg-t-15 profile-footer">
                                        <div class="media-user mr-2">
                                            <div class="demo-avatar-group">
                                                <div class="demo-avatar-group main-avatar-list-stacked">
                                                    <div class="main-img-user"><img alt="" class="rounded-circle"
                                                            src="assets/img/faces/12.jpg"></div>
                                                    <div class="main-img-user online"><img alt=""
                                                            class="rounded-circle" src="assets/img/faces/12.jpg"></div>
                                                    <div class="main-img-user"><img alt="" class="rounded-circle"
                                                            src="assets/img/faces/13.jpg"></div>
                                                    <div class="main-img-user online"><img alt=""
                                                            class="rounded-circle" src="assets/img/faces/13.jpg"></div>
                                                    <div class="main-img-user"><img alt="" class="rounded-circle"
                                                            src="assets/img/faces/14.jpg"></div>
                                                    <div class="main-avatar">
                                                        +23
                                                    </div>
                                                </div><!-- demo-avatar-group -->
                                            </div><!-- demo-avatar-group -->
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-0 mg-t-10">28 people like your photo</h6>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="dropdown show">
                                                <a class="new" href="JavaScript:void(0);"><i
                                                        class="far fa-heart"></i></a> <a class="new"
                                                    href="JavaScript:void(0);"><i class="far fa-comment"></i></a> <a
                                                    class="new" href="JavaScript:void(0);"><i
                                                        class="far fa-share-square"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mg-b-20">
                                <div class="card-body">
                                    <div class="card-header">
                                        <div class="media">
                                            <div class="media-user mr-2">
                                                <div class="main-img-user avatar-md"><img alt=""
                                                        class="rounded-circle" src="assets/img/faces/6.jpg"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-0 mg-t-9">Petey Cruiser Pechon</h6><span
                                                    class="text-dark">Sep 22 2019, 10:14am</span>
                                            </div>
                                            <div class="ml-auto">
                                                <div class="dropdown show">
                                                    <a class="new" data-toggle="dropdown"
                                                        href="JavaScript:void(0);"><i class="fas fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Edit Post</a> <a
                                                            class="dropdown-item" href="#">Delete Post</a> <a
                                                            class="dropdown-item" href="#">Personal Settings</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mg-t-10">There are many variations of passages of Lorem Ipsum available, but
                                        the majority have suffered alteration in some form, by injected humour, or
                                        randomised words which don't look even slightly believable.</p>

                                    <div class="media mg-t-15 profile-footer">
                                        <div class="media-user mr-2">
                                            <div class="demo-avatar-group">
                                                <div class="demo-avatar-group main-avatar-list-stacked">
                                                    <div class="main-img-user online"><img alt=""
                                                            class="rounded-circle" src="assets/img/faces/12.jpg"></div>
                                                    <div class="main-img-user"><img alt="" class="rounded-circle"
                                                            src="assets/img/faces/12.jpg"></div>
                                                    <div class="main-img-user"><img alt="" class="rounded-circle"
                                                            src="assets/img/faces/13.jpg"></div>
                                                    <div class="main-img-user"><img alt="" class="rounded-circle"
                                                            src="assets/img/faces/13.jpg"></div>
                                                    <div class="main-img-user online"><img alt=""
                                                            class="rounded-circle" src="assets/img/faces/14.jpg"></div>
                                                    <div class="main-avatar">
                                                        +23
                                                    </div>
                                                </div><!-- demo-avatar-group -->
                                            </div><!-- demo-avatar-group -->
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-0 mg-t-10">28 people like your photo</h6>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="dropdown show">
                                                <a class="new" href="JavaScript:void(0);"><i
                                                        class="far fa-heart"></i></a> <a class="new"
                                                    href="JavaScript:void(0);"><i class="far fa-comment"></i></a> <a
                                                    class="new" href="JavaScript:void(0);"><i
                                                        class="far fa-share-square"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body h-100">
                                    <div class="card-header">
                                        <div class="media">
                                            <div class="media-user mr-2">
                                                <div class="main-img-user avatar-md"><img alt=""
                                                        class="rounded-circle" src="assets/img/faces/15.jpg"></div>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="mb-0 mg-t-9">Petey Cruiser</h6><span class="text-dark">Sep 21
                                                    2019, 10:14am</span>
                                            </div>
                                            <div class="ml-auto">
                                                <div class="dropdown show">
                                                    <a class="new" data-toggle="dropdown"
                                                        href="JavaScript:void(0);"><i class="fas fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Edit Post</a> <a
                                                            class="dropdown-item" href="#">Delete Post</a> <a
                                                            class="dropdown-item" href="#">Personal Settings</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mg-t-10">There are many variations of passages of Lorem Ipsum available, but
                                        the majority have suffered alteration in some form, by injected humour, or
                                        randomised words which don't look even slightly believable.</p>
                                    <div class="d-flex"><img alt="img" class="wd-45p m-1"
                                            src="assets/img/photos/2.jpg"> <img alt="img" class="wd-45p m-1"
                                            src="assets/img/photos/3.jpg"></div>
                                    <div class="media mg-t-15 profile-footer">
                                        <div class="media-user mr-2">
                                            <div class="demo-avatar-group">
                                                <div class="demo-avatar-group main-avatar-list-stacked">
                                                    <div class="main-img-user online"><img alt=""
                                                            class="rounded-circle" src="assets/img/faces/11.jpg"></div>
                                                    <div class="main-img-user"><img alt="" class="rounded-circle"
                                                            src="assets/img/faces/12.jpg"></div>
                                                    <div class="main-img-user"><img alt="" class="rounded-circle"
                                                            src="assets/img/faces/13.jpg"></div>
                                                    <div class="main-img-user"><img alt="" class="rounded-circle"
                                                            src="assets/img/faces/4.jpg"></div>
                                                    <div class="main-img-user online"><img alt=""
                                                            class="rounded-circle" src="assets/img/faces/5.jpg"></div>
                                                    <div class="main-avatar">
                                                        +23
                                                    </div>
                                                </div><!-- demo-avatar-group -->
                                            </div><!-- demo-avatar-group -->
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-0 mg-t-10">28 people like your photo</h6>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="dropdown show">
                                                <a class="new" href="JavaScript:void(0);"><i
                                                        class="far fa-heart"></i></a> <a class="new"
                                                    href="JavaScript:void(0);"><i class="far fa-comment"></i></a> <a
                                                    class="new" href="JavaScript:void(0);"><i
                                                        class="far fa-share-square"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- main-profile-body -->
            </div>
        </div>
    </div>
@endsection
@section('custom-scripts')
    <script>
        $(function() {

            // Remove svg.radial-progress .complete inline styling
            $('svg.radial-progress').each(function(index, value) {
                $(this).find($('circle.complete')).removeAttr('style');
            });

            // Activate progress animation on scroll
            $(window).scroll(function() {
                $('svg.radial-progress').each(function(index, value) {
                    // If svg.radial-progress is approximately 25% vertically into the window when scrolling from the top or the bottom
                    if (
                        $(window).scrollTop() > $(this).offset().top - ($(window).height() *
                        0.75) &&
                        $(window).scrollTop() < $(this).offset().top + $(this).height() - ($(window)
                            .height() * 0.25)
                    ) {
                        // Get percentage of progress
                        percent = $(value).data('percentage');
                        // Get radius of the svg's circle.complete
                        radius = $(this).find($('circle.complete')).attr('r');
                        // Get circumference (2πr)
                        circumference = 2 * Math.PI * radius;
                        // Get stroke-dashoffset value based on the percentage of the circumference
                        strokeDashOffset = circumference - ((percent * circumference) / 100);
                        // Transition progress for 1.25 seconds
                        $(this).find($('circle.complete')).animate({
                            'stroke-dashoffset': strokeDashOffset
                        }, 1250);
                    }
                });
            }).trigger('scroll');

        });
    </script>
@endsection
