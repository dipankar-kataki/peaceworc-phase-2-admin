@extends('welcome')
@section('page-title', 'Dashboard')
@section('custom-css')
@endsection
@section('content')
    @include('common.overview-card')

    <div class="row row-sm">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card overflow-hidden">
                <div class="card-body pb-3">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-10">Quick Payout Table</h4> 
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 text-muted mb-3"> Latest 5 Jobs Are Displayed Here. For More Payout <a href=""> Go To PAYOUT SECTION</a></p>
                    <div class="table-responsive mb-0">
                        <table
                            class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Job</th>
                                    <th>Posted By</th>
                                    <th>Accepted By</th>
                                    <th>Posted On</th>
                                    <th>Job Status</th>
                                    <th>Payment Status</th>
                                    <th>Automatic Payout</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">1</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">Urgently Required A Caregiver</h6>
                                        </div>
                                    </td>
                                    <td>
                                        DK Industries
                                    </td>
                                    <td>Jhon Doe</td>
                                    <td>01 Jan 2020</td>
                                    <td>
                                        <span class="badge bg-success-gradient text-white">Completed</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger-gradient text-white">Waiting For Payment</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">Not Initiated By Agency</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-dark">Make Payment</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">2</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">A Caregiver Is Required For My Grandma</h6>
                                        </div>
                                    </td>
                                    <td>
                                        Laxmi Ch Fund Pvt Ltd
                                    </td>
                                    <td>Jhon Doe</td>
                                    <td>01 Jan 2020</td>
                                    <td>
                                        <span class="badge bg-success-gradient text-white">Completed</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger-gradient text-white">Waiting For Payment</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">Not Initiated By Agency</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-dark">Make Payment</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">3</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">Urgently Required A Caregiver</h6>
                                        </div>
                                    </td>
                                    <td>
                                        DK Industries
                                    </td>
                                    <td>Jhon Doe</td>
                                    <td>01 Jan 2020</td>
                                    <td>
                                        <span class="badge bg-success-gradient text-white">Completed</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger-gradient text-white">Waiting For Payment</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">Initiated By Agency</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-dark">Make Payment</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">4</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">Urgently Required A Caregiver</h6>
                                        </div>
                                    </td>
                                    <td>
                                        DK Industries
                                    </td>
                                    <td>Jhon Doe</td>
                                    <td>01 Jan 2020</td>
                                    <td>
                                        <span class="badge bg-success-gradient text-white">Completed</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger-gradient text-white">Waiting For Payment</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">Not Initiated By Agency</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-dark">Make Payment</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">5</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">Urgently Required A Caregiver</h6>
                                        </div>
                                    </td>
                                    <td>
                                        DK Industries
                                    </td>
                                    <td>Jhon Doe</td>
                                    <td>01 Jan 2020</td>
                                    <td>
                                        <span class="badge bg-success-gradient text-white">Completed</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-danger-gradient text-white">Waiting For Payment</span>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-sm">Not Initiated By Agency</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-dark">Make Payment</button>
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">PHP Project</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="image-grouped"><img class="profile-img brround" alt="profile image"
                                                src="../assets/img/faces/16.jpg"><img class="profile-img brround "
                                                alt="profile image" src="../assets/img/faces/8.jpg"><img
                                                class="profile-img brround" alt="profile image"
                                                src="../assets/img/faces/7.jpg"></div>
                                    </td>
                                    <td>Web Development</td>
                                    <td>03 March 2020</td>
                                    <td><span class="badge bg-success-gradient">Completed</span></td>
                                    <td>15 Jun 2020</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">Python</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="image-grouped"><img class="profile-img brround" alt="profile image"
                                                src="../assets/img/faces/3.jpg"><img class="profile-img brround "
                                                alt="profile image" src="../assets/img/faces/12.jpg"><img
                                                class="profile-img brround" alt="profile image"
                                                src="../assets/img/faces/15.jpg"></div>
                                    </td>
                                    <td>Web Development</td>
                                    <td>15 March 2020</td>
                                    <td><span class="badge bg-danger-gradient">Pending</span></td>
                                    <td>15 March 2020</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">Android App</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="image-grouped"><img class="profile-img brround" alt="profile image"
                                                src="../assets/img/faces/7.jpg"><img class="profile-img brround "
                                                alt="profile image" src="../assets/img/faces/6.jpg"><img
                                                class="profile-img brround" alt="profile image"
                                                src="../assets/img/faces/16.jpg"></div>
                                    </td>
                                    <td>Android</td>
                                    <td>15 March 2020</td>
                                    <td><span class="badge bg-success-gradient">Completed</span></td>
                                    <td>15 March 2020</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="project-contain">
                                            <h6 class="mb-1 tx-13">Mobile Application</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="image-grouped"><img class="profile-img brround" alt="profile image"
                                                src="../assets/img/faces/8.jpg"><img class="profile-img brround "
                                                alt="profile image" src="../assets/img/faces/11.jpg"><img
                                                class="profile-img brround" alt="profile image"
                                                src="../assets/img/faces/15.jpg"></div>
                                    </td>
                                    <td>Android</td>
                                    <td>15 March 2020</td>
                                    <td><span class="badge bg-pink-gradient">Completed</span></td>
                                    <td>15 March 2020</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-md-12">
            <div class="row row-sm">
                <div class="col-sm-12 col-md-6 col-xl-6">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="main-content-label tx-12 mg-b-15">Caregiver Registration - Month Wise Report - For
                                The Year @php echo date('Y') ; @endphp</div>
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
                                <canvas id="chartBar1" style="display: block; width: 589px; height: 200px;" width="589"
                                    height="200" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-xl-6 mg-t-20 mg-md-t-0">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="main-content-label tx-12 mg-b-15">Agency Registration - Month Wise Report - For The
                                Year @php echo date('Y') ; @endphp</div>
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
