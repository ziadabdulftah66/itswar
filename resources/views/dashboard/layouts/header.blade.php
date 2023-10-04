
<!-- BEGIN: Header-->
<div id="layout-wrapper">
<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{route('admin_dashboard')}}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img style="padding: 5px;border-radius: 5px;background-color: white"   src="{{asset(footer_logo())}}" alt="" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img style="padding: 5px;border-radius: 5px;background-color: white" src="{{asset(footer_logo())}}" alt="" height="30">
                                </span>
                </a>

                <a href="{{route('admin_dashboard')}}" class="logo logo-light" style="padding-top: 30px">
                                <span class="logo-sm">
                                    <img style="padding: 5px;border-radius: 5px;background-color: white"  src="{{asset(footer_logo())}}" alt="" height="22">
                                </span>
                    <span class="logo-lg">
                                    <img  style="height: 40px;padding: 5px;border-radius: 5px;background-color: white"  src="{{asset(footer_logo())}}" alt="" height="18">
                                </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

            <div class="d-none d-sm-block">
                <div class="dropdown pt-3 d-inline-block">
                    <a class="btn btn-secondary dropdown-toggle" href="{{route('home')}}" target="_blank" role="button" aria-haspopup="true" aria-expanded="false">
                        زيارة الموقع
                    </a>


                </div>
            </div>
        </div>

        <div class="d-flex">
            <!-- App Search-->



            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-bell-outline"></i>
{{--                    <span class="badge bg-danger rounded-pill">{{auth()->user()->unreadNotifications->count()}}</span>--}}
                </button>
{{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">--}}
{{--                    <div class="p-3">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col">--}}
{{--                                <h5 class="m-0 font-size-16"> اشعارات ({{auth()->user()->unreadNotifications->count()}}) </h5>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div data-simplebar style="max-height: 230px;">--}}
{{--                        @foreach (auth()->user()->unreadNotifications as $notification)--}}

{{--                            <a--}}
{{--                                    @if($notification->data['not_type']=='Contact') href="{{route('contact_us.show',[$notification->data['id'],$notification->id])}}"--}}
{{--                                    @elseif($notification->data['not_type']=='ContactFincial') href="{{route('contact_fincial.show',[$notification->data['id'],$notification->id])}}"--}}
{{--                                    @elseif($notification->data['not_type']=='admin_fincial') href="{{route('Members.watch_financial_consulting',[$notification->data['id'],$notification->id])}}"--}}

{{--                                    @endif--}}


{{--                                    class="text-reset notification-item">--}}
{{--                                <div class="d-flex">--}}
{{--                                    <div class="flex-shrink-0 me-3">--}}
{{--                                        <div class="avatar-xs">--}}
{{--                                                    <span class="avatar-title bg-success rounded-circle font-size-16">--}}
{{--                                                        <i class="mdi mdi-cart-outline"></i>--}}
{{--                                                    </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="flex-grow-1">--}}
{{--                                        <h6 class="mb-1">{{ $notification->data['title'] }}</h6>--}}
{{--                                        <div class="font-size-12 text-muted">--}}
{{--                                            <p class="mb-1">{{ $notification->created_at }}</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}


{{--                        @endforeach--}}




{{--                    </div>--}}
{{--                    <div class="p-2 border-top">--}}
{{--                        <div class="d-grid">--}}
{{--                            <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">--}}
{{--                                View all--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{auth('admin')->user()->username}}
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('edit.profile')}}"><i class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> تعديل الملف الشخصي</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{route('admin.logout')}}"><i class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> تسجيل الخروج</a>
                </div>
            </div>



        </div>
    </div>
</header>





</div>
