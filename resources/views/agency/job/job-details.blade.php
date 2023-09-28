@extends('welcome')
@section('page-title', 'Job Details')
@section('custom-css')
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
                    <a class="nav-link show" data-toggle="tab" href="#chat">Chats</a>
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
                                                <div class="job-created-at mr-4">
                                                    <h6>Accepted By: </h6>
                                                    <div class="media">
                                                        <div class="media-user mr-2">
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="agency owner image" class="rounded-circle" src="{{asset('assets/img/faces/12.jpg')}}">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <a href="{{route('admin.get.agency.profile', ['id' => encrypt($get_job_accepted_by->id) ])}}">{{$get_job_accepted_by->name}}</a>                                                                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="job-created-at mr-4">
                                                    <h6>Posted By: </h6>
                                                    <div class="media">
                                                        <div class="media-user mr-2">
                                                            <div class="main-img-user avatar-sm">
                                                                <img alt="agency owner image" class="rounded-circle" src="{{asset('assets/img/photos/user-dummy-img.jpg')}}">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <a href="{{route('admin.get.agency.profile', ['id' => encrypt($get_job_details->user_id) ])}}">{{$get_job_details->agencyProfile->company_name}}</a>                                                                                                                
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="job-created-at mr-4">
                                                    <h6>Posted On: </h6>
                                                    <a href="javascript:void(0);" class="btn btn-outline-secondary">{{\Carbon\Carbon::parse($get_job_details->created_at)->format('M d, Y - h:i A')}}</a>                                                    
                                                </div>
                                                <div class="job-status">
                                                    <h6>Job Status: </h6>
                                                    <a href="javascript:void(0);" class="btn btn-outline-success">{{$get_job_details->status}}</a>
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
                                                {{$get_job_details->care_type}}
                                            </div>
                                            <div class="job-care-items">
                                                <h6>Care Items:</h6>

                                                    @php  
                                                        $data = json_decode($get_job_details->care_items, true);
                                                        foreach ($data as $key => $value) {
                                                          echo 'Age: ' . $value['age']; echo ', '; echo 'Gender: ' . $value['gender']; echo ', '; echo 'Patient Name: ' . $value['patient_name']. "<br />"; 
                                                        }
                                                        
                                                    @endphp
                                            </div>
                                            <div class="job-amount">
                                                <h6>Amount:</h6>
                                                <span class="text-success">$</span> {{$get_job_details->amount}}
                                            </div>

                                            <div class="job-adress">
                                                <h6>Location:</h6>
                                                {{'Appartment: '.$get_job_details->appartment_or_unit.', '}} {{'Floor: '.$get_job_details->floor_no.', '}} {{'Street: '.$get_job_details->street}}, {{'City: '.$get_job_details->city}}, {{'State: '.$get_job_details->state}}, <br /> {{'ZipCode: '.$get_job_details->zip_code}}, {{'Country: '.$get_job_details->country}}
                                            </div>
                                            
                                        </div>
                                        <hr>
                                        <div class="d-flex flex-row justify-content-between">
                                            <div class="medical-history">
                                                <h6>Medical History:</h6>

                                                @php  
                                                    $data = json_decode($get_job_details->medical_history, true);
                                                    if($data != null){
                                                        foreach ($data as $key => $value) {
                                                            if($key == 4 || $key == 8 || $key == 12 || $key == 16 || $key == 20){
                                                                echo "<br />";
                                                            } 
                                                            echo ($key + 1). ') ' . '<span style="margin-right:10px; text-transform:capitalize;">'.$value.'</span>'; 
                                                        }
                                                    }else{
                                                        echo 'Not Found';
                                                    }
                                                @endphp
                                            </div>

                                            <div class="medical-history">
                                                <h6>Expertise:</h6>
                                                @php  
                                                    
                                                    $data = json_decode($get_job_details->expertise, true);

                                                    if($data != null){
                                                        foreach ($data as $key => $value) {
                                                            if($key == 3 || $key == 6 || $key == 9 || $key == 12 || $key == 15){
                                                                echo "<br />";
                                                            } 
                                                            echo ($key + 1). ') ' . '<span style="margin-right:10px; text-transform:capitalize;">'.$value.'</span>'; 
                                                        }
                                                    }else{
                                                       echo "Not Found";
                                                    }   
                                                @endphp
                                                
                                            </div>

                                            <div class="other-requirements">
                                                <h6>Other Requirements:</h6>
                                                @php  
                                                    
                                                    $data = json_decode($get_job_details->other_requirements, true);

                                                    if($data != null){
                                                        foreach ($data as $key => $value) {
                                                            if($key == 3 || $key == 6 || $key == 9 || $key == 12 || $key == 15){
                                                                echo "<br />";
                                                            } 
                                                            echo ($key + 1). ') ' . '<span style="margin-right:10px; text-transform:capitalize;">'.$value.'</span>'; 
                                                        }
                                                    }else{
                                                       echo "Not Found";
                                                    }   
                                                @endphp
                                                
                                            </div>

                                            <div class="check-list">
                                                <h6>Check List:</h6>
                                                @php  
                                                    
                                                    $data = json_decode($get_job_details->check_list, true);

                                                    if($data != null){
                                                        foreach ($data as $key => $value) {
                                                            if($key == 3 || $key == 6 || $key == 9 || $key == 12 || $key == 15){
                                                                echo "<br />";
                                                            } 
                                                            echo ($key + 1). ') ' . '<span style="margin-right:10px; text-transform:capitalize;">'.$value.'</span>'; 
                                                        }
                                                    }else{
                                                       echo "Not Found";
                                                    }   
                                                @endphp
                                                
                                            </div>

                                            <div class="payment-status">
                                                <h6>Payment Status:</h6>
                                                <span class="text-success" style="font-weight:800;text-transform:uppercase;">{{$get_job_details->payment_status == 1 ? ' Complete' : 'Failed'}}</span>
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
                                                                <img alt="client image" class="rounded-circle" src="{{'peaceworc.com/'.$get_job_details->clientProfile->photo}}">                     
                                                            @else
                                                                <img alt="client image" class="rounded-circle" src="{{asset('assets/img/photos/user-dummy-img.jpg')}}">
                                                            @endif                                                            
                                                        @else
                                                            <img alt="client image" class="rounded-circle" src="{{asset('assets/img/photos/user-dummy-img.jpg')}}">                                                            
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mb-0 mg-t-9">{{ $get_job_details->clientProfile->name ?? 'Not Found'}}</h6>
                                                    <span class="text-muted">Account created on : {{ $get_job_details->clientProfile != null ? Carbon\Carbon::parse($get_job_details->clientProfile->created_at)->format('M d Y, h:i A') : 'Not Found'}}</span>
                                                </div>
                                            </div>
                                            <div class="user-status-btn">
                                                @if ($get_job_details->clientProfile != null)
                                                    @if ($get_job_details->clientProfile->status == 1)
                                                        <a href="javascript:void(0);" class="btn btn-success">User Active</a>
                                                    @else
                                                        <a href="javascript:void(0);" class="btn btn-danger">User Inactive</a>
                                                    @endif
                                                @endif
                                                
                                            </div>
                                        </div>
                                        <hr>
                                        <label class="main-content-label tx-13 mg-b-20">Contact Information</label>
                                        <div class="main-profile-social-list d-flex flex-row flex-wrap">
                                            <div class="mb-3">
                                                <div class="media-body">
                                                    <h6>Phone</h6>
                                                    {{ $get_job_details->clientProfile->phone ?? 'Not Found' }}
                                                </div>
                                            </div>
                                            <div class="mr-3 mb-3">
                                                <div class="media-body">
                                                    <h6>Email</h6>
                                                    {{ $get_job_details->clientProfile->email ?? 'Not Found' }}
                                                </div>
                                            </div>
                                            <div class="mr-3 mb-3">
                                                <div class="media-body">
                                                    <h6>Gender</h6>
                                                    {{ $get_job_details->clientProfile->gender ?? 'Not Found' }}
                                                </div>
                                            </div>
                                            <div class="mr-3 mb-3">
                                                <div class="media-body">
                                                    <h6>Age</h6>
                                                    {{ $get_job_details->clientProfile->age ?? 'Not Found' }}
                                                </div>
                                            </div>
                                            <div class="mr-3 mb-3">
                                                <div class="media-body">
                                                    <h6>Location</h6>
                                                    @if ($get_job_details->clientProfile != null)
                                                        Appartment/Unit: {{$get_job_details->clientProfile->appartment_or_unit.', ' ?? ''}} Floor: {{$get_job_details->clientProfile->floor_no.', ' ?? ''}} Street: {{$get_job_details->clientProfile->street ?? ' '}}, City: {{$get_job_details->clientProfile->city ?? ''}}, <br /> State: {{$get_job_details->clientProfile->state ?? ''}}, ZipCode: {{$get_job_details->clientProfile->zip_code ?? ''}}, Country: {{$get_job_details->clientProfile->country ?? ''}}
                                                    @else
                                                        <span>Not Found</span>
                                                    @endif
                                                </div>
                                            </div>
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
