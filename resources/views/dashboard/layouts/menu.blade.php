<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">الرئيسية</li>

                <li>
                    <a href="{{route('admin_dashboard')}}" class="waves-effect">
                        <i class="fas fa-home"></i>
                        <span>لوحة التحكم</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users-cog"></i>
                        <span>الطلبات </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class=" @if(strstr(url()->current(),'orders')) active @endif"><a href="{{route('orders.index')}}">الطلبات</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users-cog"></i>
                        <span>الوثائق </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class=" @if(strstr(url()->current(),'photoType')) active @endif"><a href="{{route('photoType.index')}}">الوثائق</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users-cog"></i>
                        <span>المدفوعات </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class=" @if(strstr(url()->current(),'payments')) active @endif"><a href="{{route('Payment.index')}}">المدفوعات</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-cubes"></i>
                        <span>الصفحات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                           <li class=" @if(strstr(url()->current(),'pages')) active @endif"><a  href="{{route('pages.index')}}">الصفحات</a></li>
{{--                         <li class=" @if(strstr(url()->current(),'services')) active @endif"><a  href="{{route('service.Dashboard.index')}}">خدماتنا</a></li>--}}
{{--                            <li class=" @if(strstr(url()->current(),'reviews')) active @endif"><a  href="{{route('review.Dashboard.index')}}">التقييم</a></li>--}}



                    </ul>
                </li>
                 <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users-cog"></i>
                        <span>الاعدادات </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                            <li class=" @if(strstr(url()->current(),'settings')) active @endif"><a href="{{route('settings.index')}}">الاعدادات العامة</a></li>
                        <li class=" @if(strstr(url()->current(),'SocialSettings')) active @endif"><a href="{{route('SocialSettings.index')}}">مواقع التواصل الاجتماعي</a></li>
                           <li class=" @if(strstr(url()->current(),'videos')) active @endif"><a href="{{route('videos.index')}}">الفيديوهات</a>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users-cog"></i>
                        <span>تواصل معنا </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class=" @if(strstr(url()->current(),'contact_us')) active @endif"><a href="{{route('contact_us.index')}}">تواصل معنا</a>

                    </ul>
                </li>







            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>









