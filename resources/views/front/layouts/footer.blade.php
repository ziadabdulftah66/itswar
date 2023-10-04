<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="logo">
                    <a href="{{route('home')}}"><img src="{{footer_logo()}}" alt=""></a>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul class="menu">
                            <li><a href="{{route('home')}}">الرئيسية</a></li>
                            <li><a href="{{route('front.usageAgreement')}}">كيفيه الاستخدام</a></li>
                            <li><a href="{{route('question')}}">الأسئلة الشائعة</a></li>
                            <li><a href="{{route('front.termsCondtions')}}">الشروط والاحكام</a></li>
                            <li><a href="search_request.html">بحث عن طلب</a></li>
                            <li><a href="{{route('contact_us')}}">اتصل بنا</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul class="social">
                            <?php $social=\App\Models\Social_setting::first() ?>
                            <li><a href="{{$social->whatsap}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="{{$social->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{$social->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{$social->instagram}}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{$social->linkedin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>


                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="copyright">
                    <h3>جميع الحقوق محفوظة لموقع اتصور <img src="{{asset('public/front/images/payment.png')}}" alt=""></h3>
                </div>
            </div>

        </div>
    </div>
</div>
