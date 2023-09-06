@extends('welcome')
@section('custom-css')
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="card-title mb-1">Edit Landing Page Layout Visibility</h6>
                    </div>
                    <div class="mb-4">
                        <div class="table-responsive">
                            <table class="table table-striped mg-b-1 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Layout Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($get_layout as $key => $item)
                                        <tr>
                                            <th scope="row">{{$key + 1}}</th>
                                            <td style="text-transform: uppercase;font-weight:bold;">{{$item->module}}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <div class="badge bg-success-gradient text-white" >Active</div>
                                                @else
                                                    <div class="badge bg-danger-gradient text-white" >Hidden</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <button type="button" class="btn btn-sm btn-danger w-xs mb-1 change-visibility" data-status="0" data-id="{{$item->id}}">Make Private</button>
                                                @else
                                                    <button type="button" class="btn btn-sm btn-primary w-xs mb-1 change-visibility" data-status="1" data-id="{{$item->id}}">Make Public</button>
                                                @endif
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
        $('.change-visibility').on('click', function(){
            const id = $(this).data('id');
            const status = $(this).data('status');

            let btn_name = status == 1 ? 'Make Private' : 'Make Public'
            
            $(this).text('Please Wait...');
            $(this).attr('disabled', true);

            $.ajax({
                url:"{{route('admin.change.layout.visibility.status')}}",
                type:"POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id : id,
                    status : status,
                },
                
                success:function(response){
                    if(response.status == 1){
                        toastr.success(response.message, 'Great', {
                            positionClass: 'toast-top-right',
                            closeButton: true,
                            progressBar: true,
                            timeOut: 3000
                        });

                        window.location.reload();

                    }else{
                        toastr.error(response.message, 'Error', {
                            positionClass: 'toast-top-right',
                            closeButton: true,
                            progressBar: true,
                            timeOut: 3000
                        });

                        $('.change-visibility').$(this).text(btn_name);
                        $('.change-visibility').$(this).attr('disabled', false);
                    }
                },
                error:function(xhr,error, status){

                    toastr.error('Something Went Wrong', 'Oops', {
                        positionClass: 'toast-top-right',
                        closeButton: true,
                        progressBar: true,
                        timeOut: 3000
                    });

                    $('.change-visibility').$(this).text(btn_name);
                    $('.change-visibility').$(this).attr('disabled', false);
                }

            });
        });
    </script>
@endsection
