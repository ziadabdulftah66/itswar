@extends('dashboard.layouts.app')

@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="row align-items-center">


                    </div>
                </div>
                <!-- end page title -->

                @include('dashboard.layouts.includes.alerts.success')
                @include('dashboard.layouts.includes.alerts.errors')

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">



                                <table class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">اسم الصفحة</th>
                                        <th scope="col">تحرير</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                                                              <tr>
                                                                                <td>1</td>
                                                                                <td>الصفحة الرئيسية</td>
                                                                                    <td><a href="{{route('home.edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                                                             </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>صفحة الاسئلة الشائعة</td>
                                        <td><a href="{{route('Questions.create')}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                    </tr>


                                                                             <tr>

                                                                                <td>3</td>

                                                                                <td>الشروط والاحكام</td>
                                                                               <td><a href="{{route('terms.edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>

                                                                             </tr>
                                                                              <tr>

                                                                                  <td>4</td>

                                                                                  <td>الاخطاء الشائعة في التصوير</td>
                                                                                  <td><a href="{{route('mistake.edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>

                                                                              </tr>
                                                                              <tr>

                                                                                  <td>5</td>

                                                                                  <td>خطوات التصوير</td>
                                                                                  <td><a href="{{route('steps.edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>

                                                                              </tr>




                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->



    </div> <!-- container-fluid -->

@endsection



