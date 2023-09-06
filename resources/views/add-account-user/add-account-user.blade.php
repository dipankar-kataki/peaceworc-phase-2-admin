@extends('welcome')
@section('custom-css')
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="card-title mb-1">Manage Account Users</h6>
                    </div>
                    <div class="mb-4">
                        <form action="" class="form-horizontal">
                            <div class="form-group">
                                <label for="caregiverAndroidLink">Enter Name</label>
                                <input type="text" class="form-control" name="caregiverAndroidLink" id="caregiverAndroidLink" value="" placeholder="https://...">   
                            </div>
                            <div class="form-group">
                                <label for="caregiverAndroidLink">Enter Email</label>
                                <input type="email" class="form-control" name="caregiverAndroidLink" id="caregiverAndroidLink" value="" placeholder="https://...">   
                            </div>
                            <div class="form-group">
                                <label for="caregiverAndroidLink">Enter Password</label>
                                <input type="password" class="form-control" name="caregiverAndroidLink" id="caregiverAndroidLink" value="" placeholder="https://...">   
                            </div>
                            <div class="form-group">
                                <label for="caregiverAndroidLink">Select Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="">Admin</option>
                                    <option value="">Operator</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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
