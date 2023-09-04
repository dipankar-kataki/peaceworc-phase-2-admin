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
                    <h6 class="card-title mb-1">Edit Banner</h6>
                </div>
                <div class="mb-4">
                    <form id="bannerForm" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="bannerMainImage">Edit Main Image</label>

                            <div class="form-group img-prev-div bg-gray-100 ht-100p text-center p-4 bd">
                                <span class="text-muted text-small  img-prev-info d-none" style="float:right;">Choose File To Change Preview</span>

                                {{-- <img id="imagePreview" src="{{asset('assets/img/photos/img-preview.png')}}" class="ht-200" alt="Image Preview"> --}}

                                <img id="imagePreview" src="{{asset($banner_details->image)}}" class="ht-200" alt="Image Preview">
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input form-control" name="bannerMainImage" id="bannerMainImage" accept=".png, .jpg, .jpeg">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bannerMainText">Enter Main Text</label>
                            <input type="text" class="form-control" name="bannerMainText" id="bannerMainText" value="{{$banner_details->main_text}}" placeholder="Type here..." maxlength="45">
                        </div>
                        <div class="form-group">
                            <label for="bannerSubText">Enter Sub Text</label>
                            <input type="text" class="form-control" name="bannerSubText" id="bannerSubText"value="{{$banner_details->sub_text}}" placeholder="Type here..." maxlength="140">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-main-primary pd-x-20 bannerSubmitBtn" type="submit">Submit</button>
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
        const imageInput = document.getElementById('bannerMainImage');
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
        $('#bannerForm').on('submit', function(e){
            e.preventDefault();

            

            $('.bannerSubmitBtn').attr('disabled', true);
            $('.bannerSubmitBtn').text('Please Wait...');

            const bannerMainImage = $("#bannerMainImage")[0].files[0];
            const formData = new FormData(this);
            formData.append('bannerMainImage', bannerMainImage);

            $.ajax({
                url: "{{route('admin.save.banner.details')}}",
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

                        $('.bannerSubmitBtn').attr('disabled', false);
                        $('.bannerSubmitBtn').text('Submit');
                        
                        // $("#bannerForm").trigger("reset");
                    }else{
                        toastr.error(response.message, 'Error', {
                            positionClass: 'toast-top-right',
                            closeButton: true,
                            progressBar: true,
                            timeOut: 3000
                        });

                        $('.bannerSubmitBtn').attr('disabled', false);
                        $('.bannerSubmitBtn').text('Submit');
                    }
                },error:function(xhr, error, status){
                    $('.bannerSubmitBtn').attr('disabled', false);
                    $('.bannerSubmitBtn').text('Submit');
                    console.log(error)
                }
            });
        });
    </script>
@endsection