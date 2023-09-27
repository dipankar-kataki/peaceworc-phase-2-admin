@extends('welcome')
@section('page-title', 'Job Details')
@section('custom-css')
@endsection
@section('content')

    {{-- @dd($get_agency_detail) --}}
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="main-content-body main-content-body-profile">
                <nav class="nav main-nav-line card">
                    <a class="nav-link show active" data-toggle="tab" href="#about_company">Job Details</a>
                </nav>
                <!-- main-profile-body -->
                <div class="main-profile-body p-0">
                    <div class="row row-sm">
                        <div class="col-12">
                            <div class="tab-content">
                                <div class="card mg-b-20 tab-pane fade show active" id="about_company">
                                    <div class="card-body">
                                        <h6>Title:</h6>
                                        <div class="main-profile-bio">
                                            {{ $get_job_details->title ?? 'Not Found' }}
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
                                                            if($key == 3 || $key == 6 || $key == 9 || $key == 12 || $key == 15){
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
                                            
                                        </div>
                                        
                                        
                                        {{-- <label class="main-content-label tx-13 mg-b-20">Contact Information</label>
                                        <div class="main-profile-social-list d-flex flex-row flex-wrap align-get_job_detailss-center">
                                            <div class="media">
                                                <div class="media-icon bg-gray-100 text-primary">
                                                    <i class="fa fa-phone"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Phone</span>
                                                    <a href="#">{{ $get_agency_detail->agencyProfile->phone ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media ml-3">
                                                <div class="media-icon bg-gray-100 text-success">
                                                    <i class="fa fa-envelope"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Email</span>
                                                    <a href="#">{{ $get_agency_detail->agencyProfile->email ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media ml-3">
                                                <div class="media-icon bg-gray-100 text-warning">
                                                    <i class="fa fa-map"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Address</span>
                                                    <a href="#">
                                                        {{ $get_agency_detail->agencyProfile->appartment_or_unit ? $get_agency_detail->agencyProfile->appartment_or_unit.', ' : '' }}
                                                        {{ $get_agency_detail->agencyProfile->floor_no ? $get_agency_detail->agencyProfile->floor_no.', ' : '' }}
                                                        {{ $get_agency_detail->agencyProfile->street ? $get_agency_detail->agencyProfile->street.', ' : '' }}
                                                        {{ $get_agency_detail->agencyProfile->city_or_district ? $get_agency_detail->agencyProfile->city_or_district.', ' : '' }}
                                                        {{ $get_agency_detail->agencyProfile->zip_code ? $get_agency_detail->agencyProfile->zip_code.', ' : '' }}
                                                        {{ $get_agency_detail->agencyProfile->state ? $get_agency_detail->agencyProfile->state.', ' : '' }}
                                                        {{ $get_agency_detail->agencyProfile->country ? $get_agency_detail->agencyProfile->country : '' }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <label class="main-content-label tx-13 mg-b-20">Other Information</label>
                                        <div class="main-profile-social-list d-flex flex-row flex-wrap align-get_job_detailss-center">
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-primary">
                                                    <i class="fas fa-file-contract"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Legal Structure</span>
                                                    <a href="#">{{ $get_agency_detail->agencyProfile->legal_structure ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-success">
                                                    <i class="fas fa-sget_job_detailsap"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Organization Type</span>
                                                    <a href="#">{{ $get_agency_detail->agencyProfile->organization_type ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-warning">
                                                    <i class="fas fa-id-card"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Tax Id / EIN Id</span>
                                                    <a href="#">{{ $get_agency_detail->agencyProfile->tax_id_or_ein_id ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-info">
                                                    <i class="fas fa-user-cog"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Total Employee</span>
                                                    <a href="#">{{ $get_agency_detail->agencyProfile->number_of_employee ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-2">
                                                <div class="media-icon bg-gray-100 text-danger">
                                                    <i class="far fa-calendar-alt"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Active Years</span>
                                                    <a href="#">{{ $get_agency_detail->agencyProfile->years_in_business ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-4">
                                                <div class="media-icon bg-gray-100 text-primary">
                                                    <i class="fas fa-globe"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Country Of Business</span>
                                                    <a href="#">{{ $get_agency_detail->agencyProfile->country_of_business ?? 'Not Found' }}</a>
                                                </div>
                                            </div>
                                            <div class="media mr-4 mt-4">
                                                <div class="media-icon bg-gray-100 text-success">
                                                    <i class="fas fa-hand-holding-usd"></i>
                                                </div>
                                                <div class="media-body">
                                                    <span>Annual Revenue</span>
                                                    <a href="#">{{ $get_agency_detail->agencyProfile->annual_business_revenue ? '$ '.$get_agency_detail->agencyProfile->annual_business_revenue . ' USD' : 'Not Found' }}</a>
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
