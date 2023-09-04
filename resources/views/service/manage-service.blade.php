@extends('welcome')
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
                        <form id="serviceForm" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="serviceMainImage">Edit Service Image</label>

                                <div class="form-group img-prev-div bg-gray-100 ht-100p text-center p-4 bd">
                                    <span class="text-muted text-small  img-prev-info d-none" style="float:right;">Choose File To Change Preview</span>
                                    <img id="imagePreview" src="{{$service_details->image}}" class="ht-200" alt="Image Preview">
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" name="serviceMainImage" id="serviceMainImage" accept=".png, .jpg, .jpeg">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="serviceName">Enter Service Name</label>
                                <input type="text" class="form-control" name="serviceName" id="serviceName"  value="{{$service_details->name}}" placeholder="Type here..." maxlength="40">
                            </div>
                            <div class="form-group">
                                <label for="serviceDetails">Enter Service Details</label>
                                <textarea type="text" class="form-control" name="serviceDetails" id="serviceDetails" placeholder="Type here... Max characters allowed  520" maxlength="520" rows="5" style="resize: none;">{{$service_details->details}}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-main-primary pd-x-20 serviceSubmitBtn" type="submit">Submit</button>
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
    </script>

    <script>
        $('#serviceForm').on('submit', function(e){
            e.preventDefault();

            

            $('.serviceSubmitBtn').attr('disabled', true);
            $('.serviceSubmitBtn').text('Please Wait...');

            const serviceMainImage = $("#serviceMainImage")[0].files[0];
            const formData = new FormData(this);
            formData.append('serviceMainImage', serviceMainImage);

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