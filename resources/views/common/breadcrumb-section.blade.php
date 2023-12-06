@php

    $peaceworc_earnings = App\Models\AgencyPayment::where('payment_status', 1)->sum('peaceworc_charge');

    $suffix = '';

    if ($peaceworc_earnings >= 1000 && $peaceworc_earnings < 1000000) {
        $peaceworc_earnings = round($peaceworc_earnings / 1000, 1);
        $suffix = 'K';
    } elseif ($peaceworc_earnings >= 1000000 && $peaceworc_earnings < 1000000000) {
        $peaceworc_earnings = round($peaceworc_earnings / 1000000, 1);
        $suffix = 'M';
    } elseif ($peaceworc_earnings >= 1000000000) {
        $peaceworc_earnings = round($peaceworc_earnings / 1000000000, 1);
        $suffix = 'B';
    }

    $total_earnings = $peaceworc_earnings . $suffix;

@endphp
<div class="breadcrumb-header justify-content-between">
    <div>
        <h4 class="content-title mb-2">Hi, welcome back!</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">
                        <i class="side-menu__icon fe fe-home"></i>
                    </a>
                    
                </li>
                <li class="breadcrumb-item">
                    <a href="#" style="text-transform:capitalize;">{{Request::segment(1)}}</a>
                </li>
                @if (Request::segment(2) != null)
                    <li class="breadcrumb-item active" aria-current="page" style="text-transform:capitalize;">
                        {{Request::segment(2)}}
                    </li>
                @endif
                
            </ol>
        </nav>
    </div>
    @if (Request::segment(1) != 'dashboard')
        <div class="d-flex my-auto">
            <div class=" d-flex right-page">
                <div class="d-flex justify-content-center mr-5">
                    <div class="">
                        <span class="d-block">
                            <span class="label ">PROFIT</span>
                        </span>
                        <span class="value">
                            ${{$total_earnings}}
                        </span>
                    </div>
                    <div class="ml-3 mt-2">
                        <span class="sparkline_bar"></span>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
</div>