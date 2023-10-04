<!--=====================================================================-->
<div class="the-after" onclick="closeNav()"></div>
<!--=====================================================================-->
<div id="mySidenav" class="sidenav">
    <div class="col-xs-12">
        <a href="{{route('home')}}">    <img src="{{header_logo()}}" alt=""></a>
    </div>
    <div class="col-xs-12">
        <div class="menu-nav">
            <ul>
                <li><a  href="{{route('home')}}">الرئيسية</a></li>
                <li><a href="{{route('front.usageAgreement')}}">كيفيه الاستخدام</a></li>
                <li><a href="{{route('question')}}">الأسئلة الشائعة</a></li>
                <li><a href="search_request.html">بحث عن طلب</a></li>
                <li><a href="{{route('front.termsCondtions')}}">الشروط والاحكام</a></li>
                <li><a href="contact-us.html">اتصل بنا</a></li>
            </ul>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="social">
            <ul>
                <?php $social=\App\Models\Social_setting::first() ?>
                <li><a href="{{$social->whatsap}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                <li><a href="{{$social->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="{{$social->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="{{$social->instagram}}"><i class="fab fa-instagram"></i></a></li>
                <li><a href="{{$social->linkedin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
        </div>
    </div>


</div><!--sidenav-->
<!--=====================================================================-->
<div class="header-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-4">
                <div class="logo">
                    <a href="{{route('home')}}"><img src="{{header_logo()}}" alt=""></a>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="menu">
                    <ul>
                        <li><a class="active" href="{{route('home')}}">الرئيسية</a></li>
                        <li><a href="{{route('front.usageAgreement')}}">كيفيه الاستخدام</a></li>
                        <li><a href="{{route('question')}}">الأسئلة الشائعة</a></li>
                        <li><a href="search_request.html">بحث عن طلب</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-8">
                <div class="itswr-now">
                    <a href="{{route('Itswar')}}"><i class="fa fa-camera"></i> إتصور الأن </a>
                    <button class="hidden-xx" onclick="openNav()"><i class="fa fa-bars"></i></button>
                </div>
            </div>

        </div>
    </div>
</div>
