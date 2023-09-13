@extends('welcome')
@section('page-title', 'Dashboard')
@section('custom-css')
@endsection
@section('content')
    @include('common.overview-card')

    <div class="row row-sm">
        <div class="col-md-12">
            <div class="row row-sm">
                <div class="col-sm-12 col-md-6 col-xl-6">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="main-content-label tx-12 mg-b-15">Caregiver Registration - Month Wise Report - For The Year @php echo date('Y') ; @endphp</div>
                            <div class="ht-200 ht-lg-250">
                                <div class="chartjs-size-monitor"
                                    style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                    <div class="chartjs-size-monitor-expand"
                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink"
                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                    </div>
                                </div>
                                <canvas id="chartBar1" style="display: block; width: 589px; height: 200px;"
                                    width="589" height="200" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-6 mg-t-20 mg-md-t-0">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="main-content-label tx-12 mg-b-15">Agency Registration - Month Wise Report - For The Year @php echo date('Y') ; @endphp</div>
                            <div class="ht-200 ht-lg-250">
                                <div class="chartjs-size-monitor"
                                    style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                    <div class="chartjs-size-monitor-expand"
                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink"
                                        style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                    </div>
                                </div> <canvas id="chartBar2" style="display: block; width: 589px; height: 200px;"
                                    width="589" height="200" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-sm-12 col-md-6 col-xl-4 mg-t-20 mg-xl-t-0">
                    <div class="main-content-label tx-12 mg-b-15"> Using Gradient Color </div>
                    <div class="ht-200 ht-lg-250">
                        <div class="chartjs-size-monitor"
                            style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink"
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div> <canvas id="chartBar3" style="display: block; width: 589px; height: 200px;"
                            width="589" height="200" class="chartjs-render-monitor"></canvas>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
@section('custom-scripts')
@endsection
