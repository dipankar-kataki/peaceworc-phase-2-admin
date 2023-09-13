@extends('welcome')
@section('page-title', 'About Us')
@section('custom-css')
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="card-title mb-1">Edit About</h6>
                    </div>
                    <div class="mb-4">
                        <form id="aboutForm" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="aboutMainImage">Edit Main Image</label>

                                <div class="form-group img-prev-div bg-gray-100 ht-100p text-center p-4 bd">
                                    <span class="text-muted text-small  img-prev-info d-none" style="float:right;">Choose File To Change Preview</span>
                                    <img id="imagePreview" src="{{$about_details->image}}" class="ht-200" alt="Image Preview">
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input form-control" name="aboutMainImage" id="aboutMainImage" accept=".png, .jpg, .jpeg">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="aboutMainText">Enter Main Text</label>
                                <input type="text" class="form-control" name="aboutMainText" id="aboutMainText"  value="{{$about_details->main_text ?? ''}}" placeholder="Type here..." maxlength="40">
                            </div>
                            <div class="form-group">
                                <label for="aboutSubText">Enter Sub Text - 1</label>
                                <textarea type="text" class="form-control" name="aboutSubText1" id="aboutSubText1" placeholder="Type here... Max characters allowed  320" maxlength="320" rows="3" style="resize: none;">{{$about_details->sub_text_1 ?? ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="aboutSubText">Enter Sub Text - 2</label>
                                <textarea type="text" class="form-control" name="aboutSubText2" id="aboutSubText2" placeholder="Type here... Max characters allowed  320" maxlength="320" rows="3" style="resize: none;">{{$about_details->sub_text_2 ?? ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="aboutSubText">Enter Sub Text - 3</label>
                                <textarea type="text" class="form-control" name="aboutSubText3" id="aboutSubText3" placeholder="Type here... Max characters allowed  320" maxlength="320" rows="3" style="resize: none;">{{$about_details->sub_text_3 ?? ''}}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-main-primary pd-x-20 aboutSubmitBtn" type="submit">Submit</button>
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
        const imageInput = document.getElementById('aboutMainImage');
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
        $('#aboutForm').on('submit', function(e){
            e.preventDefault();

            

            $('.aboutSubmitBtn').attr('disabled', true);
            $('.aboutSubmitBtn').text('Please Wait...');

            const aboutMainImage = $("#aboutMainImage")[0].files[0];
            const formData = new FormData(this);
            formData.append('aboutMainImage', aboutMainImage);

            $.ajax({
                url: "{{route('admin.save.about.details')}}",
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

                        $('.aboutSubmitBtn').attr('disabled', false);
                        $('.aboutSubmitBtn').text('Submit');

                        // $("#aboutForm").trigger("reset");
                    }else{
                        toastr.error(response.message, 'Error', {
                            positionClass: 'toast-top-right',
                            closeButton: true,
                            progressBar: true,
                            timeOut: 3000
                        });

                        $('.aboutSubmitBtn').attr('disabled', false);
                        $('.aboutSubmitBtn').text('Submit');
                    }
                },error:function(xhr, error, status){
                    $('.aboutSubmitBtn').attr('disabled', false);
                    $('.aboutSubmitBtn').text('Submit');
                    console.log(error)
                }
            });
        });
    </script>
@endsection