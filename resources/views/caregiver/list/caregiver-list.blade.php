@extends('welcome')
@section('page-title', 'Caregiver List')
@section('custom-css')
@endsection
@section('content')
<div class="row row-sm">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-4">
                    <h6 class="card-title mb-1">List Of Registered Caregiver</h6>
                </div>
                <div class="mb-4">
                    <div class="table-responsive" >
                        <table id="caregiverListTable" class="table table-bordered mg-b-1 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    {{-- <th>Profile Status</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($get_caregiver_list as $key => $item)
                                    <tr>
                                        <th scope="row"># {{$key + 1}}</th>
                                        <th>
                                            <img alt="avatar" class="avatar-sm rounded-circle" src="{{asset('/assets/img/faces/2.jpg')}}">
                                        </th>
                                        <td>
                                            <a href="{{route('admin.get.agency.profile', ['id' => encrypt($item->id) ])}}">{{ $item->name ?? 'Not Found' }}</a>
                                        </td>
                                        <td>{{ $item->email ?? 'Not Found' }}</td>
                                        <td>{{ $item->caregiverProfile->phone ?? 'Not Found' }}</td>
                                        {{-- <td>
                                            {{$item->caregiverProfileStatus->is_profile_approved}}
                                            @if ($item->caregiverProfileStatus->is_profile_approved == 1)
                                                <span class="text-success">Active</span>
                                            @else
                                                <span class="text-danger">Inactive</span>
                                            @endif
                                        </td> --}}
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
            $('#caregiverListTable').dataTable({
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