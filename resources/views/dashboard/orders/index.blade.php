@extends('dashboard.layouts.app')
@section('style')
    <style>

        div.dataTables_wrapper div.dataTables_filter {
            text-align: left;
        }


    </style>
@endsection
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

                                <h4 class="card-title">الطلبات</h4>

                                <table id="datatable"  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                    <thead>
                                    <tr>
                                        <th scope="col">رقم الطلب</th>

                                        <th>نوع الوثيقة </th>
                                        <th>تاريخ الطلب </th>



                                        <th scope="col">الاجرائات</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($orders as $order)
                                        <tr>


                                            <th scope="row">{{$order->id}}</th>
                                            <td>{{$order->type->title}} </td>
=                                            <td>{{$order->created_at}} </td>


                                            <td><a href="{{route('orders.edit',$order->id)}}"
                                                   class="btn btn-secondary btn-sm edit" title="Edit"> <i class="fa fa-eye"></i> </a>
                                                <a href="{{route('orders.destroy',$order->id)}}"
                                                   class="btn btn-secondary btn-sm edit" title="Delete" onclick="return confirm('هل تريد حذف ذلك الطلب؟');"> <i class="fas fa-trash"></i> </a>


                                            </td>






                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->





    </div>
    <div class="rightbar-overlay"></div>
@endsection
@section('scripts')


    <script>



        $("#datatable").dataTable({
            language: {
                paginate: {

                    "previous": "السابق",
                    "next": "التالي",

                },
                search: 'بحث',
                info: "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                lengthMenu: "أظهر _MENU_ مدخلات",
                infoEmpty: "يعرض 0 إلى 0 من أصل 0 مُدخل",
                loadingRecords: "جارٍ التحميل...",
                zeroRecords: "لم يعثر على أية سجلات",
                countFiltered: "عدد المفلتر",
                emptyTable: "لا يوجد بيانات متاحة في الجدول",
                infoFiltered: "(مرشحة من مجموع _MAX_ مُدخل)",


            },
        });
    </script>
@endsection

