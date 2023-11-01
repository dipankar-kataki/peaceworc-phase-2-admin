@extends('welcome')
@section('page-title', 'Manage Caregiver Profile')
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

        .bg-custom {
            background-color: #024177e8;
        }

        .bank-header {
            background: #dedcfb;
            border-radius: 5px;
            padding: 20px 20px;
        }

        .bank-transaction-filter {
            background: #0e7bc5;
            border-radius: 5px;
            padding: 10px 20px;
            color: white;
            margin-top: 10px;

        }

        .bank-transactions {
            background-color: #fbfbfb;
            padding: 5px 25px;
            border-radius: 5px;
            border: 1px solid #e1e6f1;
        }

        .bank-transactions .recieved-from label {
            margin-bottom: 2px;
            font-size: 13px;
            color: #9c9a9a;
        }

        .bank-transactions .recieved-from h6 {
            margin-bottom: 2px;
        }

        .all-transactions {
            margin-top: 20px;
            height: 400px;
            overflow-y: scroll;
            scroll-behavior: smooth;
            padding: 10px;
        }

        .amount-recieved h5 {
            color: rgb(1, 68, 1);
        }

        .rewards-bg img {
            width: 400px;
        }
        .rewards-note p{
            color: #535151;
            padding: 25px;
        }

        .rewards-note p .fa-info-circle{
            margin-right:10px;
            color:rgb(80, 80, 80);
        }

        .strike-table-label-header span{
            cursor: pointer;
        }
    </style>
@endsection
@section('content')

    {{-- @dd($get_caregiver_detail) --}}
    <div class="row row-sm">
        <div class="col-lg-4">
            <div class="card mg-b-20">
                <div class="card-header profile-main-card-header bg-custom">
                    <div class="d-flex flex-row flex-wrap align-items-center">
                        <div class="main-img-user profile-user">
                            @if ($get_caregiver_detail->caregiverProfile != null)
                                <img alt="caregiver company image"
                                    src="{{ asset($get_caregiver_detail->caregiverProfile->photo) }}">
                            @else
                                <img alt="caregiver company image" src="{{ asset('assets/img/photos/10.jpg') }}">
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-between align-items-center mg-b-20 ml-3">
                            <h1 class="main-profile-name text-white mb-2">
                                {{ $get_caregiver_detail->name ?? 'Not Found' }}
                            </h1>
                            @if ($get_caregiver_detail->caregiverProfile != null)
                                @if ($get_caregiver_detail->caregiverProfileStatus->is_profile_approved === 1)
                                    <span class="badge  bg-success text-white">Profile Active</span>
                                @else
                                    <span class="badge bg-danger text-white">Approval Pending</span>
                                @endif
                            @else
                                <span class="badge bg-danger text-white">Approval Pending</span>

                            @endif

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="pl-0">
                        <div class="main-profile-overview">

                            <h6>Caregiver Profile Completion Status</h6>

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
                                        @if ($get_caregiver_detail->caregiverProfileStatus != null)
                                            @if ($get_caregiver_detail->caregiverProfileStatus->is_basic_info_added === 1)
                                                <input checked type="checkbox">
                                            @else
                                                <input type="checkbox">
                                            @endif
                                        @endif

                                        <span class="ml-2">Basic Information Added</span>
                                    </label>

                                    <label class="ckbox pb-3">
                                        @if ($get_caregiver_detail->caregiverProfileStatus != null)
                                            @if ($get_caregiver_detail->caregiverProfileStatus->is_documents_uploaded === 1)
                                                <input checked type="checkbox">
                                            @else
                                                <input type="checkbox">
                                            @endif
                                        @endif
                                        <span class="ml-2">Required Documents Addedd</span>
                                    </label>

                                    <label class="ckbox pb-3">
                                        @if ($get_caregiver_detail->caregiverProfileStatus != null)
                                            @if ($get_caregiver_detail->caregiverProfileStatus->is_profile_approved === 1)
                                                <input checked type="checkbox">
                                            @else
                                                <input type="checkbox">
                                            @endif
                                        @endif
                                        <span class="ml-2">Profile Approved</span>
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
                <nav class="nav main-nav-line card">
                    <a class="nav-link show active" data-toggle="tab" href="#about">About</a>
                    <a class="nav-link" data-toggle="tab" href="#documents">Documents</a>
                    {{-- <a class="nav-link" data-toggle="tab" href="#authorized_officers">Authorized Officers</a> --}}
                    <a class="nav-link" data-toggle="tab" href="#caregiver_chats">Chats</a>
                    <a class="nav-link" data-toggle="tab" href="#bank_account">Bank</a>
                    <a class="nav-link" data-toggle="tab" href="#feedback">Issue/ Feedback</a>
                    <a class="nav-link" data-toggle="tab" href="#rewards">Rewards</a>
                    <a class="nav-link" data-toggle="tab" href="#flags">Flag <span class="badge bg-success rounded-pill text-white me-2">New</span></a>
                    <a class="nav-link" data-toggle="tab" href="#strikes">Strikes <span class="badge bg-success rounded-pill text-white me-2">New</span></a>
                    <a class="nav-link" data-toggle="tab" href="#account_settings">Settings</a>
                </nav>
                <!-- main-profile-body -->
                <div class="main-profile-body p-0">
                    <div class="row row-sm">
                        <div class="col-12">
                            <div class="tab-content">
                                <div class="card mg-b-20 tab-pane fade show active" id="about">
                                    <div class="card-body">
                                        <h6>Bio</h6>
                                        <div class="main-profile-bio">
                                            {{ $get_caregiver_detail->caregiverProfile->bio ?? 'Not Found' }}
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
                                                        href="#">{{ $get_caregiver_detail->caregiverProfile->phone ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media ml-3">
                                                <div class="media-icon bg-gray-100 text-success">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Email</span>
                                                    <a href="#">{{ $get_caregiver_detail->email ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media ml-3">
                                                <div class="media-icon bg-gray-100 text-warning">
                                                    <i class="fa fa-map"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Address</span>
                                                    @if ($get_caregiver_detail->caregiverProfile != null)
                                                        <a href="#">
                                                            {{ $get_caregiver_detail->caregiverProfile->appartment_or_unit ? $get_caregiver_detail->caregiverProfile->appartment_or_unit . ', ' : '' }}
                                                            {{ $get_caregiver_detail->caregiverProfile->floor_no ? $get_caregiver_detail->caregiverProfile->floor_no . ', ' : '' }}
                                                            {{ $get_caregiver_detail->caregiverProfile->street ? $get_caregiver_detail->caregiverProfile->street . ', ' : '' }}
                                                            {{ $get_caregiver_detail->caregiverProfile->city_or_district ? $get_caregiver_detail->caregiverProfile->city_or_district . ', ' : '' }}
                                                            {{ $get_caregiver_detail->caregiverProfile->zip_code ? $get_caregiver_detail->caregiverProfile->zip_code . ', ' : '' }}
                                                            {{ $get_caregiver_detail->caregiverProfile->state ? $get_caregiver_detail->caregiverProfile->state . ', ' : '' }}
                                                            {{ $get_caregiver_detail->caregiverProfile->country ? $get_caregiver_detail->caregiverProfile->country : '' }}
                                                        </a>
                                                    @else
                                                        <a href="#">Not Found</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <label class="main-content-label tx-13 mg-b-20">Other Information</label>
                                        <div class="main-profile-social-list d-flex flex-row flex-wrap align-items-center">
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-primary">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Date Of Birth:</span>
                                                    <a
                                                        href="#">{{ $get_caregiver_detail->caregiverProfile->dob ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-success">
                                                    <i class="fa fa-venus-mars"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Gender</span>
                                                    <a
                                                        href="#">{{ $get_caregiver_detail->caregiverProfile->gender ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-warning">
                                                    <i class="fas fa-fingerprint"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Social Security Number:</span>
                                                    <a
                                                        href="#">{{ $get_caregiver_detail->caregiverProfile->ssn ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-info">
                                                    <i class="fas fa-signal"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Experience</span>
                                                    <a
                                                        href="#">{{ $get_caregiver_detail->caregiverProfile->experience ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-danger">
                                                    <i class="fa fa-briefcase"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Jobs Completed</span>
                                                    <a
                                                        href="#">{{ $get_caregiver_detail->caregiverProfile->care_completed ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-4">
                                                <div class="media-icon bg-gray-100 text-primary">
                                                    <i class="fas fa-globe"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Job Type</span>
                                                    <a
                                                        href="#">{{ $get_caregiver_detail->caregiverProfile->job_type ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            {{-- <div class="media mr-4 mt-4">
                                                <div class="media-icon bg-gray-100 text-success">
                                                    <i class="fas fa-hand-holding-usd"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Education</span>
                                                    <a href="#">{{ $get_caregiver_detail->caregiverProfile->education ? '$ '.$get_caregiver_detail->caregiverProfile->annual_business_revenue . ' USD' : 'Not Found' }}</a>
                                                </div>
                                            </div> --}}
                                        </div>

                                        <hr>
                                        <label class="main-content-label tx-13 mg-b-20">Education</label>
                                        <ul>
                                            <li>
                                                Secondary School Of Eduation - june 25, 2023 -
                                                <label class="text-muted tx-12">Guwahati</label>
                                            </li>
                                            <li>
                                                Bachelors Degree - june 25, 1994 -
                                                <label class="text-muted tx-12">USA</label>
                                            </li>
                                            <li>
                                                Baal Education - june 25, 1846 -
                                                <label class="text-muted tx-12">WAKANDA</label>
                                            </li>
                                        </ul>

                                        <hr>
                                        <label class="main-content-label tx-13 mg-b-20">Certificates</label>
                                        <div class="main-profile-social-list d-flex flex-row flex-wrap align-items-center">
                                            <label class="text-muted tx-14">- Not Found</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade" id="documents">
                                    <div class="card-body">
                                        <div class="d-flex flex-row justify-content-between align-items-center mg-b-20 strike-table-label-header">
                                            <label class="main-content-label tx-13 ">
                                                Caregiver Documents Management Table
                                            </label>
                                        </div>
                                        
                                        <div class="table-responsive mb-0">
                                            <table class="table table-hover table-bordered mb-3 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Expiry Date</th>
                                                        <th>Status</th>
                                                        <th>View</th>
                                                        <th>Created At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Child Abuse</td>
                                                        <td> Nov 1, 2023 </td>
                                                        <td><span class="badge bg-success rounded-pill text-white me-2">Valid</span></td>
                                                        <td><button class="btn btn-sm btn-primary">View Doc</button></td>
                                                        <td>Jan 3, 2028</td>
                                                        <td> <button class="btn btn-sm btn-danger">Mark Invalid</button> </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Tuberculosis</td>
                                                        <td> Jan 20, 2025 </td>
                                                        <td><span class="badge bg-success rounded-pill text-white me-2">Valid</span></td>
                                                        <td><button class="btn btn-sm btn-primary">View Doc</button></td>
                                                        <td>Jan 3, 2028</td>
                                                        <td> <button class="btn btn-sm btn-danger">Mark Invalid</button> </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade" id="caregiver_chats">
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
                                                    {{-- @foreach ($get_caregiver_detail->authOfficer as $key => $officer)
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
                                <div class="card mg-b-20 tab-pane fade" id="bank_account">
                                    <div class="card-body h-100">
                                        <div class="bank-header">
                                            <div class="d-flex flex-row justify-content-between">
                                                <div class="mg-b-10">
                                                    <label class="main-content-label tx-13 mg-b-10">Bank Name</label>
                                                    <p>MUFG Americas Holdings Corporation</p>
                                                </div>
                                                <div class="mg-b-10">
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-danger task-box danger  mb-0">Delete Bank</a>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-rowflex-wrap">
                                                <div class="mg-b-10">
                                                    <label class="main-content-label tx-13 mg-b-10">Routing Number</label>
                                                    <p>123456789</p>
                                                </div>
                                                <div class="ml-5 mg-b-10">
                                                    <label class="main-content-label tx-13 mg-b-10">Account Number</label>
                                                    <p>XXXXXXXXXX6789</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="bank-transaction-filter">
                                            <div class="d-flex flex-row justify-content-between align-items-center">
                                                <div class="my-earnings">
                                                    <label for="">Total Earnings</label>
                                                    <h4>$ 20000</h4>
                                                </div>
                                                <div class="filter">
                                                    <select name="filter-month" id="filterByMonth" class="form-control">
                                                        <option value="" selected disabled>- Filter -</option>
                                                        <option value="january">January</option>
                                                        <option value="february">February</option>
                                                        <option value="march">March</option>
                                                        <option value="april">April</option>
                                                        <option value="may">May</option>
                                                        <option value="june">June</option>
                                                        <option value="july">July</option>
                                                        <option value="august">August</option>
                                                        <option value="september">September</option>
                                                        <option value="october">October</option>
                                                        <option value="november">November</option>
                                                        <option value="december">December</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="all-transactions">
                                            <h6 class="mb-10">Transaction History</h6>
                                            <div class="bank-transactions mg-b-10">
                                                <div class="d-flex flex-row justify-content-between align-items-center">
                                                    <div class="recieved-from">
                                                        <label for="">Recieved From</label>
                                                        <h6>DK Industries</h6>
                                                        <label for="">2 hours ago</label>
                                                    </div>
                                                    <div class="amount-recieved">
                                                        <h5>$ 4000</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bank-transactions mg-b-10">
                                                <div class="d-flex flex-row justify-content-between align-items-center">
                                                    <div class="recieved-from">
                                                        <label for="">Recieved From</label>
                                                        <h6>DK Industries</h6>
                                                        <label for="">2 hours ago</label>
                                                    </div>
                                                    <div class="amount-recieved">
                                                        <h5>$ 100</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bank-transactions mg-b-10">
                                                <div class="d-flex flex-row justify-content-between align-items-center">
                                                    <div class="recieved-from">
                                                        <label for="">Recieved From</label>
                                                        <h6>DK Industries</h6>
                                                        <label for="">2 hours ago</label>
                                                    </div>
                                                    <div class="amount-recieved">
                                                        <h5>$ 6300</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bank-transactions mg-b-10">
                                                <div class="d-flex flex-row justify-content-between align-items-center">
                                                    <div class="recieved-from">
                                                        <label for="">Recieved From</label>
                                                        <h6>DK Industries</h6>
                                                        <label for="">2 hours ago</label>
                                                    </div>
                                                    <div class="amount-recieved">
                                                        <h5>$ 300</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bank-transactions mg-b-10">
                                                <div class="d-flex flex-row justify-content-between align-items-center">
                                                    <div class="recieved-from">
                                                        <label for="">Recieved From</label>
                                                        <h6>DK Industries</h6>
                                                        <label for="">2 hours ago</label>
                                                    </div>
                                                    <div class="amount-recieved">
                                                        <h5>$ 2000</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bank-transactions mg-b-10">
                                                <div class="d-flex flex-row justify-content-between align-items-center">
                                                    <div class="recieved-from">
                                                        <label for="">Recieved From</label>
                                                        <h6>DK Industries</h6>
                                                        <label for="">2 hours ago</label>
                                                    </div>
                                                    <div class="amount-recieved">
                                                        <h5>$ 400</h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bank-transactions mg-b-10">
                                                <div class="d-flex flex-row justify-content-between align-items-center">
                                                    <div class="recieved-from">
                                                        <label for="">Recieved From</label>
                                                        <h6>DK Industries</h6>
                                                        <label for="">2 hours ago</label>
                                                    </div>
                                                    <div class="amount-recieved">
                                                        <h5>$ 3000</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade" id="feedback">
                                    <div class="card-body h-100">
                                        <label class="main-content-label tx-13 mg-b-20">Issue/Ticket</label>
                                        <div class="table-responsive mb-0">
                                            <table
                                                class="table table-hover table-bordered mb-3 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped">
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
                                                            <span
                                                                class="badge bg-warning-gradient text-dark">Pending</span>
                                                        </td>
                                                        <td>3 Jun 2023</td>
                                                        <td>-</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-success">Mark As
                                                                Resolved</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Certificate Not Uploaded</td>
                                                        <td>
                                                            <span
                                                                class="badge bg-success-gradient text-white">Resolved</span>
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
                                <div class="card mg-b-20 tab-pane fade" id="rewards">
                                    <div class="card-body h-100">
                                        <div class="d-flex flex-row justify-content-center align-items-center rewards-bg flex-wrap">
                                            <img src="{{ asset('assets/img/photos/rewards-bg.jpg') }}" alt="rewards-bg">
                                            <h4>
                                                Total Rewards Earned: 15K
                                                <span class="fa fa-star" style="color:#F4CE14;"></span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade" id="strikes">
                                    <div class="card-body h-100">
                                        <div class="d-flex flex-row justify-content-between align-items-center mg-b-20 strike-table-label-header">
                                            <label class="main-content-label tx-13 ">
                                                Caregiver Strike Status Table
                                            </label>
                                            <span class="fa fa-info-circle"  data-target="#strikeTableInfoModal" data-toggle="modal"></span>
                                        </div>
                                        
                                        <div class="table-responsive mb-0">
                                            <table class="table table-hover table-bordered mb-3 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Reason</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Banned From Bidding</th>
                                                        <th>Banned From Quick Call</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1/3</td>
                                                        <td>Job cancelled</td>
                                                        <td> Nov 1, 2023 </td>
                                                        <td>Dec 2, 2023</td>
                                                        <td> <span class="text-danger" style="font-weight:600;">96:00:20</span> (hrs)</td>
                                                        <td> <span class="text-danger" style="font-weight:600;">10:22:56</span> (hrs)</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger">Remove</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade" id="flags">
                                    <div class="card-body h-100">
                                        <div class="d-flex flex-row justify-content-between align-items-center mg-b-20 strike-table-label-header">
                                            <label class="main-content-label tx-13 ">
                                                Caregiver Flag Status Table
                                            </label>
                                            <span class="fa fa-info-circle"  data-target="#strikeTableInfoModal" data-toggle="modal"></span>
                                        </div>
                                        
                                        <div class="table-responsive mb-0">
                                            <table class="table table-hover table-bordered mb-3 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Reason</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Banned From Bidding</th>
                                                        <th>Banned From Quick Call</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1/3</td>
                                                        <td>Job cancelled</td>
                                                        <td> Nov 1, 2023 </td>
                                                        <td>Dec 2, 2023</td>
                                                        <td> <span class="text-danger" style="font-weight:600;">96:00:20</span> (hrs)</td>
                                                        <td> <span class="text-danger" style="font-weight:600;">10:22:56</span> (hrs)</td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger">Remove</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade" id="account_settings">
                                    <div class="card-body h-100">
                                        <label class="main-content-label tx-13 mg-b-20">Caregiver Account Activation
                                            Status</label>
                                        <form action="{{ route('admin.caregiver.profile.activation') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="caregiver_id"
                                                value="{{ encrypt($get_caregiver_detail->id) }}">

                                            @if ($get_caregiver_detail->caregiverProfileStatus != null)
                                                @if ($get_caregiver_detail->caregiverProfileStatus->is_profile_approved == 1)
                                                    <input type="hidden" name="activation_status" value="0">
                                                    <h6 class="text-success">Caregiver Profile Is Active</h6>
                                                    <div class="form-group">
                                                        <button class="btn btn-danger">Click To Deactive</button>
                                                    </div>
                                                @else
                                                    <input type="hidden" name="activation_status" value="1">
                                                    <h6 class="text-danger">Caregiver Profile Is Inactive</h6>
                                                    <div class="form-group">
                                                        <button class="btn btn-primary">Click To Active</button>
                                                    </div>
                                                @endif
                                            @else
                                                <h6 class="text-danger">Caregiver Profile Is Inactive</h6>
                                                <div class="form-group">
                                                    <button class="btn btn-primary" disabled>Click To Active</button>
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


    <div class="modal" id="strikeTableInfoModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Strike System</h6>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="d-flex flex-row justify-content-center align-items-center">
                        <img src="{{asset('assets/img/photos/strike-table-img.png')}}" alt="strike table">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
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
@endsection
