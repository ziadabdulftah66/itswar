@extends('front.layouts.app')
@section('content')
    <!--=====================================================================-->
    <div class="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <h4> كيفيه الاستخدام   <img class="line1" src="images/line-4.png" alt=""></h4>
                        <p>بخطوات سهلة وبسيطة تستطيع الحصور على صورة شخصية مناسبة لنوع الوثيقه التى تريدها</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="itswr-steps" style="margin: 0px 0px">
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

@endsection

