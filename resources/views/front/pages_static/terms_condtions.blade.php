@extends('front.layouts.app')
@section('content')
    <!--=====================================================================-->
    <div class="intro">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        <h4>الشروط و الأحكام   <img class="line1" src="{{asset('public/front/images/line-4.png')}}" alt=""></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================================================-->
    <div class="terms-conditions">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="content">
                        {!! $page->terms_desc !!}
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

