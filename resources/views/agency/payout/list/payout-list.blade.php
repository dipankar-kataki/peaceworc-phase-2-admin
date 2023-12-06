@extends('welcome')
@section('page-title', 'Payout List')
@section('custom-css')
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="card-title mb-1">Payouts Table</h6>
                    </div>
                    <div class="mb-4">
                        <div class="table-responsive" >
                            <table id="payoutListTable" class="table table-bordered mg-b-1 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Job</th>
                                        <th>Amount</th>
                                        <th>Customer Id</th>
                                        <th>Payment Mode</th>
                                        <th>Caregiver Charge</th>
                                        <th>Peaceworc Percentage</th>
                                        <th>Peaceworc Charge</th>
                                        <th>Payment Status</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($get_payouts as $key => $item)
                                        <tr>
                                            <th scope="row"># {{$key + 1}}</th>
                                            <td>
                                                <a href="{{route('admin.get.agency.posted.job.details', ['id' => encrypt($item->job_id) ])}}">{{ $item->job->title ?? 'Not Found' }}</a>
                                            </td>
                                            <td> <span class="text-success">$</span>{{ $item->amount ?? 'Not Found' }}</td>
                                            <td>{{ $item->customer_id ?? 'Not Found' }}</td>
                                            <td>{{ $item->payment_mode ?? 'Not Found' }}</td>
                                            <td> <span class="text-success">$</span>{{ $item->caregiver_charge ?? 'Not Found' }}</td>
                                            <td>{{ $item->peaceworc_percentage ?? 'Not Found' }}</td>
                                            <td> <span class="text-success">$</span>{{ $item->peaceworc_charge ?? 'Not Found' }}</td>
                                            <td>
                                                @if ($item->payment_status == 1)
                                                    <sapn class="text-success">Success</span>
                                                @else
                                                    <span class="text-danger"> Failed </span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('M d, Y h:i A') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
            $('#payoutListTable').dataTable({
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
