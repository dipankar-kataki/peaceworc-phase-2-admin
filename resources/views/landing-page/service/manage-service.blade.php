@extends('welcome')
@section('page-title', 'Manage Service')
@section('custom-css')
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="card-title mb-1">Edit Service</h6>
                    </div>
                    <div class="mb-4">
                        <div class="form-group">

                            <form class="form-horizontal" id="serviceForm">
                                @csrf
                                <div class="form-group">
                                    <select name="service" id="service" class="form-control">
                                        <option value="" disabled selected>- Select Service -</option>
                                        @foreach ($list_of_services as $item)
                                            <option value="{{$item->id}}">{{$item->services}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="enter-service-content-tab d-none">
                                    <div class="form-group">
                                        <label for="serviceDetails">Enter Service Details</label>
                                        <textarea type="text" class="form-control" name="serviceDetails" id="serviceDetails" placeholder="Type here... Max characters allowed  520" maxlength="520" rows="5" style="resize: none;"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-main-primary pd-x-20 serviceSubmitBtn" type="submit">Submit</button>
                                    </div>
                                </div>
                                
                            </form>
                            
                        </div>
                        {{-- <form  class="form-horizontal" enctype="multipart/form-data">
                            
                        </form> --}}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-scripts')
    {{-- <script>
        const imageInput = document.getElementById('serviceMainImage');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            const selectedImage = imageInput.files[0];

            if (selectedImage) {
                const reader = new FileReader();

                reader.onload = function(event) {
                imagePreview.src = event.target.result;
                };

                reader.readAsDataURL(selectedImage);

                $('.img-prev-info').removeClass('d-none');
            }
        });
    </script> --}}

    <script>

        $(document).ready(function(){
            $('#service').change(function(){
                let selected_service = $('#service').val();

                if(selected_service == ''  || selected_service == null){
                    toastr.error('Please Select Atleast One Service.', 'Oops', {
                        positionClass: 'toast-top-right',
                        closeButton: true,
                        progressBar: true,
                        timeOut: 3000
                    });
                }else{

                    $.ajax({
                        url: "{{route('admin.get.selected.service.details')}}",
                        type: "get",
                        data:{service_id : selected_service},
                        success:function(response){
                            // console.log(response.data)
                            if(response.status == 1){
                                toastr.success(response.message, 'Great', {
                                    positionClass: 'toast-top-right',
                                    closeButton: true,
                                    progressBar: true,
                                    timeOut: 3000
                                });

                                $('#serviceDetails').text(response.data);
                            }else{
                                toastr.error(response.message, 'Error', {
                                    positionClass: 'toast-top-right',
                                    closeButton: true,
                                    progressBar: true,
                                    timeOut: 3000
                                });
                            }
                        },error:function(xhr, error, status){

                            toastr.error(error, 'Error', {
                                    positionClass: 'toast-top-right',
                                    closeButton: true,
                                    progressBar: true,
                                    timeOut: 3000
                            });
                            console.log(error)
                        }
                    });
                    $('.enter-service-content-tab').removeClass('d-none');
                    
                }
            });
        });
        


    </script>

    <script>
        $('#serviceForm').on('submit', function(e){
            e.preventDefault();

            

            $('.serviceSubmitBtn').attr('disabled', true);
            $('.serviceSubmitBtn').text('Please Wait...');

            // const serviceMainImage = $("#serviceMainImage")[0].files[0];
            const formData = new FormData(this);
            // formData.append('serviceMainImage', serviceMainImage);

            $.ajax({
                url: "{{route('admin.save.service.details')}}",
                type: "POST",
                contentType: false,
                processData: false,
                data:formData,
                success:function(response){
                    if(response.status == 1){

                        toastr.success(response.message, 'Great', {
                            positionClass: 'toast-top-right',
                            closeButton: true,
                            progressBar: true,
                            timeOut: 3000
                        });

                        $('.serviceSubmitBtn').attr('disabled', false);
                        $('.serviceSubmitBtn').text('Submit');

                        // $("#serviceForm").trigger("reset");
                    }else{
                        toastr.error(response.message, 'Error', {
                            positionClass: 'toast-top-right',
                            closeButton: true,
                            progressBar: true,
                            timeOut: 3000
                        });

                        $('.serviceSubmitBtn').attr('disabled', false);
                        $('.serviceSubmitBtn').text('Submit');
                    }
                },error:function(xhr, error, status){

                    toastr.error(error, 'Error', {
                            positionClass: 'toast-top-right',
                            closeButton: true,
                            progressBar: true,
                            timeOut: 3000
                    });

                    $('.serviceSubmitBtn').attr('disabled', false);
                    $('.serviceSubmitBtn').text('Submit');
                    console.log(error)
                }
            });
        });
    </script>
@endsection