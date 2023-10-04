@extends('front.layouts.app')

@section('content')


    <!--=====================================================================-->
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="contact-data">
                        <h1>اتصل بنا</h1>
                        <h3>هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ ،</h3>
                        <ul class="social">
                            <?php $social=\App\Models\Social_setting::first() ?>
                            <li><a href="{{$social->whatsap}}" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a href="{{$social->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{$social->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{$social->instagram}}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{$social->linkedin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>


                        </ul>
                        <ul class="contact">
                            <?php $setting=\App\Models\General_setting::first() ?>
                            <li><img src="{{asset('public/front/images/contact-1.png')}}"> {{$setting->manager_phone}} </li>
                            <li><img src="{{asset('public/front/images/contact-2.png')}}"> {{$setting->email}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <form action="{{route('contact_us.store')}}" method="POST">
                        @csrf
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label> الاسم الكامل </label>
                            <input  type="text" placeholder="اكتب الاسم الاول واسم العائلة" value="{{old('name')}}" name="name">
                            @error('name')
                            <span class=" text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label> رقم الجوال   </label>
                            <input type="text" placeholder="955  000 000 000" name="phone" value="{{old('phone')}}">
                            @error('phone')
                            <span class=" text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label> البريد الالكتروني   </label>
                            <input type="text" placeholder="ادخل البريد الالكتروني الخاص بك" value="{{old('email')}}" name="email">
                            @error('email')
                            <span class=" text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label> عنوان الرسالة   </label>
                            <input type="text" placeholder="اكتب عنوان للرسالة" value="{{old('title')}}" name="title">
                            @error('title')
                            <span class=" text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <label>  الرسالة   </label>
                            <textarea  placeholder="اكتب تفاصيل الرسالة" name="message" >{{old('message')}}</textarea>
                        </div>
<div style="margin-bottom: 19px" class="col-md-12 col-sm-12 col-xs-12">
                        <div class="g-recaptcha" data-sitekey="6LftV00oAAAAAEOpJFBR7_SG6yZUL6GcFdajKLxv"></div>
                        @if ($errors->has('g-recaptcha-response'))

                            <span class=" text-danger">{{$errors->first('g-recaptcha-response')}}</span>

                        @endif
</div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button>ارسال</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


<!--=======================================================================-->



@endsection
@section('scripts')

@endsection
