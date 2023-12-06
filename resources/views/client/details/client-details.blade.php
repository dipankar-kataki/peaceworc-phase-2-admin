@extends('welcome')
@section('page-title', 'Client Details')
@section('custom-css')
    <style>
        h6{
            font-weight:400;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mg-b-20 tab-pane fade show">
                <div class="card-body">
                    <div class="card-header d-flex flex-row align-items-center justify-content-between flex-wrap">
                        <div class="media">
                            <div class="media-user mr-2">
                                <div class="main-img-user avatar-md" style="border:1px solid gray;">
                                    @if ($get_details->photo != null)
                                        <img alt="client image" class="rounded-circle"
                                            src="{{ isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) ? 'https' : 'http' . '://peaceworc.com/' . $get_details->photo }}">
                                    @else
                                        <img alt="client image" class="rounded-circle"
                                            src="{{ asset('assets/img/photos/user-dummy-img.jpg') }}">
                                    @endif
                                </div>
                            </div>
                            <div class="media-body">
                                <h6 class="mb-0 mg-t-9">
                                    {{ $get_details->name ?? 'Not Found' }}</h6>
                                <span class="text-muted">Account created on :
                                    {{ Carbon\Carbon::parse($get_details->created_at)->format('M d Y, h:i A') }}</span>
                            </div>
                        </div>
                        <div class="user-status-btn">
                            
                            <form action="{{route('admin.change.client.profile.status')}}" method="POST">
                                @csrf
                                <input type="hidden" name="client_id" value="{{ encrypt($get_details->id) }}">
                                <div class="dropdown">
                                
                                    @if ($get_details->status == 1)
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                            Client Active
                                        </button>
                                        <div class="dropdown-menu">
                                            <input type="hidden" name="activation_status" value="0">
                                            <button type="submit" class="dropdown-item">Deactivate</button>
                                        </div>
                                    @else
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                            Client Inactive
                                        </button>
                                        <div class="dropdown-menu">
                                            <input type="hidden" name="activation_status" value="1">
                                            <button type="submit" class="dropdown-item">Activate</button>
                                        </div>
                                    @endif
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <label class="main-content-label tx-13 mg-b-20">Contact Information</label>
                    <div class="main-profile-social-list">
                        <div class="mb-3">
                            <div class="media-body mr-4">
                                <h6>Phone : {{ $get_details->phone ?? 'Not Found' }} </h6>
                                
                            </div>
                        </div>
                        <div class="mr-3 mb-3">
                            <div class="media-body mr-4">
                                <h6>Email : {{ $get_details->email ?? 'Not Found' }} </h6>
                                
                            </div>
                        </div>
                        <div class="mr-3 mb-3">
                            <div class="media-body mr-4">
                                <h6>Gender : {{ $get_details->gender ?? 'Not Found' }}</h6>
                                
                            </div>
                        </div>
                        <div class="mr-3 mb-3">
                            <div class="media-body mr-4">
                                <h6>Age : {{ $get_details->age ?? 'Not Found' }}</h6>
                                
                            </div>
                        </div>
                        <div class="mr-3 mb-3">
                            <div class="media-body mr-4">
                                <div class="d-flex flex-row flex-wrap align-items-center">
                                    <h6>Location :</h6>
                                    <div class="location-details ml-2">
                                        {{ $get_details->appartment_or_unit != null ? 'Appartment/Unit: ' .$get_details->appartment_or_unit.', ' : '' }}
                                        {{ $get_details->floor_no != null ? 'Floor: ' .$get_details->floor_no. ', ' : '' }}
                                        {{ $get_details->street != null ? 'Street: '.$get_details->street. ', ' : '' }}
                                        {{ $get_details->city != null ? 'City: '.$get_details->city.', ' : '' }} <br />
                                        {{ $get_details->state != null ?  'State: '.$get_details->state. ', ' : '' }}
                                        {{ $get_details->zip_code != null ? 'ZipCode: '.$get_details->zip_code. ', ' : '' }}
                                        {{ $get_details->country != null ? 'Country: '.$get_details->country : '' }}
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#clientListTable').dataTable({
                dom: 'Bfrtip',
                buttons: [
                    'pdf',
                    'excel',
                    'print'
                ]
            });
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
