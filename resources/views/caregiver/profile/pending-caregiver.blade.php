@extends('welcome')
@section('page-title', 'Pending Caregiver Profile')
@section('custom-css')

@endsection
@section('content')

    @dd($get_all_pending_profile)
    <div class="row row-sm">
        <div class="col-12">

        </div>
    </div>
@endsection
@section('custom-scripts')

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
