@extends('welcome')
@section('page-title', 'Agency Jobs')
@section('custom-css')
@endsection
@section('content')

{{-- @dd($posted_job) --}}
<div class="row row-sm">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <h6 class="card-title mb-1">Posted Jobs</h6>
                </div>
                <div class="mb-4">
                    <div class="table-responsive" >
                        <table id="agencyJobTable" class="table table-bordered mg-b-1 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Job Title</th>
                                    <th>Company Name</th>
                                    <th>Client Name</th>
                                    <th>Amount</th>
                                    <th>Job Status</th>
                                    <td>Payment Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posted_job as $key => $item)
                                    <tr>
                                        <th scope="row"># {{$key + 1}}</th>
                                        <td>{{$item->title}}</td>
                                        <td>
                                            <a href="{{route('admin.get.agency.profile', ['id' => encrypt($item->user_id) ])}}">{{ $item->agencyProfile->company_name ?? 'Not Found' }}</a>
                                        </td>
                                        <td>{{ $item->clientProfile->name ?? 'Not Found' }}</td>
                                        {{-- <td> 

                                            @php  
                                                $data = json_decode($item->care_items, true);
                                                echo 'Age : ' . $data[0]['age']; echo ', '; echo 'Gender : ' . $data[0]['gender']; echo ', '; echo 'Patient Name : ' . $data[0]['patient_name'];
                                            @endphp
                                            
                                        </td> --}}
                                        {{-- <td>{{ \Carbon\Carbon::parse($item->start_date)->format('M d, Y') ?? 'Not Found' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->start_time)->format('h:i A') ?? 'Not Found' }}</td>
                                        <td>{{  \Carbon\Carbon::parse($item->end_date)->format('M d, Y') ?? 'Not Found' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->end_time)->format('h:i A') ?? 'Not Found' }}</td> --}}
                                        <td>
                                             <span style="font-weight:600;"><span class="text-success">$</span> {{$item->amount}}</span>
                                        </td>
                                        {{-- <td>
                                           {{$item->appartment_or_unit.', '}} {{$item->floor_no.', '}} {{$item->street}}, {{$item->city}}, {{$item->state}}, {{$item->country}}, {{$item->zip_code}}
                                        </td> --}}
                                        <td>
                                            {{$item->status}}
                                        </td>
                                        <td>
                                            @if ($item->payment_status == 1)
                                                <span class="badge bg-success text-white">Complete</span>
                                            @else
                                                <span class="badge bg-dark text-white">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('admin.get.agency.posted.job.details', ['id' => encrypt($item->id)])}}">View Job</a>
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
</div>
@endsection
@section('custom-scripts')
    <script>
        $(document).ready(function() {
            $('#agencyJobTable').dataTable({
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
@endsection