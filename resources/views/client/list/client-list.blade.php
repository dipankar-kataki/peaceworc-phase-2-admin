@extends('welcome')
@section('page-title', 'Client List')
@section('custom-css')
@endsection
@section('content')
    <div class="row row-sm">
        @foreach ($get_client_list as $item)
            {{-- <div class="col-sm-12 col-md-4 col-lg-4 col-xl-3">
                <div class="card custom-card">
                    <div class="card-body text-center">
                        <div class="user-lock text-center">
                            <div class="dropdown text-end">
                                <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fe fe-more-Vertical text-dark fs-16"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow">
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="fe fe-message-square me-2"></i> Message
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="fe fe-edit-2 me-2"></i>Edit
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="fe fe-eye me-2"></i> View
                                    </a>
                                    <a class="dropdown-item" href="javascript:void(0);">
                                        <i class="fe fe-trash-2 me-2"></i> Delete
                                    </a> 
                                </div>
                            </div>
                            <img alt="avatar" class="rounded-circle" src="{{asset('/assets/img/faces/2.jpg')}}">
                        </div>
                        <h5 class=" mb-1 mt-3 card-title">{{$item->name}}</h5>
                        <div class="mt-2 user-info btn-list">
                            <a class="btn btn-outline-light btn-block" href="">
                                <i class="fe fe-mail me-2"></i>
                                <span>{{$item->email}}</span>
                            </a>
                            <a class="btn btn-outline-light btn-block" href="">
                                <i class="fe fe-phone me-2"></i>
                                <span>{{$item->phone}}</span>
                            </a>
                            <a class="btn btn-outline-light  btn-block" href="">
                                <i class="fe fe-map-pin me-2"></i>
                                <span>{{$item->address}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}

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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($get_client_list as $key => $item)
                                            <tr>
                                                <th scope="row"># {{$key + 1}}</th>
                                                <td>
                                                    <a href="{{route('admin.get.agency.profile', ['id' => encrypt($item->id) ])}}">{{ $item->name ?? 'Not Found' }}</a>
                                                </td>
                                                <td>
                                                    <img alt="avatar" class="avatar-md rounded-circle" src="{{asset('/assets/img/faces/2.jpg')}}">
                                                </td>
                                                <td>{{ $item->email ?? 'Not Found' }}</td>
                                                <td>{{ $item->phone ?? 'Not Found' }}</td>
                                                <td>{{ $item->gender ?? 'Not Found' }}</td>
                                                <td>{{ $item->age ?? 'Not Found' }}</td>
                                                <td>{{ $item->address ?? 'Not Found' }}</td>
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
        @endforeach
        
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
