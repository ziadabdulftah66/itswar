@extends('front.layouts.app')
@section('content')


    <!--=====================================================================-->
    <div class="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <h4>{{$homes->home_title}} <img class="line1" src="{{asset('public/front/images/line-4.png')}}" alt=""></h4>
                        <p>{{$homes->home_desc}}</p>
                        <a href="itswr.html"><i class="fa fa-camera"></i> إتصور الأن </a>
                        <h2>فيديو لشرح الأستخدام</h2>
                        <img src="{{asset('public/front/images/line-1.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="about-itswr">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <img src="{{asset('public/front/images/line-3.png')}}" class="circles" alt="">
                        @php
                            $url = getYoutubeId($video->url_video);
                        @endphp
                        <iframe src="https://www.youtube.com/embed/{{$url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <h2>{{$homes->home_sub_title_other}} </h2>
                        <p>{{$homes->home_discription_other}}</p>
                    </div>

                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="about-pic">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <img src="{{asset('public/front/images/pic-1.png')}}" alt="">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <img class="line" src="{{asset('public/front/images/line-2.png')}}" alt="">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <img class="pic-2" src="{{asset('public/front/images/pic-2.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="itswr-steps">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="head-bar">
                        <h2>صورة شخصية بخطوات بسيطة</h2>
                        <h5>بخطوات سهلة وبسيطة تستطيع الحصور على صورة شخصية مناسبة لنوع الوثيقه التى تريدها</h5>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="steps">
                        <img class="line-h" src="{{asset('public/front/images/line-5.png')}}" alt="">
                        <?php $i=1 ?>
                        @foreach($PhotoSteps as $PhotoStep)

                        <div @if($i % 2 !=0) class="one" @else class="two" @endif>
                            <div class="icon">
                                <img src="{{$PhotoStep->photo}}" alt="">
                                <span>{{$i}}</span>
                            </div>
                            <h5>{{$PhotoStep->title}}</h5>
                        </div>
                            <?php $i++; ?>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="examples-docs">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="content">
                        <h3>أمثلة الوثائق</h3>
                        <p>{{$homes->example_discription}}</p>
                        <a href="">إتصور الأن</a>
                    </div>

                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="ex">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="one">
                                <img src="{{$homes->example_one_photo}}" alt="">
                                <h5>{{$homes->example_one_title}}</h5>
                                <p>{{$homes->example_one_discription}} </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="one">
                                <img src="{{$homes->example_two_photo}}" alt="">
                                <h5>{{$homes->example_two_title}}</h5>
                                <p>{{$homes->example_two_discription}} </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="one">
                                <img src="{{$homes->example_three_photo}}" alt="">
                                <h5>{{$homes->example_three_title}}</h5>
                                <p>{{$homes->example_three_discription}} </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="one">
                                <img src="{{$homes->example_four_photo}}" alt="">
                                <h5>{{$homes->example_four_title}}</h5>
                                <p>{{$homes->example_four_discription}} </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="mistakes-itswr">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="head-bar">
                        <h3>الأخطاء الشائعة فى التصوير</h3>
                        <p>يمكنك بسهولة معرفة اشهر الاخطاء لتجنبها للحصول على افضل نتيجة</p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="one">
                        <img src="{{$mistakes->mistake_one_photo}}" alt="">
                        <h4>{{$mistakes->mistake_one_title}}</h4>
                        <p>{{$mistakes->mistake_one_discription}}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="one">
                        <img src="{{$mistakes->mistake_two_photo}}" alt="">
                        <h4>{{$mistakes->mistake_two_title}}</h4>
                        <p>{{$mistakes->mistake_two_discription}}</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="one">
                        <img src="{{$mistakes->mistake_three_photo}}" alt="">
                        <h4>{{$mistakes->mistake_three_title}}</h4>
                        <p>{{$mistakes->mistake_three_discription}}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--=====================================================================-->




    <!--=====================================================================-->



@endsection

