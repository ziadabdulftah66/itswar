


@extends('dashboard.layouts.app')

@section('content')


        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="page-title-box">
                        <div class="row align-items-center">

                            <div class="btn-back">
                                <a href="{{route('contact_us.index')}}" class="btn btn-primary"><i class="fa fa-reply" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- end page title -->



                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                        <form class="form form-vertical" action="" method="">

                                            <div class="form-body">
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">الأسم</label>
                                                            <input type="text" id="first-name-vertical" disabled value="{{$contact->name}}" class="form-control">

                                                        </div>
                                                    </div>
                                                    </div>
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">البريد الإلكترونى</label>
                                                            <input type="text" id="first-name-vertical" disabled value="{{$contact->email}}" class="form-control">

                                                        </div>
                                                    </div>
                                                    </div>
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">رقم الهاتف</label>
                                                            <input type="text" id="first-name-vertical" disabled value="{{$contact->phone}}" class="form-control">

                                                        </div>
                                                    </div>
                                                    </div>
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">عنوان الرسالة</label>
                                                            <textarea  class="form-control" disabled id="" cols="30"  rows="10">{{$contact->title}}</textarea>

                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-vertical">الرسالة</label>
                                                            <textarea  class="form-control" disabled id="" cols="30"  rows="10">{{$contact->message}}</textarea>

                                                        </div>
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
