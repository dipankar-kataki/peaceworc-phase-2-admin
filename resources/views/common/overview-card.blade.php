<div class="row row-sm">
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="card overflow-hidden project-card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="my-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" id="user"
                            class="mr-4 ht-60 wd-60 my-auto primary">
                            <rect width="256" height="256" fill="none"></rect>
                            <circle cx="128" cy="96" r="64" fill="none" stroke="#fff"
                                stroke-miterlimit="10" stroke-width="16"></circle>
                            <path fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="16" d="M30.989,215.99064a112.03731,112.03731,0,0,1,194.02311.002"></path>
                        </svg>
                    </div>
                    <div class="project-content">
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <h6>Caregivers</h6>
                            @if ($total_pending_caregivers > 0)
                                <dotlottie-player
                                    src="https://lottie.host/8895c1dc-f917-44ed-b160-7f7cf6580eb7/uAkEpxyloL.json"
                                    background="transparent" speed="1.5" style="width: 40px; height: 40px;" loop
                                    autoplay>
                                </dotlottie-player>
                            @endif
                            
                        </div>
                        <ul>
                            <li>
                                <strong>Approved</strong>
                                <span>{{$total_approved_caregivers}}</span>
                            </li>

                            <li>
                                <strong>Pending
                                    @if ($total_pending_caregivers > 0)
                                        <a href="{{ route('admin.get.caregiver.pending.profile') }}"
                                            style="font-weight: 700; margin-left:10px;">View
                                        </a>
                                    @endif
                                </strong>
                                <span>{{$total_pending_caregivers}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="card  overflow-hidden project-card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="my-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 64 64" id="building"
                            class="mr-4 ht-60 wd-60 my-auto danger">
                            <path
                                d="M34,4H12a6,6,0,0,0-6,6V54a6,6,0,0,0,6,6H52a6,6,0,0,0,6-6V32a6,6,0,0,0-6-6H40V10A6,6,0,0,0,34,4ZM8,54V10a4,4,0,0,1,4-4H34a4,4,0,0,1,4,4V58H30V45a1,1,0,0,0-1-1H17a1,1,0,0,0-1,1V58H12A4,4,0,0,1,8,54Zm10,4V46H28V58ZM52,28a4,4,0,0,1,4,4V54a4,4,0,0,1-4,4H40V28Z">
                            </path>
                            <path
                                d="M13 16h4a1 1 0 0 0 1-1V11a1 1 0 0 0-1-1H13a1 1 0 0 0-1 1v4A1 1 0 0 0 13 16zm1-4h2v2H14zM13 26h4a1 1 0 0 0 1-1V21a1 1 0 0 0-1-1H13a1 1 0 0 0-1 1v4A1 1 0 0 0 13 26zm1-4h2v2H14zM17 36a1 1 0 0 0 1-1V31a1 1 0 0 0-1-1H13a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1zm-3-4h2v2H14zM29 16h4a1 1 0 0 0 1-1V11a1 1 0 0 0-1-1H29a1 1 0 0 0-1 1v4A1 1 0 0 0 29 16zm1-4h2v2H30zM29 26h4a1 1 0 0 0 1-1V21a1 1 0 0 0-1-1H29a1 1 0 0 0-1 1v4A1 1 0 0 0 29 26zm1-4h2v2H30zM29 36h4a1 1 0 0 0 1-1V31a1 1 0 0 0-1-1H29a1 1 0 0 0-1 1v4A1 1 0 0 0 29 36zm1-4h2v2H30zM47 38h4a1 1 0 0 0 1-1V33a1 1 0 0 0-1-1H47a1 1 0 0 0-1 1v4A1 1 0 0 0 47 38zm1-4h2v2H48zM47 48h4a1 1 0 0 0 1-1V43a1 1 0 0 0-1-1H47a1 1 0 0 0-1 1v4A1 1 0 0 0 47 48zm1-4h2v2H48z">
                            </path>
                        </svg>
                    </div>
                    <div class="project-content">
                        <div class="d-flex flex-row justify-content-between align-items-center">
                            <h6>Agencies</h6>
                            @if ($total_pending_agencies > 0)
                                <dotlottie-player
                                    src="https://lottie.host/8895c1dc-f917-44ed-b160-7f7cf6580eb7/uAkEpxyloL.json"
                                    background="transparent" speed="1.5" style="width: 40px; height: 40px;" loop
                                    autoplay>
                                </dotlottie-player>
                            @endif
                        </div>
                        <ul>
                            <li>
                                <strong>Approved</strong>
                                <span>{{$total_approved_agencies}}</span>
                            </li>

                            <li>
                                <a href="#">
                                    <strong>Pending
                                        @if ($total_pending_agencies > 0)
                                            <a href="{{ route('admin.get.agency.pending.profile') }}"
                                                style="font-weight: 700; margin-left:10px;">View
                                            </a>
                                        @endif
                                    </strong>
                                    <span>{{$total_pending_agencies}}</span>
                                </a>

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="card overflow-hidden project-card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="my-auto">

                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="job-application"
                            enable-background="new 0 0 477.849 477.849" class="mr-4 ht-60 wd-60 my-auto success"
                            version="1.1">
                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="10"
                                d="M210.45 377.16 45 481.33 9 504V216l36 28.8 23.51 18.81 20.37 16.29z"></path>
                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="10"
                                d="M45 216v28.8L9 216zM504 216l-36 28.68V216zM45 185.89V216H9zM504 216h-36v-30.11z">
                            </path>
                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="10"
                                d="M45 216v28.8L9 216zM504 216l-36 28.68V216zM504 504H9l36-22.67 165.45-104.17 33.32-20.98a22.996 22.996 0 0 1 24.47-.02l33.49 21L468 481.43 504 504z">
                            </path>
                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="10"
                                d="M504 216v288l-36-22.57-166.27-104.27L468 244.68z"></path>
                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="10"
                                d="M468 9v235.68L301.73 377.16l-33.49-21a22.996 22.996 0 0 0-24.47.02l-33.32 20.98L88.88 279.9l-20.37-16.29L45 244.8V9h423z">
                            </path>
                            <circle cx="391.5" cy="85.5" r="49.5" fill="none" stroke="#ffffff"
                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="10">
                            </circle>
                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="10" d="m363.656 85.5 18.563 18.562 37.125-37.124">
                            </path>
                            <circle cx="76.5" cy="58.5" r="13.5" fill="none" stroke="#ffffff"
                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                stroke-width="10"></circle>
                            <circle cx="76.5" cy="112.5" r="13.5" fill="none" stroke="#ffffff"
                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                stroke-width="10"></circle>
                            <circle cx="76.5" cy="166.5" r="13.5" fill="none" stroke="#ffffff"
                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                stroke-width="10"></circle>
                            <circle cx="76.5" cy="220.5" r="13.5" fill="none" stroke="#ffffff"
                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                stroke-width="10"></circle>
                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="10"
                                d="M108 63h207M108 117h207M108 171h207M108 225h207M108 279h207M90 274.5c0 1.92-.4 3.75-1.12 5.4l-20.37-16.29c2.24-1.64 5-2.61 7.99-2.61 7.46 0 13.5 6.04 13.5 13.5z">
                            </path>
                        </svg>
                    </div>
                    <div class="project-content">
                        <h6>Jobs</h6>
                        <ul>
                            <li>
                                <strong>Posted</strong>
                                <span>{{$total_posted_jobs}}</span>
                            </li>

                            <li>
                                <strong>Closed</strong>
                                <span>{{$total_closed_jobs}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="card overflow-hidden project-card">
            <div class="card-body">
                <div class="d-flex">
                    <div class="my-auto">
                        <svg enable-background="new 0 0 512 512" class="mr-4 ht-60 wd-60 my-auto warning"
                            version="1.1" viewBox="0 0 512 512" xml:space="preserve"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m259.2 317.72h-6.398c-8.174 0-14.824-6.65-14.824-14.824 1e-3 -8.172 6.65-14.822 14.824-14.822h6.398c8.174 0 14.825 6.65 14.825 14.824h29.776c0-20.548-13.972-37.885-32.911-43.035v-33.74h-29.777v33.739c-18.94 5.15-32.911 22.487-32.911 43.036 0 24.593 20.007 44.601 44.601 44.601h6.398c8.174 0 14.825 6.65 14.825 14.824s-6.65 14.824-14.825 14.824h-6.398c-8.174 0-14.824-6.65-14.824-14.824h-29.777c0 20.548 13.972 37.885 32.911 43.036v33.739h29.777v-33.74c18.94-5.15 32.911-22.487 32.911-43.035 0-24.594-20.008-44.603-44.601-44.603z" />
                            <path
                                d="m502.7 432.52c-7.232-60.067-26.092-111.6-57.66-157.56-27.316-39.764-65.182-76.476-115.59-112.06v-46.29l37.89-98.425-21.667-0.017c-6.068-4e-3 -8.259-1.601-13.059-5.101-6.255-4.559-14.821-10.802-30.576-10.814h-0.046c-15.726 0-24.292 6.222-30.546 10.767-4.799 3.487-6.994 5.081-13.041 5.081h-0.027c-6.07-5e-3 -8.261-1.602-13.063-5.101-6.255-4.559-14.821-10.801-30.577-10.814h-0.047c-15.725 0-24.293 6.222-30.548 10.766-4.8 3.487-6.995 5.081-13.044 5.081h-0.027l-21.484-0.017 36.932 98.721v46.117c-51.158 36.047-89.636 72.709-117.47 111.92-33.021 46.517-52.561 98.116-59.74 157.74l-9.304 77.285h512l-9.304-77.284zm-301.06-395.47c4.8-3.487 6.995-5.081 13.045-5.081h0.026c6.07 4e-3 8.261 1.602 13.062 5.101 6.255 4.559 14.821 10.802 30.578 10.814h0.047c15.725 0 24.292-6.222 30.546-10.767 4.799-3.487 6.993-5.081 13.041-5.081h0.026c6.068 5e-3 8.259 1.602 13.059 5.101 2.869 2.09 6.223 4.536 10.535 6.572l-21.349 55.455h-92.526l-20.762-55.5c4.376-2.041 7.773-4.508 10.672-6.614zm98.029 91.89v26.799h-83.375v-26.799h83.375zm-266.09 351.08 5.292-43.947c6.571-54.574 24.383-101.7 54.458-144.07 26.645-37.537 62.54-71.458 112.73-106.5h103.78c101.84 71.198 150.75 146.35 163.29 250.56l5.291 43.948h-444.85z" />
                        </svg>
                    </div>
                    <div class="project-content">
                        <h6>Revenue</h6>
                        <ul>
                            <li>
                                <strong>Total Earnings</strong>
                                <span>${{$total_peaceworc_earnings}}</span>
                            </li>
                            <li>
                                <strong>Total Disbursed</strong>
                                <span>$0</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
