@extends('welcome')
@section('page-title', 'Manage Banner')
@section('custom-css')
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="card-title mb-1">Activity Logs</h6>
                    </div>
                    <div class="mb-4">
                        <div class="table-responsive">
                            <table class="table table-bordered mg-b-1 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>User Name</th>
                                        <th>Login Id</th>
                                        <th>Login Time</th>
                                        <th>Logout Time</th>
                                        <th>Activity Module</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"># 1</th>
                                        <td>James</td>
                                        <td>admin@james.com</td>
                                        <td>3:06 PM</td>
                                        <td>5:06 PM</td>
                                        <td>Changed Password</td>
                                    </tr>
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
            $('#basic_datatable').DataTable({
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
