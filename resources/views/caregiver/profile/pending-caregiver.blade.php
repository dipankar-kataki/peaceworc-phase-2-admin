@extends('welcome')
@section('page-title', 'Pending Caregiver Profile')
@section('custom-css')

@endsection
@section('content')

    {{-- @dd($get_all_pending_profile) --}}
    <div class="row row-sm mb-4">
        <div class="col-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="mg-b-10">
                        <h6>Pending Documents Verification</h6>
                    </div>
                    <div class="table-responsive mb-0">
                        <table id="pendingProfileApprovalTable" class="table  table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Basic Info Added</th>
                                    <th>Optional Info Added</th>
                                    <th>Documents Uploaded</th>
                                    <th>Verification Status</th>
                                    <th>Created On</th>
                                    <th>View Documents</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($get_pending_documents_verification as $key => $item)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td> {{$item->user->name}} </td>
                                        <td>
                                            @if ($item->is_basic_info_added == 0)
                                                <span>NO</span>
                                            @else
                                                <span>Yes</span>
                                                <a class="btn btn-info btn-sm ml-2 text-white">View Details</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->is_optional_info_added == 0)
                                                <span>NO</span>
                                            @else
                                                <span>Yes</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->is_documents_uploaded == 0)
                                                <span>NO</span>
                                            @else
                                                <span>Yes</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->is_verification_complete == 0)
                                                <a href="#" class="text-danger">Pending</a>
                                                <button class="btn btn-primary btn-sm ml-2">Mark As Verified</button>
                                            @else
                                                <a href="#" class="text-success">Complete</a>
                                            @endif
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary ripple" data-target="#viewDocumentsModal" data-toggle="modal" href="#">Click To View </a>
                                        </td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-sm">
        <div class="col-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="mg-b-10">
                        <h6>Pending Profile Approval</h6>
                    </div>
                    <div class="table-responsive mb-0">
                        <table id="pendingDocumentVerificationTable" class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
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


    <div class="modal" id="viewDocumentsModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Please verify the documents with caution!</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h6>Documents</h6>
                   
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="button">Save changes</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#pendingProfileApprovalTable').dataTable({
                dom: 'Bfrtip',
                buttons: [
                    'pdf',
                    'excel',
                    'print'
                ]
            });

            $('#pendingDocumentVerificationTable').dataTable({
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
