@extends('welcome')
@section('page-title', 'Client List')
@section('custom-css')
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="card-title mb-1">List Of Registered Clients</h6>
                    </div>
                    <div class="mb-4">
                        <div class="table-responsive" >
                            <table id="clientListTable" class="table table-bordered mg-b-1 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Address</th>
                                        <th>Created By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($get_client_list as $key => $item)
                                        <tr>
                                            <th scope="row"># {{$key + 1}}</th>
                                            <td>
                                                <img alt="avatar" class="avatar-md rounded-circle" src="{{asset('/assets/img/faces/2.jpg')}}">
                                            </td>
                                            <td>
                                                <a href="{{route('admin.get.client.details', ['id' => encrypt($item->id) ])}}" target="_blank">{{ $item->name ?? 'Not Found' }}</a>
                                            </td>
                                            <td>{{ $item->email ?? 'Not Found' }}</td>
                                            <td>{{ $item->phone ?? 'Not Found' }}</td>
                                            <td>{{ $item->gender ?? 'Not Found' }}</td>
                                            <td>{{ $item->age ?? 'Not Found' }}</td>
                                            <td>{{ $item->address ?? 'Not Found' }}</td>
                                            <td> <a href="{{route('admin.get.agency.profile', ['id' => encrypt($item->agency_id) ])}}">{{$item->agencyProfile->company_name}}</a></td>
                                            <td>
                                                <a href="{{route('admin.get.client.details', ['id' => encrypt($item->id) ])}}" target="_blank" class="btn btn-outline-primary btn-sm">View</a>
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
            $('#clientListTable').dataTable({
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
