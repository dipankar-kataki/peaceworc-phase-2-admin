@extends('welcome')
@section('page-title', 'Job Details')
@section('custom-css')
    <style>
        .main-content-body-profile .nav {
            border-bottom: 1px solid #ffffff;
        }

        #ChatBody .content-inner {
            height: 400px;
            overflow-y: auto;
            scroll-behavior: smooth;
        }

        h2 {
            margin: 5%;
            text-align: center;
            font-size: 4rem;
            font-weight: 100;
        }

        h1 {
            margin: 4%;
            text-align: center;
            font-size: 2rem;
            font-weight: 10;
            top: 0;
        }

        .timeline {
            display: flex;
            flex-direction: column;
            margin: 20px auto;
            position: relative;
        }

        .timeline__event {
            margin-bottom: 20px;
            position: relative;
            display: flex;
            margin: 20px 0;
            border-radius: 6px;
            align-self: center;
            width: 50vw;
        }

        .timeline__event:nth-child(2n + 1) {
            flex-direction: row-reverse;
        }

        .timeline__event:nth-child(2n + 1) .timeline__event__date {
            border-radius: 0 6px 6px 0;
        }

        .timeline__event:nth-child(2n + 1) .timeline__event__content {
            border-radius: 6px 0 0 6px;
        }

        .timeline__event:nth-child(2n + 1) .timeline__event__icon:before {
            content: "";
            width: 2px;
            height: 100%;
            background: #f6a4ec;
            position: absolute;
            top: 0%;
            left: 50%;
            right: auto;
            z-index: -1;
            transform: translateX(-50%);
            animation: fillTop 0.8s forwards 4s ease-in-out;
        }

        .timeline__event:nth-child(2n + 1) .timeline__event__icon:after {
            content: "";
            width: 100%;
            height: 2px;
            background: #f6a4ec;
            position: absolute;
            right: 0;
            z-index: -1;
            top: 50%;
            left: auto;
            transform: translateY(-50%);
            animation: fillLeft 0.8s forwards 4s ease-in-out;
        }

        .timeline__event__title {
            font-size: 1.2rem;
            line-height: 1.4;
            text-transform: uppercase;
            font-weight: 600;
            color: #9251ac;
            letter-spacing: 1.5px;
        }

        .timeline__event__content {
            padding: 10px 25px;
            box-shadow: 0 30px 60px -12px rgba(50, 50, 93, 0.25), 0 18px 36px -18px rgba(0, 0, 0, 0.3), 0 -12px 36px -8px rgba(0, 0, 0, 0.025);
            background: #fff;
            width: calc(40vw - 84px);
            border-radius: 0 6px 6px 0;
        }

        .timeline__event__date {
            /* color: #f6a4ec; */
            color: #514f4f;
            /* font-size: 1.5rem; */
            font-weight: 600;
            /* background: #9251ac; */
            background: #f7f7f7;
            display: flex;
            align-items: center;
            justify-content: center;
            white-space: nowrap;
            padding: 0 20px;
            border-radius: 6px 0 0 6px;
        }

        .timeline__event__icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9251ac;
            padding: 20px;
            align-self: center;
            margin: 0 20px;
            /* background: #f6a4ec; */
            background: #e7f2fb;
            border-radius: 100%;
            width: 40px;
            box-shadow: 0 30px 60px -12px rgba(50, 50, 93, 0.25), 0 18px 36px -18px rgba(0, 0, 0, 0.3), 0 -12px 36px -8px rgba(0, 0, 0, 0.025);
            padding: 30px;
            height: 40px;
            position: relative;
        }

        .timeline__event__icon i {
            font-size: 32px;
        }

        .timeline__event__icon:before {
            content: "";
            width: 2px;
            height: 100%;
            /* background: #f6a4ec; */
            background: #87bbfe;
            position: absolute;
            top: 0%;
            z-index: -1;
            left: 50%;
            transform: translateX(-50%);
            animation: fillTop 0.8s forwards 4s ease-in-out;
        }

        .timeline__event__icon:after {
            content: "";
            width: 100%;
            height: 2px;
            /* background: #f6a4ec; */
            background: #87bbfe;
            position: absolute;
            left: 0%;
            z-index: -1;
            top: 50%;
            transform: translateY(-50%);
            animation: fillLeftOdd 0.8s forwards 4s ease-in-out;
        }

        .timeline__event__description {
            flex-basis: 100%;
        }

        .timeline__event__description p {
            margin-bottom: 0px;
        }

        .timeline__event--type2:after {
            background: #adb0eb;
        }

        .timeline__event--type2 .timeline__event__date {
            color: #87bbfe;
            background: #555ac0;
        }

        .timeline__event--type2:nth-child(2n + 1) .timeline__event__icon:before,
        .timeline__event--type2:nth-child(2n + 1) .timeline__event__icon:after {
            background: #87bbfe;
        }

        .timeline__event--type2 .timeline__event__icon {
            background: #87bbfe;
            color: #555ac0;
        }

        .timeline__event--type2 .timeline__event__icon:before,
        .timeline__event--type2 .timeline__event__icon:after {
            background: #87bbfe;
        }

        .timeline__event--type2 .timeline__event__title {
            color: #555ac0;
        }

        .timeline__event--type3:after {
            background: #24b47e;
        }

        .timeline__event--type3 .timeline__event__date {
            color: #aff1b6;
            background-color: #24b47e;
        }

        .timeline__event--type3:nth-child(2n + 1) .timeline__event__icon:before,
        .timeline__event--type3:nth-child(2n + 1) .timeline__event__icon:after {
            background: #aff1b6;
        }

        .timeline__event--type3 .timeline__event__icon {
            background: #aff1b6;
            color: #24b47e;
        }

        .timeline__event--type3 .timeline__event__icon:before,
        .timeline__event--type3 .timeline__event__icon:after {
            background: #aff1b6;
        }

        .timeline__event--type3 .timeline__event__title {
            color: #24b47e;
        }

        .timeline__event:last-child .timeline__event__icon:before {
            content: none;
        }

        @media (max-width: 786px) {
            .timeline__event {
                flex-direction: column;
                align-self: center;
            }

            .timeline__event__content {
                width: 100%;
            }

            .timeline__event__icon {
                border-radius: 6px 6px 0 0;
                width: 100%;
                margin: 0;
                box-shadow: none;
            }

            .timeline__event__icon:before,
            .timeline__event__icon:after {
                display: none;
            }

            .timeline__event__date {
                border-radius: 0;
                padding: 20px;
            }

            .timeline__event:nth-child(2n + 1) {
                flex-direction: column;
                align-self: center;
            }

            .timeline__event:nth-child(2n + 1) .timeline__event__date {
                border-radius: 0;
                padding: 20px;
            }

            .timeline__event:nth-child(2n + 1) .timeline__event__icon {
                border-radius: 6px 6px 0 0;
                margin: 0;
            }
        }

        @keyframes fillLeft {
            100% {
                right: 100%;
            }
        }

        @keyframes fillTop {
            100% {
                top: 100%;
            }
        }

        @keyframes fillLeftOdd {
            100% {
                left: 100%;
            }
        }
    </style>
@endsection
@section('content')
    @php $test_array = ['Reached Job Site','Job Started','Preparing Meal','Dressing Patient','Hanging Out With Patient','Task 2 Completed','Location Updated Successfully', 'Job Closed'] @endphp
    {{-- @dd($get_job_accepted_by) --}}
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="main-content-body main-content-body-profile">
                <nav class="nav main-nav-line card">
                    <a class="nav-link show active" data-toggle="tab" href="#about_company">Job Details</a>
                    @if ($get_job_details->clientProfile != null)
                        <a class="nav-link show" data-toggle="tab" href="#client_information">Client Details</a>
                    @endif
                    <a class="nav-link show" data-toggle="tab" href="#chats">Chats</a>
                    <a class="nav-link show" data-toggle="tab" href="#dispute">Dispute 
                        <span class="badge bg-success rounded-pill text-white me-2">New</span>
                    </a>
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
                                                @if ($get_job_accepted_by != null)
                                                    <div class="job-created-at mr-5">
                                                        <h6>Awarded To: </h6>
                                                        <div class="media">
                                                            <div class="media-user mr-2">
                                                                <div class="main-img-user avatar-sm">
                                                                    <img alt="agency owner image" class="rounded-circle"
                                                                        src="{{ asset('assets/img/faces/12.jpg') }}">
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <a
                                                                    href="{{ route('admin.get.caregiver.profile', ['id' => encrypt($get_job_accepted_by->id)]) }}">{{ $get_job_accepted_by->name }}
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                
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
                                                            <a href="{{ route('admin.get.agency.profile', ['id' => encrypt($get_job_details->user_id)]) }}">{{ $get_job_details->agencyProfile->company_name }}</a>
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
                                                        class="{{in_array($get_job_details->job_type, [1,2,3,6,7]) ? 'btn btn-outline-success' : 'btn btn-outline-danger'}}">
                                                        {{ $get_job_details->status }}
                                                    </a>
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
                                        <div
                                            class="card-header d-flex flex-row align-items-center justify-content-between flex-wrap">
                                            <div class="media">
                                                <div class="media-user mr-2">
                                                    <div class="main-img-user avatar-md" style="border:1px solid gray;">

                                                        @if ($get_job_details->clientProfile != null)
                                                            @if ($get_job_details->clientProfile->photo != null)
                                                                <img alt="client image" class="rounded-circle"
                                                                    src="{{ isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http'.'://peaceworc.com/' . $get_job_details->clientProfile->photo }}">
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
                                                <img alt="" src="{{ asset('assets/img/faces/9.jpg') }}">
                                            </div>
                                            <div class="main-chat-msg-name">
                                                <h6>Reynante Labares</h6>
                                                <small>Last seen: 2 minutes ago</small>
                                            </div>
                                            <nav class="nav">
                                                <a class="nav-link" href="#">
                                                    <i class="icon ion-md-more"></i>
                                                </a>
                                                <a class="nav-link" data-toggle="tooltip" href="#"
                                                    title="Download Chat">
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
                                                        <img alt="" src="{{ asset('assets/img/faces/9.jpg') }}">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="main-msg-wrapper">
                                                            Nulla consequat massa quis enim. Donec pede justo, fringilla
                                                            vel...
                                                        </div>
                                                        <div class="main-msg-wrapper">
                                                            rhoncus ut, imperdiet a, venenatis vitae, justo...
                                                        </div>
                                                        <div class="main-msg-wrapper pd-0">
                                                            <img alt="" class="wd-100 ht-100"
                                                                src="{{ asset('assets/img/ecommerce/01.jpg') }}">
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
                                                        <img alt="" src="{{ asset('assets/img/faces/6.jpg') }}">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="main-msg-wrapper">
                                                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                                            commodo ligula eget dolor.
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
                                                        <img alt="" src="{{ asset('assets/img/faces/9.jpg') }}">
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
                                <div class="card mg-b-20 tab-pane fade show" id="dispute">
                                    <div class="card-body">
                                        <div class="d-flex flex-row justify-content-between align-items-center">
                                            <div>
                                                <label class="main-content-label tx-13 mg-b-10">Dispute Reason:</label>
                                                <p>
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                                </p>
                                            </div>
                                            <button class="btn btn-outline-success">Mark As Resolved</button>
                                        </div>
                                        <label class="main-content-label tx-13 mg-b-20">Proof:</label>
                                        <div class="bd pd-10 clearfix mb-4" style="width: max-content;">
                                            <a class="demo" href="{{asset('assets/img/photos/2.jpg')}}" data-lightbox="dispute image">
                                                <img alt="dispute image" class="rounded" style="max-height:250px; max-width:250px;" src="{{asset('assets/img/photos/2.jpg')}}">
                                            </a>
                                        </div>

                                        
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label class="main-content-label tx-13 mg-b-20">Feedback</label>
                                                <textarea class="form-control" name="disputeFeedback" rows="4" placeholder="Please enter feedback here..."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                            
                                    </div>
                                </div>
                                <div class="card mg-b-20 tab-pane fade show" id="timeline">
                                    <div class="card-body">
                                        <div class="text-center">
                                            @if ($get_job_accepted_by != null)
                                                <h4>Job Awarded To :
                                                    <a
                                                        href="{{ route('admin.get.caregiver.profile', ['id' => encrypt($get_job_accepted_by->id)]) }}">{{ $get_job_accepted_by->name }}</a>
                                                </h4>
                                            @endif
                                            
                                            <label class="text-muted">Complete Job Timeline</label>
                                        </div>
                                        <div class="table-responsive mb-0 mt-4">
                                            <table
                                                class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
                                                <thead>
                                                    <tr>
                                                        <th>Activities</th>
                                                        <th>Date - Time</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="project-contain">
                                                                <h6 class="mb-1 tx-13">
                                                                    Job Posted By : 
                                                                    <a href="{{ route('admin.get.agency.profile', ['id' => encrypt($get_job_details->user_id)]) }}">
                                                                        {{ $get_job_details->agencyProfile->company_name }}
                                                                    </a>
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($get_job_details->created_at)->format('M d, Y - h:i A') }}</td>
                                                        <td>Open</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="project-contain">
                                                                <h6 class="mb-1 tx-13">
                                                                    Job Posted By : 
                                                                    <a href="{{ route('admin.get.agency.profile', ['id' => encrypt($get_job_details->user_id)]) }}">
                                                                        {{ $get_job_details->agencyProfile->company_name }}
                                                                    </a>
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($get_job_details->created_at)->format('M d, Y - h:i A') }}</td>
                                                        <td>Bidding Started</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="project-contain">
                                                                <h6 class="mb-1 tx-13">Bidding Stopped</h6>
                                                            </div>
                                                        </td>
                                                        <td>15 March 2023 5:09 PM</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="project-contain">
                                                                <h6 class="mb-1 tx-13">Total Caregivers Selected : 100</h6>
                                                            </div>
                                                        </td>
                                                        <td>15 March 2023 5:10 PM</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="project-contain">
                                                                <h6 class="mb-1 tx-13">Job Awarded To Jhon Wick</h6>
                                                            </div>
                                                        </td>
                                                        <td>15 March 2023 5:10 PM</td>
                                                        <td>Not Accepted</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="project-contain">
                                                                <h6 class="mb-1 tx-13">Job Awarded To : 
                                                                    <a href="#">Sita Letri</a></h6>
                                                            </div>
                                                        </td>
                                                        <td>15 March 2023 5:10 PM</td>
                                                        <td>Not Accepted</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="project-contain">
                                                                <h6 class="mb-1 tx-13">Job Awarded To : 
                                                                    <a href="#">Dinesh Kartik</a></h6>
                                                            </div>
                                                        </td>
                                                        <td>15 March 2023 5:10 PM</td>
                                                        <td>Not Accepted</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="project-contain">
                                                                <h6 class="mb-1 tx-13">Job Awarded To : 
                                                                    <a href="#">Bhanu Pratap</a></h6>
                                                            </div>
                                                        </td>
                                                        <td>15 March 2023 5:10 PM</td>
                                                        <td>Accepted</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
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
