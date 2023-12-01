@extends('welcome')
@section('page-title', 'Pending Agency Profile')
@section('custom-css')

@endsection
@section('content')
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
                                    <th>Business Info Added</th>
                                    <th>Optional Info Added</th>
                                    <th>Authorize Officer Added</th>
                                    <th>Created On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($get_pending_profile as $key => $agency)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td> {{$agency->user->name}} </td>
                                        <td>
                                            @if ($agency->is_business_info_complete == 0)
                                                <span>NO</span>
                                            @else
                                                <span>Yes</span>
                                                <a href="{{route('admin.get.agency.profile', ['id' => encrypt($agency->user_id) ])}}" target="_blank" class="btn btn-info btn-sm ml-2 text-white">View Details</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($agency->is_optional_info_added == 0)
                                                <span>NO</span>
                                            @else
                                                <span>Yes</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($agency->is_authorize_info_added == 0)
                                                <span>NO</span>
                                            @else
                                                <span>Yes</span>
                                            @endif
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($agency->created_at)->format('M d, Y') }}</td>
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
