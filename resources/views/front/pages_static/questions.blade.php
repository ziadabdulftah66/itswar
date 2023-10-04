@extends('front.layouts.app')
@section('content')

    <div class="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <h4>الأسئلة الشائعة <img class="line1" src="{{asset('public/front/images/line-4.png')}}" alt=""></h4>
                        <p>بعض من الاسئلة الشائعة لمستخدمين خدمة إتصور</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="question">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    @foreach($agreements as $agreement)
                    <button class="accordion">{{$agreement->question}}</button>
                    <div class="panel" >
                        {!! $agreement->answer !!}
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>




@endsection

