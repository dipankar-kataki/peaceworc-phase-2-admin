<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="main-sidebar app-sidebar sidebar-scroll">
    <div class="main-sidebar-header">
        <a class="desktop-logo logo-light active" href="/" class="text-center mx-auto">
            <img src="{{asset('assets/img/brand/peaceworc-logo-main.png')}}" class="main-logo">
        </a>
        <a class="desktop-logo icon-logo active"href="/">
            <img src="{{asset('assets/img/brand/peaceworc-favicon.png')}}" class="logo-icon">
        </a>
        <a class="desktop-logo logo-dark active" href="/">
            <img src="{{asset('assets/img/brand/peaceworc-logo-main.png')}}" class="main-logo dark-theme" alt="logo">
        </a>
        <a class="logo-icon mobile-logo icon-dark active" href="/">
            <img src="{{asset('assets/img/brand/peaceworc-favicon.png')}}" class="logo-icon dark-theme" alt="logo">
        </a>
    </div><!-- /logo -->
    <div class="main-sidebar-loggedin">
        <div class="app-sidebar__user">
            <div class="dropdown user-pro-body text-center">
                <div class="user-pic">
                    <img src="{{asset('assets/img/photos/user-headset.jpg')}}" alt="user-img" class="rounded-circle mCS_img_loaded">
                </div>
                <div class="user-info">
                    <h6 class=" mb-0 text-dark">{{Auth::user()->name}}</h6>
                    <span class="text-muted app-sidebar__user-name text-sm">{{Auth::user()->role == 1 ? 'Web-Administrator' : ((Auth::user()->role == 6) ? 'Web-Operator' : 'Unknown')}}</span>
                </div>
            </div>
        </div>
    </div><!-- /user -->
    <div class="sidebar-navs">
        {{-- <ul class="nav  nav-pills-circle">
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings" aria-describedby="tooltip365540">
                <a class="nav-link text-center m-2">
                    <i class="fe fe-settings"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Chat">
                <a class="nav-link text-center m-2">
                    <i class="fe fe-mail"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Followers">
                <a class="nav-link text-center m-2">
                    <i class="fe fe-user"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout">
                <a class="nav-link text-center m-2">
                    <i class="fe fe-power"></i>
                </a>
            </li>
        </ul> --}}
    </div>
    <div class="main-sidebar-body">
        <ul class="side-menu ">
            <li class="slide">
                <a class=" {{Request::segment(1) == 'dashboard' ? 'side-menu__item active' : 'side-menu__item'}} " href="{{route('admin.get.dashboard')}}">
                    <i class="side-menu__icon fe fe-airplay"></i>
                    <span class="side-menu__label">Dashboard</span>
                </a>
            </li>
            {{-- <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="index-2.html#"><i class="side-menu__icon fe fe-mail menu-icons"></i><span class="side-menu__label">Mail</span><span class="badge badge-warning side-badge">5</span></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="mail.html">Mail</a></li>
                    <li><a class="slide-item" href="mail-compose.html">Mail Compose</a></li>
                    <li><a class="slide-item" href="mail-read.html">Read-mail</a></li>
                    <li><a class="slide-item" href="mail-settings.html">mail-settings</a></li>
                    <li><a class="slide-item" href="chat.html">Chat</a></li>
                </ul>
            </li> --}}
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="index-2.html#">
                    <i class="side-menu__icon fe fe-layout"></i>
                    <span class="side-menu__label">Landing Page</span>
                    <i class="angle fe fe-chevron-down"></i>
                </a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="{{route('admin.get.manage.banner.page')}}">Manage Banner</a></li>
                    <li><a class="slide-item" href="{{route('admin.get.manage.about.page')}}">Manage About</a></li>
                    <li><a class="slide-item" href="{{route('admin.get.manage.service.page')}}">Manage Services</a></li>
                    <li><a class="slide-item" href="calendar.html">Manage Become Caregiver</a></li>
                    <li><a class="slide-item" href="contacts.html">Manage Become Agency</a></li>
                    <li><a class="slide-item" href="image-compare.html">Manage Testimonial</a></li>
                </ul>
            </li>
           
        </ul>
    </div>
</aside>