@extends('welcome')
@section('page-title', 'Manage Agency Profile')
@section('custom-css')
    <style>
        svg.radial-progress {
            height: auto;
            max-width: 170px;
            padding: 10px;
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

        .main-profile-social-list .media+.media {
            margin-top: 10px;
        }

        .profile-main-card-header {
            max-height: 120px;
        }

        .main-img-user {
            height: 65px;
            width: 65px;
        }

        
    </style>
@endsection
@section('content')

    {{-- @dd($get_agency_detail) --}}
    <div class="row row-sm">
        <div class="col-lg-4">
            <div class="card mg-b-20">
                <div class="card-header profile-main-card-header bg-gray-900">
                    <div class="d-flex flex-row flex-wrap align-items-center">
                        <div class="main-img-user profile-user">
                            @if ($get_agency_detail->agencyProfile->photo == null)
                                <img alt="agency company image" src="{{ asset($get_agency_detail->agencyProfile->photo) }}">
                            @else
                                <img alt="agency company image" src="{{ asset('assets/img/photos/10.jpg') }}">
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-between align-items-center mg-b-20 ml-3">
                            <h1 class="main-profile-name text-white mb-2">
                                {{ $get_agency_detail->agencyProfile->company_name ?? 'Not Found' }}
                            </h1>

                            @if ($get_agency_detail->agencyProfileStatus->is_profile_approved === 1)
                                <span class="badge  bg-success text-white">Profile Active</span>
                            @else
                                <span class="badge bg-danger text-white">Approval Pending</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="pl-0">
                        <div class="main-profile-overview">

                            <h6>Agency Profile Completion Status</h6>

                            <div
                                class="main-profile-progress-bar d-flex flex-row flex-wrap justify-content-center align-items-center">
                                <svg class="radial-progress" data-percentage="{{ $total_percentage }}" viewBox="0 0 80 80">
                                    <circle class="incomplete" cx="40" cy="40" r="35"></circle>
                                    <circle class="complete" cx="40" cy="40" r="35"
                                        style="stroke-dashoffset: 39.58406743523136;"></circle>
                                    <text class="percentage" x="50%" y="57%"
                                        transform="matrix(0, 1, -1, 0, 80, 0)">{{ $total_percentage }}%</text>
                                </svg>

                                <div class="d-flex flex-column p-3">
                                    <label class="ckbox  pb-3">
                                        @if ($get_agency_detail->agencyProfileStatus->is_business_info_complete === 1)
                                            <input checked type="checkbox">
                                        @else
                                            <input type="checkbox">
                                        @endif
                                        <span>Business Information Added</span>
                                    </label>
                                    <label class="ckbox pb-3">
                                        @if ($get_agency_detail->agencyProfileStatus->is_authorize_info_added === 1)
                                            <input checked type="checkbox">
                                        @else
                                            <input type="checkbox">
                                        @endif
                                        <span>Authorize Officer Added</span>
                                    </label>

                                    <label class="ckbox pb-3">
                                        @if ($get_agency_detail->agencyProfileStatus->is_profile_approved === 1)
                                            <input checked type="checkbox">
                                        @else
                                            <input type="checkbox">
                                        @endif
                                        <span>Profile Approved</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- main-profile-overview -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="main-content-body main-content-body-profile">
                <nav class="nav main-nav-line card ">
                    <a class="nav-link show active" data-toggle="tab" href="#about_company">About</a>
                    <a class="nav-link" data-toggle="tab" href="#company_owner_information">Owner</a>
                    <a class="nav-link" data-toggle="tab" href="#authorized_officers">Officers</a>
                    <a class="nav-link" data-toggle="tab" href="#agency_chats">Chats</a>
                    <a class="nav-link" data-toggle="tab" href="#feedback">Issue/ Feedback</a>
                    
                    <a class="nav-link" data-toggle="tab" href="#account_settings">Settings</a>
                </nav>

                <!-- main-profile-body -->
                <div class="main-profile-body p-0">
                    <div class="row row-sm">
                        <div class="col-12">
                            <div class="tab-content">
                                <div class="card mg-b-20 tab-pane fade show active" id="about_company">
                                    <div class="card-body">
                                        {{-- <div class="card-header">
                                            <div class="media">
                                                <div class="media-user mr-2">
                                                    <div class="main-img-user avatar-md"><img alt=""
                                                            class="rounded-circle" src="{{ asset('assets/img/faces/6.jpg') }}">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mb-0 mg-t-9">About Company</h6><span
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
                                        </div> --}}
                                        <h6>Bio</h6>
                                        <div class="main-profile-bio">
                                            {{ $get_agency_detail->agencyProfile->about_company ?? 'Not Found' }}
                                        </div>
                                        <hr>
                                        <label class="main-content-label tx-13 mg-b-20">Contact Information</label>
                                        <div class="main-profile-social-list d-flex flex-row flex-wrap align-items-center">
                                            <div class="media">
                                                <div class="media-icon bg-gray-100 text-primary">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Phone</span>
                                                    <a
                                                        href="#">{{ $get_agency_detail->agencyProfile->phone ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media ml-3">
                                                <div class="media-icon bg-gray-100 text-success">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Email</span>
                                                    <a
                                                        href="#">{{ $get_agency_detail->agencyProfile->email ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media ml-3">
                                                <div class="media-icon bg-gray-100 text-warning">
                                                    <i class="fa fa-map"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Address</span>
                                                    <a href="#">
                                                        {{ $get_agency_detail->agencyProfile->appartment_or_unit ? $get_agency_detail->agencyProfile->appartment_or_unit . ', ' : '' }}
                                                        {{ $get_agency_detail->agencyProfile->floor_no ? $get_agency_detail->agencyProfile->floor_no . ', ' : '' }}
                                                        {{ $get_agency_detail->agencyProfile->street ? $get_agency_detail->agencyProfile->street . ', ' : '' }}
                                                        {{ $get_agency_detail->agencyProfile->city_or_district ? $get_agency_detail->agencyProfile->city_or_district . ', ' : '' }}
                                                        {{ $get_agency_detail->agencyProfile->zip_code ? $get_agency_detail->agencyProfile->zip_code . ', ' : '' }}
                                                        {{ $get_agency_detail->agencyProfile->state ? $get_agency_detail->agencyProfile->state . ', ' : '' }}
                                                        {{ $get_agency_detail->agencyProfile->country ? $get_agency_detail->agencyProfile->country : '' }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <label class="main-content-label tx-13 mg-b-20">Other Information</label>
                                        <div class="main-profile-social-list d-flex flex-row flex-wrap align-items-center">
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-primary">
                                                    <i class="fas fa-file-contract"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Legal Structure</span>
                                                    <a
                                                        href="#">{{ $get_agency_detail->agencyProfile->legal_structure ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-success">
                                                    <i class="fas fa-sitemap"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Organization Type</span>
                                                    <a
                                                        href="#">{{ $get_agency_detail->agencyProfile->organization_type ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-warning">
                                                    <i class="fas fa-id-card"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Tax Id / EIN Id</span>
                                                    <a
                                                        href="#">{{ $get_agency_detail->agencyProfile->tax_id_or_ein_id ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-info">
                                                    <i class="fas fa-user-cog"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Total Employee</span>
                                                    <a
                                                        href="#">{{ $get_agency_detail->agencyProfile->number_of_employee ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-danger">
                                                    <i class="far fa-calendar-alt"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Active Years</span>
                                                    <a
                                                        href="#">{{ $get_agency_detail->agencyProfile->years_in_business ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-4">
                                                <div class="media-icon bg-gray-100 text-primary">
                                                    <i class="fas fa-globe"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Country Of Business</span>
                                                    <a
                                                        href="#">{{ $get_agency_detail->agencyProfile->country_of_business ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-4">
                                                <div class="media-icon bg-gray-100 text-success">
                                                    <i class="fas fa-hand-holding-usd"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Annual Revenue</span>
                                                    <a
                                                        href="#">{{ $get_agency_detail->agencyProfile->annual_business_revenue ? '$ ' . $get_agency_detail->agencyProfile->annual_business_revenue . ' USD' : 'Not Found' }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade" id="company_owner_information">
                                    <div class="card-body h-100">
                                        <div
                                            class="card-header d-flex flex-row align-items-center justify-content-between flex-wrap">
                                            <div class="media">
                                                <div class="media-user mr-2">
                                                    <div class="main-img-user avatar-md">
                                                        <img alt="agency owner image" class="rounded-circle"
                                                            src="{{ asset('assets/img/photos/user-dummy-img.jpg') }}">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mb-0 mg-t-9">{{ $get_agency_detail->name }}</h6>
                                                    <span class="text-muted">Account created on :
                                                        {{ Carbon\Carbon::parse($get_agency_detail->created_at)->format('M d Y, h:i A') }}</span>
                                                </div>
                                            </div>
                                            <div class="user-status-btn">
                                                @if ($get_agency_detail->status == 1)
                                                    <a href="javascript:void(0);" class="btn btn-success">User Active</a>
                                                @else
                                                    <a href="javascript:void(0);" class="btn btn-danger">User Inactive</a>
                                                @endif
                                            </div>
                                        </div>

                                        <hr>
                                        <label class="main-content-label tx-13 mg-b-20">Access Level</label>
                                        <a href="#"
                                            class="d-block">{{ $get_agency_detail->role == 1 ? 'Web-Administrator' : ($get_agency_detail->role == 6 ? 'Web-Operator' : 'USER') }}</a>

                                        <hr>
                                        <label class="main-content-label tx-13 mg-b-20">Contact Information</label>
                                        <div class="main-profile-social-list d-flex flex-row flex-wrap align-items-center">
                                            <div class="media">
                                                <div class="media-icon bg-gray-100 text-primary">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Phone</span>
                                                    <a href="#">{{ $get_agency_detail->phone ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media ml-3">
                                                <div class="media-icon bg-gray-100 text-success">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Email</span>
                                                    <a href="#">{{ $get_agency_detail->email ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade" id="authorized_officers">
                                    <div class="card-body">
                                        <div class="table-responsive mb-0">
                                            <table
                                                class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Role</th>
                                                        <th>Status</th>
                                                        <th>Created At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($get_agency_detail->authOfficer as $key => $officer)
                                                        <tr>
                                                            <td>
                                                                <div class="project-contain">
                                                                    <h6 class="mb-1 tx-13">{{ $key + 1 }}</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="project-contain">
                                                                    <h6 class="mb-1 tx-13">{{ $officer->name }}</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{ $officer->email }}
                                                            </td>
                                                            <td>{{ $officer->phone }}</td>
                                                            <td>{{ $officer->role }}</td>
                                                            <td>
                                                                @if ($officer->status == 1)
                                                                    <span
                                                                        class="badge bg-success-gradient text-white">Active</span>
                                                                @else
                                                                    <span
                                                                        class="badge bg-danger-gradient text-white">Inactive</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{ \Carbon\Carbon::parse($officer->created_at)->format('M d Y') }}
                                                            </td>
                                                            <td>
                                                                @if ($officer->status == 1)
                                                                    <button class="btn btn-primary btn-sm">Make
                                                                        Active</button>
                                                                @else
                                                                    <button class="btn btn-primary btn-sm">Make
                                                                        Deactive</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade" id="agency_chats">
                                    <div class="card-body">
                                        <div class="table-responsive mb-0">
                                            <table
                                                class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Job</th>
                                                        <th>Accepted By</th>
                                                        <th>Posted On</th>
                                                        <th>Closed On</th>
                                                        <th>Expire On</th>
                                                        <th>Download Chats</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Urgently Required Female Caregiver For Elderly Patients</td>
                                                        <td>Jhon Doe</td>
                                                        <td>June 5, 2023</td>
                                                        <td><span class="badge badge-primary">Not Closed</span></td>
                                                        <td>Oct 10, 2023</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary">Download
                                                                <i class="fas fa-file-pdf ml-2"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Urgently Required Caregiver For Baby Patients</td>
                                                        <td>Jhon Doe</td>
                                                        <td>June 5, 2023</td>
                                                        <td><span class="badge badge-dark">Closed</span></td>
                                                        <td>Oct 10, 2023</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary">Download
                                                                <i class="fas fa-file-pdf ml-2"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    {{-- @foreach ($get_agency_detail->authOfficer as $key => $officer)
                                                        <tr>
                                                            <td>
                                                                <div class="project-contain">
                                                                    <h6 class="mb-1 tx-13">{{$key + 1}}</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="project-contain">
                                                                    <h6 class="mb-1 tx-13">{{$officer->name}}</h6>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{$officer->email}}
                                                            </td>
                                                            <td>{{$officer->phone}}</td>
                                                            <td>{{$officer->role}}</td>
                                                            <td>
                                                                @if ($officer->status == 1)
                                                                    <span class="badge bg-success-gradient text-white">Active</span>                                                                    
                                                                @else
                                                                    <span class="badge bg-danger-gradient text-white">Inactive</span> 
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{\Carbon\Carbon::parse($officer->created_at)->format('M d Y')}}
                                                            </td>
                                                            <td>
                                                                @if ($officer->status == 1)
                                                                    <button class="btn btn-primary btn-sm">Make Active</button> 
                                                                @else
                                                                    <button class="btn btn-primary btn-sm">Make Deactive</button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach --}}

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade" id="feedback">
                                    <div class="card-body h-100">
                                        <label class="main-content-label tx-13 mg-b-20">Issue/Ticket</label>
                                        <div class="table-responsive mb-0">
                                            <table  class="table table-hover table-bordered mb-3 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Ticket</th>
                                                        <th>Status</th>
                                                        <th>Created On</th>
                                                        <th>Updated On</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Business Information</td>
                                                        <td>
                                                            <span class="badge bg-warning-gradient text-dark">Pending</span>
                                                        </td>
                                                        <td>3 Jun 2023</td>
                                                        <td>-</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-success">Mark As Resolved</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Certificate Not Uploaded</td>
                                                        <td>
                                                            <span class="badge bg-success-gradient text-white">Resolved</span>
                                                        </td>
                                                        <td>12 Jun 2023</td>
                                                        <td>15 Jun 2023</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary">Close Ticket</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <label class="main-content-label tx-13 mg-b-20">Send Feedback</label>
                                        <form action="#" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <select name="feedback_reason" class="form-control" id="feedback_reason">
                                                    <option value="">- Select Feedback Reason-</option>
                                                    <option value="invalid-document">Invalid Documents</option>
                                                    <option value="missing-details">Missing Details</option>
                                                    <option value="invalid-information">Invalid Information</option>
                                                    <option value="expired-document">Documents Expired</option>
                                                    <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="feedback_text" class="form-control" id="feedback_text" cols="30" rows="4"
                                                    placeholder="Please enter feedback here..."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade" id="account_settings">
                                    <div class="card-body h-100">
                                        <label class="main-content-label tx-13 mg-b-20">Agency Account Activation
                                            Status:</label>
                                        <form action="{{ route('admin.agency.profile.activation') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="agency_id"
                                                value="{{ encrypt($get_agency_detail->agencyProfileStatus->user_id) }}">

                                            @if ($get_agency_detail->agencyProfileStatus->is_profile_approved == 1)
                                                <input type="hidden" name="activation_status" value="0">
                                                <h6 class="text-success">Agency Profile Is Active</h6>
                                                <div class="form-group">
                                                    <button class="btn btn-danger">Click To Deactive</button>
                                                </div>
                                            @else
                                                <input type="hidden" name="activation_status" value="1">
                                                <h6 class="text-danger">Agency Profile Is Inactive</h6>
                                                <div class="form-group">
                                                    <button class="btn btn-primary">Click To Active</button>
                                                </div>
                                            @endif
                                        </form>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- main-profile-body -->
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

    <script>
        $(document).ready(function() {
            $(".owl-nav-slider").owlCarousel();
        });
    </script>

    <script>
        @if (session('success'))
            toastr.success('{{ session('success') }}', '', {
                positionClass: 'toast-top-right',
                timeOut: 3000
            });
        @endif

        @if (session('error'))
            toastr.error('{{ session('error') }}', '', {
                positionClass: 'toast-top-right',
                timeOut: 3000
            });
        @endif
    </script>
    <script>
        $('.changeProfileStatusBtn').on('click', function(){
            alert('Hello There!');
        });
    </script>
@endsection
