@extends('welcome')
@section('page-title', 'Manage Become Caregiver')
@section('custom-css')
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <h6 class="card-title mb-1">Edit Become Caregiver</h6>
                    </div>
                    {{-- @dd($become_caregiver_details) --}}
                    <div class="mb-4">
                        <form id="becomeCaregiverForm" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label for="becomeCaregiverName">Enter Main Text</label>
                                <textarea type="text" class="form-control" name="becomeCaregiverName" id="becomeCaregiverName" placeholder="Type here... Max characters allowed 300" maxlength="300" rows="5" style="resize: none;">{{$become_caregiver_details->main_text ?? ''}}</textarea>
                            </div>
                            <div class="form-group" >
                                <label for="becomeCaregiverDuties">Enter Duties And Responsibilities</label>
                                    <div class="form-group inputDutiesDiv">
                                        @foreach ($become_caregiver_details->duties_and_responsibilities as $item)
                                            <div class="d-flex flex-row justify-content-between align-items-center mb-2">
                                                <input type="text" class="form-control" name="becomeCaregiverDuties[]" value="{{$item ?? ''}}" id="becomeCaregiverDuties" placeholder="Type here... Max characters allowed  350" maxlength="350">   
                                            
                                                <button type="button" class="btn btn-danger removeBtn" >Remove</button>
                                            </div>
                                        @endforeach
                                    </div>
                                
                                <div class="form-group">
                                    <button type="button" class="btn btn-success" id="addMoreBtn"><i class="fe fe-plus me-2"></i> Add More</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-main-primary pd-x-20 becomeCaregiverSubmitBtn" type="submit">Submit</button>
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
        const imageInput = document.getElementById('becomeCaregiverMainImage');
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
            var count = "{{sizeof($become_caregiver_details->duties_and_responsibilities)}}";

            // console.info('Duties Size', ('{{sizeof($become_caregiver_details->duties_and_responsibilities)}}'))

            const newInputField = `
                <div class="d-flex flex-row justify-content-between align-items-center  mb-2">
                    <input type="text" class="form-control" name="becomeCaregiverDuties[]" id="becomeCaregiverDuties" placeholder="Type here... Max characters allowed  350" maxlength="350">
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

                console.log('Count -->', count)

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
        $('#becomeCaregiverForm').on('submit', function(e){
            e.preventDefault();

            

            $('.becomeCaregiverSubmitBtn').attr('disabled', true);
            $('.becomeCaregiverSubmitBtn').text('Please Wait...');

            // const becomeCaregiverMainImage = $("#becomeCaregiverMainImage")[0].files[0];
            const formData = new FormData(this);
            // formData.append('becomeCaregiverMainImage', becomeCaregiverMainImage);

            $.ajax({
                url: "{{route('admin.save.become.caregiver.details')}}",
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

                        $('.becomeCaregiverSubmitBtn').attr('disabled', false);
                        $('.becomeCaregiverSubmitBtn').text('Submit');

                        window.location.reload(true);


                    }else{
                        toastr.error(response.message, 'Error', {
                            positionClass: 'toast-top-right',
                            closeButton: true,
                            progressBar: true,
                            timeOut: 3000
                        });

                        $('.becomeCaregiverSubmitBtn').attr('disabled', false);
                        $('.becomeCaregiverSubmitBtn').text('Submit');
                    }
                },error:function(xhr, error, status){

                    toastr.error(error, 'Error', {
                        positionClass: 'toast-top-right',
                        closeButton: true,
                        progressBar: true,
                        timeOut: 3000
                    });

                    $('.becomeCaregiverSubmitBtn').attr('disabled', false);
                    $('.becomeCaregiverSubmitBtn').text('Submit');
                }
            });
        });
    </script>
@endsection