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
                                                <a href="{{route('admin.get.caregiver.profile', ['id' => encrypt($item->user_id) ])}}" target="_blank" class="btn btn-info btn-sm ml-2 text-white">View Details</a>
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
                        <table id="pendingDocumentVerificationTable" class="table able-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($get_pending_profile_approval as $key => $item)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td> {{$item->user->name}} </td>
                                        <td>
                                            @if ($item->is_basic_info_added == 0)
                                                <span>NO</span>
                                            @else
                                                <span>Yes</span>
                                                <a href="{{route('admin.get.caregiver.profile', ['id' => encrypt($item->user_id) ])}}" class="btn btn-info btn-sm ml-2 text-white">View Details</a>
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
                                        <td>
                                            <a class="btn btn-sm btn-primary ripple" href="#">Mark As Approved</a>
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


    <div class="modal" id="viewDocumentsModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Please verify the documents with caution!</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h6>Documents</h6>
                    <ul>
                        <li>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <a href="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" target="_blank">Child Abuse Certificate</a>
                                <a href="#" class="btn btn-dark btn-sm mt-2">Mark For Re-upload</a>
                            </div>
                            
                        </li>
                        <li>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <a href="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" target="_blank">Criminal Certificate</a>
                                <a href="#" class="btn btn-dark btn-sm mt-2">Mark For Re-upload</a>
                            </div>
                            
                        </li>
                        <li>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <a href="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" target="_blank">Covid Certificate</a>
                                <a href="#" class="btn btn-dark btn-sm mt-2">Mark For Re-upload</a>
                            </div>
                            
                        </li>
                        <li>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <a href="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" target="_blank">Identification Certificate</a>
                                <a href="#" class="btn btn-dark btn-sm mt-2">Mark For Re-upload</a>
                            </div>
                            
                        </li>
                        <li>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <a href="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" target="_blank">Background Verification Certificate</a>
                                <a href="#" class="btn btn-dark btn-sm mt-2">Mark For Re-upload</a>
                            </div>
                            
                        </li>
                    </ul>

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
                <div class="modal-footer">
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
                ordering: false,
                searching: true,
                buttons: [
                    'pdf',
                    'excel',
                    'print'
                ]
            });

            $('#pendingDocumentVerificationTable').dataTable({
                dom: 'Bfrtip',
                ordering: false,
                searching: true,
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
