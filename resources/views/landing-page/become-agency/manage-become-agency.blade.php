@extends('welcome')
@section('custom-css')
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="card-title mb-1">Edit Become Agency</h6>
                    </div>
                    <div class="mb-4">
                        <form id="becomeAgencyForm" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label for="becomeAgencyName">Enter Main Text</label>
                                <textarea type="text" class="form-control" name="becomeAgencyName" id="becomeAgencyName" placeholder="Type here... Max characters allowed 300" maxlength="300" rows="5" style="resize: none;">{{$become_agency_details->main_text}}</textarea>
                            </div>
                            <div class="form-group" >
                                <label for="becomeAgencyDuties">Enter Duties And Responsibilities</label>
                                <div class="form-group inputDutiesDiv">
                                    @foreach ($become_agency_details->duties_and_responsibilities as $item)
                                        <div class="d-flex flex-row justify-content-between align-items-center mb-2">
                                            <input type="text" class="form-control" value="{{$item}}" name="becomeAgencyDuties[]" id="becomeAgencyDuties" placeholder="Type here... Max characters allowed  350" maxlength="350">
                                            <button type="button" class="btn btn-danger removeBtn" >Remove</button>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-success" id="addMoreBtn"><i class="fe fe-plus me-2"></i> Add More</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-main-primary pd-x-20 becomeAgencySubmitBtn" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-scripts')
    {{-- <script>
        const imageInput = document.getElementById('becomeAgencyMainImage');
        const imagePreview = document.getElementById('imagePreview');

        imageInput.addEventListener('change', function() {
            const selectedImage = imageInput.files[0];

            if (selectedImage) {
                const reader = new FileReader();

                reader.onload = function(event) {
                imagePreview.src = event.target.result;
                };

                reader.readAsDataURL(selectedImage);
            }
        });
    </script> --}}

    <script>
        $(document).ready(function(){
            const max_field = 10;
            const addMoreBtn = $('#addMoreBtn');
            const inputDutiesDiv = $('.inputDutiesDiv');
            var count = "{{sizeof($become_agency_details->duties_and_responsibilities)}}";

            

            const newInputField = `
                <div class="d-flex flex-row justify-content-between align-items-center  mb-2">
                    <input type="text" class="form-control" name="becomeAgencyDuties[]" id="becomeAgencyDuties" placeholder="Type here... Max characters allowed  350" maxlength="350">
                    <button type="button" class="btn btn-danger removeBtn">Remove</button> 
                </div>
            `;

            $(addMoreBtn).click(function(){
                if(count < max_field){ 
                    count++; 
                    $(inputDutiesDiv).append(newInputField);
                    $('.removeBtn').removeClass('d-none');

                    console.log('Count++ ========>', count)
                }else{
                    alert('Oops! Reached Max Limit. Only 10 filed are allowed.');
                }
            });

            $(inputDutiesDiv).on('click', '.removeBtn', function(e){
                e.preventDefault();

                if(count > 1){
                    $(this).parent('div').remove();
                    count--;
                }

                if(count == 1){
                    $('.removeBtn').addClass('d-none');
                }
                
            });

            
        });

        
    </script>

    <script>
        $('#becomeAgencyForm').on('submit', function(e){
            e.preventDefault();

            

            $('.becomeAgencySubmitBtn').attr('disabled', true);
            $('.becomeAgencySubmitBtn').text('Please Wait...');

            // const becomeAgencyMainImage = $("#becomeAgencyMainImage")[0].files[0];
            const formData = new FormData(this);
            // formData.append('becomeAgencyMainImage', becomeAgencyMainImage);

            $.ajax({
                url: "{{route('admin.save.become.agency.details')}}",
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

                        $('.becomeAgencySubmitBtn').attr('disabled', false);
                        $('.becomeAgencySubmitBtn').text('Submit');

                        window.location.reload(true);


                    }else{
                        toastr.error(response.message, 'Error', {
                            positionClass: 'toast-top-right',
                            closeButton: true,
                            progressBar: true,
                            timeOut: 3000
                        });

                        $('.becomeAgencySubmitBtn').attr('disabled', false);
                        $('.becomeAgencySubmitBtn').text('Submit');
                    }
                },error:function(xhr, error, status){

                    toastr.error(error, 'Error', {
                        positionClass: 'toast-top-right',
                        closeButton: true,
                        progressBar: true,
                        timeOut: 3000
                    });

                    $('.becomeAgencySubmitBtn').attr('disabled', false);
                    $('.becomeAgencySubmitBtn').text('Submit');
                }
            });
        });
    </script>
@endsection