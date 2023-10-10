@extends('welcome')
@section('page-title', 'Pending Caregiver Profile')
@section('custom-css')

@endsection
@section('content')

    {{-- @dd($get_all_pending_profile) --}}
    <div class="row row-sm">
        <div class="col-12">
            <div class="card mg-b-20">
                <div class="card-body">
                    <div class="mg-b-10">
                        <h6>Pending Caregiver Profiles</h6>
                    </div>
                    <div class="table-responsive mb-0">
                        <table id="caregiverPendingProfileTable" class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
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
@endsection
@section('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#caregiverPendingProfileTable').dataTable({
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
