@extends('welcome')
@section('page-title', 'Job Details')
@section('custom-css')
    <style>
        .main-content-body-profile .nav {
            border-bottom: 1px solid #ffffff;
        }

        #ChatBody .content-inner{
            height:400px;
            overflow-y: auto;
            scroll-behavior: smooth;
        }
        
        .timeline {
            width: 100%;
            height: 480px;
            padding: 20px;
            position:relative;
            box-sizing: border-box;
            background: #ffffff;
            overflow: auto;
            display: flex;
        }
        .timieline-title {
            font-size: 1.5em;
            font-weight: bold; 
        }
        .timeline-content {
            max-width: 300px;
            height: 200px;
            padding: 20px;
            flex-shrink: 0;
            flex-grow: 0;
            align-self: flex-start;
            /* background: #FFF; */
            position: relative;
            /* border-radius: 10px; */
            margin-right: 10px;
            /* box-shadow: 0px 0px 2px 2px rgba(0,0,0, 0.2); */
        }
        .timeline-content:before {
            position: absolute;
            width: calc(100% + 14px);
            height: 3px;
            top: calc(100% + 21px);
            background: #d1d4e4;
            content: "";
            left: -7px;
            border-radius: 0px;
        }

        .timeline-content:after {
            position: absolute;
            width: 4px;
            height: 25px;
            border-radius:10px;
            top: 100%;
            left: calc(50% - 10px);
            background: #156ef3;
            content: "";
            font-weight: 900;
        }
        .timeline-period {
            position: absolute;
            top: calc(100% + 25px);
            background: #FFF;
            padding: 10px;
            width: 100px;
            text-align:center;
            border-radius: 10px;
            left: calc(50% - 60px);
            /* box-shadow: 0px 0px 2px 2px rgba(0,0,0, 0.2); */
        }
        .timeline-period:before {
            width: 15px;
            height: 15px;
            background: #2636a1;
            border-radius: 50%;
            content: "";
            position: absolute;
            top: -9px;
            left: calc(50% - 6px);
            z-index: 2;
        }

        .timeline-content:nth-child(even) {
            align-self: flex-end;
        }
        .timeline-content:nth-child(even):before {
            top: -15px; 
        }
        .timeline-content:nth-child(even):after {
            top: -13px;
        }
        .timeline-content:nth-child(even) .timeline-period {
            top: -60px;
        }
        .timeline-content:nth-child(even) .timeline-period:before {
            top: calc(100% + 20px);
        }

        .timeline:not(.timeline--horizontal):before {
            display: none;
        }
    </style>
@endsection
@section('content')

    {{-- @dd($get_job_accepted_by) --}}
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="main-content-body main-content-body-profile">
                <nav class="nav main-nav-line card">
                    <a class="nav-link show active" data-toggle="tab" href="#about_company">Job Details</a>
                    @if ($get_job_details->clientProfile != null)
                        <a class="nav-link show" data-toggle="tab" href="#client_information">Client Information</a>
                    @endif
                    <a class="nav-link show" data-toggle="tab" href="#chats">Chats</a>
                    <a class="nav-link show" data-toggle="tab" href="#timeline">Timeline</a>
                </nav>
                <!-- main-profile-body -->
                <div class="main-profile-body p-0">
                    <div class="row row-sm">
                        <div class="col-12">
                            <div class="tab-content">
                                <div class="card mg-b-20 tab-pane fade show active" id="about_company">
                                    <div class="card-body">
                                        <div class="d-flex flex-row justify-content-between">
                                            <div class="main-profile-bio">
                                                <h6>Title:</h6>
                                                {{ $get_job_details->title ?? 'Not Found' }}
                                            </div>
                                            <div class="d-flex flex-row justify-content-between">
                                                <div class="job-created-at mr-5">
                                                    <h6>Accepted By: </h6>
                                                    <div class="media">
                                                        <div class="media-user mr-2">
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="agency owner image" class="rounded-circle"
                                                                    src="{{ asset('assets/img/faces/12.jpg') }}">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <a
                                                                href="{{ route('admin.get.agency.profile', ['id' => encrypt($get_job_accepted_by->id)]) }}">{{ $get_job_accepted_by->name }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="job-created-at mr-5">
                                                    <h6>Posted By: </h6>
                                                    <div class="media">
                                                        <div class="media-user mr-2">
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="agency owner image" class="rounded-circle"
                                                                    src="{{ asset('assets/img/photos/user-dummy-img.jpg') }}">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <a
                                                                href="{{ route('admin.get.agency.profile', ['id' => encrypt($get_job_details->user_id)]) }}">{{ $get_job_details->agencyProfile->company_name }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="job-created-at mr-5">
                                                    <h6>Posted On: </h6>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-secondary">{{ \Carbon\Carbon::parse($get_job_details->created_at)->format('M d, Y - h:i A') }}</a>
                                                </div>
                                                <div class="job-status">
                                                    <h6>Job Status: </h6>
                                                    <a href="javascript:void(0);"
                                                        class="btn btn-outline-success">{{ $get_job_details->status }}</a>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <h6>Description:</h6>
                                        <div class="description">
                                            {{ $get_job_details->description ?? 'Not Found' }}
                                        </div>
                                        <hr>

                                        <div class="d-flex flex-row justify-content-between flex-wrap">
                                            <div class="job-timing">
                                                <h6>Timing:</h6>
                                                <p style="margin-bottom:2px;">Start Date & Time:
                                                    {{ \carbon\Carbon::parse($get_job_details->start_date)->format('M d, Y') ?? 'Not Found' }}
                                                    {{ \carbon\Carbon::parse($get_job_details->start_time)->format('h:i A') ?? 'Not Found' }}
                                                </p>

                                                <p style="margin-bottom:2px;"> End Date & Time:
                                                    {{ \carbon\Carbon::parse($get_job_details->end_date)->format('M d, Y') ?? 'Not Found' }}
                                                    {{ \carbon\Carbon::parse($get_job_details->end_time)->format('h:i A') ?? 'Not Found' }}
                                                </p>
                                            </div>
                                            <div class="job-care-type">
                                                <h6>Care Type:</h6>
                                                {{ $get_job_details->care_type }}
                                            </div>
                                            <div class="job-care-items">
                                                <h6>Care Items:</h6>

                                                @php
                                                    $data = json_decode($get_job_details->care_items, true);
                                                    foreach ($data as $key => $value) {
                                                        echo 'Age: ' . $value['age'];
                                                        echo ', ';
                                                        echo 'Gender: ' . $value['gender'];
                                                        echo ', ';
                                                        echo 'Patient Name: ' . $value['patient_name'] . '<br />';
                                                    }
                                                    
                                                @endphp
                                            </div>
                                            <div class="job-amount">
                                                <h6>Amount:</h6>
                                                <span class="text-success">$</span> {{ $get_job_details->amount }}
                                            </div>

                                            <div class="job-adress">
                                                <h6>Location:</h6>
                                                {{ 'Appartment: ' . $get_job_details->appartment_or_unit . ', ' }}
                                                {{ 'Floor: ' . $get_job_details->floor_no . ', ' }}
                                                {{ 'Street: ' . $get_job_details->street }},
                                                {{ 'City: ' . $get_job_details->city }},
                                                {{ 'State: ' . $get_job_details->state }}, <br />
                                                {{ 'ZipCode: ' . $get_job_details->zip_code }},
                                                {{ 'Country: ' . $get_job_details->country }}
                                            </div>

                                        </div>
                                        <hr>
                                        <div class="d-flex flex-row justify-content-between">
                                            <div class="medical-history">
                                                <h6>Medical History:</h6>

                                                @php
                                                    $data = json_decode($get_job_details->medical_history, true);
                                                    if ($data != null) {
                                                        foreach ($data as $key => $value) {
                                                            if ($key == 4 || $key == 8 || $key == 12 || $key == 16 || $key == 20) {
                                                                echo '<br />';
                                                            }
                                                            echo $key + 1 . ') ' . '<span style="margin-right:10px; text-transform:capitalize;">' . $value . '</span>';
                                                        }
                                                    } else {
                                                        echo 'Not Found';
                                                    }
                                                @endphp
                                            </div>

                                            <div class="medical-history">
                                                <h6>Expertise:</h6>
                                                @php
                                                    
                                                    $data = json_decode($get_job_details->expertise, true);
                                                    
                                                    if ($data != null) {
                                                        foreach ($data as $key => $value) {
                                                            if ($key == 3 || $key == 6 || $key == 9 || $key == 12 || $key == 15) {
                                                                echo '<br />';
                                                            }
                                                            echo $key + 1 . ') ' . '<span style="margin-right:10px; text-transform:capitalize;">' . $value . '</span>';
                                                        }
                                                    } else {
                                                        echo 'Not Found';
                                                    }
                                                @endphp

                                            </div>

                                            <div class="other-requirements">
                                                <h6>Other Requirements:</h6>
                                                @php
                                                    
                                                    $data = json_decode($get_job_details->other_requirements, true);
                                                    
                                                    if ($data != null) {
                                                        foreach ($data as $key => $value) {
                                                            if ($key == 3 || $key == 6 || $key == 9 || $key == 12 || $key == 15) {
                                                                echo '<br />';
                                                            }
                                                            echo $key + 1 . ') ' . '<span style="margin-right:10px; text-transform:capitalize;">' . $value . '</span>';
                                                        }
                                                    } else {
                                                        echo 'Not Found';
                                                    }
                                                @endphp

                                            </div>

                                            <div class="check-list">
                                                <h6>Check List:</h6>
                                                @php
                                                    
                                                    $data = json_decode($get_job_details->check_list, true);
                                                    
                                                    if ($data != null) {
                                                        foreach ($data as $key => $value) {
                                                            if ($key == 3 || $key == 6 || $key == 9 || $key == 12 || $key == 15) {
                                                                echo '<br />';
                                                            }
                                                            echo $key + 1 . ') ' . '<span style="margin-right:10px; text-transform:capitalize;">' . $value . '</span>';
                                                        }
                                                    } else {
                                                        echo 'Not Found';
                                                    }
                                                @endphp

                                            </div>

                                            <div class="payment-status">
                                                <h6>Payment Status:</h6>
                                                <span class="text-success"
                                                    style="font-weight:800;text-transform:uppercase;">{{ $get_job_details->payment_status == 1 ? ' Complete' : 'Failed' }}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade show" id="client_information">
                                    <div class="card-body">
                                        <div class="card-header d-flex flex-row align-items-center justify-content-between flex-wrap">
                                            <div class="media">
                                                <div class="media-user mr-2">
                                                    <div class="main-img-user avatar-md">

                                                        @if ($get_job_details->clientProfile != null)
                                                            @if ($get_job_details->clientProfile->photo != null)
                                                                <img alt="client image" class="rounded-circle"
                                                                    src="{{ 'peaceworc.com/' . $get_job_details->clientProfile->photo }}">
                                                            @else
                                                                <img alt="client image" class="rounded-circle"
                                                                    src="{{ asset('assets/img/photos/user-dummy-img.jpg') }}">
                                                            @endif
                                                        @else
                                                            <img alt="client image" class="rounded-circle"
                                                                src="{{ asset('assets/img/photos/user-dummy-img.jpg') }}">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mb-0 mg-t-9">
                                                        {{ $get_job_details->clientProfile->name ?? 'Not Found' }}</h6>
                                                    <span class="text-muted">Account created on :
                                                        {{ $get_job_details->clientProfile != null ? Carbon\Carbon::parse($get_job_details->clientProfile->created_at)->format('M d Y, h:i A') : 'Not Found' }}</span>
                                                </div>
                                            </div>
                                            <div class="user-status-btn">
                                                @if ($get_job_details->clientProfile != null)
                                                    @if ($get_job_details->clientProfile->status == 1)
                                                        <a href="javascript:void(0);" class="btn btn-success">User
                                                            Active</a>
                                                    @else
                                                        <a href="javascript:void(0);" class="btn btn-danger">User
                                                            Inactive</a>
                                                    @endif
                                                @endif

                                            </div>
                                        </div>
                                        <hr>
                                        <label class="main-content-label tx-13 mg-b-20">Contact Information</label>
                                        <div class="main-profile-social-list d-flex flex-row flex-wrap">
                                            <div class="mb-3">
                                                <div class="media-body mr-4">
                                                    <h6>Phone</h6>
                                                    {{ $get_job_details->clientProfile->phone ?? 'Not Found' }}
                                                </div>
                                            </div>
                                            <div class="mr-3 mb-3">
                                                <div class="media-body mr-4">
                                                    <h6>Email</h6>
                                                    {{ $get_job_details->clientProfile->email ?? 'Not Found' }}
                                                </div>
                                            </div>
                                            <div class="mr-3 mb-3">
                                                <div class="media-body mr-4">
                                                    <h6>Gender</h6>
                                                    {{ $get_job_details->clientProfile->gender ?? 'Not Found' }}
                                                </div>
                                            </div>
                                            <div class="mr-3 mb-3">
                                                <div class="media-body mr-4">
                                                    <h6>Age</h6>
                                                    {{ $get_job_details->clientProfile->age ?? 'Not Found' }}
                                                </div>
                                            </div>
                                            <div class="mr-3 mb-3">
                                                <div class="media-body mr-4">
                                                    <h6>Location</h6>
                                                    @if ($get_job_details->clientProfile != null)
                                                        Appartment/Unit:
                                                        {{ $get_job_details->clientProfile->appartment_or_unit . ', ' ?? '' }}
                                                        Floor: {{ $get_job_details->clientProfile->floor_no . ', ' ?? '' }}
                                                        Street: {{ $get_job_details->clientProfile->street ?? ' ' }}, City:
                                                        {{ $get_job_details->clientProfile->city ?? '' }}, <br /> State:
                                                        {{ $get_job_details->clientProfile->state ?? '' }}, ZipCode:
                                                        {{ $get_job_details->clientProfile->zip_code ?? '' }}, Country:
                                                        {{ $get_job_details->clientProfile->country ?? '' }}
                                                    @else
                                                        <span>Not Found</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade show" id="chats">
                                    <div class="main-content-body main-content-body-chat">
                                        <div class="main-chat-header">
                                            <div class="main-img-user">
                                                <img alt="" src="{{asset('assets/img/faces/9.jpg')}}">
                                            </div>
                                            <div class="main-chat-msg-name">
                                                <h6>Reynante Labares</h6>
                                                <small>Last seen: 2 minutes ago</small>
                                            </div>
                                            <nav class="nav">
                                                <a class="nav-link" href="#">
                                                    <i class="icon ion-md-more"></i>
                                                </a>
                                                <a class="nav-link" data-toggle="tooltip" href="#" title="Download Chat">
                                                    <i class="icon ion-md-download"></i>
                                                </a>
                                            </nav>
                                        </div><!-- main-chat-header -->
                                        <div class="main-chat-body" id="ChatBody">
                                            <div class="content-inner">
                                                <label class="main-chat-time">
                                                    <span>3 days ago</span>
                                                </label>
                                                <div class="media flex-row-reverse">
                                                    <div class="main-img-user online">
                                                        <img alt="" src="{{asset('assets/img/faces/9.jpg')}}">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="main-msg-wrapper">
                                                            Nulla consequat massa quis enim. Donec pede justo, fringilla vel...
                                                        </div>
                                                        <div class="main-msg-wrapper">
                                                            rhoncus ut, imperdiet a, venenatis vitae, justo...
                                                        </div>
                                                        <div class="main-msg-wrapper pd-0">
                                                            <img alt="" class="wd-100 ht-100" src="{{asset('assets/img/ecommerce/01.jpg')}}">
                                                        </div>
                                                        <div>
                                                            <span>9:48 am</span>
                                                            <a href="#">
                                                                <i class="icon ion-android-more-horizontal"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media">
                                                    <div class="main-img-user online">
                                                        <img alt="" src="{{asset('assets/img/faces/6.jpg')}}">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="main-msg-wrapper">
                                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                                                        </div>
                                                        <div>
                                                            <span>9:32 am</span>
                                                            <a href="#">
                                                                <i class="icon ion-android-more-horizontal"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media flex-row-reverse">
                                                    <div class="main-img-user online">
                                                        <img alt="" src="{{asset('assets/img/faces/9.jpg')}}">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="main-msg-wrapper">
                                                            Nullam dictum felis eu pede mollis pretium
                                                        </div>
                                                        <div>
                                                            <span>11:22 am</span>
                                                            <a href="#">
                                                                <i class="icon ion-android-more-horizontal"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade show" id="timeline">
                                    <div class="card-body">
                                        <div class="timeline">
                                            <div class="timeline-content">
                                                <div class="timeline-period"></div>
                                                <div class="card"> 
                                                    <div class="card-body"> 
                                                        <p class="mg-b-0">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consictetur...</p>
                                                    </div>
                                                    <div class="card-footer bd-t"> January, 20, 2017 4:30am </div> 
                                                </div>
                                            </div>
                                            
                                            <div class="timeline-content">
                                                <div class="timeline-period"></div>
                                                <div class="card"> 
                                                    <div class="card-body"> 
                                                        <p class="mg-b-0">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consictetur...</p>
                                                    </div>
                                                    <div class="card-footer bd-t"> January, 20, 2017 4:30am </div> 
                                                </div>
                                            </div>
                                            
                                            <div class="timeline-content">
                                                <div class="timeline-period"></div>
                                                <div class="card"> 
                                                    <div class="card-body"> 
                                                        <p class="mg-b-0">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consictetur...</p>
                                                    </div>
                                                    <div class="card-footer bd-t"> January, 20, 2017 4:30am </div> 
                                                </div>
                                            </div>
                                            
                                            <div class="timeline-content">
                                                <div class="timeline-period"></div>
                                                <div class="card"> 
                                                    <div class="card-body"> 
                                                        <p class="mg-b-0">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consictetur...</p>
                                                    </div>
                                                    <div class="card-footer bd-t"> January, 20, 2017 4:30am </div> 
                                                </div>
                                            </div>
                                            
                                            <div class="timeline-content">
                                                <div class="timeline-period"></div>
                                                <div class="card"> 
                                                    <div class="card-body"> 
                                                        <p class="mg-b-0">Some quick example text to build on the card title and make up the bulk of the card's content. Lorem ipsum dolor sit amet consictetur...</p>
                                                    </div>
                                                    <div class="card-footer bd-t"> January, 20, 2017 4:30am </div> 
                                                </div>
                                            </div>
                                          </div>
                                        {{-- <div class="vtimeline">
                                            <div class="timeline-wrapper timeline-wrapper-primary">
                                                <div class="timeline-badge"></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h6 class="timeline-title">Art Ramadani posted a status update</h6>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>Tolerably earnestly middleton extremely distrusts she boy now not. Add and offered prepare how cordial two promise. Greatly who affixed suppose but enquire compact prepare all put. Added forth chief trees but rooms think may.</p>
                                                    </div>
                                                    <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                        <i class="fe fe-heart  text-muted mr-1"></i>
                                                        <span>19</span>
                                                        <span class="ml-auto"><i class="fe fe-calendar text-muted mr-1"></i>19 Oct 2019</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-wrapper timeline-inverted timeline-wrapper-secondary">
                                                <div class="timeline-badge"></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h6 class="timeline-title">Job Meeting</h6>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>You have a meeting at Laborator Office Today.</p>
                                                    </div>
                                                    <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                        <i class="fe fe-heart  text-muted mr-1"></i>
                                                        <span>25</span>
                                                        <span class="ml-auto"><i class="fe fe-calendar text-muted mr-1"></i>10th Oct 2019</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-wrapper timeline-wrapper-info">
                                                <div class="timeline-badge"></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h6 class="timeline-title">Arlind Nushi checked in at New York</h6>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>Alpha 5 has arrived just over a month after Alpha 4 with some major feature improvements and a boat load of bug fixes.</p>
                                                    </div>
                                                    <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                        <i class="fe fe-heart  text-muted mr-1"></i>
                                                        <span>19</span>
                                                        <span class="ml-auto"><i class="fe fe-calendar text-muted mr-1"></i>5th Oct 2019</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-wrapper timeline-inverted timeline-wrapper-danger">
                                                <div class="timeline-badge"></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h6 class="timeline-title">Eroll Maxhuni uploaded 4 new photos to album Summer Trip</h6>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>Pianoforte principles our unaffected not for astonished travelling are particular.</p>
                                                        <img src="assets/img/media/4.jpg" class="mb-3" alt="img">
                                                    </div>
                                                    <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                        <i class="fe fe-heart  text-muted mr-1"></i>
                                                        <span>19</span>
                                                        <span class="ml-auto"><i class="fe fe-calendar text-muted mr-1"></i>27th Sep 2017</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-wrapper timeline-wrapper-success">
                                                <div class="timeline-badge"></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h6 class="timeline-title">Support Team sent you an email</h6>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle quora plaxo ideeli hulu weebly balihoo....</p>
                                                        <a class="btn ripple btn-primary text-white mb-3">Read more</a>
                                                    </div>
                                                    <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                        <i class="fe fe-heart  text-muted mr-1"></i>
                                                        <span>25</span>
                                                        <span class="ml-auto"><i class="fe fe-calendar text-muted mr-1"></i>25th Sep 2017</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-wrapper timeline-inverted timeline-wrapper-warning">
                                                <div class="timeline-badge"></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h6 class="timeline-title">Mr. Doe shared a video</h6>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <div class="embed-responsive embed-responsive-16by9 mb-3">
                                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/XZmGGAbHqa0?rel=0&amp;controls=0&amp;showinfo=0"
                                                             allowfullscreen></iframe>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                        <i class="fe fe-heart  text-muted mr-1"></i>
                                                        <span>32</span>
                                                        <span class="ml-auto"><i class="fe fe-calendar text-muted mr-1"></i>19th Sep 2017</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="timeline-wrapper timeline-wrapper-dark">
                                                <div class="timeline-badge"></div>
                                                <div class="timeline-panel">
                                                    <div class="timeline-heading">
                                                        <h6 class="timeline-title">Sarah Young accepted your friend request</h6>
                                                    </div>
                                                    <div class="timeline-body">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet cupiditate, delectus deserunt doloribus earum eveniet explicabo fuga iste magni maxime</p>
                                                    </div>
                                                    <div class="timeline-footer d-flex align-items-center flex-wrap">
                                                        <i class="fe fe-heart text-muted mr-1"></i>
                                                        <span>26</span>
                                                        <span class="ml-auto"><i class="fe fe-calendar text-muted mr-1"></i>15th Sep 2017</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
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
