@extends('welcome')
@section('page-title', 'Agency List')
@section('custom-css')
@endsection
@section('content')
<div class="row row-sm">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <h6 class="card-title mb-1">List Of Registered Agencies</h6>
                </div>
                <div class="mb-4">
                    <div class="table-responsive" >
                        <table id="agencyListTable" class="table table-bordered mg-b-1 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Company Name</th>
                                    <th>Company Email</th>
                                    <th>Company Phone</th>
                                    <th>Agency Owner Name</th>
                                    <th>Agency Owner Email</th>
                                    <th>Agency Owner Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($get_agency_list as $key => $item)
                                    <tr>
                                        <th scope="row"># {{$key + 1}}</th>
                                        <td>
                                            <a href="{{route('admin.get.agency.profile', ['id' => encrypt($item->id) ])}}">{{ $item->agencyProfile->company_name ?? 'Not Found' }}</a>
                                        </td>
                                        <td>{{ $item->agencyProfile->email ?? 'Not Found' }}</td>
                                        <td>{{ $item->agencyProfile->phone ?? 'Not Found' }}</td>
                                        <td>{{ $item->name ?? 'Not Found' }}</td>
                                        <td>{{ $item->email ?? 'Not Found' }}</td>
                                        <td>{{ $item->phone ?? 'Not Found' }}</td>
                                        <td>
                                            <a href="{{route('admin.get.agency.profile', ['id' => encrypt($item->id) ])}}" class="btn btn-info btn-sm">View Profile</a>
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
            $('#agencyListTable').dataTable({
                dom: 'Bfrtip',
                buttons: [
                    'pdf',
                    'excel',
                    'print'
                ]
            });
        });
    </script>
@endsection