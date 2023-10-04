@extends('dashboard.layouts.app')

@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h6 class="page-title"> لوحة التحكم</h6>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">مرحبا بك</li>
                            </ol>
                        </div>

                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="{{asset('public/dashboard/images/services-icon/01.png')}}" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">الطلبات</h5>
                                    <h4 class="fw-medium font-size-24">{{\App\Models\Order::count()}} <i
                                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>
                                    <div class="mini-stat-label bg-success">
                                        <p class="mb-0"></p>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="{{route('orders.index')}}" class="text-white-50"><i class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="{{asset('public/dashboard/images/services-icon/02.png')}}" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">الوثائق</h5>
                                    <h4 class="fw-medium font-size-24">{{\App\Models\PhotoType::count()}} <i
                                            class="mdi mdi-arrow-down text-danger ms-2"></i></h4>

                                </div>
                                <div class="pt-2">

                                    <div class="float-end">
                                        <a href="{{route('photoType.index')}}" class="text-white-50"><i class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="{{asset('public/dashboard/images/services-icon/03.png')}}" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">تواصل معنا</h5>
                                    <h4 class="fw-medium font-size-24">{{\App\Models\ContactUs::count()}} <i
                                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>

                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="{{route('contact_us.index')}}" class="text-white-50"><i class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card mini-stat bg-primary text-white">
                            <div class="card-body">
                                <div class="mb-4">
                                    <div class="float-start mini-stat-img me-4">
                                        <img src="{{asset('public/dashboard/images/services-icon/04.png')}}" alt="">
                                    </div>
                                    <h5 class="font-size-16 text-uppercase text-white-50">المدفوعات</h5>
                                    <h4 class="fw-medium font-size-24">{{\App\Models\Paymentorder::count()}} <i
                                            class="mdi mdi-arrow-up text-success ms-2"></i></h4>

                                </div>
                                <div class="pt-2">
                                    <div class="float-end">
                                        <a href="" class="text-white-50"><i class="mdi mdi-arrow-right h5 text-white-50"></i></a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                <!-- end row -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">اخر الطلبات</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover table-centered table-nowrap mb-0">
                                        <thead>
                                        <tr>
                                            <th scope="col">(#)رقم الطلب</th>
                                            <th scope="col">نوع الوثيقة</th>
                                            <th scope="col">التاريخ</th>
                                            <th scope="col">رقم الجوال</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach(\App\Models\Order::where('payment','!=',null)->limit(10)->orderBy('id','DESC')->get() as $order)
                                        <tr>
                                            <th scope="row">#{{$order->id}}</th>
                                            <td>
                                                <div>
                                                    {{$order->type->title}}
                                                </div>
                                            </td>
                                            <td>{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d H:i:s',$order->created_at)}}</td>
                                            <td>
                                                {{$order->phone}}
                                            </td>


                                        </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->



            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->





    </div>
@endsection














