@extends('dashboard.layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('public/dashboard/css/style22.css')}}">

@endsection
@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <h5 class="content-header-title float-left mb-0">بيانات الطلب </h5>

                    </div>
                </div>
                <!-- end page title -->



                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <form class="form form-vertical" >
                                    <div class="form-body">

                                        <div class="row mb-3">
                                            <label for="title" class="col-sm-2 col-form-label">رقم الطلب</label>
                                            <div class="col-sm-10">
                                                <input type="text"  id="title" class="form-control"  value="{{$Order->id}}" readonly>

                                            </div>
                                        </div>


                                        <div class="row mb-3">

                                            <label for="discription" class="col-sm-2 col-form-label">نوع الوثيقة</label>
                                            <div class="col-sm-10">
                                                <textarea id="discription" class="form-control" name="discription" readonly>{{$Order->type->title}}</textarea>



                                            </div>
                                        </div>
                                        <div class="row mb-3">

                                            <label for="discription" class="col-sm-2 col-form-label">تاريخ الطلب</label>
                                            <div class="col-sm-10">
                                                <textarea id="discription" class="form-control" name="discription">{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s',$Order->created_at)}}</textarea>



                                            </div>
                                        </div>
                                        <div class="row mb-3">

                                            <label for="discription" class="col-sm-2 col-form-label">رقم الجوال</label>
                                            <div class="col-sm-10">
                                                <textarea id="discription" class="form-control" name="discription" readonly>{{$Order->phone}}</textarea>



                                            </div>
                                        </div>
                                        <div class="row mb-3">

                                            <label for="discription" class="col-sm-2 col-form-label">البريد الاكتروني</label>
                                            <div class="col-sm-10">
                                                <textarea id="discription" class="form-control" name="discription" readonly>{{$Order->email}}</textarea>



                                            </div>
                                        </div>
                                        <div class="row mb-3">

                                            <label for="discription" class="col-sm-2 col-form-label">الصورة</label>
                                            <div class="col-sm-10">

                                                <img src="{{$order->photo}}"  style="width: {{$order->type->width / 0.0264583333 }}px;height: {{$order->type->width / 0.0264583333 }}px;object-fit: contain">



                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                        <div class="col-12" style="margin: auto;margin-bottom:20px;margin-top:20px;text-align: center">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1 waves-effect waves-light">إضافة</button>

                                        </div>
                                        </div>
                                    </div>

                                </form>


                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



    </div> <!-- container-fluid -->
    </div>

@endsection









@section('scripts')
    <script src="//maps.google.com/maps/api/js?libraries=places&key=AIzaSyClpYC9kBHWhxuz08xtbt7bEG93n4FzNzk&region=sa&language=ar&sensor=true"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css"
          rel="stylesheet"/>
    <script src="{{asset('public/dashboard/js/bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js" integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('public/dashboard/js/sss.js')}}"></script>


    <script>

        $(function () {

            initHijrDatePicker();

            initHijrDatePickerDefault();

            $('.disable-date').hijriDatePicker({

                minDate:"2020-01-01",
                maxDate:"2021-01-01",
                viewMode:"years",
                hijri:false,
                debug:true
            });

        });

        function initHijrDatePicker() {

            $("#birth_date").hijriDatePicker({
                locale: "en",

            });

            $("#date_hiring").hijriDatePicker({
                locale: "en",

            });
        }

        function initHijrDatePickerDefault() {

            $(".hijri-date-default").hijriDatePicker();
        }

    </script>
    <script>
        $(document).ready(function (){
            $(document).on('change', '.FindOut_masar', function () {
                let id = $(this).val();

                if (id =='other'){

                    var input = document.getElementById('FindOut_masar_other').style.display='block';
                }
                else {
                    var input = document.getElementById('FindOut_masar_other').style.display='none';
                }


            });
        });
    </script>
@endsection
